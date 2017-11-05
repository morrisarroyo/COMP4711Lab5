<?php
if (! class_exists('PHPUnit_Framework_TestCase')) {
	class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class TaskTest extends PHPUnit_Framework_TestCase
  {
    private $task;
	private $CI;
	
    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
	  $this->task = new Task;
    }
	
	/*=============*/
	/*TEST FOR TASK*/
	/*=============*/
	
	/*Valid Tests on Task*/
	//Max Valid
	public function testTaskMaxValid() {
		$value = "asdfasdfasdfasdfsadfasdfasdfasdf123123123123123123asfasfsaf   as";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	//Min Valid
	public function testTaskMinValid() {
		$value = "";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	//Alphabetical Valid
	public function testTaskAlphaValid() {
		$value = "asdfghjklqwertyuiopzxcvbnm";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	//Numerical Valid
	public function testTaskNumericValid() {
		$value = "1234567890";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	//Whitespace Valid
	public function testTaskWhitespaceValid() {
		$value = "  ";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	//AlphaNumeric and whitespaces Valid
	public function testTasMixValid() {
		$value = "Regular Joe 123";
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	//Null Valid. Assuming value can be nulled
	public function testTaskNullValid() {
		$value = null;
		$this->task->Task = $value;
		$this->assertEquals($this->task->getTask(), $value);
	}
	
	/*Invalid Tests on Task*/
	//Over Max
	public function testTaskMaxInvalid() {
		$value = "asdfasdfasdfasdfsadfasdfasdfasdf123123123123123123asfasfsaf   asd";
		$this->expectException(Exception::class);
		$this->task->Task = $value;
	}
	
	//Symbols
	public function testTaskIntInvalid() {
		$value = '!@#$%^&*()_+{}:\"<>?~`-=[];\',./\\';
		$this->expectException(Exception::class);
		$this->task->Task = $value;
	}
	
	//Not a String
	public function testTaskSymbolsInvalid() {
		$value = 1234567890;
		$this->expectException(Exception::class);
		$this->task->Task = $value;
	}
	
	//Zero as integer
	public function testTaskZeroNumberInvalid() {
		$value = 0;
		$this->expectException(Exception::class);
		$this->task->Task = $value;
	}
	
	
	/*=================*/
	/*TEST FOR PRIORITY*/
	/*=================*/
	
	/*Valid Tests on Priority*/
	//Max Valid
	public function testPriorityMaxValid() {
		$value = 4;
		$this->task->Priority = $value;
		$this->assertEquals($this->task->getPriority(), $value);
	}
	
	//3
	public function testPriorityMiddle3Valid() {
		$value = 3;
		$this->task->Priority = $value;
		$this->assertEquals($this->task->getPriority(), $value);
	}
	
	//2
	public function testPriorityMiddle2Valid() {
		$value = 2;
		$this->task->Priority = $value;
		$this->assertEquals($this->task->getPriority(), $value);
	}
	
	//Min Valid
	public function testPriorityMinValid() {
		$value = 1;
		$this->task->Priority = $value;
		$this->assertEquals($this->task->getPriority(), $value);
	}

	/*Invalid Tests on Task*/
	//Over Max
	public function testPriorityMaxInvalid() {
		$value = 5;
		$this->expectException(Exception::class);
		$this->task->Priority = $value;
	}
	
	//Past Minimum
	public function testPriorityMinInvalid() {
		$value = 0;
		$this->expectException(Exception::class);
		$this->task->Priority = $value;
	}
	
	//String Invalid
	public function testPriorityStringInvalid() {
		$value = 'asdfasdf';
		$this->expectException(Exception::class);
		$this->task->Priority = $value;
	}
	
	/*=============*/
	/*TEST FOR Size*/
	/*=============*/
	
	/*Valid Tests on Size*/
	//Max Valid
	public function testSizeMaxValid() {
		$value = 4;
		$this->task->Size = $value;
		$this->assertEquals($this->task->getSize(), $value);
	}
	
	//3
	public function testSizeMiddle3Valid() {
		$value = 3;
		$this->task->Size = $value;
		$this->assertEquals($this->task->getSize(), $value);
	}
	
	//2
	public function testSizeMiddle2Valid() {
		$value = 2;
		$this->task->Size = $value;
		$this->assertEquals($this->task->getSize(), $value);
	}
	
	//Min Valid
	public function testSizeMinValid() {
		$value = 1;
		$this->task->Size = $value;
		$this->assertEquals($this->task->getSize(), $value);
	}

	/*Invalid Tests on Task*/
	//Over Max
	public function testSizeMaxInvalid() {
		$value = 5;
		$this->expectException(Exception::class);
		$this->task->Size = $value;
	}
	
	//Past Minimum
	public function testSizeMinInvalid() {
		$value = 0;
		$this->expectException(Exception::class);
		$this->task->Size = $value;
	}
	
	//String Invalid
	public function testSizeStringInvalid() {
		$value = 'asdfasdf';
		$this->expectException(Exception::class);
		$this->task->Size = $value;
	}
	
	/*=============*/
	/*TEST FOR GROUP*/
	/*=============*/
	
	/*Valid Tests on Group*/
	//Max Valid
	public function testGroupMaxValid() {
		$value = 5;
		$this->task->Group = $value;
		$this->assertEquals($this->task->getGroup(), $value);
	}
	
	//4
	public function testGroupMiddle4Valid() {
		$value = 4;
		$this->task->Group = $value;
		$this->assertEquals($this->task->getGroup(), $value);
	}
	
	//3
	public function tesGroupMiddle3Valid() {
		$value = 3;
		$this->task->Size = $value;
		$this->assertEquals($this->task->getGroup(), $value);
	}
	
	//2
	public function testGroupMiddle2Valid() {
		$value = 2;
		$this->task->Group = $value;
		$this->assertEquals($this->task->getGroup(), $value);
	}
	
	//Min Valid
	public function testGroupNumericValid() {
		$value = 1;
		$this->task->Group = $value;
		$this->assertEquals($this->task->getGroup(), $value);
	}

	/*Invalid Tests on Task*/
	//Over Max
	public function testGroupMaxInvalid() {
		$value = 6;
		$this->expectException(Exception::class);
		$this->task->Group = $value;
	}
	
	//Past Minimum
	public function testGroupMinInvalid() {
		$value = 0;
		$this->expectException(Exception::class);
		$this->task->Group = $value;
	}
	
	//String Invalid
	public function testGroupStringInvalid() {
		$value = 'asdfasdf';
		$this->expectException(Exception::class);
		$this->task->Group = $value;
	}
	
  }
	
