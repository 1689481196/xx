<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller{

    public function __construct() {
        parent::__construct();
    }

    //添加显示页面
    public function add(){

        $this->load->view("Article/add.php");
    }
    //数据提交的方法
    public function article_add(){

        $this->load->model('article_model');
        $title=$this->input->post('title');
        $author=$this->input->post('author');
        $content=$this->input->post('content');
        $time=$this->input->post('time');
        $data=array(
            'title'=>$title,
            'author'=>$author,
            'content'=>$content,
            'time'=>$time
            );
        $res=$this->article_model->add($data);
        if($res){
            redirect('Article/list');
        }
    }
    //新闻列表页
    public function list(){
        $this->load->model('article_model');
        $data=$this->article_model->get();
        $news_list=array(
            'news_list'=>$data,
            );
        $this->load->view("Article/list", $news_list);

    }
    public function edit(){
        $this->load->helper('url');
        $this->load->model('article_model');
        $data=$this->article_model->edit();
        // var_dump($data);
        $this->load->view("Article/edit.php");
    }

}
