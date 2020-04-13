<?php
$input = file_get_contents('php://stdin');
$data = explode("\n", $input);
$total = $data[0];
for ($i = 1; $i <= $total; $i++) {
    [$k, $x, $y] = explode(' ', $data[$i]);
    echo getMinPrice($k, $x, $y) . PHP_EOL;
}

function getMinPrice($k, $x, $y): int
{
    if ($y / 2 > $x) {
        return $k * $x;
    }

    if ($k % 2 === 0) {
        return $y * ($k / 2);
    }

    return $y * (($k - 1) / 2) + $x;
}
