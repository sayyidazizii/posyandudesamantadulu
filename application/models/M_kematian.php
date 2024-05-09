<?php

class M_kematian extends CI_Model
{
    public $table = 'tbl_kematian';

    //crud
    public function get_data()
    {
        $this->db->where('data_state', 0);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function getbyid($id)
    {
        $this->db->where('id_kematian', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('nib', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id, $data)
    {
        $this->db->where('id_kematian', $id);
        $this->db->update($this->table, $data);
    }
}
