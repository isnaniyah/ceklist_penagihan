<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengawas_cekdata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mcekdata');
        $this->load->model('mceklist');
        $this->load->model('mkontrak');
        $this->load->helper('form','url');
    }

	public function index($id)
	{
	    $data['title'] = 'Daftar Penagihan'; //judul title
	    $data['qcekdata'] = $this->mcekdata->get_all($id); //query model semua Data
		$this->load->view('pengawas/vcekdata',$data);
	}

    public function form(){
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);

		$ID_DATA_CEKLIST		= addslashes($this->input->post('ID_DATA_CEKLIST'));
		$ID_KONTRAK 			= addslashes($this->input->post('ID_KONTRAK'));
		$NO_PEMBAYARAN			= addslashes($this->input->post('NO_PEMBAYARAN'));
		$PERIODE				= addslashes($this->input->post('PERIODE'));
		$STATUS_PEKERJAAN		= addslashes($this->input->post('STATUS_PEKERJAAN'));
		$TGL_ACC                = addslashes($this->input->post('TGL_ACC'));

		if ($mau_ke == "add") {
            $id=base64_decode($idu);
            $data['qkontrak']   = $this->mkontrak->get_kontrak_byid($id);
		    $data['title'] = 'Tambah Data';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('pengawas/vformcekdata',$data);
		} else if ($mau_ke == "edit") {
			$data['qcekdata']	= $this->mcekdata->get_byid($idu);
			$data['title'] = 'Edit Data';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('pengawas/vformcekdata',$data);
		} else if ($mau_ke == "aksi_add") {
            $quser=$this->mcekdata->get_all($ID_KONTRAK);
            $cek_no_pembayaran=0;
            foreach ($quser as $row) {
                if ($NO_PEMBAYARAN==$row->NO_PEMBAYARAN) {
                    $cek_no_pembayaran++;
                }
            }
            if ($cek_no_pembayaran>0) {
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Penagihan ke-".$NO_PEMBAYARAN." sudah ada! </div>");
                redirect(base_url().'pengawas_kontrak/form/add');
            }else{
    			$data = array(
                    'ID_DATA_CEKLIST'   => $ID_DATA_CEKLIST,
                    'ID_KONTRAK'        => $ID_KONTRAK,
                    'NO_PEMBAYARAN'     => $NO_PEMBAYARAN,
                    'PERIODE'           => $PERIODE,
                    'STATUS_PEKERJAAN'  => $STATUS_PEKERJAAN,
                    'TGL_ACC'           => $TGL_ACC
                );
                $ID_KONTRAK2=base64_encode($ID_KONTRAK);
                $this->mcekdata->get_insert($data);
    			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
                redirect(base_url().'pengawas_kontrak/detail/'.$ID_KONTRAK2);
            }
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'ID_DATA_CEKLIST'   => $ID_DATA_CEKLIST,
                'ID_KONTRAK'        => $ID_KONTRAK,
                'NO_PEMBAYARAN'     => $NO_PEMBAYARAN,
                'PERIODE'           => $PERIODE,
                'STATUS_PEKERJAAN'  => $STATUS_PEKERJAAN,
                'TGL_ACC'           => $TGL_ACC
            );
            $this->mcekdata->get_update($ID_DATA_CEKLIST,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
            $ID_KONTRAK2=base64_encode($ID_KONTRAK);
            redirect(base_url().'pengawas_kontrak/detail/'.$ID_KONTRAK2);
		}
    }
    public function detail($id){
        $data['title'] = 'Detail Data Penagihan';
	    $data['qcekdata'] = $this->mcekdata->get_byid($id);
        $data2['qceklist'] = $this->mceklist->get_syaratceklist($id);
		$this->load->view('pengawas/vdetcekdata',$data);
        $this->load->view('pengawas/vceklist',$data2);
    }
    public function hapus($gid,$ID_KONTRAK){
        $this->mcekdata->del($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
        redirect(base_url().'pengawas_kontrak/detail/'.$ID_KONTRAK);
	}
}