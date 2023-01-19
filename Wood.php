<?php

// Дерево просто контейнер хранящий название вида(name) и личный номер(regName)
  class Wood {

    private $name;

    private $regNam;

// конструктоп просто присвайвает аргументы свойствам
    public function __construct($name, $regNam) {

      $this->name = $name;

      $this->regNam = $regNam;

    }

// Этот метод возвращает массив с фруктами
// для определёного вида своё допустимое количество
    public function fruits() {
      $fruits = [];

      if ($this->name == 'apple') {

        for ($i = 0; $i < rand(40, 50); $i++) {

          $fruits[] = new Fruit($this->name);

        }

      }

      if ($this->name == 'pear') {

        for ($i = 0; $i < rand(0, 20); $i++) {

          $fruits[] = new Fruit($this->name);

        }

      }

      return $fruits;

    }

  }

 ?>
