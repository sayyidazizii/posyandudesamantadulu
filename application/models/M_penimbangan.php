<?php

class M_penimbangan extends CI_Model
{
    public $table = 'tbl_penimbangan';

    //crud
    public function get_data()
    {
        $this->db->select('tbl_penimbangan.*, tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_balita', 'tbl_balita.id_balita = tbl_penimbangan.id_balita', 'left');
        $this->db->where('tbl_penimbangan.data_state', 0);
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function getbyid($id)
    {
        $this->db->where('id_timbangan', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_timbangan', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id, $data)
    {
        $this->db->where('id_timbangan', $id);
        $this->db->update($this->table, $data);
    }
}
