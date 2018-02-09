<?php
class Mceklist extends CI_Model {

    var $tabel = 'ceklist';
    function __construct() {
        parent::__construct();
    }
	function get_all($ID_DATA_CEKLIST) {
        $this->db->from($this->tabel);
        $this->db->where('ID_DATA_CEKLIST', $ID_DATA_CEKLIST);
		$query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}
    function get_syarat_edit_ceklist($ID_CEKLIST) {
        $this->db->select('*');
        $this->db->from('ceklist');
        $this->db->join('syarat_pembayaran', 'ceklist.ID_SYARAT = syarat_pembayaran.ID_SYARAT');
        $this->db->where('ID_CEKLIST', $ID_CEKLIST);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_syaratceklist($ID_DATA_CEKLIST) {
        $this->db->select('*');
        $this->db->from('ceklist');
        $this->db->join('syarat_pembayaran', 'ceklist.ID_SYARAT = syarat_pembayaran.ID_SYARAT');
        $this->db->where('ID_DATA_CEKLIST', $ID_DATA_CEKLIST);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_syarat($ID_KONTRAK, $ID_DATA_CEKLIST) {
        $this->db->select('*');
        $this->db->from('syarat_pembayaran');
        $this->db->join('data_ceklist', 'data_ceklist.ID_KONTRAK = syarat_pembayaran.ID_KONTRAK');
        $this->db->where('ID_DATA_CEKLIST', $ID_DATA_CEKLIST);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_kontrak($ID_DATA_CEKLIST) {
        $this->db->select('*');
        $this->db->from('data_ceklist');
        $this->db->where('ID_DATA_CEKLIST', $ID_DATA_CEKLIST);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_byid($ID_CEKLIST) {
        $this->db->from($this->tabel);
        $this->db->where('ID_CEKLIST', $ID_CEKLIST);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }
    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($ID_CEKLIST,$data) {

        $this->db->where('ID_CEKLIST', $ID_CEKLIST);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del($ID_CEKLIST) {
        $this->db->where('ID_CEKLIST', $ID_CEKLIST);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
}
?>
