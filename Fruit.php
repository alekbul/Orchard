<?php

// Фрукты просто контейнер хранящий название вида(name) и вес(weight)
  class Fruit {

    private $name;

    private $weight;

// конструктор принимает только название вида а вес создаёт сам
    public function __construct($name) {
      $this->name = $name;

      if ($this->name == 'apple') $this->weight = rand(150, 180);

      if ($this->name == 'pear') $this->weight = rand(130, 170);
    }

// магический метод для удобства получения и хранения информации
    public function __get($variable) {
      return $this->$variable;
    }

  }

 ?>
