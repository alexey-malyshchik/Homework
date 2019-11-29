<?php
function task1()
{
    $fileData = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($fileData);
    echo 'Order Info:<br><br>';
    echo 'Order Number: ' . $xml->attributes()->PurchaseOrderNumber . '<br>';
    echo "Order Date: " . $xml->attributes()->OrderDate . '<br><br>';
    echo '<table cellspacing="0px" border="2px">';
    foreach ($xml->Address as $item) {
        echo '<td>';
        echo '' . $item->attributes()->Type . ' Address:' . '<br>' . '<hr>';
        echo 'Name: ' . $item->Name . '<br>';
        echo 'Street: ' . $item->Street . '<br>';
        echo 'City: ' . $item->City . '<br>';
        echo 'State: ' . $item->State . '<br>';
        echo 'Zip: ' . $item->Zip . '<br>';
        echo 'Country: ' . $item->Country . '<br>';
        echo '</td>';
    }
    echo '</table>';
    echo '<br>';
    echo 'Delivery note: ' . $xml->DeliveryNotes . '<br><br>';

    echo '<table cellspacing="0px" border="2px">';
    echo '<caption>Shipping list</caption>';
    echo '<tr><th>Name</th><th>Qty</th><th>Price</th><th>Comment</th>
          <th>Ship Date</th><th>Part №</th></tr>';
    foreach ($xml->Items->Item as $item) {
        echo '<tr>';
        echo '<td>' . $item->ProductName . '</td>';
        echo '<td>' . $item->Quantity . '</td>';
        echo '<td>' . $item->USPrice . '$' . '</td>';
        echo '<td>' . $item->Comment . '</td>';
        echo '<td>' . $item->ShipDate . '</td>';
        echo '<td>' . $item->attributes()->PartNumber . '</td>';
        echo '</tr>';
    }
    echo '</table><br>';
}

function task3()
{
    for ($i = 0; $i < 50; $i++) {
        $arrayRand[] = (rand(1, 100));
    }
    $newFile = fopen('newCSV.csv', 'w');
    fputcsv($newFile, $arrayRand, ';');
    echo 'Создали CSV<br>';
}
function task4()
{
    $fp = fopen('newCSV.csv', 'r');
    $ret = fgetcsv($fp, 1000, ';');
    foreach ($ret as $item) {
        if($item % 2 === 0 ){
            $sum[] = $item;
        }
    }
    echo 'Сумма четных чисел в массиве: ' . array_sum($sum) . '<br>';
}