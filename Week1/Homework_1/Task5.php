<?php
$bmw = [
    'model' => 'X5',
    'speed' => '120',
    'doors' => '5',
    'year' => '2015'
];
$opel = [
    'model' => 'Astra',
    'speed' => '100',
    'doors' => '5',
    'year' => '2012'
];
$toyota = [
    'model' => 'Camry',
    'speed' => '110',
    'doors' => '5',
    'year' => '2014'
];
$cars = [$bmw, $opel, $toyota];
for ($i = 0; $i <= count($cars) - 1; $i++) {
    echo 'Car<br>';
    echo ($cars[$i]['model'] . ' ' . $cars[$i]['speed'] . ' ' . $cars[$i]['doors'])
    . ' ' . $cars[$i]['year'];
    echo '<br>';
};