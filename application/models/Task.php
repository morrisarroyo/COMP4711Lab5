<?php

class Task extends Entity
{

	public function setTask($value) {
		//alpha_numeric_spaces|max_length[64]
		if(ctype_alnum(str_replace(' ', '', $value))) && strlen($value) <= 64  {
			$this->task = $value;
			return $this;
		}
		throw new Exception('Task is Invalid. No spaces and cannot have more than 64 characters.');
	}
	
	public function setPriority($value) {
		//integer|less_than[4]
		if(is_int($value) && $value <= 4 && $value >= 1) {
			$this->priority = $value;
			return $this;
		}
		throw new Exception ('Priority is Invalid. Priority must be between 1 and 4');
	}
	
	public function setSize($value) {
		// integer|less_than[4]
		if(is_int($value) && $value <= 4 && $value >= 1) {
			$this->size = $value;
			return $this;
		}
		throw new Exception ('Priority is Invalid. Priority must be between 1 and 4');
	}
	
	public function setGroup($value) {
		//integer|less_than[5]
		if(is_int($value) && $value <= 5 && $value >= 1) {
			$this->group = $value;
			return $this;
		}
		throw new Exception ('Priority is Invalid. Priority must be between 1 and 5');
	}
	
}