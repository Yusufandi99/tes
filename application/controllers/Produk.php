<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_produk');
        $this->load->helper('url');
		}
    public function index()
    {
       
        $data["data"] = $this->M_produk->tampil_data()->result_array();
        $this->load->view('produk',$data);
    }

    public function tambah_aksi(){
      
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim',
        [
            'required' => 'Nama Produk Wajib diisi!',
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim',
        [
            'required' => 'Harga Wajib diisi!',
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim',
        [
            'required' => 'Kategori wajib diisi!',
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim',
        [
            'required' => 'Status wajib diisi!',
        ]);
       
        if ($this->form_validation->run() == false) {
            $data["data"] = $this->M_produk->tampil_data()->result_array();
            $this->load->view('produk',$data);
        }else{
            $id_produk = $this->input->post('id_produk');
            $nama_produk = $this->input->post('nama_produk');
            $harga = $this->input->post('harga');
            $kategori = $this->input->post('kategori');
            $status = $this->input->post('status');
            
            $data = array(
                'id_produk' => $id_produk, 	
                'nama_produk' => $nama_produk,
                'harga' => $harga,
                'kategori' => $kategori,
                'status' => $status,
             );
            $this->M_produk->input_data($data,'data');
            if ($data) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                <p>Data Akun Anda Telah Disimpan</p>
      </div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                <p>Data belum tersimpan</p>
      </div>');
            }
            redirect('produk');
        }
      
    }
    

 function edit(){
    // print_r($status);     
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim',
    [
        'required' => 'Nama Produk Wajib diisi!',
    ]);
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim',
    [
        'required' => 'Harga Wajib diisi!',
    ]);
    $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim',
    [
        'required' => 'Kategori wajib diisi!',
    ]);
    $this->form_validation->set_rules('status', 'Status', 'required|trim',
    [
        'required' => 'Status wajib diisi!',
    ]);
   
    if ($this->form_validation->run() == false) {
        $data["data"] = $this->M_produk->tampil_data()->result_array();
        $this->load->view('produk',$data);
    }else{
        $id_produk = $this->input->post('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $kategori = $this->input->post('kategori');
        $status = $this->input->post('status');
        
        $data = array(
            'id_produk' => $id_produk, 	
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'kategori' => $kategori,
            'status' => $status,
         );
         $this->M_produk->edit_data($id_produk, $data);    
         if ($data) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            <p>Data Akun Anda Telah Diedit</p>
  </div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            <p>Data belum tersimpan</p>
  </div>');
        }
        redirect('produk');
    }
  
}      


 function hapus($id_produk){
    $where = array('id_produk' => $id_produk);
    $this->M_produk->hapus_data($where,'data');
    if ($data) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <p>Data Akun Anda Telah Dihapus</p>
</div>');
    } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <p>Data Telah terhapus</p>
</div>');
    }
    redirect('produk');
}
   
  
   }
