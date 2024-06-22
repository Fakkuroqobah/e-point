<?php
 
defined('BASEPATH') or exit('');

class Api extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
    }

    public function jumlah_point() {
        $id = $this->input->get('id');
        $dataPoint = $this->m_point_pelanggaran->jumlah_point_siswa($id)->row();

        $id = $this->input->get('id');
        $this->db->select("surat_pemanggilan.*, ortu.id_siswa");
        $this->db->from("surat_pemanggilan");
        $this->db->JOIN("ortu","surat_pemanggilan.id_ortu=ortu.id_ortu");
        $this->db->where("ortu.id_siswa='$id'");
        $this->db->order_by("id_surat", "DESC");
        $dataPemanggilan = $this->db->get()->row();

        $ketentuan = [
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

        $konsekuensi = '';
        $siswa=$this->m_point_pelanggaran->join_siswa_pelanggaran_custom($id)->result();
        foreach ($siswa as $s) {
            foreach ($ketentuan as $kp) {
                if ($s->jumlah_point >= $kp['point_pelanggaran_rendah'] and $s->jumlah_point <= $kp['point_pelanggaran_tinggi']) {
                    $ketentuana = $kp['nama_ketentuan'];
                    $konsekuensi = $kp['konsekuensi'];
                }else if($s->jumlah_point >= 500) {
                    $ketentuana = 'Dikembalikan ke orang tua ( Kepala Sekolah )';
                    $konsekuensi = 'Dikembalikan ke orang tua ( Kepala Sekolah )';
                }
            }
        }

        $data = [
            'jumlah_point' => $dataPoint->jumlah_point ?? 0,
            'id_surat' =>  $dataPemanggilan->id_surat ?? "",
            'konsekuensi' => $konsekuensi
        ];

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function peraturan() {
        $data = $this->m_point_pelanggaran->select('pelanggaran,jenis_pelanggaran','*','jenis_pelanggaran.id_jenis_pelanggaran=pelanggaran.id_jenis_pelanggaran','id_pelanggaran','asc')->result();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function riwayat_pelanggaran() {
        $id = $this->input->get('id');
        $data = $data['pelanggaran_siswa']=$this->m_point_pelanggaran->select('pelanggaran_siswa,pelanggaran,siswa','*',"pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran and pelanggaran_siswa.id_siswa='$id' and siswa.id_siswa = '$id'",'pelanggaran_siswa.id_pelanggaran_siswa','desc')->result();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function login_siswa() {
        $where=array(
            'no_induk'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
        );

        $cek=$this->m_point_pelanggaran->select('siswa','*',$where,'id_siswa','asc')->num_rows();
        
        if($cek > 0){
            $akun=$this->m_point_pelanggaran->select('siswa','*',$where,'id_siswa','asc')->result();
            
            foreach($akun as $a){
                $id_siswa=$a->id_siswa;
                $nama=$a->nama_siswa;
                $user=$a->no_induk;
                $pass=$a->password;
            }

            $data_session = array(
                            'id_akun'=>$id_siswa,
                            'id_siswa'=>$id_siswa,
                            'nama_akun'=>$nama,
                            'username'=>$user,
                            'password'=>$pass
                            );
            
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data_session));
        }else{
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output("Username atau password salah");
        }
    }

    public function login_ortu() {
        $where=array(
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
        );

        $cek=$this->m_point_pelanggaran->select('ortu','*',$where,'id_ortu','asc')->num_rows();
        
        if($cek > 0){
            $akun=$this->m_point_pelanggaran->select('ortu','*',$where,'id_ortu','asc')->result();
            
            foreach($akun as $a){
                $id_ortu=$a->id_ortu;
                $id_siswa=$a->id_siswa;
                $nama=$a->nama_ortu;
                $user=$a->username;
                $pass=$a->password;
            }

            $data_session = array(
                            'id_akun'=>$id_ortu,
                            'id_siswa'=>$id_siswa,
                            'nama_akun'=>$nama,
                            'username'=>$user,
                            'password'=>$pass
                            );
            
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data_session));
        }else{
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output("Username atau password salah");
        }
    }

    public function detail_riwayat_pemanggilan() {
        $id = $this->input->get('id');
        $data = $this->m_point_pelanggaran->surat($id)->row();
        
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function riwayat_pemanggilan() {
        $id = $this->input->get('id');
        $this->db->select("surat_pemanggilan.*,ortu.nama_ortu,siswa.nama_siswa,siswa.kelas,guru.nama_guru");
        $this->db->from("surat_pemanggilan");
        $this->db->where("siswa.id_siswa='$id'");
        $this->db->JOIN("ortu","surat_pemanggilan.id_ortu=ortu.id_ortu");
        $this->db->JOIN("siswa","ortu.id_siswa=siswa.id_siswa");
        $this->db->JOIN("guru","surat_pemanggilan.id_guru=guru.id_guru");
        $data = $this->db->get()->result();

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function edit_profil() {
        $id = $this->input->post('id');
        $password=$this->input->post('password');
        $tipe=$this->input->post('tipe');
        $nilai=array(
            'password'=>$password,
        );

        if($tipe == "siswa") {
            $where=array(
                'id_siswa'=>$id
            );
            $this->m_point_pelanggaran->update('siswa',$nilai,$where);
        }else{
            $where=array(
                'id_ortu'=>$id
            );
            $this->m_point_pelanggaran->update('ortu',$nilai,$where);
        }
        
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output("Berhasil");
    }

}
?>