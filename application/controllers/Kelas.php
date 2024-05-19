<?php
 
defined('BASEPATH') or exit('');

class Kelas extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        // $this->load->library('excel');
        if($this->session->userdata('status')!='login'){
            redirect('login/index');
        }
        
    }

    public function index(){
        $data['judul_halaman']='Kelas';
        $data['kelas']=$this->m_point_pelanggaran->select('kelas','*','','kelas.id_kelas','asc')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/kelas/kelas');
        $this->load->view('guru/footer');
    }

    public function tambah(){
        $nama=$this->input->post('nama');
        $nilai=array(
            'id_kelas'=>'',
            'nama_kelas'=>$nama
        );
        $this->m_point_pelanggaran->insert('kelas',$nilai);
        $this->session->set_userdata('pesan','t');
        redirect('kelas');
    }

    public function edit(){
        $id=$this->input->post('id_kelas');
        $nama=$this->input->post('nama');
        $nilai=array(
            'nama_kelas'=>$nama
        );
        $where=array(
            'id_kelas'=>$id
        );
        $this->m_point_pelanggaran->update('kelas',$nilai,$where);
        $this->session->set_userdata('pesan','e');
        redirect('kelas');
    }

    public function hapus(){
        $id=$this->uri->segment('3');
        $where=array(
            'id_kelas'=>$id
        );
        $this->m_point_pelanggaran->delete('kelas',$where);
        $this->session->set_userdata('pesan','h');
        redirect('kelas');
    }


    function get_data_kelas_edit(){
        $id_kelas = $this->input->get('id');
        $get_kelas = $this->m_point_pelanggaran->select('kelas','*',"kelas.id_kelas='$id_kelas'",'kelas.id_kelas ','desc')->result();
        echo json_encode($get_kelas); 
        
    }

}
?>