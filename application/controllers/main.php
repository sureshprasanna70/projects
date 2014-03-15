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
		$this->load->helper('date');
	}
	public function index()
	{
		
		$data['metas']="projects,k!projects,kurukshetra,k!";
		$data['sendingmeta']=TRUE;
		$data['ogtitle']="HOME|K!14 Projects";
		$data['ogtype']="article";
		$data['ogurl']="http://projects.kurukshetra.org.in";
		$data['ogimg']=base_url()."assets/images/1.jpg";
		$data['ogdesc']='The gallery of kurukshetra projects';
		if($this->tank_auth->is_logged_in())
		{
			$data['username']=$this->tank_auth->get_username();
		}
		$this->load->view('template/top',$data);
		$this->load->view('frontpage.php');
		$this->load->view('template/bottom');

		
	}
	public function contact()
	{
		echo "contacts";
		echo unix_to_human(time());
	}
	public function projects($year=2007,$id=NULL)
	{
		$query='SELECT * from contents where year='.$year.'';
		$ans=$this->db->query($query);
		$data['year']=$year;
		$data['project']=$ans->result();
		$this->load->view('template/top');
		$this->load->view('fullview',$data);
		$this->load->view('template/bottom');
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
		$this->load->library('pagination');

		$config['base_url'] = base_url().'show';
		$config['total_rows'] =$ans->num_rows();
		$config['per_page'] = 5; 
		$this->pagination->initialize($config);
		$data['links'] =$this->pagination->create_links();
		$this->load->view('template/top');
		$this->load->view('details',$data);
		$this->load->view('template/bottom');

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
				$this->load->view('template/bottom');
			}
		else
			{
				echo $this->tank_auth->is_logged_in();
				$data['message']="You are not logged in.Please log in";
				$data['login_by_username']='TRUE';
				$data['login_by_email']='TRUE';
				$data['show_captcha']=FALSE;
				$data['use_recaptcha']=FALSE;
				$data['captcha_html']=FALSE;
				$this->load->view('template/top',$data);
				$this->load->view('auth/login_form',$data);
				$this->load->view('template/bottom');
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
		$data['edited_by']=$this->tank_auth->get_username();
		$data['edited_at']=unix_to_human(time());
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
				$this->load->view('template/bottom');

			}
		
		
	}
	public function change()
	{
		if($this->tank_auth->is_logged_in())
			{
				
				$data['username']=$this->tank_auth->get_username();
				$query="SELECT id,name,edited_by,edited_at from contents";
				$ans=$this->db->query($query);
				$data['linki']=$ans->result();
				$this->load->view('template/top');
				$this->load->view('step1',$data);
				$this->load->view('template/bottom');

			}
			else
			{
				redirect('auth/login');
			}
	}
	public function showeditor($id=NULL)
	{
		if($this->tank_auth->is_logged_in() && $id!=NULL)
		{
			
				$query='SELECT * from contents where id='.$id.'';
				
				$ans=$this->db->query($query);
			$data['full']=$ans->result();
			$this->load->view('template/top');
			$this->load->view('step2',$data);
			$this->load->view('template/bottom');

		}
		else
		{
			echo 'Operate using remote only';
		}
	}
	public function edit()
	{
		if($this->tank_auth->is_logged_in())
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
			$timezone = 'UP45';
		$data['name']=$this->input->post('project_name');
		$data['desc']=$this->input->post('project_desc');
		$data['tag']=$this->input->post('tag');
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
		$data['edited_by']=$this->tank_auth->get_username();
		$data['edited_at']=unix_to_human(time());
		if($this->db->update('contents',$data))
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
				$this->load->view('template/bottom');

			}
	}
	else
	{
		redirect('auth/login');
	}
}
}