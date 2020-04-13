<?php

function getDataInput()
{
    $total = fgets(STDIN);
    $data = [];
    while ($row = fgets(STDIN)) {
        $data[] = explode(' ', $row);
    }

    return [$total, $data];
}

function writeOutput(array $result)
{
    foreach ($result as $value) {
        fputs(STDOUT, $value . PHP_EOL);
    }
}

function solve(array $data): array
{
    $result = [];
    foreach ($data as $item) {
        $result[] = getMinPrice($item[0], $item[1], $item[2]);
    }

    return $result;
}

function getMinPrice(int $k, int $x, int $y): int
{
    if ($y / 2 > $x) {
        return $k * $x;
    }

    if ($k % 2 === 0) {
        return $y * ($k / 2);
    }

    return $y * (($k - 1) / 2) + $x;
}

[$total, $data] = getDataInput();
$result = solve($data);
writeOutput($result);
