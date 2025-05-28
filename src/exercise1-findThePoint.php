<?php
declare(strict_types=1);

/* ========================================================
Challenge 01

Have the function findPoint( $strArr ) read the array of strings stored in strArr which will contain 2 elements:
the first element will represent a list of comma-separated numbers sorted in ascending order,
the second element will represent a second list of comma-separated numbers (also sorted).
Your goal is to return a comma-separated string containing the numbers that occur in elements of strArr in sorted order.
If there is no intersection, return the string false.

Examples:

Input: array("1, 3, 4, 7, 13", "1, 2, 4, 13, 15")
Output: 1,4,13

Input: array("1, 3, 9, 10, 17, 18", "1, 4, 9, 10")
Output: 1,9,10

==========================================================*/


/**
 * Devuelve los números comunes (interseccion) entre dos arrays separadas por coma.
 *
 * @param array{string, string} $strArr Arreglo con dos cadenas de números separados por coma (enviado por el ejercicio).
 * @return string Devuelve el array con los números comunes separados por coma o "false" si no hay coincidencias.
 */
function findPoint(array $strArr): string
{
    [$firstArray, $secondArray] = $strArr;

    $parseToIntArray = fn(string $arrayValue): array => array_map(
        'intval',
        explode(',', str_replace(' ', '', $arrayValue))
    );

    $intersection = array_intersect(
        $parseToIntArray($firstArray),
        $parseToIntArray($secondArray)
    );

    return $intersection !== [] ? implode(',', $intersection) : 'false';
}

// keep this function call here
echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);

