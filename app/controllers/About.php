<?php

class About extends Controller
{
	public $title = "About";
	public function index($name = "World", $city = "Earth")
	{
		$this->data["name"] = $name;
		$this->data["city"] = $city;
		$this->view("templates/header", $this->title);
		$this->view("about/index", $this->data);
		$this->view("templates/footer");
	}
	public function page()
	{
		$this->view("templates/header", $this->title);
		$this->view("about/page", $this->data);
		$this->view("templates/footer");
	}
}