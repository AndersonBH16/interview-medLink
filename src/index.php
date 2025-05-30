<?php
//----------------------------------------------
// Ficha resumen: Funciones y características clave en PHP 8.3
// Fecha: 2025-05-28
//----------------------------------------------

declare(strict_types=1);

// 1. Tipado estricto y Tipos de retorno
// ------------------------------------------------
// Input: func(2, 3)
// Output: 5
function suma(int $a, int $b): int {
    return $a + $b;
}
echo suma(2, 3) . "\n"; // 5

// 2. Null-coalescing y Nullsafe operator
// ------------------------------------------------
// Input: \$config = ['host' => 'localhost'];
// Output: "localhost" and null (sin error)
$config = ['host' => 'localhost'];
$host = $config['host'] ?? '127.0.0.1';
echo "host=" . $host . "\n"; // host=localhost

// Nullsafe (objetos)
class User { public function getProfile(): ?Profile { return null; } }
class Profile { public function name(): string { return 'Ander'; }}
$user = new User();
echo $user->getProfile()?->name() ?? 'n/a'; // n/a

// 3. Funciones anónimas y Arrow functions
// ------------------------------------------------
$nums = [1, 2, 3, 4, 5];
// map con closure tradicional
echo implode(',', array_map(function(int $n): int { return $n * 2; }, $nums)) . "\n"; // 2,4,6,8,10

// Arrow function (PHP 7.4+)
echo implode(',', array_map(fn(int $n): int => $n * 2, $nums)) . "\n"; // 2,4,6,8,10

// 4. Named arguments
// ------------------------------------------------
function conectar(string $host, int $puerto, bool $ssl = false): string {
    return "Conectando a \$host:\$puerto " . ($ssl ? 'vía SSL' : 'sin SSL');
}

echo conectar(puerto: 3306, host: 'db.example.com', ssl: true) . "\n";
// Conectando a db.example.com:3306 vía SSL

// 5. Match expression
// ------------------------------------------------
$status = 404;
echo match ($status) {
    200 => 'OK',
    404 => 'Not Found',
    default => 'Error',
} . "\n"; // Not Found

// 6. Null-coalescing assignment (PHP 7.4+)
// ------------------------------------------------
$data = [];
$data['x'] ??= 10;
echo $data['x'] . "\n"; // 10

// 7. Spread operator en arrays (PHP 7.4+)
// ------------------------------------------------
$a = [1, 2];
$b = [0, ...$a, 3];
print_r($b); // [0,1,2,3]

// 8. str_* functions mejoradas (PHP 8+)
// ------------------------------------------------
// Input: "Hello, world!"
echo str_contains('Hello, world!', 'world') ? 'sí' : 'no'; // sí

echo str_starts_with('Test.php', 'Test'); // true

echo str_ends_with('photo.jpg', '.jpg'); // true

// Manejo de strings adicionales
// ------------------------------------------------
$text = "PHP8.3 Features";
echo substr($text, 0, 3) . "\n";           // PHP
echo str_replace('Features', 'Funcs', $text) . "\n"; // PHP8.3 Funcs
echo strtoupper($text) . "\n";            // PHP8.3 FEATURES
echo htmlspecialchars('<a>') . "\n";     // &lt;a&gt;
echo json_encode(['a' => 1, 'b' => 2]) . "\n"; // {"a":1,"b":2}

// 10. Funciones de arrays avanzadas
// ------------------------------------------------
$users = [
    ['id' => 2, 'name' => 'Alice'],
    ['id' => 5, 'name' => 'Bob'],
];
// array_column: extraer una columna
$names = array_column($users, 'name');
echo implode(',', $names) . "\n"; // Alice,Bob

// array_filter
$evens = array_filter($nums, fn($n) => $n % 2 === 0);
echo implode(',', $evens) . "\n"; // 2,4

// array_reduce
echo array_reduce($nums, fn($carry, $i) => $carry + $i, 0) . "\n"; // 15

// array_key_exists
echo array_key_exists('id', $users[0]) ? 'sí\n' : 'no\n'; // sí

// array_search
echo array_search(4, $nums) . "\n"; // 3 (índice)

// array_unique
$dup = [1,2,2,3];
print_r(array_unique($dup)); // [1,2,3]

// 11. Generators y yield (PHP 5.5+)
// ------------------------------------------------
function genSequence(int $max): Generator {
    for ($i = 0; $i <= $max; $i++) {
        yield $i;
    }
}
foreach (genSequence(3) as $val) {
    echo $val; // 0123
}
echo "\n";


// 9. Singleton pattern moderno con propiedades readonly (PHP 8.1+)
// ------------------------------------------------
class Singleton {
    private static ?Singleton $instance = null;
    public readonly string $config;
    private function __construct() {
        $this->config = 'valor';
    }
    public static function getInstance(): Singleton {
        return self::$instance ??= new self();
    }
}
// Uso:
$s1 = Singleton::getInstance();
$s2 = Singleton::getInstance();
echo $s1 === $s2 ? 'misma instancia' : 'distintas'; // misma instancia

