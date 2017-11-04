<?php

require_once APPPATH . "core/Entity.php";

class Task extends Entity
{

	private $task;
	private $priority;
	private $size;
	private $group;
	
	public function setTask($value) {
		//alpha_numeric_spaces|max_length[64]
		if(isset($value)) {
			if(is_string($value) || empty(str_replace(' ', '', $value)) || (ctype_alnum(str_replace(' ', '', $value)) && strlen($value) <= 64)) {
				$this->task = $value;
			} else {
				throw new Exception("Task $value is Invalid. No symbols and cannot have more than 64 characters.");
			}
		}
	}
	
	public function setPriority($value) {
		//integer|less_than[4]
		if(is_int($value) && $value <= 4 && $value >= 1) {
			$this->priority = $value;
		} else {
			throw new Exception ('Priority is Invalid. Priority must be between 1 and 4');
		}
	}
	
	public function setSize($value) {
		// integer|less_than[4]
		if(is_int($value) && $value <= 4 && $value >= 1) {
			$this->size = $value;
		} else {
			throw new Exception ('Priority is Invalid. Priority must be between 1 and 4');
		}
	}
	
	public function setGroup($value) {
		//integer|less_than[5]
		if(is_int($value) && $value <= 5 && $value >= 1) {
			$this->group = $value;
		} else {
			throw new Exception ('Priority is Invalid. Priority must be between 1 and 5');
		}
	}
	
	public function getTask() {
		return $this->task;
	}
	
	
}