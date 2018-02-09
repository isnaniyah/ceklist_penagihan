<?php
class Mkontrak extends CI_Model {

    var $tabel = 'kontrak';

    function __construct() {
        parent::__construct();
    }
	function get_allkontrak() {
        $this->db->from($this->tabel);
		$query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}
    function get_kontrak_byid($ID_KONTRAK) {
        $this->db->from($this->tabel);
        $this->db->where('ID_KONTRAK', $ID_KONTRAK);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }
    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }
    function get_update($ID_KONTRAK,$data) {

        $this->db->where('ID_KONTRAK', $ID_KONTRAK);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del($ID_KONTRAK) {
        $this->db->where('ID_KONTRAK', $ID_KONTRAK);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
    function search($ID_KONTRAK){
        $cari=$this->db->query("select * from kontrak where ID_KONTRAK like '%$ID_KONTRAK%'  ");
        return $cari->result();
    }
}
