<?php

/**
 * Main controller class
 */
class Controller{
	
	protected $db;
	protected $fm;
	
	function __construct(){
		$this->db  = new Database();
  		$this->fm  = new Format();
	}

}