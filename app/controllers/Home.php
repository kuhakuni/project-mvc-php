<?php
class Home extends Controller
{
	public $title = "Home";
	public function index()
	{
		$data = $this->model("HomeModel")->getAllUsers();
		$this->view("templates/header", $this->title);
		$this->view("home/index", $data);
		$this->view("templates/footer");
	}
}