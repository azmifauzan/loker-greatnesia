<?php
class Channel extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/usermodel','usm');
        $this->load->model('admin/channelmodel','cnm');
    }
    
    public function index($off = 0)
    {
        $data['menu'] = 'Channel';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
                
        $total = $this->cnm->countAllChannel();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('admin/channel/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['channel'] = $this->cnm->getAllChannel($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        if($this->session->flashdata('error'))
            $data['error'] = $this->session->flashdata('error');
        $this->load->view('admin/channel_view',$data);
    }
    
    public function tambah()
    {
        $data['menu'] = 'Channel';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $this->load->view('admin/channeltambah_view',$data);
    }
    
    public function tambahp()
    {
        if($this->input->post("simpan"))
        {
            $nm = $this->input->post('nama');
            $ds = $this->input->post('deskripsi');
            $wb = $this->input->post('web');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
	    $this->form_validation->set_rules('web', 'Website', 'trim|required|xss_clean');
            if ($this->form_validation->run()){
                if($this->cnm->tambahdata($nm,$ds,$wb)){
                    $this->session->set_flashdata('info','Data Berhasil ditambahkan');
                }
                else{
                    $this->session->set_flashdata('error','Data Gagal ditambahkan');
                }
                redirect('admin/channel','refresh');
            }
            else{
                $data['menu'] = 'Channel';
                $username = $this->session->userdata('username');
                $data['user'] = $this->usm->getUserDetail($username);
                $data['error'] = 'Terdapat beberapa kesalahan dalam pengisian data';
                $this->load->view('admin/channeltambah_view',$data);
            }
        }
        else{
            redirect('admin/channel','refresh');
        }
    }
    
    public function edit($cid)
    {
        $data['menu'] = 'Channel';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['channel'] = $this->cnm->getChannelDetil($cid);
        $this->load->view('admin/channeledit_view',$data);
    }
    
    public function editp()
    {
        if($this->input->post("simpan"))
        {
            $nm = $this->input->post('nama');
            $ds = $this->input->post('deskripsi');
            $wb = $this->input->post('web');
            $id = $this->input->post('cid');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
	    $this->form_validation->set_rules('web', 'Website', 'trim|required|xss_clean');
            if ($this->form_validation->run()){
                if($this->cnm->editdata($nm,$ds,$wb,$id)){
                    $this->session->set_flashdata('info','Data Berhasil diubah');
                }
                else{
                    $this->session->set_flashdata('error','Data Gagal diubah');
                }
                redirect('admin/channel','refresh');
            }
            else{
                $data['menu'] = 'Channel';
                $username = $this->session->userdata('username');
                $data['user'] = $this->usm->getUserDetail($username);
                $data['channel'] = $this->cnm->getChannelDetil($id);
                $data['error'] = 'Terdapat beberapa kesalahan dalam pengisian data';
                $this->load->view('admin/channeledit_view',$data);
            }
        }
        else{
            redirect('admin/channel','refresh');
        }
    }
    
    public function delete($cid)
    {
        if($this->cnm->hapusdata($cid))
        {
            $this->session->set_flashdata('info','Data Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('error','Data Gagal dihapus');
        }
        redirect('admin/channel','refresh');
    }
}