echo "Config: {$s1->config}";

// 13. Objetos anónimos y Traits (PHP 7.0+ / 5.4+)
// ------------------------------------------------
trait Logger {
    public function log(string $msg): void {
        echo "Log: $msg\n";
    }
}
// Objeto anónimo con trait
$anon = new class {
    use Logger;
};
$anon->log('mensaje de prueba');

// 14. Reflexión básica
// ------------------------------------------------
$ref = new ReflectionFunction('suma');
echo "Parámetros: " . $ref->getNumberOfParameters() . "\n"; // 2

// 10. Colecciones con array_filter y array_reduce
// ------------------------------------------------
$items = [1, 2, 3, 4, 5];
// Filtrar pares
echo implode(',', array_filter($items, fn($n) => $n % 2 === 0)) . "\n"; // 2,4

// Suma con reduce
$sum = array_reduce($items, fn($carry, $item) => $carry + $item, 0);
echo "Sum: {$sum}\n"; // Sum: 15

// 11. Tipos union y literal (PHP 8.0+)
// ------------------------------------------------
function procesar(int|string $input): string {
    return match (true) {
        is_int($input) => "Número {\$input}",
        is_string($input) => "Cadena {\$input}",
    };
}
echo procesar(5) . "\n";    // Número 5

echo procesar('hola') . "\n"; // Cadena hola

// Fin de la ficha resumen


array_is_list([10, 20, 30]); // true
array_is_list([1 => "a", 0 => "b"]); // false

$dobles = array_map(fn($n) => $n * 2, [1, 2, 3]);
// [2, 4, 6]

str_contains("PHP 8 es genial", "8"); // true

echo match (2) {
    1 => "Uno",
    2 => "Dos",
    default => "Otro",
}; // "Dos"

class Usuario {
    public readonly string $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }
}

json_validate('{ "a": 1 }'); // true
json_validate('{ a: 1 }'); // false


/*
🧵 STRINGS – Funciones comunes
Función	Descripción	Input	Output	Ejemplo
str_split()	Divide un string en un array de caracteres	"Hola"	["H", "o", "l", "a"]	str_split("Hola")
explode()	Divide un string en un array usando un delimitador	"a,b,c"	["a", "b", "c"]	explode(",", "a,b,c")
implode()	Une elementos de un array en un string	["a", "b"]	"a,b"	implode(",", ["a", "b"])
strlen()	Longitud de un string	"Hola"	4	strlen("Hola")
str_contains()	Verifica si un string contiene otro (PHP 8+)	"Hola Mundo" "Mundo"	true	str_contains("Hola Mundo", "Mundo")
str_starts_with()	¿Empieza con...?	"Hola Mundo" "Hola"	true	str_starts_with("Hola Mundo", "Hola")
str_ends_with()	¿Termina con...?	"Hola Mundo" "Mundo"	true	str_ends_with("Hola Mundo", "Mundo")
substr()	Extrae una parte del string	"abcdef"	"abc"	substr("abcdef", 0, 3)
str_replace()	Reemplaza texto	"Hola Mundo"	"Hola PHP"	str_replace("Mundo", "PHP", "Hola Mundo")
trim()	Quita espacios o caracteres al inicio/fin	" Hola "	"Hola"	trim(" Hola ")

ARRAYS

| Función                | Descripción                             | Input               | Output             | Ejemplo                                          |
| ---------------------- | --------------------------------------- | ------------------- | ------------------ | ------------------------------------------------ |
| `array_count_values()` | Cuenta las veces que aparece cada valor | `[1, 1, 2]`         | `[1 => 2, 2 => 1]` | `array_count_values([1, 1, 2])`                  |
| `array_sum()`          | Suma todos los valores numéricos        | `[1, 2, 3]`         | `6`                | `array_sum([1, 2, 3])`                           |
| `array_map()`          | Aplica función a cada elemento          | `[1, 2]`            | `[2, 4]`           | `array_map(fn($n) => $n*2, [1, 2])`              |
| `array_filter()`       | Filtra elementos según condición        | `[1, 2, 3]`         | `[2, 3]`           | `array_filter([1, 2, 3], fn($n) => $n > 1)`      |
| `array_reduce()`       | Reduce array a un solo valor            | `[1, 2, 3]`         | `6`                | `array_reduce([1, 2, 3], fn($c, $n) => $c + $n)` |
| `in_array()`           | Verifica si un valor existe             | `["a", "b"]`, `"b"` | `true`             | `in_array("b", ["a", "b"])`                      |
| `array_merge()`        | Une arrays                              | `[1, 2]`, `[3, 4]`  | `[1, 2, 3, 4]`     | `array_merge([1, 2], [3, 4])`                    |
| `array_unique()`       | Elimina duplicados                      | `[1, 1, 2]`         | `[1, 2]`           | `array_unique([1, 1, 2])`                        |
| `array_key_exists()`   | Verifica si clave existe                | `["a" => 1]`, `"a"` | `true`             | `array_key_exists("a", ["a" => 1])`              |

*/
