<?php

defined('BASEPATH') or exit('');

class Siswa_guru extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        $this->load->library('excel');
        if($this->session->userdata('status')!='login'){
            redirect('login_guru/index');
        }
        
    }

    public function index(){
        $data['judul_halaman']='Siswa';
        $data_kelas=$this->m_point_pelanggaran->select('kelas','*','','id_kelas','desc')->result();
        foreach($data_kelas as $dk){
            $id_kelas=$dk->id_kelas;
            $data['nama_kelas']=$dk->nama_kelas;
        }
        $data['siswa']=$this->m_point_pelanggaran->select('kelas,siswa,guru','*',"kelas.id_wali_kelas=guru.id_guru and kelas.id_kelas=siswa.id_kelas and siswa.id_kelas='$id_kelas'",'siswa.id_kelas','asc')->result();
        $data['kelas']=$this->m_point_pelanggaran->select('kelas','*','','id_kelas','asc')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/siswa/siswa');
        $this->load->view('guru/footer');
    }

    public function cari_kelas(){
        $kelas=$this->input->post('kelas');
        $data['kelas']=$this->m_point_pelanggaran->select('kelas','*','','id_kelas','asc')->result();
        $data['siswa']=$this->m_point_pelanggaran->jumlah_point_kelas($kelas)->result();
        $data['ketentuan_point']=$this->m_point_pelanggaran->select('ketentuan_point','*',"",'id_ketentuan_point','desc')->result();
        $data_kelas=$this->m_point_pelanggaran->select('kelas','*',"id_kelas='$kelas'",'id_kelas','asc')->result();
        foreach($data_kelas as $dk){
            $data['nama_kelas']=$dk->nama_kelas;
        }
        $data['id_kelas']=$kelas;
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/siswa/siswa');
        $this->load->view('guru/footer');
    }

}
?>