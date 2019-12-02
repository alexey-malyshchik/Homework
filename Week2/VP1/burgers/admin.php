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
//Получаем данные пользователей
//
$users = $connection->query("SELECT `id`, `name`, `email`, `phone`, `ship count` FROM `users`");
while ($elem = $users->fetch_assoc()){
    $dataUsers[] = $elem;}
echo '<pre>';

echo '<table cellspacing="0px" border="2px">';
echo '<caption>Пользователи</caption>';
echo '<tr><th>id user</th><th>name</th><th>email</th><th>phone</th><th>ship count</th></tr>';
foreach ($dataUsers as $item) {
    echo '<tr>';
    foreach ($item as $user => $info){
        echo '<td>';
        echo $item[$user] . '<br>';
        echo '</td>';
    }
    echo '</tr>';
    }
echo '</table>';

//Получаем данные заказов
//
$ships = $connection->query("SELECT `id ship`, `address`, `id`, `details` FROM `shipping`");
while ($elem = $ships->fetch_assoc()){
    $dataShips[] = $elem;}
echo '<table cellspacing="0px" border="2px">';
echo '<caption>Заказы</caption>';
echo '<tr><th>id ship</th><th>address</th><th>id user</th><th>details</th></tr>';
foreach ($dataShips as $item) {
    echo '<tr>';
    foreach ($item as $ship => $info){
        echo '<td>';
        echo $item[$ship] . '<br>';
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
