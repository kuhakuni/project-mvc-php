<?php
class HomeModel
{
	private $table = "daftaruserbmsbaru";
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getAllUsers()
	{
		$this->db->query("SELECT * FROM $this->table");
		return $this->db->resultSet();
	}

	public function getUser()
	{
		$this->db->query("SELECT * FROM " . $this->table);
		return $this->db->single();
	}
}