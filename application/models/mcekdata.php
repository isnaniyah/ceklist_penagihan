<?php
class Mcekdata extends CI_Model {

    var $tabel = 'data_ceklist';

    function __construct() {
        parent::__construct();
    }
	function get_all($ID_KONTRAK) {
        $this->db->from($this->tabel);
        $this->db->where('ID_KONTRAK', $ID_KONTRAK);
		$query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}

    function get_byid($ID_DATA_CEKLIST) {
        $this->db->from($this->tabel);
        $this->db->where('ID_DATA_CEKLIST', $ID_DATA_CEKLIST);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($ID_DATA_CEKLIST,$data) {

        $this->db->where('ID_DATA_CEKLIST', $ID_DATA_CEKLIST);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del($ID_DATA_CEKLIST) {
        $this->db->where('ID_DATA_CEKLIST', $ID_DATA_CEKLIST);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
}
?>
