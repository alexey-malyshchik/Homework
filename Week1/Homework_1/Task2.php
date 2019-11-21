<?php
const PICTURES = 80;
const MARKERS = 23;
const PENCILS = 40;
echo 'Дано: ' . PICTURES . ' рисунков.<br>';
echo 'Из них ' . MARKERS . ' выполнены фломастером, ' . PENCILS . ' карандашами.<br>';
echo 'Рисунков, выполненные красками, было: ' . $paints = PICTURES - MARKERS - PENCILS . '.';


