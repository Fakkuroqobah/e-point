<?php
 
defined('BASEPATH') or exit('');

class Laporan_guru extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        if($this->session->userdata('status')!='login'){
            redirect('login/index');
        }
        
    }

    public function index(){
        $data['judul_halaman']='Laporan';
        $data['ketentuan'] = [
            [
                'id_ketentuan_point' => 1,
                'nama_ketentuan' => 'Bimbingan Wali Kelas',
                'konsekuensi' => 'Bimbingan Wali Kelas',
                'point_pelanggaran_rendah' => 20,
                'point_pelanggaran_tinggi' => 20,
            ],
            [
                'id_ketentuan_point' => 2,
                'nama_ketentuan' => 'Penggilan Orang Tua ke 1, Tanda Tangan Surat Skorsing 1 hari dan Membersihkan Kelas',
                'konsekuensi' => 'Penggilan Orang Tua ke 1, Tanda Tangan Surat Skorsing 1 hari dan Membersihkan Kelas',
                'point_pelanggaran_rendah' => 30,
                'point_pelanggaran_tinggi' => 30,
            ],
            [
                'id_ketentuan_point' => 3,
                'nama_ketentuan' => 'Penanganan Wali Kelas dan Guru BK diberikan hukuman Membersihkan Kelas',
                'konsekuensi' => 'Penanganan Wali Kelas dan Guru BK diberikan hukuman Membersihkan Kelas',
                'point_pelanggaran_rendah' => 40,
                'point_pelanggaran_tinggi' => 40,
            ],
            [
                'id_ketentuan_point' => 4,
                'nama_ketentuan' => 'Panggilan Orang Tua ke 2, Tanda Tangan Surat Skorsing 3 hari dan Membersihkan Lingkungan Sekolah',
                'konsekuensi' => 'Panggilan Orang Tua ke 2, Tanda Tangan Surat Skorsing 3 hari dan Membersihkan Lingkungan Sekolah',
                'point_pelanggaran_rendah' => 50,
                'point_pelanggaran_tinggi' => 50,
            ],
            [
                'id_ketentuan_point' => 5,
                'nama_ketentuan' => 'Panggilan Orang Tua ke 3 dan Tanda Tangan Surat Skorsing 1 minggu',
                'konsekuensi' => 'Panggilan Orang Tua ke 3 dan Tanda Tangan Surat Skorsing 1 minggu',
                'point_pelanggaran_rendah' => 80,
                'point_pelanggaran_tinggi' => 80,
            ],
            [
                'id_ketentuan_point' => 6,
                'nama_ketentuan' => 'Dikembalikan ke Orang Tua',
                'konsekuensi' => 'Dikembalikan ke Orang Tua',
                'point_pelanggaran_rendah' => 100,
                'point_pelanggaran_tinggi' => 100,
            ],
        ];
        $data['siswa']=$this->m_point_pelanggaran->join_siswa_pelanggaran_tertinggi('10')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/laporan/laporan');
        $this->load->view('guru/footer');
    }

    public function siswa(){
        $data['judul_halaman']='Laporan';
        $data['ketentuan'] = [
            [
                'id_ketentuan_point' => 1,
                'nama_ketentuan' => 'Bimbingan Wali Kelas',
                'konsekuensi' => 'Bimbingan Wali Kelas',
                'point_pelanggaran_rendah' => 20,
                'point_pelanggaran_tinggi' => 20,
            ],
            [
                'id_ketentuan_point' => 2,
                'nama_ketentuan' => 'Penggilan Orang Tua ke 1, Tanda Tangan Surat Skorsing 1 hari dan Membersihkan Kelas',
                'konsekuensi' => 'Penggilan Orang Tua ke 1, Tanda Tangan Surat Skorsing 1 hari dan Membersihkan Kelas',
                'point_pelanggaran_rendah' => 30,
                'point_pelanggaran_tinggi' => 30,
            ],
            [
                'id_ketentuan_point' => 3,
                'nama_ketentuan' => 'Penanganan Wali Kelas dan Guru BK diberikan hukuman Membersihkan Kelas',
                'konsekuensi' => 'Penanganan Wali Kelas dan Guru BK diberikan hukuman Membersihkan Kelas',
                'point_pelanggaran_rendah' => 40,
                'point_pelanggaran_tinggi' => 40,
            ],
            [
                'id_ketentuan_point' => 4,
                'nama_ketentuan' => 'Panggilan Orang Tua ke 2, Tanda Tangan Surat Skorsing 3 hari dan Membersihkan Lingkungan Sekolah',
                'konsekuensi' => 'Panggilan Orang Tua ke 2, Tanda Tangan Surat Skorsing 3 hari dan Membersihkan Lingkungan Sekolah',
                'point_pelanggaran_rendah' => 50,
                'point_pelanggaran_tinggi' => 50,
            ],
            [
                'id_ketentuan_point' => 5,
                'nama_ketentuan' => 'Panggilan Orang Tua ke 3 dan Tanda Tangan Surat Skorsing 1 minggu',
                'konsekuensi' => 'Panggilan Orang Tua ke 3 dan Tanda Tangan Surat Skorsing 1 minggu',
                'point_pelanggaran_rendah' => 80,
                'point_pelanggaran_tinggi' => 80,
            ],
            [
                'id_ketentuan_point' => 6,
                'nama_ketentuan' => 'Dikembalikan ke Orang Tua',
                'konsekuensi' => 'Dikembalikan ke Orang Tua',
                'point_pelanggaran_rendah' => 100,
                'point_pelanggaran_tinggi' => 100,
            ],
        ];

        $data['kelas']=list_kelas();
        $data['siswa']=$this->m_point_pelanggaran->join_siswa_pelanggaran_tertinggi('10')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/laporan/laporan_siswa');
        $this->load->view('guru/footer');
    }


    public function cari_kelas(){
        $kelas=$this->input->post('kelas');
        $data['ketentuan'] = [
            [
                'id_ketentuan_point' => 1,
                'nama_ketentuan' => 'Bimbingan Wali Kelas',
                'konsekuensi' => 'Bimbingan Wali Kelas',
                'point_pelanggaran_rendah' => 20,
                'point_pelanggaran_tinggi' => 20,
            ],
            [
                'id_ketentuan_point' => 2,
                'nama_ketentuan' => 'Penggilan Orang Tua ke 1, Tanda Tangan Surat Skorsing 1 hari dan Membersihkan Kelas',
                'konsekuensi' => 'Penggilan Orang Tua ke 1, Tanda Tangan Surat Skorsing 1 hari dan Membersihkan Kelas',
                'point_pelanggaran_rendah' => 30,
                'point_pelanggaran_tinggi' => 30,
            ],
            [
                'id_ketentuan_point' => 3,
                'nama_ketentuan' => 'Penanganan Wali Kelas dan Guru BK diberikan hukuman Membersihkan Kelas',
                'konsekuensi' => 'Penanganan Wali Kelas dan Guru BK diberikan hukuman Membersihkan Kelas',
                'point_pelanggaran_rendah' => 40,
                'point_pelanggaran_tinggi' => 40,
            ],
            [
                'id_ketentuan_point' => 4,
                'nama_ketentuan' => 'Panggilan Orang Tua ke 2, Tanda Tangan Surat Skorsing 3 hari dan Membersihkan Lingkungan Sekolah',
                'konsekuensi' => 'Panggilan Orang Tua ke 2, Tanda Tangan Surat Skorsing 3 hari dan Membersihkan Lingkungan Sekolah',
                'point_pelanggaran_rendah' => 50,
                'point_pelanggaran_tinggi' => 50,
            ],
            [
                'id_ketentuan_point' => 5,
                'nama_ketentuan' => 'Panggilan Orang Tua ke 3 dan Tanda Tangan Surat Skorsing 1 minggu',
                'konsekuensi' => 'Panggilan Orang Tua ke 3 dan Tanda Tangan Surat Skorsing 1 minggu',
                'point_pelanggaran_rendah' => 80,
                'point_pelanggaran_tinggi' => 80,
            ],
            [
                'id_ketentuan_point' => 6,
                'nama_ketentuan' => 'Dikembalikan ke Orang Tua',
                'konsekuensi' => 'Dikembalikan ke Orang Tua',
                'point_pelanggaran_rendah' => 100,
                'point_pelanggaran_tinggi' => 100,
            ],
        ];
        $data['kelas']=list_kelas();
        $data['siswa']=$this->m_point_pelanggaran->join_siswa_pelanggaran_kelas($kelas)->result();

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
            $where="siswa.id_siswa=pelanggaran_siswa.id_siswa and pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran and date(pelanggaran_siswa.tanggal_pelanggaran) between '$tanggal_awal' and '$tanggal_akhir'";
            $data['pelanggaran_detail']=$this->m_point_pelanggaran->select('pelanggaran_siswa,siswa,pelanggaran','*',$where,'pelanggaran_siswa.id_pelanggaran_siswa','desc')->result();
             
            $data['nama_pelanggaran']="semua jenis pelanggaran";
        }else{
            
            $where="pelanggaran_siswa.id_pelanggaran='$pelanggaran' and siswa.id_siswa=pelanggaran_siswa.id_siswa and pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran and date(pelanggaran_siswa.tanggal_pelanggaran) between '$tanggal_awal' and '$tanggal_akhir'";
            $data['pelanggaran_detail']=$this->m_point_pelanggaran->select('pelanggaran_siswa,siswa,pelanggaran','*',$where,'pelanggaran_siswa.id_pelanggaran_siswa','desc')->result();
                
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