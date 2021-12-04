<?php

class Mpublik extends CI_Model {

    function __construct(){
        parent::__construct();
       // $this->load->model('Mpagu','',TRUE);
    }

	function info(){
		return $this->db->get_where('ueu_tbl_info',array('id' => 1));
	}
	function get_tc(){
		return $this->db->get_where('peng_provinsi',array('prov_id !=' => 0));
	}
	function get_tc2($id_prov){
		return $this->db->get_where('peng_kota',array('prov_id' => $id_prov));
	}
	
	function get_seluhanid(){
		$this->db->order_by('id','DESC');
		return $this->db->get_where('tbl_list_complain',array('id_user' => $this->session->userdata('id_user')));
	}
	function get_seluhanid_status_Selesai(){
		$this->db->order_by('id','DESC');
		return $this->db->get_where('tbl_list_complain',array('id_user' => $this->session->userdata('id_user'),'status' => 4,'star' => 0));
	}
	
	function get_seluhanall(){
		$this->db->order_by('id','ASC');
		return $this->db->get('tbl_list_complain');
	}
	
	function get_seluhanall_max(){
		$this->db->select_max('id_t');
		return $this->db->get('tbl_list_complain')->row()->id_t;
	}
	
	function get_lis_keluhan($id){
		$this->db->where('id',$id);
		return $this->db->get('tbl_list_complain');
	}
	
	function get_lis_keluhan_jenis($id_uru){
		$this->db->where('id_uru',$id_uru);
		return $this->db->get('tbl_sub_urusan');
	}
	
	function get_all_kategori(){
		return $this->db->get_where('tbl_kat_keluhan',array('nama !=' => NULL));
	}
	
	function get_all_kategori_perid(){
		return $this->db->get_where('tbl_kat_keluhan',array('nama !=' => NULL,'id' => 1));
	}
	function get_all_kategori_no1(){
		return $this->db->get_where('tbl_kat_keluhan',array('nama !=' => NULL,'id !=' => 1));
	}
	
	function get_id_kategori($ig){
		return $this->db->get_where('tbl_kat_keluhan',array('id ' => $ig));
	}
	
	//get per keluhan
	function get_perkeluhan($id){
		return $this->db->get_where('tbl_kat_keluhan',array('id' => $id));
	}
	
	//get per keluhan
	
	///get nama biro
	function get_getnamauser($id){
		return $this->db->get_where('ueu_tbl_user',array('idlog' => $id));
	}
	///get nama biro
	///get nama biro
	function get_getidcom($id){
		return $this->db->get_where('tbl_list_complain',array('id' => $id));
	}
	///get nama biro
	
	
	
	
	function get_id_kat($id_k){
		return $this->db->get_where('tbl_kat_keluhan',array('id' => $id_k));
	}
	
	function simpan_com($d){
		$this->db->insert('tbl_list_complain',$d);
	}
	function simpan_edit_com($d,$id){
		$this->db->where('id',$id);
		$this->db->update('tbl_list_complain',$d);
	}
	function up_com($d,$id){
		$this->db->where('id',$id);
		$this->db->update('tbl_list_complain',$d);
	}
	function update_profil($d,$id){
		$this->db->where('idlog',$id);
		$this->db->update('ueu_tbl_user',$d);
	}
	
	function insert_com($d){
		$this->db->insert('tbl_tanggapan_komplain',$d);
	}
	

}