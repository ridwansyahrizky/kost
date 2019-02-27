<?php 


/**
 * 
 */
class Utilitas_model
{
	private $table = 'ms_user';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
}