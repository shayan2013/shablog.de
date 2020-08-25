<?php
class LoggedIn {
	protected $_isLoggedIn;
	
	public function logIn() {
		$this->_isLoggedIn = true;
	}
	
	public function logOut() {
		$this->_isLoggedIn = false;
	}
	
	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}
}

?>