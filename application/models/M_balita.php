<?php

class M_balita extends CI_Model
{
    public $table = 'tbl_balita';

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
        $this->db->where('id_balita', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function getbynib($nib)
    {
        $this->db->where('nib', $nib);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_balita', $id);
        $this->db->update($this->table, $data);
    }

    // public function delete($id, $data)
    // {
    //     $this->db->where('id_balita', $id);
    //     $this->db->update($this->table, $data);
    // }

    public function delete($id)
    {
        $this->db->where('id_balita', $id);
        $this->db->delete($this->table);
    }
    function latest()
    {
        $this->db->select('tbl_balita.*');
        $this->db->from($this->table);
        $this->db->order_by('tbl_balita.id_balita', 'DESC');
        return $this->db->get()->row();
    }

    public function count()
    {
        $this->db->where('data_state', 0);
        return $this->db->count_all_results($this->table);
    }

    public function print($id_balita)
    {

        $this->db->select('tbl_penimbangan.*, tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_penimbangan', 'tbl_balita.id_balita = tbl_penimbangan.id_balita');
        $this->db->where('tbl_balita.id_balita', $id_balita);
        $this->db->where('tbl_penimbangan.data_state', 0);
        return $this->db->get()->result();
    }

    public function view($id_balita)
    {

        $this->db->select('tbl_penimbangan.*, tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_penimbangan', 'tbl_balita.id_balita = tbl_penimbangan.id_balita');
        $this->db->where('tbl_balita.id_balita', $id_balita);
        $this->db->where('tbl_penimbangan.data_state', 0);
        $this->db->limit(1);
        return $this->db->get()->result();
    }


    public function all_rekap_penimbangan($start_date, $end_date)
    {
        $this->db->select('tbl_penimbangan.*, tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_penimbangan', 'tbl_balita.id_balita = tbl_penimbangan.id_balita');
        $this->db->where('tbl_penimbangan.tgl_penimbangan >=', $start_date);
        $this->db->where('tbl_penimbangan.tgl_penimbangan <=', $end_date);
        $this->db->where('tbl_balita.data_state', 0);
        return $this->db->get()->result();
    }


    public function get_all_rekap_penimbangan()
    {
        $this->db->select('tbl_penimbangan.*,tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_penimbangan', 'tbl_balita.id_balita = tbl_penimbangan.id_balita');
        $this->db->where('tbl_balita.data_state', 0);
        return $this->db->get()->result();
    }

    public function all_rekap_imunisasi($start_date, $end_date)
    {
        $this->db->select('tbl_imunisasi.*, tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_imunisasi', 'tbl_balita.id_balita = tbl_imunisasi.id_balita');
        $this->db->where('tbl_imunisasi.tgl_imunisasi >=', $start_date);
        $this->db->where('tbl_imunisasi.tgl_imunisasi <=', $end_date);
        $this->db->where('tbl_balita.data_state', 0);
        return $this->db->get()->result();
    }


    public function get_all_rekap_imunisasi()
    {
        $this->db->select('tbl_imunisasi.*, tbl_balita.*');
        $this->db->from($this->table);
        $this->db->join('tbl_imunisasi', 'tbl_balita.id_balita = tbl_imunisasi.id_balita');
        $this->db->where('tbl_balita.data_state', 0);
        return $this->db->get()->result();
    }
}
