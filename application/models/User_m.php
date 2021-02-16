<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
	function check_pass($user_name, $user_pass){
		$this->db->where('user_name', $user_name);
		$this->db->where('user_pass', md5(sha1($user_pass)));
		$qry=$this->db->get('_users');

		if($qry->num_rows() > 0){
			return $qry->result();
		}else{
			return false;
		}
	}
	

}

/* End of file User_mod.php */
/* Location: ./application/models/User_mod.php */