<?php

/**
 * TaskListTest.
 *
 * @author Morris Arroyo
 */

if (! class_exists('PHPUnit_Framework_TestCase')) {
	class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

/**
 * Class TaskListTest
 * @covers Tasks
 */
 class TaskListTest extends PHPUnit_Framework_TestCase
{
    private $CI;
    private $tasks;

    public function setUp()
    {
        // Load CI instance normally
        $this->CI = &get_instance();
        $this->tasks = new Tasks();
    }

    /*==============*/
	/*TEST FOR TASKS*/
	/*==============*/
	/*Valid Tests on Tasks*/
	//Tasks is not empty
	public function testTasksIsNotEmpty() {
	    $this->assertEquals(empty($this->tasks), false);
    }

	//Valid count of uncompleted tasks
    public function testUncompletedTasksCountValid() {
        $total = count($this->tasks);
        // extract the uncompleted tasks
        foreach ($this->tasks->all() as $task) {
            if ($task->status != 2)
                $uncompletedTasks[] = $task;
        }
        $uncompleted = count($uncompletedTasks);
        $this->assertEquals(($uncompleted > ($total / 2)), true);
    }

    //Valid count of uncompleted tasks 2nd version
    public function testUncompletedTasksCount2Valid() {
        // extract the uncompleted tasks
        foreach ($this->tasks->all() as $task) {
            if ($task->status != 2)
                $uncompletedTasks[] = $task;
        }
        // extract the completed tasks
        foreach ($this->tasks->all() as $task) {
            if ($task->status == 2)
                $completedTasks[] = $task;
        }
        $this->assertEquals((count($uncompletedTasks) > count($completedTasks)), true);
    }
}