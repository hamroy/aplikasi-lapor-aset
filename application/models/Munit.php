<?php

class Munit extends CI_Model {

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
	function get_user_id($id){
		return $this->db->get_where('ueu_tbl_user',array('idlog' => $id));
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
	function get_sub_kluhan_idk($id){
		return $this->db->get_where('tbl_sub_keluhan',array('id_k' => $id));
	}
	function get_user_aset($id){
		return $this->db->get_where('ueu_tbl_user',array('id_k' => $id,'idlog !=' => 3));
	}
	///get sattus 1
	function get_seluhanunit_blm_dibaca(){
		return $this->db->get_where('tbl_list_complain',array('id_k' => $this->session->userdata('id_k'),'status <=' => 2));
	}
	
	///per id komplain
	function get_seluhanunit_blm_dibaca_perid($id){
		
		$this->db->where('id',$id);
		return $this->db->get('tbl_list_complain');
	}
	///get sattus 3
	function get_seluhanunit_proses(){
		$this->db->order_by('id','DESC');
		return $this->db->get_where('tbl_list_complain',array('id_k' => $this->session->userdata('id_k'),'status' => 3));
	}
	///get sattus 4
	function get_seluhanunit_finis(){
		return $this->db->get_where('tbl_list_complain',array('id_k' => $this->session->userdata('id_k'),'status' => 4));
	}
	
	///get sattus now
	function get_seluhanunit_now(){
		$h = "7";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$d = gmdate ( "d", time()+($ms));
		$b = gmdate ( "m", time()+($ms));
		$y = gmdate ( "Y", time()+($ms));
		return $this->db->get_where('tbl_list_complain',array('id_k' => $this->session->userdata('id_k'),'date' => $d,'bln' => $b,'thn' => $y));
	}
	
	function insert_sub_kategori($d){
		$this->db->insert('tbl_sub_keluhan',$d);
	}
	function insert_sub_urusan($d){
		$this->db->insert('tbl_sub_urusan',$d);
	}
	
	function update_sub_kategori($id,$d){
		$this->db->where('id',$id);
		$this->db->update('tbl_sub_keluhan',$d);
	}
	function update_sub_urusan($id,$d){
		$this->db->where('id',$id);
		$this->db->update('tbl_sub_urusan',$d);
	}
	function del_sub_kategori($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_sub_keluhan');
	}
	function del_sub_urusan($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_sub_urusan');
	}
	
	function get_all_kategori_sub($id){
		$this->db->from('tbl_kat_keluhan,tbl_sub_keluhan,tbl_sub_urusan');
		$this->db->where('tbl_kat_keluhan.id = tbl_sub_keluhan.id_k');
		$this->db->where('tbl_sub_keluhan.id = tbl_sub_urusan.id_uru');
		$this->db->where('tbl_sub_urusan.id',$id);
		return $this->db->get('');
	}
	function get_all_kategori_sub_urusan($id){
		$this->db->from('tbl_kat_keluhan,tbl_sub_keluhan,tbl_sub_urusan');
		$this->db->where('tbl_kat_keluhan.id = tbl_sub_keluhan.id_k');
		$this->db->where('tbl_sub_keluhan.id = tbl_sub_urusan.id_uru');
		$this->db->where('tbl_sub_urusan.id_uru',$id);
		return $this->db->get('');
	}
	
	
	

}