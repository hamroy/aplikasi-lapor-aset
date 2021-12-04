<?php

class Minfo extends CI_Model {

    function __construct(){
        parent::__construct();
       // $this->load->model('Mpagu','',TRUE);
    }

	function info(){
		return $this->db->get_where('ueu_tbl_info',array('id' => 1));
	}
	function get_progres_keluhanall(){
		return $this->db->get_where('tbl_proses_keluhan',array('kode !=' => 0));
	}
	function get_get_subkat($idk){
		return $this->db->get_where('tbl_sub_keluhan',array('id !=' => 0,'id_k' => $idk));
	}
	
	function get_cari_idtrafik_idk($id,$id_k){
		return $this->db->get_where('tbl_list_complain',array('id_tiket' => $id,'id_k' => $id_k));
	}
	function get_progres_keluhan_perid($id){
		return $this->db->get_where('tbl_proses_keluhan',array('kode' => $id));
	}
	function get_cari_idtrafik($id){
		return $this->db->get_where('tbl_list_complain',array('id_tiket' => $id));
	}
	function get_cari_judul($cari){
		//$this->db->like('judul',$cari);
		$this->db->where("judul LIKE '".$cari."' OR judul LIKE '% ".$cari." %' OR judul LIKE '% ".$cari."' OR judul LIKE '".$cari." %'");
		return $this->db->get('tbl_list_complain');
	}
	function get_cari_judul_idk($cari,$id_k){
		//$this->db->like('judul',$cari);
		$this->db->where("judul LIKE '".$cari."' OR judul LIKE '% ".$cari." %' OR judul LIKE '% ".$cari."' OR judul LIKE '".$cari." %'");
		return $this->db->get_where('tbl_list_complain',array('id_k' => $id_k));
	}
	

}