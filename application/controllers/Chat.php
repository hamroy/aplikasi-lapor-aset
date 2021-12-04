<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {
  
  public function index() {       
    $this->load->view('tc');
  }
  
  public function get_chats() {
    /* application/config/database.php */
    $dbconnect = $this->load->database();
    
    /* memanggil model
    /application/models/file.php */
    $this->load->model('Chat_model');
    
 
    $this->Chat_model->create_table();
    
    echo json_encode($this->Chat_model->get_chat_after($_REQUEST["time"]));
  }
  
  public function insert_chat() {

    /* application/config/database.php */
    $dbconnect = $this->load->database();
    

    $this->load->model('Chat_model');
    

    $this->Chat_model->create_table();

    $this->Chat_model->insert_message($_REQUEST["message"]); 
  }
  
  public function time() {
    echo "[{\"time\":" +  time() + "}]";
  }
  
}
