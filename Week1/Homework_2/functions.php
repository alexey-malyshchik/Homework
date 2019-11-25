<?php
function task1(array $strings, bool $unite_strings = false)
{
    if ($unite_strings) {
        foreach ($strings as $word) {
            $string .= $word;
        }
        return $string;
    } else {
        foreach ($strings as $word) {
            $string = '<p>' . $word . '<p>';
            echo $string;
        }
    }
}

function task2($operator, ...$numbers)
{
    if ($operator == '+') {
        $result = $numbers[0];
        for ($i = 1; $i < count($numbers); $i++) {
            $result += $numbers[$i];
        }
        echo implode(" $operator ", $numbers) . ' = ' . "$result";
    } elseif ($operator == '-') {
        $result = $numbers[0];
        for ($i = 1; $i < count($numbers); $i++) {
            $result -= $numbers[$i];
        }
        echo implode(" $operator ", $numbers) . ' = ' . "$result";
    } elseif ($operator == '*') {
        $result = $numbers[0];
        for ($i = 1; $i < count($numbers); $i++) {
            $result *= $numbers[$i];
        }
        echo implode(" $operator ", $numbers) . ' = ' . "$result";
    } elseif ($operator == '/') {
        $result = $numbers[0];
        for ($i = 1; $i < count($numbers); $i++) {
            $result /= $numbers[$i];
        }
        echo implode(" $operator ", $numbers) . ' = ' . "$result";
    }
}

function task3(int $rows, int $cols)
{
    echo '<table border="1" cellspacing="0" cellpadding="4">';
    for ($tr = 1; $tr <= $rows; $tr++) {
        echo '<tr>';
        for ($td = 1; $td <= $cols; $td++) {
            echo '<td>' . $tr * $td . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

function task4()
{
    echo date('d.m.Y G:i') . '<br>';
}

function task5()
{
    echo mktime(0, 0, 0, 2, 24, 2016) . '<br>';
}

function task6($string, $letter)
{
    echo str_replace("$letter", '', $string) . '<br>';
}

function task7($string, $search, $replace)
{
    echo str_replace("$search", "$replace", $string) . '<br>';
}

function task8()
{
    file_put_contents('test.txt', 'Hello again!');
}

function task9($file_name)
{
    echo file_get_contents($file_name);
}
