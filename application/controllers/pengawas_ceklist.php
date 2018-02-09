<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengawas_ceklist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mceklist');
        $this->load->model('mcekdata');
        $this->load->model('msyarat');
        $this->load->helper('form','url');
    }

    public function index($id)
    {
        $data['title'] = 'Daftar Ceklist'; 
        $data['qceklist'] = $this->mceklist->get_all($id);
        $data['qcekdata'] = $this->mceklist->get_kontrak($id);

        $this->load->view('pengawas/vceklist',$data);
    }

    public function form(){

		$mau_ke					= $this->uri->segment(3);
		$kontrak				= $this->uri->segment(4);
        $dataceklist            = $this->uri->segment(5);
        $idu                    = $this->uri->segment(6);


        $ID_CEKLIST             = addslashes($this->input->post('ID_CEKLIST'));
		$ID_DATA_CEKLIST		= addslashes($this->input->post('ID_DATA_CEKLIST'));
		$ID_SYARAT				= addslashes($this->input->post('ID_SYARAT'));
		$STATUS			        = addslashes($this->input->post('STATUS'));
		$KETERANGAN				= addslashes($this->input->post('KETERANGAN'));

		if ($mau_ke == "add") {
            $ID_KONTRAK=base64_decode($kontrak);
		    $data['title'] = 'Tambah Data';
		    $data['aksi'] = 'aksi_add';
            $data['qsyarat']   = $this->mceklist->get_syarat($ID_KONTRAK, $dataceklist);
            $this->load->view('pengawas/vformceklist',$data);
		} else if ($mau_ke == "edit") {
			$data['qceklist']	= $this->mceklist->get_syarat_edit_ceklist($idu);
			$data['title'] = 'Edit Data';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('pengawas/vformceklist_edit',$data);
		} else if ($mau_ke == "aksi_add") {
            $i=0;
            foreach($_POST['ID_CEKLIST'] as $key => $val){
                $data = array(
                    'ID_CEKLIST'        => $_POST['ID_CEKLIST'][$key],
                    'ID_DATA_CEKLIST'   => $_POST['ID_DATA_CEKLIST'][$key],
                    'ID_SYARAT'         => $_POST['ID_SYARAT'][$key],
                    'STATUS'            => $_POST['STATUS'][$key],
                    'KETERANGAN'        => $_POST['KETERANGAN'][$key],
                );
                $this->mceklist->get_insert($data);
                $id_data=$_POST['ID_DATA_CEKLIST'][$key];
            }
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
            redirect(base_url().'pengawas_cekdata/detail/'.$id_data);
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
            'ID_CEKLIST'        => $ID_CEKLIST,
            'ID_DATA_CEKLIST'   => $ID_DATA_CEKLIST,
            'ID_SYARAT'         => $ID_SYARAT,
            'STATUS'            => $STATUS,
            'KETERANGAN'        => $KETERANGAN
            );
            $this->mceklist->get_update($ID_CEKLIST,$data);
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
            redirect(base_url().'pengawas_cekdata/detail/'.$ID_DATA_CEKLIST);
        }
    }
    public function hapus($gid){

        $this->mcekdata->del($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
        redirect(base_url().'pengawas_cekdata');
	}
}
