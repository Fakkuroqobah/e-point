<?php
 
defined('BASEPATH') or exit('');

class Pelanggaran_siswa_guru extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        if($this->session->userdata('status')!='login'){
            redirect('login/index');
        }
        
    }

    public function index(){
        $data['judul_halaman']='Pelanggaran Siswa';
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/pelanggaran_siswa/cari_siswa');
        $this->load->view('guru/footer');
    }

    function cari_siswa(){
        $output = '';
        $query = '';
        if($this->input->post('query'))
        {
        $query = $this->input->post('query');
        }
        $data = $this->m_point_pelanggaran->cari_siswa($query);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
            <tr>
            <th>Nama Siswa</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Opsi</th>
            </tr>
        ';
        if($data->num_rows() > 0)
        {
        foreach($data->result() as $row)
        {
            $output .= '
            <tr>
            <td>'.$row->nama_siswa.'</td>
            <td>'.$row->no_induk.'</td>
            <td>'.$row->kelas.'</td>
            <td><a href="'.base_url().'pelanggaran_siswa_guru/input_pelanggaran/'.$row->id_siswa.'/'.$row->kelas.'" class="btn btn-danger btn-sm">proses</a></td>
            </tr>
            ';
        }
        }
        else
        {
        $output .= '<tr>
            <td colspan="5">Data Tidak Ditemukan</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    public function input_pelanggaran(){
        $data['judul_halaman']='Pelanggaran Siswa';
        $id_siswa=$this->uri->segment('3');
        $data['siswa']=$this->m_point_pelanggaran->select('siswa','*',"siswa.id_siswa='$id_siswa'",'siswa.id_siswa','asc')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/pelanggaran_siswa/input_pelanggaran');
        $this->load->view('guru/footer');
    }

    function cari_pelanggaran(){
        $output = '';
        $query = '';
        $id_siswa=$this->uri->segment('3');
        $kelas=$this->uri->segment('4');
        if($this->input->post('query'))
        {
        $query = $this->input->post('query');
        }
        $data = $this->m_point_pelanggaran->cari_pelanggaran($query);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
            <tr>
            <th>Nama Pelanggaran</th>
            <th>Jenis Pelanggaran</th>
            <th>Point</th>
            <th>Opsi</th>
            </tr>
        ';
        if($data->num_rows() > 0)
        {
        foreach($data->result() as $row)
        {
            $output .= '
            <tr>
            <td>'.$row->nama_pelanggaran.'</td>
            <td>'.$row->nama_jenis_pelanggaran.'</td>
            <td>'.$row->point_pelanggaran.'</td>
            <td><a href="'.base_url().'pelanggaran_siswa_guru/input_pelanggaran_siswa/'.$id_siswa.'/'.$row->id_pelanggaran.'/'.$kelas.'/'.$row->point_pelanggaran.'" class="btn btn-danger btn-sm">proses</a></td>
            </tr>
            ';
        }
        }
        else
        {
        $output .= '<tr>
            <td colspan="5">Data Tidak Ditemukan</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
    
    public function input_pelanggaran_siswa(){
        $id_siswa=$this->uri->segment('3');
        $id_pelanggaran_siswa=$this->uri->segment('4');
        $point=$this->uri->segment('6');
        $nilai=array(
            'id_pelanggaran_siswa'=>'',  
            'id_pelanggaran'=>$id_pelanggaran_siswa,  
            'id_siswa'=>$id_siswa,
            'id_pelapor'=>$this->session->userdata('id_akun'),
            'tanggal_pelanggaran'=>date('Y-m-d H:i:s'),
            'point'=>$point,
        );
        $tanggal_sekarang=date('Y-m-d');
        $where_cek="id_pelanggaran='$id_pelanggaran_siswa' and tanggal_pelanggaran BETWEEN '$tanggal_sekarang 00:00:00' AND '$tanggal_sekarang 23:59:59' and id_siswa='$id_siswa'";
        $cek_pelanggaran_siswa=$this->m_point_pelanggaran->select('pelanggaran_siswa','*',"$where_cek",'id_pelanggaran_siswa','asc')->num_rows();
        if($cek_pelanggaran_siswa==0){
            $this->m_point_pelanggaran->insert('pelanggaran_siswa',$nilai);
            redirect("pelanggaran_siswa_guru/hasil_input/$id_siswa");
        }elseif($cek_pelanggaran_siswa>0){
            $this->session->set_userdata('pesan','sd');
            redirect("pelanggaran_siswa_guru/input_pelanggaran/$id_siswa");
        }
    
    }
    
    public function hasil_input(){
        $data['judul_halaman']='Pelanggaran Siswa';
        $id_siswa=$this->uri->segment('3');
        $data['siswa']=$this->m_point_pelanggaran->join_siswa_pelanggaran_custom($id_siswa)->result();
        $data['pelanggaran_siswa']=$this->m_point_pelanggaran->select('pelanggaran_siswa,pelanggaran','*',"pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran and pelanggaran_siswa.id_siswa='$id_siswa'",'pelanggaran_siswa.id_pelanggaran_siswa','desc')->result();
        $data['ketentuan'] = [
            [
                'id_ketentuan_point' => 1,
                'nama_ketentuan' => 'peringatan ke 1 ( oleh wali kelas )',
                'point_pelanggaran_rendah' => 10,
                'point_pelanggaran_tinggi' => 30,
            ],
            [
                'id_ketentuan_point' => 2,
                'nama_ketentuan' => 'peringatan ke 2 ( wali kelas dan K3 )',
                'point_pelanggaran_rendah' => 26,
                'point_pelanggaran_tinggi' => 45,
            ],
            [
                'id_ketentuan_point' => 3,
                'nama_ketentuan' => 'Panggilan Orang Tua ke 1 ( oleh wali kelas )',
                'point_pelanggaran_rendah' => 41,
                'point_pelanggaran_tinggi' => 75,
            ],
            [
                'id_ketentuan_point' => 4,
                'nama_ketentuan' => 'Panggilan Orang Tua ke 2 (  Wali Kelas dan guru BK )',
                'point_pelanggaran_rendah' => 76,
                'point_pelanggaran_tinggi' => 100,
            ],
            [
                'id_ketentuan_point' => 5,
                'nama_ketentuan' => 'Panggilan Orang Tua ke 3 ( Wali Kelas, Guru, BK dan K3 )',
                'point_pelanggaran_rendah' => 101,
                'point_pelanggaran_tinggi' => 200,
            ],
            [
                'id_ketentuan_point' => 6,
                'nama_ketentuan' => 'Dikembalikan ke orang tua ( Kepala Sekolah )',
                'point_pelanggaran_rendah' => 201,
                'point_pelanggaran_tinggi' => 500,
            ],
        ];
        $data['guru']=$this->m_point_pelanggaran->select('guru','*',"",'id_guru','desc')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/pelanggaran_siswa/hasil_input_pelanggaran');
        $this->load->view('guru/footer');
    }

    public function hapus_pelanggaran(){
        $id_siswa=$this->uri->segment('3');
        $id_pelanggaran=$this->uri->segment('4');
        $where=array(
            'id_pelanggaran_siswa'=>$id_pelanggaran,
        );
        $this->m_point_pelanggaran->delete('pelanggaran_siswa',$where);
        redirect('pelanggaran_siswa_guru/hasil_input/'.$id_siswa);
    }

    public function data_siswa(){
        $data['judul_halaman']='Siswa';
        $kelas=$this->input->post('kelas');
        $data['kelas']=list_kelas();
        $data['siswa']=$this->m_point_pelanggaran->join_siswa_pelanggaran_kelas($kelas)->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/pelanggaran_siswa/data_pelanggaran_siswa');
        $this->load->view('guru/footer');
    }

    public function cari_kelas(){
        $kelas=$this->input->post('kelas');
        $data['kelas']=list_kelas();
        $data['siswa']=$this->m_point_pelanggaran->join_siswa_pelanggaran_kelas($kelas)->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/pelanggaran_siswa/data_pelanggaran_siswa');
        $this->load->view('guru/footer');
    }

}

?>