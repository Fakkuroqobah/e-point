<?php
 
defined('BASEPATH') or exit('');

class Aktifitas_guru extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        if($this->session->userdata('status')!='login'){
            redirect('login/index');
        }
        
    }

    public function pilihan(){
        $data['judul_halaman']='Aktifitas Guru';
        $id_guru=$this->session->userdata('id_akun');
        $where="pelanggaran_siswa.id_siswa=siswa.id_siswa and pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran and pelanggaran_siswa.id_pelapor='$id_guru'";
        $data['aktifitas']=$this->m_point_pelanggaran->select('pelanggaran_siswa,siswa,pelanggaran','*',$where,'pelanggaran_siswa.id_pelanggaran_siswa','desc')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/aktifitas/aktifitas');
        $this->load->view('guru/footer');
    }

    public function keseluruhan(){
        $data['judul_halaman']='Aktifitas Guru';
        $id_guru=$this->session->userdata('id_akun');
        $where="guru.id_guru=pelanggaran_siswa.id_pelapor and pelanggaran_siswa.id_siswa=siswa.id_siswa and pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran";
        $data['aktifitas']=$this->m_point_pelanggaran->select('pelanggaran_siswa,siswa,pelanggaran,guru','*',$where,'pelanggaran_siswa.id_pelanggaran_siswa','desc')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/aktifitas/aktifitas_keseluruhan');
        $this->load->view('guru/footer');
    }
}
?>