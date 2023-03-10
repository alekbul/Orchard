<?php

  class Collector {

// Свойство в котором хранятся деревья
    private $forest;

// Конструктор разбивает переданные данные на два элемента название деревьев и их количество
// если данные разбить не получается выводится сообщение об ошибке и скрипт завершается
    public function __construct(array $forest = ['apple/10', 'pear/15']) {

// все действия в конструкторе завёрнуты в try
      try {

// Сажаем деревья
        foreach ($forest as $woods) {

// Разбиваем строки на название деревьев и количествр
            $wood = explode('/', $woods);

// Проверка на валидность данных
// если данные не валидны создается исключение которое сдесь и перехватывается
            if (!($wood[0] == 'apple' || $wood[0] == 'pear') && !is_int($wood[1])) {
              throw new Exception("не удалось получить данные из аргументов");
            }

// обьекты деревьев и фруктов больше похожи на контейнеры
// они примут любые данные и сложной логики в них нет
// поэтому и проверок для них нет
            for ($i = 0; $i < $wood[1]; $i++) {
              $this->forest[$wood[0]][] = new Wood($wood[0], $i.rand(0,100)); // вторым аргументом должен быть индивидуальный номер дерева и я непонятно зачем добавляю случайное число
            }

          }

      } catch (Exception $e) {

        echo 'Неудалось полуть данные из аргументов';

        exit();

      }

    }

// Меттод для вывода количества фруктов и весса
    public function fruits() {

// Перечисляем деревья всех видов
// name вид деревьев, woods массив с деревьями
      foreach ($this->forest as $name => $woods) {

// массив для фруктов объявляется заранее
// это нужно для последующе логики
// фрукты рассортированны по видам
        $fruits[$name] = [];

// Собираем фрукты с деревьев
// деревья возвращяют массив с фруктами и эти масивы объеденяюится в один массив
        for ($i = 0; $i < count($woods); $i++) {

          $fruits[$name] = array_merge($fruits[$name], $woods[$i]->fruits());

        }

// определяем вес фруктов
// логика похожая но вместо объединения массивов складываются вес фруктов
        $weight = 0;

        for ($i = 0; $i < count($fruits[$name]); $i++) {

          $weight = $weight + $fruits[$name][$i]->weight;

        }

        $fruits[$name] = ['weight' => $weight, 'count' => count($fruits[$name])];

      }

// вывод строки с информацией                                                                     ____
// проверки name нужны чтобы перевеси названия на руский                                    __  / . . \   __
// можно было бы хранить такие свойста отдельно но мне показалось что это лишнее усложнение   \ \ ~   / /
      foreach ($fruits as $name => $data) {

        if ($name == 'apple') {

          echo "Количество яблок равно $data[count] общий вес $data[weight]\n";

        }
        if ($name == 'pear') {

          echo "Количество груш равно $data[count] общий вес $data[weight]\n";

        }

      }

    }

  }

 ?>
