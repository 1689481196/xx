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
            redirect('Article/listing');
        }
    }

    public function edit($id){
        $this->load->model('article_model');
        $data['article_edit']=$this->article_model->edits($id);
        $this->load->view("Article/edit",$data);
    }
        //数据修改
    public function edit_update()
    {
        $id=$this->input->post('id');
        $title = $this->input->post('title');
        $author = $this->input->post('author');
        $content = $this->input->post('content');
        $time = $this->input->post('time');
        $data=array(
            'title' => $title,
            'author' => $author,
            'content' => $content,
            'time' => $time
        );
        $this->load->model('article_model');
        $datas['article_edit']= $this->article_model->update($id,$data);
        if ($datas) {
            redirect('Article/listing');
        }
    }
        //数据删除
      public function del(){
        $id=$_POST['id'];
        $this->load->model('article_model');
        $re = $this->article_model->deltele($id);
        if ($re) {
        //如果删除成功返回状态1 失败返回0
            echo json_encode(array('data'=>1));
        }else{
            echo json_encode(array('data'=>0));
        }
    }

        //列表页
    public function listing(){
        $this->load->model('article_model');
        //接收page
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        //每页显示10条
        $limit = 10;
        // 偏移量
        $offset = ($page - 1) * $limit;
        // var_dump($offset);exit;
        //查询出数组
        $data = $this->article_model->all();
        //count()函数用来返回数组中的目录;总条数
        $all_data = count($data);
        //引入分页类
        $this->load->library('pagination');
        //总页数 ceil()函数向上取整;
        $total_rows = ceil($all_data);
        //配置分页信息
        $config['base_url'] = site_url('Article/listing');
        //配置总条数
        $config['total_rows']=$all_data;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['use_page_numbers'] = TRUE;
        //每页显示条数
        $config['per_page'] = $limit ;
        //自定义分页连接
        $config['first_link'] = '首页';
        $config['last_link'] = '尾页';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        //初始化分类页
        $this->pagination->initialize($config);
        //可以输出查看结果是一串html字符串  生成的就是首页尾页上一页下一页的html文字在页面循环出来pageinfo数据
        $data['pageinfo'] = $this->pagination->create_links();
        $data['goodstypes']=$this->article_model->list_goodstype($limit, $offset);
        $this->load->view('Article/listing',$data);
    }
        //查看详情
    public function list_detail(){
        //接收id值
       $id=$this->uri->segment(3,0);
       $this->load->model('article_model');
       $data['news_list']=$this->article_model->detail($id);
       $this->load->view('Article/list',$data);
    }



}
