<?php

declare(strict_types=1);

/**
 * Encuentra la subcadena más corta en el primer string N que contenga todos los caracteres del segundo valor.
 *
 * @param array{string, string} $strArr
 * @return string
 */
function noIterate(array $strArr): string
{
    [$n, $k] = $strArr;

    $need = array_count_values(str_split($k));
    $have = [];
    $required = array_sum($need);

    $left = 0;
    $matched = 0;
    $minLen = PHP_INT_MAX;
    $minStart = 0;

    for ($right = 0, $len = strlen($n); $right < $len; $right++) {
        $char = $n[$right];

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

            $leftChar = $n[$left];
            if (isset($need[$leftChar])) {
                if ($have[$leftChar] <= $need[$leftChar]) {
                    $matched--;
                }
                $have[$leftChar]--;
            }
            $left++;
        }
    }

    return $minLen === PHP_INT_MAX ? '' : substr($n, $minStart, $minLen);
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);