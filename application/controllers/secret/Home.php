<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('isLoginAdmin') != TRUE)
            redirect('secret/login','refresh');
            
        $this->load->model('admin/usermodel','usm');
    }
    
    public function index()
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['menu'] = 'Home';
        $this->load->helper('text');
        $this->load->view('secret/home_view',$data);
    }
}