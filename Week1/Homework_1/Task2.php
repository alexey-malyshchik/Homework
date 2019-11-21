<?php
CONST PICTURES = 80;
CONST MARKERS = 23;
CONST PENCILS = 40;
echo 'Дано: ' . PICTURES . ' рисунков.<br>';
echo 'Из них ' . MARKERS . ' выполнены фломастером, ' . PENCILS . ' карандашами.<br>';
echo 'Рисунков, выполненные красками, было: ' . $paints = PICTURES - MARKERS - PENCILS . '.';


