<?php
if (! class_exists('PHPUnit_Framework_TestCase')) {
	class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class TaskTest extends PHPUnit_Framework_TestCase
  {
    protected $task;
	private $CI;
	
    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
	  $this->task = new Task;
    }
	/*
    public function testTaskValid()
    {
		$validTaskValues = array("Regular Joe 123", "asdfasdfasdfasdfsadfasdfasdfasdf123123123123123123asfasfsaf   as", '');
		foreach ($validTaskValues as $value) {
			$this->task->Task = $value;
			$this->assertEquals($this->task->getTask(), $value);
		}
    }*/
	
	public function testTaskMaxValid() {
		$value = "asdfasdfasdfasdfsadfasdfasdfasdf123123123123123123asfasfsaf   as";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
		
	public function testTaskMinValid() {
		$value = "";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	public function testTaskAlphaValid() {
		$value = "asdfghjklqwertyuiopzxcvbnm";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	public function testTaskNumericValid() {
		$value = "1234567890";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	public function testTaskZeroValid() {
		$value = 0;
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	public function testTaskWhitespaceValid() {
		$value = "  ";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	
	public function testTaskMaxInvalid() {
		$value = "asdfasdfasdfasdfsadfasdfasdfasdf123123123123123123asfasfsaf   asd";
		$this->expectException(Exception::class);
		$this->task->Task = $value;
	}
	
	public function testTaskSymbolsInvalid() {
		$value = '!@#$%^&*()_+{}:\"<>?~`-=[];\',./\\';
		$this->expectException(Exception::class);
		$this->task->Task = $value;
	}
  }
	
