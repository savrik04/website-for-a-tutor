<?php
    function opened($id_1, $chats) {
        $mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
        $sql = "UPDATE `chats` SET `opened` = ? WHERE `from_id` = ? AND `chat_id` = ?";
        $stmt = $mysql->prepare($sql);
        
        foreach ($chats as $chat) {
            if ($chat['opened'] == 0) {
                $opened = 1;
                $chat_id = $chat['chat_id'];
                
                // Привязываем параметры к подготовленному выражению
                $stmt->bind_param("iii", $opened, $id_1, $chat_id);
                
                // Выполняем запрос
                $stmt->execute();
            }
        }
    }
?>
