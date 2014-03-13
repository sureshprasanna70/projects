<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Main extends CI_Controller
{
	public function __constructor()
	{
		$this->load->database();
	}
	public function index()
	{
		echo "hello";
	}
	public function contact()
	{
		echo "contact";
	}
	public function add_new()
	{
		echo "adding new";
	}
}