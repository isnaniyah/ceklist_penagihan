<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_kontrak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mkontrak');
        $this->load->model('msyarat');
        $this->load->model('mcekdata');
        $this->load->model('mupah');
        $this->load->helper('form','url');
    }

    public function index()
    {
        $data['title'] = 'Data Kontrak';
        $data['qkontrak'] = $this->mkontrak->get_allkontrak();
        $this->load->view('admin/vkontrak',$data);

    }

    public function form(){
        $mau_ke                 = $this->uri->segment(3);
        $ID_KONTRAK             = $this->uri->segment(4);
        $idu                    = base64_decode($ID_KONTRAK);

        $ID_KONTRAK             = addslashes($this->input->post('ID_KONTRAK'));
        $TGL_KONTRAK            = addslashes($this->input->post('TGL_KONTRAK'));
        $PERIHAL                = addslashes($this->input->post('PERIHAL'));
        $PIHAK_KEDUA            = addslashes($this->input->post('PIHAK_KEDUA'));
        $JENIS_PENAGIHAN        = addslashes($this->input->post('JENIS_PENAGIHAN'));
        
        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Data';
            $data['aksi'] = 'aksi_add';
            $this->load->view('admin/vformkontrak',$data);
        } else if ($mau_ke == "edit") {
            $data['qkontrak']   = $this->mkontrak->get_kontrak_byid($idu);
            $data['title'] = 'Edit Data';
            $data['aksi'] = 'aksi_edit';
            $this->load->view('admin/vformkontrak',$data);
        } else if ($mau_ke == "aksi_add") {
            $qkontrak = $this->mkontrak->get_allkontrak();
            $cek=0;
            foreach ($qkontrak as $row) {
                if ($ID_KONTRAK==$row->ID_KONTRAK) {
                    $cek++;
                }
            }
            if ($cek>0) {
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Kontrak dengan no. ".$ID_KONTRAK." sudah ada! </div>");
                redirect(base_url().'admin_kontrak/form/add');
            }else{
                $data = array(
                    'ID_KONTRAK'        => $ID_KONTRAK,
                    'TGL_KONTRAK'       => $TGL_KONTRAK,
                    'PERIHAL'           => $PERIHAL,
                    'PIHAK_KEDUA'       => $PIHAK_KEDUA,
                    'JENIS_PENAGIHAN'   => $JENIS_PENAGIHAN
                );
                $this->mkontrak->get_insert($data);
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
                redirect(base_url().'admin_syarat/detail/'.base64_encode($ID_KONTRAK));
            }
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'ID_KONTRAK'        => $ID_KONTRAK,
                'TGL_KONTRAK'       => $TGL_KONTRAK,
                'PERIHAL'           => $PERIHAL,
                'PIHAK_KEDUA'       => $PIHAK_KEDUA,
                'JENIS_PENAGIHAN'   => $JENIS_PENAGIHAN
            );
            $this->mkontrak->get_update($ID_KONTRAK,$data);
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
            redirect(base_url().'admin_kontrak');
        }
    }

    public function detail($ID_KONTRAK){
        $id=base64_decode($ID_KONTRAK);
        $data['title'] = 'Detail Kontrak';
        $data['qkontrak'] = $this->mkontrak->get_kontrak_byid($id);
        $data['qsyarat'] = $this->msyarat->get_bykontrak($id);
        $data['qupah'] = $this->mupah->get_all($id);
        $data2['qcekdata'] = $this->mcekdata->get_all($id);
        $data2['qkontrak'] = $this->mkontrak->get_kontrak_byid($id);
        $this->load->view('admin/vdetkontrak',$data);
        $this->load->view('admin/vcekdata',$data2);
        
    }
    public function hapus($gid){
        $this->mkontrak->del($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
        redirect(base_url().'admin_kontrak');
    }
    public function search(){
        $ID_KONTRAK = addslashes($this->input->post('ID_KONTRAK'));
        $data['title'] = 'Hasil Pencarian Data Kontrak';
        $data['qkontrak']=$this->mkontrak->search($ID_KONTRAK);
        $this->load->view('admin/vkontrak',$data);
    }
}