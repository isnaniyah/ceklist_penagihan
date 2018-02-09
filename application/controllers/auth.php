<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->helper('form','url');
    }
	public function index()
	{
        if ($this->session->userdata('NIP')!='') {
			if ($this->session->userdata('HAK_AKSES')=='Admin'){
				redirect(base_url().'home/admin');
			}elseif ($this->session->userdata('HAK_AKSES')=='Petugas Ceklist'){
				redirect(base_url().'home/petugas');
			}elseif ($this->session->userdata('HAK_AKSES')=='Pengawas'){
				redirect(base_url().'home/pengawas');
			}       	
        }else{
			$this->load->view('login');
		}
	}

	public function cek_login()
	{
		$data = array('NIP' => $this->input->post('NIP'), 
					  'PASSWORD' => md5($this->input->post('PASSWORD'))
					  );
		$hasil = $this->mlogin->cek_user($data);
		if ($hasil->num_rows() == 1){
			foreach($hasil->result() as $sess)
            {
              $sess_data['logged_in'] = 'Sudah Login';
              $sess_data['NIP'] = $sess->NIP;
              $sess_data['HAK_AKSES'] = $sess->HAK_AKSES;
              $this->session->set_userdata($sess_data);
            }
			if ($this->session->userdata('HAK_AKSES')=='Admin'){
				redirect(base_url().'home/admin');
			}elseif ($this->session->userdata('HAK_AKSES')=='Petugas Ceklist'){
				redirect(base_url().'home/petugas');
			}elseif ($this->session->userdata('HAK_AKSES')=='Pengawas'){
				redirect(base_url().'home/pengawas');
			}
		}
		else
		{
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> NIP dan Password yang anda masukkan tidak terdaftar! </div>");
			redirect(base_url());
		}
		
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	} 

}