<?php


    require 'vendor/autoload.php'; // Подключаем необходимые файлы

    use danog\MadelineProto\API;

    function send_msg($href, $messg, $sedule_time) {
        $settings = (new \danog\MadelineProto\Settings\AppInfo)
            ->setApiId()
            ->setApiHash('');
        $MP = new API('session.madeline', $settings);
        $MP->start();
        return $MP->messages->sendMessage(['peer' => $href, 'message' => $messg, 'schedule_date' => $sedule_time])['updates']['0']['id'];
    }
    
    function del_msg($href, $id) {
        $settings = (new \danog\MadelineProto\Settings\AppInfo)
            ->setApiId()
            ->setApiHash('');
        $MP = new API('session.madeline', $settings);
        $MP->start();
        $MP->messages->deleteScheduledMessages(['peer' => $href, 'id' => [$id]]);
    }

?>
