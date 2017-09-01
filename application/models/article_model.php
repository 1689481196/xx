<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class article_model extends CI_Model{
    public function add($data){

    return $this->db->insert('article',$data);

    }

    public function get(){

    return $this->db->get("article")->result_array();

    }

    public function edit(){
    $id= $this->uri->segment(4);
    return $this->db->where(array('id'=>$id))->get()->result_array();

    }
}
