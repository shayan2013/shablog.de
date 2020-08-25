<?php
class JsonUsers implements Countable, JsonSerializable {
	protected $users = [];
	
	public function add($value) {
		$this->users[] = $value;
	}
	
	public function set($key, $value) {
		$this->users[$key] = $value;
	}
	
	public function count() {
		return count($this->users);
	}
	
	public function jsonSerialize() {
		return json_encode($this->users);
	}
}


?>