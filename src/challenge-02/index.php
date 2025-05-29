<?php

declare(strict_types=1);

/**
 * Encuentra la subcadena más corta de N que contenga todos los caracteres de K.
 *
 * @param array{string, string} $strArr
 * @return string
 */
function noIterate(array $strArr): string
{
    [$firstValue, $secondValue] = $strArr;

    $need = array_count_values(str_split($secondValue));
    $have = [];
    $required = array_sum($need);

    $left = 0;
    $matched = 0;
    $minLen = PHP_INT_MAX;
    $minStart = 0;

    for ($right = 0, $len = strlen($firstValue); $right < $len; $right++) {
        $char = $firstValue[$right];

        if (isset($need[$char])) {
            $have[$char] = ($have[$char] ?? 0) + 1;
            if ($have[$char] <= $need[$char]) {
                $matched++;
            }
        }

        while ($matched === $required) {
            $windowLen = $right - $left + 1;
            if ($windowLen < $minLen) {
                $minLen = $windowLen;
                $minStart = $left;
            }

            $leftChar = $firstValue[$left];
            if (isset($need[$leftChar])) {
                if ($have[$leftChar] <= $need[$leftChar]) {
                    $matched--;
                }
                $have[$leftChar]--;
            }
            $left++;
        }
    }

    return $minLen === PHP_INT_MAX ? '' : substr($firstValue, $minStart, $minLen);
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);