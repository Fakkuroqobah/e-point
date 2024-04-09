<?php
defined('BASEPATH') or exit('');

class Login extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        // if($this->session->userdata('status')!='login'){
        //     redirect('login/index');
        // }
        
    }

    public function index(){
        $data['judul_halaman']="Utama";
        $this->load->view('guru/login/login');
    }

    public function verification(){
        $where=array(
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
            );
        $cek=$this->m_point_pelanggaran->select('guru','*',$where,'id_guru','asc')->num_rows();
        if($cek > 0){
            $akun=$this->m_point_pelanggaran->select('guru','*',$where,'id_guru','asc')->result();
            foreach($akun as $a){
                $id_guru=$a->id_guru;
                $nama=$a->nama_guru;
                $user=$a->username;
                $pass=$a->password;
            }
            $data_session = array(
                            'id_akun'=>$id_guru,
                            'nama_akun'=>$nama,
                            'username'=>$user,
                            'password'=>$pass,
                            'status'=>"login"
                            );
            $this->session->set_userdata($data_session);
            $this->session->set_userdata('pesan_aktifitas','b');
            redirect('aktifitas_guru/pilihan');
        }else{
            $this->session->set_userdata('pesan_aktifitas','t');
            redirect('aktifitas_guru/pilihan');
        }
    }

    public function logout(){
        $this->session->userdata('username')==' ';
        $this->session->userdata('password')==' ';
        $this->session->userdata('status')==' ';
        $this->session->sess_destroy();
        redirect('login/index');
    }
    
}