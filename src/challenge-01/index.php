<?php
declare(strict_types=1);

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

