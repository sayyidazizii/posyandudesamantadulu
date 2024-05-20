<?php

class M_imunisasi extends CI_Model
{
    public $table = 'tbl_imunisasi';

    //crud
    public function get_data()
    {
        $this->db->select('tbl_imunisasi.*, tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_balita', 'tbl_balita.id_balita = tbl_imunisasi.id_balita', 'left');
        $this->db->where('tbl_imunisasi.data_state', 0);
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function getbyid($id)
    {
        $this->db->where('id_imunisasi', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_imunisasi', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id, $data)
    {
        $this->db->where('id_imunisasi', $id);
        $this->db->update($this->table, $data);
    }

    public function count()
    {
        $this->db->where('data_state', 0);
        return $this->db->count_all_results($this->table);
    }

    public function getbyBalita($id_balita)
    {
        $this->db->select('tbl_imunisasi.*, tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_balita', 'tbl_balita.id_balita = tbl_imunisasi.id_balita', 'left');
        $this->db->where('tbl_imunisasi.data_state', 0);
        $this->db->where('tbl_imunisasi.id_balita', $id_balita);
        return $this->db->get()->result();
    }
}
