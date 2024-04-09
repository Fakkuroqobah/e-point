<?php
 
defined('BASEPATH') or exit('');

class Laporan_guru extends CI_Controller{


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
        $data['judul_halaman']='Laporan';
        $data['ketentuan']=$this->m_point_pelanggaran->select('ketentuan_point','*','','id_ketentuan_point','desc')->result();
        $data['siswa']=$this->m_point_pelanggaran->join_siswa_pelanggaran_tertinggi('10')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/laporan/laporan');
        $this->load->view('guru/footer');
    }

    public function siswa(){
        $data['judul_halaman']='Laporan';
        $data['ketentuan']=$this->m_point_pelanggaran->select('ketentuan_point','*','','id_ketentuan_point','desc')->result();
        $data['kelas']=$this->m_point_pelanggaran->select('kelas','*','','id_kelas','asc')->result();
        $data['siswa']=$this->m_point_pelanggaran->join_siswa_pelanggaran_tertinggi('10')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/laporan/laporan_siswa');
        $this->load->view('guru/footer');
    }


    public function cari_kelas(){
        $kelas=$this->input->post('kelas');
        $data['ketentuan']=$this->m_point_pelanggaran->select('ketentuan_point','*','','id_ketentuan_point','desc')->result();
        $data['kelas']=$this->m_point_pelanggaran->select('kelas','*','','id_kelas','asc')->result();
        $data['siswa']=$this->m_point_pelanggaran->join_siswa_pelanggaran_kelas($kelas)->result();
        $data_kelas=$this->m_point_pelanggaran->select('kelas','*',"id_kelas='$kelas'",'id_kelas','asc')->result();
        foreach($data_kelas as $dk){
            $data['nama_kelas']=$dk->nama_kelas;
        }
        $data['id_kelas']=$kelas;
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/laporan/laporan_siswa');
        $this->load->view('guru/footer');
    }

    public function pelanggaran(){
        $pelanggaran=$_GET['p'];
        $tanggal_awal=$_GET['taw'];
        $tanggal_akhir=$_GET['tak'];
        $tanggal=array();
        $jumlah=array();
        if($pelanggaran=='semua'){
            $where="kelas.id_kelas=pelanggaran_siswa.id_kelas and siswa.id_siswa=pelanggaran_siswa.id_siswa and pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran and date(pelanggaran_siswa.tanggal_pelanggaran) between '$tanggal_awal' and '$tanggal_akhir'";
            $data['pelanggaran_detail']=$this->m_point_pelanggaran->select('pelanggaran_siswa,siswa,kelas,pelanggaran','*',$where,'pelanggaran_siswa.id_pelanggaran_siswa','desc')->result();
             
            $data['nama_pelanggaran']="semua jenis pelanggaran";
        }else{
            
            $where="pelanggaran_siswa.id_pelanggaran='$pelanggaran' and kelas.id_kelas=pelanggaran_siswa.id_kelas and siswa.id_siswa=pelanggaran_siswa.id_siswa and pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran and date(pelanggaran_siswa.tanggal_pelanggaran) between '$tanggal_awal' and '$tanggal_akhir'";
            $data['pelanggaran_detail']=$this->m_point_pelanggaran->select('pelanggaran_siswa,siswa,kelas,pelanggaran','*',$where,'pelanggaran_siswa.id_pelanggaran_siswa','desc')->result();
                
            $where_pelanggaran="id_pelanggaran='$pelanggaran'";
            $dp=$this->m_point_pelanggaran->select('pelanggaran','*',$where_pelanggaran,'id_pelanggaran','desc')->result();
            foreach($dp as $d){
                $nama_pelanggaran=$d->nama_pelanggaran;
            }
            $data['nama_pelanggaran']=$nama_pelanggaran;
        }

        
        if($tanggal_awal==$tanggal_akhir){
            $data['keterangan_tanggal']= date('d-m-Y',strtotime($tanggal_awal));
        }elseif($tanggal_awal!=$tanggal_akhir){
            $data['keterangan_tanggal']= date('d-m-Y',strtotime($tanggal_awal))." sampai dengan ".date('d-m-Y',strtotime($tanggal_akhir));
            
        }
        $data['guru']=$this->m_point_pelanggaran->select('guru','*',"",'id_guru','desc')->result();
        $data['pelanggaran']=$this->m_point_pelanggaran->select('pelanggaran,jenis_pelanggaran','*','jenis_pelanggaran.id_jenis_pelanggaran=pelanggaran.id_jenis_pelanggaran','id_pelanggaran','asc')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/laporan/laporan_rekaman_pelanggaran');
        $this->load->view('guru/footer');
    }

}
?>