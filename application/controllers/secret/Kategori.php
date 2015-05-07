<?php
class Kategori extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/usermodel','usm');
        $this->load->model('admin/kategorimodel','ktm');
    }
    
    public function index($off = 0)
    {
        $data['menu'] = 'Kategori';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
                
        $total = $this->ktm->countAllKategori();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('admin/kategori/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['kategori'] = $this->ktm->getAllKategori($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        if($this->session->flashdata('error'))
            $data['error'] = $this->session->flashdata('error');
        $this->load->view('admin/kategori_view',$data);
    }
    
    public function tambah()
    {
        $data['menu'] = 'Kategori';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $this->load->view('admin/kategoritambah_view',$data);
    }
    
    public function tambahp()
    {
        if($this->input->post("simpan"))
        {
            $nm = $this->input->post('nama');
            $ds = $this->input->post('deskripsi');            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
            if ($this->form_validation->run()){
                if($this->ktm->tambahdata($nm,$ds)){
                    $this->session->set_flashdata('info','Data Berhasil ditambahkan');
                }
                else{
                    $this->session->set_flashdata('error','Data Gagal ditambahkan');
                }
                redirect('admin/kategori','refresh');
            }
            else{
                $data['menu'] = 'Kategori';
                $username = $this->session->userdata('username');
                $data['user'] = $this->usm->getUserDetail($username);
                $data['error'] = 'Terdapat beberapa kesalahan dalam pengisian data';
                $this->load->view('admin/kategoritambah_view',$data);
            }
        }
        else{
            redirect('admin/kategori','refresh');
        }
    }
    
    public function edit($kid)
    {
        $data['menu'] = 'Kategori';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['kategori'] = $this->ktm->getKategoriDetil($kid);
        $this->load->view('admin/kategoriedit_view',$data);
    }
    
    public function editp()
    {
        if($this->input->post("simpan"))
        {
            $nm = $this->input->post('nama');
            $ds = $this->input->post('deskripsi');
            $id = $this->input->post('kid');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
	    if ($this->form_validation->run()){
                if($this->ktm->editdata($nm,$ds,$id)){
                    $this->session->set_flashdata('info','Data Berhasil diubah');
                }
                else{
                    $this->session->set_flashdata('error','Data Gagal diubah');
                }
                redirect('admin/kategori','refresh');
            }
            else{
                $data['menu'] = 'Kategori';
                $username = $this->session->userdata('username');
                $data['user'] = $this->usm->getUserDetail($username);
                $data['kategori'] = $this->ktm->getKategoriDetil($id);
                $data['error'] = 'Terdapat beberapa kesalahan dalam pengisian data';
                $this->load->view('admin/kategoriedit_view',$data);
            }
        }
        else{
            redirect('admin/kategori','refresh');
        }
    }
    
    public function delete($kid)
    {
        if($this->ktm->hapusdata($kid))
        {
            $this->session->set_flashdata('info','Data Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('error','Data Gagal dihapus');
        }
        redirect('admin/kategori','refresh');
    }
}
