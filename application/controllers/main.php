<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Main extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
	}
	public function index()
	{
		echo "hello";
	}
	public function contact()
	{
		echo "contact";
	}
	public function showcase()
	{
		echo "Showcase";

	}
	public function add_new()
	{
		if($this->tank_auth->is_logged_in())
			{
				$data['metas']="Adding";
				$data['title']="Add new";
				$this->load->view('template/top',$data);
				$this->load->view('form');
			}
		else
			{
				echo $this->tank_auth->is_logged_in();
				echo "not logged";
			}
	}
}