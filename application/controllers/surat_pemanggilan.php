<?php
defined('BASEPATH') or exit('');

class Surat_pemanggilan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        
    }

    public function index(){
        $data['judul_halaman']='Surat Pemanggilan Orang Tua Siswa';
        $data['surat'] = $this->m_point_pelanggaran->surat()->result();
        
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/surat_pemanggilan/cari_siswa');
        $this->load->view('guru/footer');
    }

    function cari_siswa(){
        $output = '';
        $query = '';
        if($this->input->post('query')) {
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
        if($data->num_rows() > 0) {
            foreach($data->result() as $row)
            {
                $output .= '
                <tr>
                <td>'.$row->nama_siswa.'</td>
                <td>'.$row->no_induk.'</td>
                <td>'.$row->nama_kelas.'</td>
                <td><a href="'.base_url().'surat_pemanggilan/input_pemanggilan/'.$row->id_siswa.'/'.$row->id_kelas.'" class="btn btn-danger btn-sm">proses</a></td>
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
        $output .= '</table></div>';
        echo $output;
    }

    function input_pemanggilan(){
        $data['judul_halaman']='Input Pemanggilan Orang Tua Siswa';
        $id_siswa=$this->uri->segment('3');
        $data['siswa']=$this->m_point_pelanggaran->join_ortu($id_siswa)->row();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/surat_pemanggilan/input_pemanggilan');
        $this->load->view('guru/footer');
    }

    function input_pelanggaran_siswa(){
        $no_surat = $this->input->post('no_surat');
        $id_ortu = $this->input->post('id_ortu');
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');

        $nilai=array(
            'id_surat'=>'',  
            'no_surat'=>$no_surat,  
            'id_ortu'=>$id_ortu,
            'tanggal_pemanggilan'=>$tanggal,
            'jam_pemanggilan'=>$jam,
            'id_guru'=>$this->session->userdata('id_akun'),
            'tanggal_surat'=>date('Y-m-d H:i:s'),
        );
        
        $this->m_point_pelanggaran->insert('surat_pemanggilan',$nilai);
        $this->session->set_userdata('pesan','t');
        redirect("surat_pemanggilan/index");
    }

    function download(){
        $id_surat=$this->uri->segment('3');
        $data['surat'] = $this->m_point_pelanggaran->surat($id_surat)->row();

        $this->load->view('guru/surat_pemanggilan/download', $data);
    }
}