<?php

class Chat_model extends CI_Model {
  
  function __construct() 
  {

    parent::__construct();
  }
function get_last_item()
  {
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('Chats', 1);
    return $query->result();
  } 
   function insert_message($message)
  {
    $this->message = $message;
    $this-> time = time();  
    $this->db->insert('Chats', $this);
  }
  function get_chat_after($time)
  {
    $this->db->where('time >', $time)->order_by('time', 'DESC')->limit(10); 
    $query = $this->db->get('Chats');  
    $results = array();
      foreach ($query->result() as $row)
    {
      $results[] = array($row->message,$row->time);
    }
    return array_reverse($results);
  }
  function create_table()
  { 
    $this->load->dbforge();
    $fields = array(
                    'id' => array(
                                  'type' => 'INT',
                                  'constraint' => 5,
                                  'unsigned' => TRUE,
                                  'auto_increment' => TRUE
                              ),
                    'message' => array(
                                  'type' => 'TEXT'
                              ),
                    'time' => array(
                        'type' => 'INT'
                    )
              );
    $this->dbforge->add_field($fields);
      $this->dbforge->add_key('id', TRUE);
       $this->dbforge->create_table('Chats', TRUE);
  }
} 
 