<?php
class UserModel
{
	private $table = "mhs";
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getAllUsers()
	{
		$this->db->query("SELECT * FROM " . $this->table . " LIMIT 10");
		return $this->db->resultSet();
	}

	public function getUserById($id)
	{
		$this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
		$this->db->bind("id", $id);
		return $this->db->single();
	}

	public function addUser($data)
	{
		$query =
			"INSERT INTO " . $this->table . " VALUES ('', :nama, :nim, :prodi)";
		$this->db->query($query);
		$this->db->bind("nama", $data["nama"]);
		$this->db->bind("nim", $data["nim"]);
		$this->db->bind("prodi", $data["prodi"]);

		$this->db->execute();
		return $this->db->rowCount();
	}

	//delete user
	public function deleteUser($id)
	{
		$query = "DELETE FROM " . $this->table . " WHERE id = :id";
		$this->db->query($query);
		$this->db->bind("id", $id);

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function editUser($data)
	{
		$query =
			"UPDATE " .
			$this->table .
			" SET nama = :nama, nim = :nim, prodi = :prodi WHERE id = :id";
		$this->db->query($query);
		$this->db->bind("id", $data["id"]);
		$this->db->bind("nama", $data["nama"]);
		$this->db->bind("nim", $data["nim"]);
		$this->db->bind("prodi", $data["prodi"]);

		$this->db->execute();
		return $this->db->rowCount();
	}
}