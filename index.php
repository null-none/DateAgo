<?php
/**
 * Класс для вывода даты, который показывает как давно был создан объект.
 */
class DateAgo {

	// минуты
	var $minute;
	// часы
	var $hour;
	// дни
	var $day;
	// месяц
	var $month;
	// год
	var $year;
	// время сейчас
	var $now;
	// время, которое будет обрабатываться
	var $current;
	// результат для секунд
	var $result;

	function __construct() {
		// иницилизация переменных
		$this->minute = 60;
		$this->hour = $this->minute * 60;
		$this->day = $this->hour * 24;
		$this->month = $this->day * 30;
		$this->year = $this->month * 12;
		$this->now = time();
	}

	/**
	 * Вывод даты
	 */
	function agoPrint() {
		// разница между датами
		$this->result = $this->now - $this->current;

		// автоопределение какой формат выводить
		if ($this->result < $this->minute) {
			$this->agoSecond();
		} elseif ($this->result < $this->day) {
			$this->agoMinute();
		} elseif ($this->result < $this->month) {
			$this->agoDay();
		} elseif ($this->result < $this->year) {
			$this->agoMonth();
		} else {
			$this->agoYear();
		}
	}

	/**
	 * Вывод секунд
	 */
	function agoSecond() {
		$title = array('секунду','секунды','секунд');
		$this->printString($this->result,$this->plural($this->result,$title));
	}

	/**
	 * Вывод минут
	 */
	function agoMinute() {
		$title = array('минуту','минуты','минут');
		$this->printString($this->result/$this->minute,$this->plural($this->result/$this->minute,$title));	
	}

	/**
	 * Вывод дней
	 */
	function agoDay() {
		$title = array('день','дней','дней');
		$this->printString($this->result/$this->day,$this->plural($this->result/$this->day,$title));	
	}

	/**
	 * Вывод месяцев
	 */
	function agoMonth() {
		$title = array('месяц','месяцев','месяцев');
		$this->printString($this->result/$this->month,$this->plural($this->result/$this->month,$title));			
	}

	/**
	 * Вывод лет
	 */
	function agoYear() {
		$title = array('год','года','год');
		$this->printString($this->result/$this->year,$this->plural($this->result/$this->year,$title));			
	}

	/**
	 * Функция для формирования вида строки
	 */
	function printString($n,$title) {
		echo floor($n).' '.$title.' назад';
	}

	/**
	 * Автоопределение множественное число или нет
	 */
	function plural($n, $title) {
		$n = floor($n);
	    $n = abs($n) % 100;
	    $n1 = $n % 10;
	    if ($n > 10 && $n < 20) return $title[2];
	    if ($n1 > 1 && $n1 < 5) return $title[1];
	    if ($n1 == 1) return $title[0];
	    return $title[2];		
	}

}


// пример
$date = new DateAgo();
$date->current= strtotime("31.10.2011");
$date->agoPrint();
?>