<?php
 
defined('BASEPATH') or exit('');

class Siswa extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_point_pelanggaran');
        $this->load->library('excel');
        if($this->session->userdata('status')!='login'){
            redirect('login/index');
        }
        
    }

    public function index(){
        $data['judul_halaman']='Siswa';
        $data['kelas']=list_kelas();
        $data['siswa']=$this->m_point_pelanggaran->selectJoinSiswa('siswa','siswa.*,ortu.nama_ortu,ortu.no_hp',"",'','asc')->result();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/siswa/siswa');
        $this->load->view('guru/footer');
    }

    public function cari_kelas(){
        $kelas=$this->input->post('kelas');
        $data['siswa']=$this->m_point_pelanggaran->selectJoinSiswa('siswa','siswa.*,ortu.nama_ortu,ortu.no_hp',"siswa.kelas='$kelas'",'siswa.kelas','asc')->result();
        $data['kelas']=list_kelas();
        $this->load->view('guru/header',$data);
        $this->load->view('guru/sidebar');
        
        $this->load->view('guru/siswa/siswa');
        $this->load->view('guru/footer');
    }

    public function tambah(){
        $nama=$this->input->post('nama');
        $nis=$this->input->post('nis');
        $alamat=$this->input->post('alamat');
        $jenis_kelamin=$this->input->post('jenis_kelamin');
        $kelas=$this->input->post('kelas');
        
        $nama_ortu=$this->input->post('nama_ortu');
        $jenis_kelamin_ortu=$this->input->post('jenis_kelamin_ortu');
        $no_ortu=$this->input->post('no_ortu');
        $alamat_ortu=$this->input->post('alamat_ortu');
        $username_ortu=$this->input->post('username_ortu');
        $password_ortu=$this->input->post('password_ortu');

        $cekNis = $this->db->query("SELECT * FROM siswa WHERE no_induk = '$nis'");
        $cekNis = $cekNis->row();
        if(!is_null($cekNis)) {
            $this->session->set_userdata('pesan','errNis');
            redirect('siswa');
        }

        $cekOrtu = $this->db->query("SELECT * FROM ortu WHERE username = '$username_ortu'");
        $cekOrtu = $cekOrtu->row();
        if(!is_null($cekOrtu)) {
            $this->session->set_userdata('pesan','errUsernameOrtu');
            redirect('siswa');
        }

        $tanggal_input=date('Y-m-d H:i:s');
        $nilai=array(
            'id_siswa'=>'',
            'nama_siswa'=>$nama,
            'no_induk'=>$nis,
            'alamat'=>$alamat,
            'jenis_kelamin'=>$jenis_kelamin,
            'kelas'=>$kelas,
            'tanggal_input'=>$tanggal_input,
            'password'=>'password'
        );
        $this->m_point_pelanggaran->insert('siswa',$nilai);
        
        $id_siswa = $this->db->query("SELECT * FROM siswa ORDER BY id_siswa DESC LIMIT 1");
        $id_siswa = $id_siswa->row();
        
        $nilai=array(
            'id_ortu'=>'',
            'id_siswa'=>$id_siswa->id_siswa,
            'nama_ortu'=>$nama_ortu,
            'jenis_kelamin'=>$jenis_kelamin_ortu,
            'no_hp'=>$no_ortu,
            'alamat'=>$alamat_ortu,
            'username'=>$username_ortu,
            'password'=>$password_ortu,
        );
        $this->m_point_pelanggaran->insert('ortu',$nilai);
        $this->session->set_userdata('pesan','t');
        redirect('siswa');
    }

    public function edit(){
        $id=$this->input->post('id_siswa');
        $nama=$this->input->post('nama');
        $alamat=$this->input->post('alamat');
        $jenis_kelamin=$this->input->post('jenis_kelamin');
        $kelas=$this->input->post('kelas');

        $nama_ortu=$this->input->post('nama_ortu');
        $jenis_kelamin_ortu=$this->input->post('jenis_kelamin_ortu');
        $no_ortu=$this->input->post('no_ortu');
        $alamat_ortu=$this->input->post('alamat_ortu');
        $username_ortu=$this->input->post('username_ortu');
        $password_ortu=$this->input->post('password_ortu');

        $nilai=array(
            'nama_siswa'=>$nama,
            'alamat'=>$alamat,
            'jenis_kelamin'=>$jenis_kelamin,
            'kelas'=>$kelas,
        );
        $where=array(
            'id_siswa'=>$id
        );
        $this->m_point_pelanggaran->update('siswa',$nilai,$where);

        $nilai=array(
            'nama_ortu'=>$nama_ortu,
            'jenis_kelamin'=>$jenis_kelamin_ortu,
            'no_hp'=>$no_ortu,
            'alamat'=>$alamat_ortu,
            'password'=>$password_ortu,
        );
        $this->m_point_pelanggaran->update('ortu',$nilai,$where);

        $this->session->set_userdata('pesan','e');
        redirect('siswa');
    }

    public function hapus(){
        $id=$this->uri->segment('3');
        $where=array(
            'id_siswa'=>$id
        );
        $this->m_point_pelanggaran->delete('siswa',$where);
        $this->session->set_userdata('pesan','h');
        redirect('siswa');
    }

    public function import_data(){
        $kelas=$this->input->post('kelas');
        if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=3; $row<=$highestRow; $row++)
				{
					$no_induk = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nama_siswa = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$jenis_kelamin = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$nama_ortu = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$jk_ortu = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$hp_ortu = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$alamat_ortu = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$username_ortu = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$password_ortu = $worksheet->getCellByColumnAndRow(10, $row)->getValue();

                    $cekNis = $this->db->query("SELECT * FROM siswa WHERE no_induk = '$no_induk'");
                    $cekNis = $cekNis->row();
                    if(!is_null($cekNis)) {
                        $this->session->set_userdata('pesan','errNis');
                        redirect('siswa');
                    }

                    $cekOrtu = $this->db->query("SELECT * FROM ortu WHERE username = '$username_ortu'");
                    $cekOrtu = $cekOrtu->row();
                    if(!is_null($cekOrtu)) {
                        $this->session->set_userdata('pesan','errUsernameOrtu');
                        redirect('siswa');
                    }

					$nilai = array(
                        "id_siswa"=> '',
                        "nama_siswa"=>$nama_siswa,
                        'no_induk'=>$no_induk,
                        'alamat'=>$alamat,
                        'jenis_kelamin'=>$jenis_kelamin,
                        'kelas'=>$kelas,
                        'tanggal_input'=>date('Y-m-d H:i:s'),
                        'password'=>'password'
					);
                    $this->m_point_pelanggaran->insert('siswa',$nilai);

                    $id_siswa = $this->db->query("SELECT * FROM siswa ORDER BY id_siswa DESC LIMIT 1");
                    $id_siswa = $id_siswa->row();
                    $nilai=array(
                        'id_ortu'=>'',
                        'id_siswa'=>$id_siswa->id_siswa,
                        'nama_ortu'=>$nama_ortu,
                        'jenis_kelamin'=>$jk_ortu,
                        'no_hp'=>$hp_ortu,
                        'alamat'=>$alamat_ortu,
                        'username'=>$username_ortu,
                        'password'=>$password_ortu,
                    );
                    $this->m_point_pelanggaran->insert('ortu',$nilai);
				}
			}
            $where_upload=array(
                'kelas'=>$kelas,
            );
            $jum_uplod=$this->m_point_pelanggaran->select('siswa','*',$where_upload,'id_siswa','desc')->num_rows();
            $this->session->set_userdata('pesan',"b");
            $this->session->set_userdata('jum_data',"$jum_uplod");
            $this->session->set_userdata('nama_kelas',"$kelas");
            redirect('siswa/index');
        }
        
    }

    function get_data_siswa_edit(){
        $id_siswa = $this->input->get('id');
        $get_siswa = $this->m_point_pelanggaran->select_siswa('siswa','siswa.*,ortu.nama_ortu,ortu.jenis_kelamin as jk_ortu,ortu.no_hp,ortu.alamat as alamat_ortu,ortu.username as username_ortu,ortu.password as password_ortu',"siswa.id_siswa='$id_siswa'",'siswa.id_siswa','desc')->result();
        echo json_encode($get_siswa); 
        
    }

    public function download_file(){
        force_download('assets/download/format_import_siswa.xlsx',NULL);
        redirect("guru/index");
    }

}
?>