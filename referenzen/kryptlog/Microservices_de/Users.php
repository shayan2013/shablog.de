<?php

class Users {
	protected $_uname;
	protected $_email;
	protected $_kennwort;
	protected $_webseite;
	protected $_kommentar;
	protected $_geschlecht;
	protected $db;
	
	public function __construct() {
		echo "Construct";
	}

    /**
     * Users constructor.
     * @param Database $db
     */
    public function __construct(Database $db) {
		$this->db = $db;
	}
	
	public function __destruct() {
		echo "Destruct";
	}
	
	public function __get($str) {
		return $this->$str;
	}
	
	public class __set($value, $str) {
		$this->$str = value;
	}
	
	public function create(array $data) {
		$db = Database::getInstance();
		$db->db->query("INSERT INTO 'users' ...");
	}
}


?>