<?php


class Checker {
    private $data;
    public function set_data($d) {
      $this->data = $d;
    }
    public function get_data() {
      return $this->data;
    }

    public function __construct($d) {
        $this->set_data($d);
    }

    public function check(){
        $stack = []; //типичная задача о закрытых скобках

        foreach (str_split($this->data) as $char) {

            if ($char == '{') {
                array_push($stack, $char); //запоминаем открывабщую скобку
            } elseif ($char == '}') {
                if (count($stack) == 0) { //если закрывающая скобка раньше открывающей то сразу бан
                    return false;
                }
                array_pop($stack); //даже у скобки есть пара! а у меня нет...
            }
        }

        return count($stack) == 0; //если каждой скобки по паре, значит все ок
    }
}

if(isset($_POST['submit']))
{
    $data = $_POST['input_string'] ;
    $checker = new Checker($data); //если строка пустая то по идее тоже все окей
	echo "<h1>Ваша строка " . ($checker->check() ? "корректна" : "некорректна"). "</h1>";
}
?>