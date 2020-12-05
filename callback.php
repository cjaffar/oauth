<?php

$filename = dirname(__FILE__) . '/results.txt';

print($filename);
file_put_contents($filename, print_r($_SERVER, 1));