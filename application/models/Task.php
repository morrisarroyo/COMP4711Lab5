<?php

class Task extends Entity
{

	public function setTask($value) {
		//alpha_numeric_spaces|max_length[64]
		if(ctype_alnum(str_replace(' ', '', $value))) && strlen($value) <= 64  {
			$this->task = $value;
		}
	}
	
	public function setPriority($value) {
		//integer|less_than[4]
		if(is_int($value) && $value <= 4 && $value >= 1) {
			$this->priority = $value;
		}
	}
	
	public function setSize($value) {
		// integer|less_than[4]
		if(is_int($value) && $value <= 4 && $value >= 1) {
			$this->size = $value;
		}
	}
	
	public function setGroup($value) {
		//integer|less_than[5]
		if(is_int($value) && $value <= 5 && $value >= 1) {
			$this->group = $value;
		}
	}
	
}