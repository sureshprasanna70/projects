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
	public function add_to_gal()
	{
		$config['upload_path'] = base_url().'assets/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$data['project_name']=$this->input->post('project_name');
		$data['project_desc']=$this->input->post('project_desc');
		$data['year']=$this->input->post('year');
		$data['mem1']=$this->input->post('mem_1');
		$data['mem2']=$this->input->post('mem_2');
		$data['mem3']=$this->input->post('mem_3');
		$data['tkick']=$this->input->post('kickoff');
		$data['tphase1']=$this->input->post('phase1');
		$data['tpahse2']=$this->input->post('phase2');
		$data['tphase3']=$this->input->post('phase3');
		$data['tclosing']=$this->input->post('closing');
		echo $data['project_name'];
        echo "Loading libs".$this->load->library('upload', $config);
		$data['photoname']=$this->input->post('photo');
		echo $data['photoname'];
		echo base_url().'assets/images/';
		if ($this->upload->do_upload($data['photoname']))
		{
			$error = array('error' => $this->upload->display_errors());
			echo "<br> Testing values".$this->upload->do_upload($data['photoname']);
			echo $error['error'];
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
            echo "<br>File path".$data['upload_data']['file_path'][];
			echo $data['upload_data'];
		}
	}
}