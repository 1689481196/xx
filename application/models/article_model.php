<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class article_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
        //数据添加的s
    public function add($data){
        return $this->db->insert('article',$data);
    }
        //数据查询
    public function get(){
        return $this->db->get("article")->result_array();
    }
        //数据回显
    public function edits($id){
        $data=$this->db->where(array('id'=>$id))->get('article')->result_array();
        return $data;

    }
        //数据修改
    public function update($id,$data){
        return $this->db->update('article',$data,array('id'=>$id));
        // var_dump($data);exit;
    }
        //删除数据
    public function deltele($id){
        return $this->db->delete('article', array('id' => $id));
    }

    public function all(){
        //将查询出来的数据根据时间降序排序
        return $this->db->order_by("time", "desc")->get('article')->result_array() ;
    }

    public function detail($id){
        return $this->db->where(array('id'=>$id))->get('article')->result_array();
    }
    public function list_goodstype($limit, $offset){
        $this->db->select('*');
        $this->db->from('article');
        $this->db->limit($limit, $offset);
        $this->db->order_by('time','desc');
        $query = $this->db->get();
        return $query->result_array();
    }


}
