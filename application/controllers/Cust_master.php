<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cust_master extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cust_m');
	}

	public function index(){
		$data['title'] = 'CUSTOMER MASTER';
		$data['page'] = 'cust_master_v';
		$this->load->view('template',$data);			
	}

	function new_cust_id(){
		echo json_encode($this->cust_m->new_cust_id());
	}

	function cust_suggest(){
		echo json_encode($this->cust_m->cust_suggest($this->input->get('term')));	
	}

	function cust_init_suggest(){
		echo json_encode($this->cust_m->cust_init_suggest($this->input->get('term')));	
	}

	function get_kabupaten(){
		echo pill_kabupaten($this->input->post('prov_id'),$this->input->post('kab_id'));
	}

	function get_kecamatan(){
		echo pill_kecamatan($this->input->post('kab_id'),$this->input->post('kec_id'));
	}	

	function get_desa(){
		echo pill_desa($this->input->post('kec_id'),$this->input->post('desa_id'));
	}

	function get_cust_master(){
		echo json_encode($this->cust_m->get_cust_master($this->input->post('cust_id')));
	}

	function get_cust_img(){
		echo $this->cust_m->get_cust_img($this->input->post('cust_id'));
	}

	function cust_status(){
		$data=[
			'black_list'=>$this->input->post('status')
		];
		
		$this->db->where('cust_id', post('cust_id'));
		$this->db->update('tbl_customer', $data);
	}
	function save_cust_master(){

		$data_coa=[
			'coa_parent'	=>'10401000',
			'coa_id'		=>'10401'.substr($this->input->post('cust_id'),-3),
			'coa_desc'		=>'Piutang Usaha '.strtoupper($this->input->post('cust_name')),
			'coa_active'	=>'1'
		];

		$data_coa_dp=[
			'coa_parent'	=>'10402000',
			'coa_id'		=>'10402'.substr($this->input->post('cust_id'),-3),
			'coa_desc'		=>'Uang Muka '.strtoupper($this->input->post('cust_name')),
			'coa_active'	=>'1'
		];

		$data=[
			// 'branch_id'			=>user()['branch_id'],
			'branch_id'			=>'1',
			'cust_id' 			=>$this->input->post('cust_id'),
			'cust_name' 		=>strtoupper($this->input->post('cust_name')),
			'cust_brand' 		=>strtoupper($this->input->post('cust_brand')),
			'cust_pay_term'		=>$this->input->post('cust_pay_term'),
			'cust_coa_id' 		=>$this->input->post('cust_coa_id'),
			'cust_init' 		=>strtoupper($this->input->post('cust_init')),
			'cust_type'			=>$this->input->post('cust_type'),
			'cust_ph1'			=>$this->input->post('cust_ph1'),
			'cust_ph2'			=>$this->input->post('cust_ph2'),
			'cust_fax'			=>$this->input->post('cust_fax'),
			'cust_email'		=>$this->input->post('cust_email'),
			'cust_prov_id'		=>$this->input->post('prov_id'),
			'cust_kab_id'		=>$this->input->post('kab_id'),
			'cust_kec_id'		=>$this->input->post('kec_id'),
			'cust_desa_id'		=>$this->input->post('desa_id'),
			'cust_kd_pos'		=>$this->input->post('cust_kd_pos'),
			'cust_address'		=>$this->input->post('cust_address'),
			'cust_dir'			=>$this->input->post('cust_dir'),
			'cust_dir_ph'		=>$this->input->post('cust_dir_ph'),
			'cust_dir_email'	=>$this->input->post('cust_dir_email'),
			'cust_cp'			=>$this->input->post('cust_cp'),
			'cust_cp_ph'		=>$this->input->post('cust_cp_ph'),
			'cust_cp_email'		=>$this->input->post('cust_cp_email'),
			'cust_fin'			=>$this->input->post('cust_fin'),
			'cust_fin_ph'		=>$this->input->post('cust_fin_ph'),
			'cust_fin_email'	=>$this->input->post('cust_fin_email'),
			'cust_bank'			=>$this->input->post('cust_bank'),
			'cust_bank_acc'		=>$this->input->post('cust_bank_acc'),
			'cust_npwp'			=>$this->input->post('cust_npwp'),
			'cust_note'			=>$this->input->post('cust_note'),
			'credit_limit'		=>str_replace(',', '',  $this->input->post('credit_limit')),
			'black_list'		=>$this->input->post('black_list')
		];

		$this->cust_m->save_cust_master($this->input->post('cust_id'),$data,$data_coa,$data_coa_dp);
	}
}

/* End of file Cust_master.php */
/* Location: ./application/controllers/Cust_master.php */