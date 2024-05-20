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
        $this->db->where('id_kematian', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id, $data)
    {
        $this->db->where('id_kematian', $id);
        $this->db->update($this->table, $data);
    }

    public function count()
    {
        $this->db->where('data_state', 0);
        return $this->db->count_all_results($this->table);
    }

    public function print($id_balita)
    {
        $this->db->where('id_balita', $id_balita);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getdatabyid($id_balita)
    {
        $this->db->select('tbl_kematian.*, tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_balita', 'tbl_balita.id_balita = tbl_kematian.id_balita');
        $this->db->where('tbl_kematian.id_balita', $id_balita);
        $this->db->where('tbl_kematian.data_state', 0);
        return $this->db->get()->row();
    }
}
