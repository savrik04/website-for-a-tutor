<?php
function getChats($id_1, $id_2) {
    $mysql = new mysqli('localhost', 'root', 'root', 'reg_db');

    $sql = "SELECT * FROM `chats` WHERE (`from_id` = ? AND `to_id` = ?) OR (`to_id` = ? AND `from_id` = ?) ORDER BY chat_id ASC";

    $stmt = $mysql->prepare($sql);
    $stmt->bind_param("iiii", $id_1, $id_2, $id_2, $id_1);
    $stmt->execute();

    // Получаем результирующий набор
    $result = $stmt->get_result();

    // Проверяем, есть ли строки в результирующем наборе
    if ($result->num_rows > 0) {
        // Извлекаем все строки из результирующего набора
        $chats = $result->fetch_all(MYSQLI_ASSOC);
        return $chats;
    } else {
        // Если строк нет, возвращаем пустой массив
        return [];
    }
}
?>
