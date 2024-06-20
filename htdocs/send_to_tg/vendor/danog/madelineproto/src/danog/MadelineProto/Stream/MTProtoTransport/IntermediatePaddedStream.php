<?php

/**
 * TCP Intermediate stream wrapper.
 *
 * This file is part of MadelineProto.
 * MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU General Public License along with MadelineProto.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    Daniil Gentili <daniil@daniil.it>
 * @copyright 2016-2020 Daniil Gentili <daniil@daniil.it>
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
 *
 * @link https://docs.madelineproto.xyz MadelineProto documentation
 */

namespace danog\MadelineProto\Stream\MTProtoTransport;

use Amp\Socket\EncryptableSocket;
use danog\MadelineProto\Stream\Async\BufferedStream;
use danog\MadelineProto\Stream\BufferedStreamInterface;
use danog\MadelineProto\Stream\ConnectionContext;
use danog\MadelineProto\Stream\MTProtoBufferInterface;
use danog\MadelineProto\Stream\RawStreamInterface;

/**
 * TCP Intermediate stream wrapper.
 *
 * Manages obfuscated2 encryption/decryption
 *
 * @author Daniil Gentili <daniil@daniil.it>
 */
class IntermediatePaddedStream implements BufferedStreamInterface, MTProtoBufferInterface
{
    use BufferedStream;
    private $stream;
    /**
     * Connect to stream.
     *
     * @param ConnectionContext $ctx The connection context
     *
     */
    public function connect(ConnectionContext $ctx, string $header = ''): \Generator
    {
        $this->stream = (yield from $ctx->getStream(\str_repeat(\chr(221), 4).$header));
    }
    /**
     * Async close.
     *
     */
    public function disconnect(): \Amp\Promise
    {
        return $this->stream->disconnect();
    }
    /**
     * Get write buffer asynchronously.
     *
     * @param int $length Length of data that is going to be written to the write buffer
     *
     */
    public function getWriteBufferGenerator(int $length, string $append = ''): \Generator
    {
        $padding_length = \danog\MadelineProto\Tools::randomInt($modulus = 16);
        $buffer = yield $this->stream->getWriteBuffer(4 + $length + $padding_length, $append.\danog\MadelineProto\Tools::random($padding_length));
        yield $buffer->bufferWrite(\pack('V', $padding_length + $length));
        return $buffer;
    }
    /**
     * Get read buffer asynchronously.
     *
     * @param int $length Length of payload, as detected by this layer
     *
     */
    public function getReadBufferGenerator(&$length): \Generator
    {
        $buffer = yield $this->stream->getReadBuffer($l);
        $length = \unpack('V', yield $buffer->bufferRead(4))[1];
        return $buffer;
    }
    /**
     * {@inheritdoc}
     *
     */
    public function getSocket(): EncryptableSocket
    {
        return $this->stream->getSocket();
    }
    /**
     * {@inheritDoc}
     *
     */
    public function getStream(): RawStreamInterface
    {
        return $this->stream;
    }
    public static function getName(): string
    {
        return __CLASS__;
    }
}