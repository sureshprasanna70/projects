<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Main extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
	}
	public function index()
	{
		$this->load->view('template/top');
	}
	public function contact()
	{
		echo "contact";
	}
	public function projects($year=2007,$id=NULL)
	{
		$query='SELECT * from contents where year='.$year.'';
		$ans=$this->db->query($query);
		$data['year']=$year;
		$data['project']=$ans->result();
		$this->load->view('template/top');
		$this->load->view('fullview',$data);
	}
	public function show($id=NULL)
	{
		if($id==NULL)
			redirect('projects');
		else
		{
		$query='SELECT * from contents where id='.$id.'';
		$ans=$this->db->query($query);
		$data['full']=$ans->result();
		$this->load->view('template/top');
		$this->load->view('details',$data);
		}

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
				echo "not logged in.Please log in";
				$data['login_by_username']='TRUE';
				$data['login_by_email']='TRUE';
				$data['show_captcha']=FALSE;
				$data['use_recaptcha']=FALSE;
				$data['captcha_html']=FALSE;
				$this->load->view('auth/login_form',$data);
			}
	}
	public function add_to_gal()
	{
		$this->form_validation->set_rules('project_name','Project name','required');
		$this->form_validation->set_rules('project_desc','Project Desc','required');
		$this->form_validation->set_rules('year','Project name','required');
		$this->form_validation->set_rules('tag','Tag line','required');
		$this->form_validation->set_rules('mem_1','Member 1','required');
		$this->form_validation->set_rules('kickoff','Kickoff','required');
		$this->form_validation->set_rules('phase1','phase1','required');
		$this->form_validation->set_rules('phase2','phase2','required');
		$this->form_validation->set_rules('phase3','phase3','required');
		$this->form_validation->set_rules('closing','Closing','required');
		
		if($this->form_validation->run())
		{
		$data['name']=$this->input->post('project_name');
		$data['desc']=$this->input->post('project_desc');
		$data['year']=$this->input->post('year');
		$data['mem1']=$this->input->post('mem_1');
		$data['mem2']=$this->input->post('mem_2');
		$data['mem3']=$this->input->post('mem_3');
		$data['mem4']=$this->input->post('mem_4');

		$data['kickoff']=$this->input->post('kickoff');
		$data['phase1']=$this->input->post('phase1');
		$data['phase2']=$this->input->post('phase2');
		$data['phase3']=$this->input->post('phase3');
		$data['closing']=$this->input->post('closing');
		if($this->db->insert('contents',$data))
			{
				$tostring='projects/'.$data['year'];
				echo $tostring;
				redirect($tostring);
			}
		}
		else
			{
				$this->load->view('template/top');
				$this->load->view('form');
			}
		
		/*
		$config['upload_path'] = base_url().'assets/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$data['photoname']=$this->input->post('photo');
		echo $data['project_name'];
        echo "Loading libs".$this->load->library('upload', $config);echo base_url().'assets/images/';
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
		}*/
	}
}