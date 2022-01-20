<?php
class User extends Controller
{
	public $title = "User";
	//index
	public function index()
	{
		$data = $this->model("UserModel")->getAllUsers();
		$this->view("templates/header", $this->title);
		$this->view("user/index", $data);
		$this->view("templates/footer");
	}
	//detail
	public function detail($id)
	{
		$data = $this->model("UserModel")->getUserById($id);
		$this->view("templates/header", $this->title);
		$this->view("user/detail", $data);
		$this->view("templates/footer");
	}

	//tambah
	public function tambah()
	{
		$this->checkId($_POST["id"]);
		try {
			if ($this->model("UserModel")->addUser($_POST) > 0) {
				echo json_encode([
					"status" => "ok",
					"message" => "Data telah ditambahkan",
				]);
			} else {
				echo json_encode([
					"status" => "gagal",
					"message" => "Data gagal ditambahkan",
				]);
			}
		} catch (\PDOException $e) {
			echo $e->getMessage();
		}
	}

	//hapus
	public function hapus($id)
	{
		if ($this->model("UserModel")->deleteUser($id) > 0) {
			echo "ok";
		} else {
			echo "gagal";
		}
	}

	//edit
	public function getDataUbah()
	{
		echo json_encode($this->model("UserModel")->getUserById($_POST["id"]));
	}

	//tambah
	public function ubah()
	{
		$this->checkId($_POST["id"]);
		try {
			if ($this->model("UserModel")->editUser($_POST) > 0) {
				echo json_encode([
					"status" => "ok",
					"message" => "Data telah diubah",
				]);
			} else {
				echo json_encode([
					"status" => "gagal",
					"message" => "Data gagal diubah",
				]);
			}
		} catch (\PDOException $e) {
			echo $e->getMessage();
		}
	}

	//function to check id
	public function checkId($data)
	{
		if (!isset($data)) {
			header("Location: " . BASEURL . "/user");
			exit();
		}
	}
}