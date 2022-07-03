<?php
/**
 * Клиент: создается огромнейшая база собак со свойствами каждой: порода, изображение, цвет, имя, собственник, возраст
 */

use classes\DogArray;


function autoloader($class) 
{
    $class = str_replace("\\", "/", $class);
    $file = __DIR__ . "/{$class}.php";
    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register("autoloader");

$relativePathFile = "data.csv";
$file = fopen($relativePathFile, 'rt') or die("Ошибка"); 

$dogArray = new DogArray();

for ($i = 0; $string = fgetcsv($file, 0, ";"); $i++) {
    if (count($string) === 6) {
        list($name, $age, $owner, $breed, $image, $color) = $string;
        $dogArray->fill($name, $age, $owner, $breed, $image, $color);
    }
}

fclose($file);

$array_found_dogs = $dogArray->findDog(["age"=>"5", "name"=>"Бобик"]);

foreach($array_found_dogs as $dog) {
    $dog->render();
}