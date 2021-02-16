<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_dasar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index()
	{
		$data['title']='Login Dasar';
		$this->load->view('login_dasar_v',$data);
	}

	function verifylogin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_pass', 'Password', 'trim|required|xss_clean|callback_check_database');
		if(!$this->form_validation->run()){
			$data['title']='Login Dasar';
			$this->load->view('login_dasar_v',$data);
		}else{
			// $session_data = $this->session->userdata('hrd_login');
			// $data['user_name'] = $session_data['user_name'];
			// $data['session_id'] = session_id();
			// $data['user_ip']=my_ip();

			// $data=array(
			// 	'user_name'  => $data['user_name'],  
			// 	'ip_address' => $data['user_ip'],
			// 	'session_id' => $data['session_id']
			// );

			// $this->user_m->login_record($data);		
			redirect('home', 'refresh');
		}
	}

	function check_database($user_pass){
		$user_name = $this->input->post('user_name');
		$qry = $this->user_m->check_pass($user_name, $user_pass);

		if($qry){
			// $data = array();
			// foreach($qry as $row){
			// 	$data = array(
			// 		'user_name' => $row->user_name,
			// 		'user_full_name' => $row->user_full_name,
			// 		'user_level' => $row->user_level
			// 	);
			// 	$this->session->set_userdata('hrd_login', $data);
			// }

			return TRUE;
		}
		else{
			$this->form_validation->set_message('check_database', 'Username/Password Salah');
			return false;
		}
	}

	function create_pass(){
		echo md5(sha1(12345));
	}
}

/* End of file Login_dasar.php */
/* Location: ./application/controllers/Login_dasar.php */