<?php
class Muser extends CI_Model {

    var $tabel = 'user';

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

    function get_byid($NIP) {
        $this->db->from($this->tabel);
        $this->db->where('NIP', $NIP);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($NIP,$data) {

        $this->db->where('NIP', $NIP);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del($NIP) {
        $this->db->where('NIP', $NIP);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
}
?>
