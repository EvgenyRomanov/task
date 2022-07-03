<?php

namespace classes;


class Dog
{
    public $name;
    public $age;
    public $owner;

    private $group;

    public function __construct(string $name, string $age, string $owner, DogGroup $group)
    {
        $this->name = $name;
        $this->age = $age;
        $this->owner = $owner;
        $this->group = $group;
    }

    public function render()
    {
        $this->group->profile($this->name, $this->age, $this->owner);
    }
}