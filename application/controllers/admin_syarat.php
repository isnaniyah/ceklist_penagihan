<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_syarat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('msyarat');
        $this->load->model('mkontrak');
        $this->load->helper('form','url');
    }

	public function index()
	{
	    $data['title'] = 'Daftar Syarat Pembayaran';
	    $data['qsyarat'] = $this->msyarat->get_all();
		$this->load->view('admin/vsyarat',$data);
	}

    public function form(){
		$mau_ke					= $this->uri->segment(3);
        $ket                    = $this->uri->segment(4);
		$idu					= $this->uri->segment(5);


		$ID_SYARAT            = addslashes($this->input->post('ID_SYARAT'));
		$ID_KONTRAK		      = addslashes($this->input->post('ID_KONTRAK'));
		$LAMPIRAN		      = addslashes($this->input->post('LAMPIRAN'));
		$KETERANGAN_SYARAT	  = addslashes($this->input->post('KETERANGAN_SYARAT'));

		if ($mau_ke == "add") {
            $id=base64_decode($idu);
            $data['qkontrak']    = $this->mkontrak->get_kontrak_byid($id);
		    $data['title'] = 'Tambah Data';
            $data['keterangan'] = $ket;
		    $data['aksi'] = 'aksi_add';
            $this->load->view('admin/vformsyarat',$data);
		} else if ($mau_ke == "edit") {
			$data['qsyarat']	= $this->msyarat->get_byid($idu);
            $data['qkontrak']    = $this->mkontrak->get_kontrak_byid($idu);
			$data['title'] = 'Edit Data';
            $data['keterangan'] = $ket;
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('admin/vformsyarat',$data);
		} else if ($mau_ke == "aksi_add") {
			$data = array(
                'ID_SYARAT'         => $ID_SYARAT,
                'ID_KONTRAK'        => $ID_KONTRAK,
                'LAMPIRAN'          => $LAMPIRAN,
                'KETERANGAN_SYARAT' => $KETERANGAN_SYARAT
            );
            $this->msyarat->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
            $ID_KONTRAK2=base64_encode($ID_KONTRAK);
            if ($ket == "next") {
                redirect(base_url().'admin_syarat/detail/'.$ID_KONTRAK2);
            } else {
                redirect(base_url().'admin_syarat/detail_edit/'.$ID_KONTRAK2);
            }
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'ID_SYARAT'         => $ID_SYARAT,
                'ID_KONTRAK'        => $ID_KONTRAK,
                'LAMPIRAN'          => $LAMPIRAN,
                'KETERANGAN_SYARAT' => $KETERANGAN_SYARAT
            );
            $this->msyarat->get_update($ID_SYARAT,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			$ID_KONTRAK2=base64_encode($ID_KONTRAK);
            if ($ket == "next") {
                redirect(base_url().'admin_syarat/detail/'.$ID_KONTRAK2);
            } else {
                redirect(base_url().'admin_syarat/detail_edit/'.$ID_KONTRAK2);
            }
		}

    }
    public function detail($idu){
        $ID_KONTRAK=base64_decode($idu);
        $data['title'] = 'Syarat Pembayaran';
        $data['qkontrak'] = $this->mkontrak->get_kontrak_byid($ID_KONTRAK);
        $data['qsyarat'] = $this->msyarat->get_bykontrak($ID_KONTRAK);
        $data['keterangan'] = 'next';
        $this->load->view('admin/vsyarat',$data);
    }

    public function detail_edit($idu){
        $ID_KONTRAK=base64_decode($idu);
        $data['title'] = 'Syarat Pembayaran';
        $data['qkontrak'] = $this->mkontrak->get_kontrak_byid($ID_KONTRAK);
        $data['qsyarat'] = $this->msyarat->get_bykontrak($ID_KONTRAK);
        $data['keterangan'] = 'kembali';
        $this->load->view('admin/vsyarat',$data);
    }
    public function hapus($gid, $kontrak, $ket){
        $ID_KONTRAK = $kontrak;
        $this->msyarat->del($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
        if ($ket == "next") {
                redirect(base_url().'admin_syarat/detail/'.$ID_KONTRAK);
            } else {
                redirect(base_url().'admin_syarat/detail_edit/'.$ID_KONTRAK);
            }
	}
}