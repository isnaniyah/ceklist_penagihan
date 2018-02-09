<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_umk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mumk');
        $this->load->helper('form','url');
    }

	public function index()
	{
	    $data['title'] = 'Daftar Upah Minimum Karyawan';
	    $data['qumk'] = $this->mumk->get_all();

		$this->load->view('admin/vumk',$data);

	}

    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$ID_UMK           = addslashes($this->input->post('ID_UMK'));
		$NAMA_DAERAH      = addslashes($this->input->post('NAMA_DAERAH'));
		$UMK              = addslashes($this->input->post('UMK'));

		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah Data';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('admin/vformumk',$data);
		} else if ($mau_ke == "edit") {
			$data['qumk']	= $this->mumk->get_byid($idu);
			$data['title'] = 'Edit Data';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('admin/vformumk',$data);
		} else if ($mau_ke == "aksi_add") {
			$data = array(
                'ID_UMK'        => $ID_UMK,
                'NAMA_DAERAH'   => $NAMA_DAERAH,
                'UMK'           => $UMK
            );
            $this->mumk->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
            redirect(base_url().'admin_umk');
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'ID_UMK'        => $ID_UMK,
                'NAMA_DAERAH'   => $NAMA_DAERAH,
                'UMK'           => $UMK
            );
            $this->mumk->get_update($ID_UMK,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect(base_url().'admin_umk');
		}
    }

    public function hapus($gid){
        $this->mumk->del($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
        redirect(base_url().'admin_umk');
	}
}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */