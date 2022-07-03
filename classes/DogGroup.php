<?php

namespace classes;


class DogGroup
{
    public $breed;
    public $image;
    public $color;

    public function __construct(string $breed, string $image, string $color)
    {
        $this->breed = $breed;
        $this->image = $image;
        $this->color = $color;
    }

    public function profile(string $name, string  $age, string $owner)
    {
        // Show info about one dog
        echo "Это собака по кличке {$name}<br><br>
            Возраст - {$age}<br>Порода - {$this->breed}<br>
            Цвет - {$this->color}.<br>Ссылка на фото - {$this->image}<br>
            Хозяин собаки - {$owner}<br><br><br>";
    }
}