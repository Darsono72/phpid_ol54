<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cust_m extends CI_Model {
	function cust_suggest($str){
		$this->db->like('cust_name',$str);
		$this->db->or_like('cust_id',$str);
		$this->db->or_like('cust_init',$str);
		$this->db->from('tbl_customer');
		$qry=$this->db->get();

		$data=[];
		if ($qry->num_rows() > 0) {
			foreach ($qry->result() as $rows){
				$data[]=[
					'cust_id' =>$rows->cust_id,
					'cust_name' =>$rows->cust_name,
					'cust_pay_term' =>$rows->cust_pay_term,
					'label' =>  $rows->cust_name.' - '.$rows->cust_init.' - '.$rows->cust_id
				];
			}
		}
		return $data;		
	}

	function cust_init_suggest($str){
		$this->db->like('cust_init',$str);
		$this->db->from('tbl_customer');
		$qry=$this->db->get();

		$data=[];
		if ($qry->num_rows() > 0) {
			foreach ($qry->result() as $rows){
				$data[]=[
					'cust_init' =>$rows->cust_init,
					'label' =>  $rows->cust_init
				];
			}
		}
		return $data;		
	}	

	function src_cust($str){
		$this->db->like('cust_name',$str);
		$this->db->from('tbl_customer');
		return $this->db->get();		 
	} 

	function save_cust_master($cust_id,$data_1,$data_coa,$data_coa_dp){
		$this->db->where('cust_id',$cust_id);
		$this->db->from('tbl_customer');

		$qry=$this->db->get();

		if($qry->num_rows() > 0){
			$data_2=[
				// 'update_by'=>user()['name'],
				'update_time'=>date('Y-m-d H:i:s')
			];

			$data = array_merge($data_1, $data_2);
			$this->db->where('cust_id',$cust_id);
			$this->db->update('tbl_customer',$data);
		}else{
			$data_2=[
				// 'entry_by'=>user()['name']
			];

			$data = array_merge($data_1, $data_2);
			$this->db->insert('tbl_customer',$data);

			// $this->db->insert('coa_03', $data_coa);
			// $this->db->insert('coa_03', $data_coa_dp);
		}
	}	

	function get_cust_master($cust_id){
		$this->db->where('cust_id',$cust_id);
		$this->db->from('tbl_customer');  		
		$qry= $this->db->get();	

		$data=[];
		if ($qry->num_rows() > 0) {
			foreach ($qry->result() as $rows){
				$data=[
					'cust_id' 			=>$rows->cust_id,
					'cust_name' 		=>$rows->cust_name,
					'cust_brand' 		=>$rows->cust_brand,
					'branch_id' 		=>$rows->branch_id,
					'cust_cat' 			=>$rows->cust_cat,
					'cust_coa_id' 		=>$rows->cust_coa_id,
					'cust_init' 		=>$rows->cust_init,
					'cust_type'			=>$rows->cust_type,
					'cust_ph1'			=>$rows->cust_ph1,
					'cust_ph2'			=>$rows->cust_ph2,
					'cust_fax'			=>$rows->cust_fax,
					'cust_email'		=>$rows->cust_email,
					'cust_prov_id'		=>$rows->cust_prov_id,
					'cust_kab_id'		=>$rows->cust_kab_id,
					'cust_kec_id'		=>$rows->cust_kec_id,
					'cust_desa_id'		=>$rows->cust_desa_id,
					'cust_kd_pos'		=>$rows->cust_kd_pos,
					'cust_address'		=>$rows->cust_address,
					'cust_dir'			=>$rows->cust_dir,
					'cust_dir_ph'		=>$rows->cust_dir_ph,
					'cust_dir_email'	=>$rows->cust_dir_email,
					'cust_cp'			=>$rows->cust_cp,
					'cust_cp_ph'		=>$rows->cust_cp_ph,
					'cust_cp_email'		=>$rows->cust_cp_email,
					'cust_fin'			=>$rows->cust_fin,
					'cust_fin_ph'		=>$rows->cust_fin_ph,
					'cust_fin_email'	=>$rows->cust_fin_email,
					'cust_bank'			=>$rows->cust_bank,
					'cust_bank_acc'		=>$rows->cust_bank_acc,
					'cust_npwp'			=>$rows->cust_npwp,
					'cust_note'			=>$rows->cust_note,
					'cust_pay_term'			=>$rows->cust_pay_term,
					'credit_limit'		=>number_format($rows->credit_limit,0),
					'black_list'		=>$rows->black_list,
					'non_active'		=>$rows->non_active,
					'entry_by'			=>$rows->entry_by
				];
			}
		}

		return $data;	
	}

	function new_cust_id(){
		// $branch_id='1';
		$branch_id=1000;
		$this->db->select_max('cust_id');
		$this->db->from('tbl_customer');  		
		$qry= $this->db->get();	

			foreach ($qry->result() as $rows) {
				if($rows->cust_id > 0){
					$cust_id=$rows->cust_id+1;
					$cust_coa_id='10401'.substr($cust_id,-3);					
					$cust_coa_dp='10402'.substr($cust_id,-3);					
				}else{
					$cust_id=$branch_id+'1';
					$cust_coa_id='10401001';					
					$cust_coa_dp='10402001';					
				}

			}

		$data=[
			'cust_id'=>$cust_id,
			'cust_coa_id'=>$cust_coa_id
		];

		return $data;
	}

	function get_cust_img(){
		echo '';
	}

}

/* End of file Cust_m.php */
/* Location: ./application/models/Cust_m.php */