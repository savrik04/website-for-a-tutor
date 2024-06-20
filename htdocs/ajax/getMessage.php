<?php
    if (isset($_COOKIE['user'])) {
        if (isset($_POST['id_2'])) {
            $id_2 = $_POST['id_2'];
            $id_1 = $_COOKIE['user'];
            $mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
            $opened = 0;
            
            // Подготовленный запрос SELECT
            $sql = "SELECT * FROM `chats` WHERE `to_id` = ? AND `from_id` = ? ORDER BY `chat_id` ASC";
            $stmt = $mysql->prepare($sql);
            $stmt->bind_param("ii", $id_2, $id_1);
            $stmt->execute();
            
            // Получаем результирующий набор
            $result = $stmt->get_result();
            // Проверяем, есть ли строки в результирующем наборе
            if ($result->num_rows > 0) {

                // Обрабатываем каждую строку результата
                while ($chat = $result->fetch_assoc()) {
                    if ($chat['opened'] == NULL && $chat['to_id'] == $id_1 && $chat['from_id'] == $id_2) {

                        $opened = 1;
                        $chat_id = $chat['chat_id'];
                        $sql2 = "UPDATE `chats` SET `opened` = ? WHERE `chat_id` = ?";
                        $stmt2 = $mysql->prepare($sql2);
                        $stmt2->bind_param("ii", $opened, $chat_id);
                        $stmt2->execute();
?>
                        <p class="ltext border rounded p-2 mb-1"><?=$chat['message']?></p>
<?php
                    }
                }
            }
        }
    } else {
        header('Location: ../index.php');
        exit();
    }
?>
