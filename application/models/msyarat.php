<?php
class Msyarat extends CI_Model {

    var $tabel = 'syarat_pembayaran';

    function __construct() {
        parent::__construct();
    }
	function get_all() {
        $this->db->from($this->tabel);
		$query = $this->db->get();

        if ($query->num_rows() > 0) {
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

    function get_byid($ID_SYARAT) {
        $this->db->from($this->tabel);
        $this->db->where('ID_SYARAT', $ID_SYARAT);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($ID_SYARAT,$data) {

        $this->db->where('ID_SYARAT', $ID_SYARAT);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del($ID_SYARAT) {
        $this->db->where('ID_SYARAT', $ID_SYARAT);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
}
?>
