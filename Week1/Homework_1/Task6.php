<?php
$rows = 10;
$cols = 10;
echo '<table border="1" cellspacing="0" cellpadding="4">';
for ($tr = 1; $tr <= $rows; $tr++) {
    echo '<tr>';
    for ($td = 1; $td <= $cols; $td++) {
        if ($tr % 2 === 0 && $td % 2 === 0) {
            echo '<td>' . '(' . $tr * $td . ')' . '</td>';
        } elseif ($tr % 2 !== 0 && $td % 2 !== 0) {
            echo '<td>' . '[' . $tr * $td . ']' . '</td>';
        } else {
            echo '<td>' . $tr * $td . '</td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
