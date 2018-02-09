<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_upah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mupah');
        $this->load->model('mumk');
        $this->load->model('mkontrak');
        $this->load->helper('form','url');
    }
	public function index() {
	    $data['title'] = 'Daftar Upah Pekerja';
	    $data['qupah'] = $this->mupah->get_all();
		$this->load->view('admin/vupah',$data);
	}

    public function form(){
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);

		$ID_UPAH                   = addslashes($this->input->post('ID_UPAH'));
		$ID_KONTRAK	               = addslashes($this->input->post('ID_KONTRAK'));
        $UMK                       = addslashes($this->input->post('UMK'));
		$UPAH1		               = addslashes($this->input->post('UPAH'));
		$TUNJANGAN1	               = addslashes($this->input->post('TUNJANGAN'));
        $BPJS_KESEHATAN1            = addslashes($this->input->post('BPJS_KESEHATAN'));
        $JAMINAN_KEMATIAN1          = addslashes($this->input->post('JAMINAN_KEMATIAN'));
        $JAMINAN_HARI_TUA1          = addslashes($this->input->post('JAMINAN_HARI_TUA'));
        $JAMINAN_KECELAKAAN_KERJA1  = addslashes($this->input->post('JAMINAN_KECELAKAAN_KERJA'));
        $JAMINAN_PENSIUN1           = addslashes($this->input->post('JAMINAN_PENSIUN'));

        if ($mau_ke == "aksi_add") {
            $UPAH                       = $UMK + (($UMK*$UPAH1)/100);
            $TUNJANGAN                  = ($TUNJANGAN1*$UMK)/100;
            $BPJS_KESEHATAN             = ($BPJS_KESEHATAN1*$UMK)/100;
            $JAMINAN_KEMATIAN           = ($JAMINAN_KEMATIAN1*$UMK)/100;
            $JAMINAN_HARI_TUA           = ($JAMINAN_HARI_TUA1*$UMK)/100;
            $JAMINAN_KECELAKAAN_KERJA   = ($JAMINAN_KECELAKAAN_KERJA1*$UMK)/100;
            $JAMINAN_PENSIUN            = ($JAMINAN_PENSIUN1*$UMK)/100;
        }else{
            $UPAH                       = $UPAH1;
            $TUNJANGAN                  = $TUNJANGAN1;
            $BPJS_KESEHATAN             = $BPJS_KESEHATAN1;
            $JAMINAN_KEMATIAN           = $JAMINAN_KEMATIAN1;
            $JAMINAN_HARI_TUA           = $JAMINAN_HARI_TUA1;
            $JAMINAN_KECELAKAAN_KERJA   = $JAMINAN_KECELAKAAN_KERJA1;
            $JAMINAN_PENSIUN            = $JAMINAN_PENSIUN1;
        }

		if ($mau_ke == "add") {
            $id=base64_decode($idu);
            $data['qkontrak']    = $this->mkontrak->get_kontrak_byid($id);
            $data['qumk']    = $this->mumk->get_all();
		    $data['title'] = 'Tambah Data';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('admin/vformupah',$data);
		} else if ($mau_ke == "edit") {
			$data['qupah']	= $this->mupah->get_all_idupah($idu);
            $data['qumk']    = $this->mumk->get_all();
			$data['title'] = 'Edit Data';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('admin/vformupah',$data);
		} else if ($mau_ke == "aksi_add") {
			$data = array(
                'ID_UPAH'                   => $ID_UPAH,
                'ID_KONTRAK'                => $ID_KONTRAK,
                'UMK'                       => $UMK,
                'UPAH'                      => $UPAH,
                'TUNJANGAN'                 => $TUNJANGAN,
                'BPJS_KESEHATAN'            => $BPJS_KESEHATAN,
                'JAMINAN_KEMATIAN'          => $JAMINAN_KEMATIAN,
                'JAMINAN_HARI_TUA'          => $JAMINAN_HARI_TUA,
                'JAMINAN_KECELAKAAN_KERJA'  => $JAMINAN_KECELAKAAN_KERJA,
                'JAMINAN_PENSIUN'           => $JAMINAN_PENSIUN
            );
            $this->mupah->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
            $ID_KONTRAK2=base64_encode($ID_KONTRAK);
            redirect(base_url().'admin_upah/awal/'.$ID_KONTRAK2);
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'ID_UPAH'                   => $ID_UPAH,
                'ID_KONTRAK'                => $ID_KONTRAK,
                'UMK'                       => $UMK,
                'UPAH'                      => $UPAH,
                'TUNJANGAN'                 => $TUNJANGAN,
                'BPJS_KESEHATAN'            => $BPJS_KESEHATAN,
                'JAMINAN_KEMATIAN'          => $JAMINAN_KEMATIAN,
                'JAMINAN_HARI_TUA'          => $JAMINAN_HARI_TUA,
                'JAMINAN_KECELAKAAN_KERJA'  => $JAMINAN_KECELAKAAN_KERJA,
                'JAMINAN_PENSIUN'           => $JAMINAN_PENSIUN
            );
            $this->mupah->get_update($ID_UPAH,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
            $ID_KONTRAK2=base64_encode($ID_KONTRAK);
			redirect(base_url().'admin_upah/awal/'.$ID_KONTRAK2);
		}
    }
    public function detail($idu){
        $ID_KONTRAK=base64_decode($idu);
        $data['title'] = 'Detail Upah Pembayaran';
        $data['qkontrak'] = $this->mkontrak->get_kontrak_byid($ID_KONTRAK);
        $data['qupah'] = $this->mupah->get_bykontrak($ID_KONTRAK);
        $this->load->view('admin/vupah',$data);
    }
    public function awal($idu){
        $ID_KONTRAK=base64_decode($idu);
        $data['title'] = 'Detail Upah Pembayaran';
        $data['qkontrak'] = $this->mkontrak->get_kontrak_byid($ID_KONTRAK);
        $data['qupah'] = $this->mupah->get_all($ID_KONTRAK);
        $this->load->view('admin/vupah',$data);
    }
    public function hapus($gid, $kontrak){
        $ID_KONTRAK = $kontrak;
        $this->mupah->del($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
        redirect(base_url().'admin_upah/awal/'.$ID_KONTRAK);
	}
}