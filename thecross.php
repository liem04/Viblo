<?php

function getDataInput($resource = STDIN)
{
    $total = (int)fgets($resource);
    $data = [];
    while ($row = fgets($resource)) {
        $data[] = trim($row);
    }

    return [$total, $data];
}

function solve($total, $data): string
{
    $has = false;
    $tmp = [];
    for ($i = 0; $i < $total; $i++) {
        for ($j = 0; $j < $total; $j++) {
            if ($data[$i][$j] !== '#') {
                continue;
            }

            if (!empty($tmp[$i][$j])) {
                continue;
            }

            $has = true;
            if (!isset($data[$i + 1][$j - 1]) || $data[$i + 1][$j - 1] !== '#' || !empty($tmp[$i + 1][$j - 1])) {
                return 'NO';
            } else {
                $tmp[$i + 1][$j - 1] = true;
            }

            if (!isset($data[$i + 1][$j]) || $data[$i + 1][$j] !== '#' || !empty($tmp[$i + 1][$j])) {
                return 'NO';
            } else {
                $tmp[$i + 1][$j] = true;
            }

            if (!isset($data[$i + 1][$j + 1]) || $data[$i + 1][$j + 1] !== '#' || !empty($tmp[$i + 1][$j + 1])) {
                return 'NO';
            } else {
                $tmp[$i + 1][$j + 1] = true;
            }

            if (!isset($data[$i + 2][$j]) || $data[$i + 2][$j] !== '#' || isset($tmp[$i + 2][$j])) {
                return 'NO';
            } else {
                $tmp[$i + 2][$j] = true;
            }
        }
    }

    return $has ? 'YES': 'NO';
}

[$total, $data] = getDataInput();
echo solve($total, $data);
