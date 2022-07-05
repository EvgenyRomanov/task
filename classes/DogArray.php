<?php

namespace classes;


class DogArray
{
    private $groups = [];
    private $dogs = [];

    private function newDog($name, $age, $owner, $group)
    {
        $this->dogs[] = new Dog($name, $age, $owner, $group);
    }
	
    private function getGroup(string $breed, string $image, string $color) 
    {
        $key = 'key_' . $breed . $image . $color;
		
        if (!isset($this->groups[$key])) {
            $this->groups[$key] = new DogGroup($breed, $image, $color); 
        }

        return $this->groups[$key];
    }

    public function fill(   
        string $name,
        string $age,
        string $owner,
        string $breed,
        string $image,
        string $color
    ) {
        $group = $this->getGroup($breed, $image, $color);
        $this->newDog($name, $age, $owner, $group);
    }

    public function findDog(array $query)
    {
        // the query to find one dog
        // Предположим, что запрос будет поступать в виде ассоциативного массива вида ["name" => "бобик"] или ["name" => "бобик", "age" => 5]

        $neededDog = array_filter(
            $this->dogs,
            function ($e) use ($query) {
                $flag = true;
                foreach($query as $k => $value) {
                    if ($e->$k !== $value) {
                        $flag = false;
                    }
                } 
                return $flag;
            }
        );

        return $neededDog;
    }
}