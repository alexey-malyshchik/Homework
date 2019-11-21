<?php
$bmw = ['model' => 'X5',
        'speed' => '120',
        'doors' => '5',
        'year'  => '2015'];
$opel = ['model' => 'Astra',
        'speed' => '100',
        'doors' => '5',
        'year'  => '2012'];
$toyota = ['model' => 'Camry',
           'speed' => '110',
           'doors' => '5',
           'year'  => '2014'];
$cars = [$bmw, $opel, $toyota];
echo 'Car BMW<br>';
echo ($cars[0]['model'] . ' ' . $cars[0]['speed'] . ' ' . $cars[0]['doors']) .
' ' . $cars[0]['year'];
echo '<br>Car Opel<br>';
echo ($cars[1]['model'] . ' ' . $cars[1]['speed'] . ' ' . $cars[1]['doors']) .
' ' . $cars[1]['year'];
echo '<br>Car Toyota<br>';
echo ($cars[2]['model'] . ' ' . $cars[2]['speed'] . ' ' . $cars[2]['doors']) .
' ' . $cars[2]['year'];