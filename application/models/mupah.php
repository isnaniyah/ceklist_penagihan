<?php
class Mupah extends CI_Model {

    var $tabel = 'upah_pekerja';

    function __construct() {
        parent::__construct();
    }
	function get_all($ID_KONTRAK) {
        $this->db->select('*');
        $this->db->from('upah_pekerja');
        $this->db->where('upah_pekerja.ID_KONTRAK', $ID_KONTRAK);
		$query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}
    function get_all_idupah($ID_UPAH) {
        $this->db->select('*');
        $this->db->from('upah_pekerja');
        $this->db->where('upah_pekerja.ID_UPAH', $ID_UPAH);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function get_bykontrak($ID_KONTRAK) {
        $this->db->from($this->tabel);
        $this->db->where('ID_KONTRAK', $ID_KONTRAK);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_byid($ID_UPAH) {
        $this->db->from($this->tabel);
        $this->db->where('ID_UPAH', $ID_UPAH);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_insert_bpjs($data){
       $this->db->insert('bpjs', $data);
       return TRUE;
    }

    function get_update($ID_UPAH,$data) {

        $this->db->where('ID_UPAH', $ID_UPAH);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }

    function del($ID_UPAH) {
        $this->db->where('ID_UPAH', $ID_UPAH);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
}
?>
