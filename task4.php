<?php

function sumOfNeighbors($matrix, $row, $col)
{

    $sum = 0;

    $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];

    $rows = count($matrix);

    $cols = count($matrix[0]);

    foreach ($directions as $direction) {

        $newRow = $row + $direction[0];

        $newCol = $col + $direction[1];


        if ($newRow >= 0 && $newRow < $rows && $newCol >= 0 && $newCol < $cols) {

            $sum += $matrix[$newRow][$newCol];
        }
    }

    return $sum;
}

$matrix = [
    [51, 71, 1, 50],
    [13, 5, 19, 11],
    [60, 4, 11, 20],
    [13, 34, 17, 0],
    [16, 53, 1, 32]
];

echo sumOfNeighbors($matrix, 0, 0);
echo sumOfNeighbors($matrix, 3, 2);