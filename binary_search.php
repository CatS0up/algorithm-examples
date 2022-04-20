<?php

function binary_search(array $elements, int $item): ?int
{
    // Index of the first list element
    $start = 0;

    // Index of the last list element
    $end = count($elements) - 1;

    // Do loop while 
    while ($start <= $end) {

        // Mid index
        $mid = ceil(($start + $end) / 2);

        // Mid element is now a "guessing" number
        $guess = $elements[$mid];

        // When guessing number is equal to searching item then return index of guessed number
        if ($guess === $item) {
            return $mid;
        } else if ($guess > $item) {
            // When guessing number is greather than searching item then reject half of the elements which are greather than a mid element
            $end = $mid - 1;
        } else {
            // When guessing number is less than searching item then reject half of the elements which are less than a mid element
            $start = $mid + 1;
        }
    }

    // When searching element does not exists in the array then return null
    return null;
}

$list = [888, 3456, 5, 99999, 4];

// List of element must be sorted!
sort($list);

echo 'List: [' . implode(', ', $list) . ']' . PHP_EOL;
echo 'Index of 888: ' . binary_search($list, 888) . PHP_EOL; // 2
echo 'Index of 3456: ' . binary_search($list, 3456) . PHP_EOL; // 3
echo 'Index of 1: ' . binary_search($list, 1) . PHP_EOL; // null