<?php
//Подключаемся к БД
//
$db_hostname = '127.0.0.1';
$db_database = 'vp1db';
$db_username = 'root';
$db_password = '';
$connection = new mysqli($db_hostname, $db_username,
    $db_password, $db_database);
if ($connection->connect_error) {
    die($connection->connect_error);
}
//Проверка есть ли email в базе
//
$result = $connection->query("SELECT `email` FROM `users` WHERE `email` = '{$_POST['email']}'");
$data = $result->fetch_assoc();
if($data == null){
    //Добовляем нового пользователя
    //
    $newUser = $connection->query("INSERT INTO `users` (`email`,`name`,`phone`) VALUES ('{$_POST['email']}','{$_POST['name']}','{$_POST['phone']}')");
}
//Забираем id и ship count;
//
$id = $connection->query("SELECT `id` FROM `users` WHERE `email` = '{$_POST['email']}'")->fetch_assoc();
$ship_count = $connection->query("SELECT `ship count` FROM `users` WHERE `email` = '{$_POST['email']}'")->fetch_assoc();
//Увеличиваем кол-во заказов на 1
//
$ship_count = $ship_count["ship count"] + 1;
$ship_count_new = $connection->query("UPDATE `users` SET `ship count`='{$ship_count}' WHERE id={$id["id"]}");
//Добавляем запись в таблицу заказов
//
$address = "Улица:" . $_POST['street'] . " Дом:" . $_POST['home'] . " Кв:" . $_POST['part'] . " Корпус:" . $_POST['appt'] . " Этаж:" . $_POST['floor'];
$details = 'Комментарий: ' . $_POST['comment'] . ' Оплата: ' . $_POST['payment'] . " Перезванивать: " . $_POST['callback'];
$ship_info = $connection->query("INSERT INTO `shipping` (`address`,`id`,`details`) VALUES ('{$address}','{$id["id"]}','{$details}')");
//Отправка письма
//
$shipId = $connection->query("SELECT MAX(`id ship`) FROM `shipping` WHERE `id` = {$id["id"]}")->fetch_assoc();
$email = $_POST['email'];
$subject = "Заказ №{$shipId}";
$massage = "Добрый день, {$_POST['name']}! Ваш заказ №{$shipId} будет доставлен в ближайшее время.<br>
            Детали заказа:  DarkBeefBurger за 500 рублей, 1 шт<br>
            Адрес доставки: {$address}<br>
            Комментарий: {$details}";
mail($email, $subject, $massage);

