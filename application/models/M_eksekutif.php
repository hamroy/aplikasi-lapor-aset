<?php

class M_eksekutif extends CI_Model {

    function __construct(){
        parent::__construct();
       // $this->load->model('Mpagu','',TRUE);
    }

	function rubahstatus($id){
		
		$this->db->where('id',$id);
		$this->db->update('tbl_list_complain',array('status'=>2));
	}
	
	function info(){
		return $this->db->get_where('ueu_tbl_info',array('id' => 1));
	}
	function get_all_kategori(){
		
		return $this->db->get('tbl_kat_keluhan');
	}
	function insert_kat($d){
		
		 $this->db->insert('tbl_kat_keluhan',$d);
	}
	function insert_kat_duser($d){
		
		 $this->db->insert('ueu_tbl_user',$d);
	}
	
	function get_user_perid_k($id){
		$this->db->where('id_k',$id);
		 return $this->db->get('ueu_tbl_user');
	}
	function get_idterbesar(){
		$this->db->select_max('id');
		return $this->db->get('tbl_kat_keluhan')->row()->id;
	}
	function get_seluhanunit(){
		
		return $this->db->get_where('tbl_list_complain',array('id_k' => $this->session->userdata('id_k')));
	}
	
	//get tangapan keluhan
	function get_tanggapan_keluhan($id){
		$this->db->order_by('id','ASC');
		return $this->db->get_where('tbl_tanggapan_komplain',array('id_com' => $id));
	}
	//get tangapan keluhan
	
	//get tangapan get_tanggapan_keluhan_idlast
	function get_tanggapan_keluhan_idlast($id){
		$this->db->order_by('id','DESC');
		return $this->db->get_where('tbl_tanggapan_komplain',array('id_com' => $id));
	}
	//get tangapan keluhan
	
	///get sattus 1
	function get_seluhanunit_blm_dibaca_all($id_k){
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k,'status <=' => 2));
	}
	
	///get sattus 1
	function get_seluhanunit_blm_dibaca_all_sub($id_k,$id){
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k,'id_k_sub' => $id,'status <=' => 2));
	}
	
	///get per id sattus 
	function get_seluhanunit_all_id_status($id){
		return $this->db->get_where('tbl_list_complain',array('status <=' => $id));
	}
	
	///get per id sattus 
	function get_seluhanunit_all_id_status_peridsttus($id){
		return $this->db->get_where('tbl_list_complain',array('status' => $id));
	}
	///get per id sattus 
	function get_seluhanunit_all_id_status_peridsttus_plus($id){
		return $this->db->get_where('tbl_list_complain',array('status <= ' => $id));
	}
	
	///per id komplain
	function get_seluhanunit_blm_dibaca_perid($id){
		
		$this->db->where('id',$id);
		return $this->db->get('tbl_list_complain');
	}
	///get sattus 3
	function get_seluhanunit_proses_all($id_k){
		$this->db->order_by('id','DESC');
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k,'status' => 3));
	}
	///get sattus 3
	function get_seluhanunit_proses_all_sub($id_k,$id){
		$this->db->order_by('id','DESC');
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k,'id_k_sub' => $id,'status' => 3));
	}
	///get sattus 4
	function get_seluhanunit_finis_all($id_k){
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k,'status' => 4));
	}
	///get sattus 4
	function get_seluhanunit_finis_all_sub($id_k,$id){
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k,'id_k_sub' => $id,'status' => 4));
	}
	
	///get sesuai id k
	function get_seluhanunit_finis_all_peridk($id_k){
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k));
	}
	
	///get sesuai id k sub keluhan
	function get_all_sub_kel($id_k){
		return $this->db->get_where('tbl_sub_keluhan',array('id_k' => $id_k));
	}
	
	///get sesuai id k sub keluhan
	function get_all_kategori_sub_exs($id){
		$this->db->from('tbl_kat_keluhan,tbl_sub_keluhan,tbl_sub_urusan');
		$this->db->where('tbl_kat_keluhan.id = tbl_sub_keluhan.id_k');
		$this->db->where('tbl_sub_keluhan.id = tbl_sub_urusan.id_uru');
		$this->db->where('tbl_sub_urusan.id_uru',$id);
		return $this->db->get('');
	}
	
	///get sattus now
	function get_seluhanunit_now_all($id_k){
		$h = "7";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$d = gmdate ( "d", time()+($ms));
		$b = gmdate ( "m", time()+($ms));
		$y = gmdate ( "Y", time()+($ms));
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k,'date' => $d,'bln' => $b,'thn' => $y));
	}
	
	///get sattus now
	function get_seluhanunit_now_all_sub($id_k,$sub){
		$h = "7";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$d = gmdate ( "d", time()+($ms));
		$b = gmdate ( "m", time()+($ms));
		$y = gmdate ( "Y", time()+($ms));
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k,'id_k_sub' => $sub,'date' => $d,'bln' => $b,'thn' => $y));
	}
	
	///get sattus now
	function get_seluhanunit_now_all_noid(){
		$h = "7";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$d = gmdate ( "d", time()+($ms));
		$b = gmdate ( "m", time()+($ms));
		$y = gmdate ( "Y", time()+($ms));
		return $this->db->get_where('tbl_list_complain',array('date' => $d,'bln' => $b,'thn' => $y));
	}
	
	
	

}