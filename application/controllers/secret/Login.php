<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->session->flashdata('error'))
        {
            $data['error'] = $this->session->flashdata('error');
            $this->load->view('secret/login_view',$data);
        }
        else
        {
            $this->load->view('secret/login_view');
        }
    }
    
    public function proses()
    {
        if($this->input->post('login'))
        {
            $this->load->model('admin/loginmodel','lgm');
            $u = $this->input->post('username');
            $p = $this->input->post('password');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error','username / password tidak dikenali');
                redirect('secret/login','refresh');
            }
            else
            {
                if($this->lgm->cekLogin($u,$p))
                {
                    $data = array(
                        'username' => $u,
                        'isLoginAdmin' => TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect('secret/home','refresh');
                }
                else
                {
                    $this->session->set_flashdata('error','username / password tidak dikenali');
                    redirect('secret/login','refresh');    
                }
            }
        }
        else
        {
            redirect('secret/login','refresh');
        }
    }
    
    public function out()
    {
        $this->session->sess_destroy();
        redirect('secret/login','refresh');
    }
}