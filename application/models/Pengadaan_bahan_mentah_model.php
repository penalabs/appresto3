<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengadaan_bahan_mentah_model extends CI_Model
{

    public $table = 'pengadaan_bahan_mentah';
    public $id = 'pengadaan_bahan_mentah_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('pengadaan_bahan_mentah_id,tanggal,jumlah,nama_bahan,full_name as nama_logistik');
        $this->datatables->from('pengadaan_bahan_mentah');
        //add this line for join
        //$this->datatables->join('table2', 'pengadaan_bahan_mentah.field = table2.field');
        $this->datatables->join('tbl_user l', 'l.id_users = pengadaan_bahan_mentah.id_users_logistik');
        $this->datatables->join('bahan_mentah', 'bahan_mentah.bahan_mentah_id = pengadaan_bahan_mentah.bahan_mentah_id');
        $this->datatables->add_column('action', anchor(site_url('pengadaan_bahan_mentah/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('pengadaan_bahan_mentah/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('pengadaan_bahan_mentah/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'pengadaan_bahan_mentah_id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('pengadaan_bahan_mentah_id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('bahan_mentah_id', $q);
	$this->db->or_like('id_users_logistik', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('pengadaan_bahan_mentah_id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('bahan_mentah_id', $q);
	$this->db->or_like('id_users_logistik', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Pengadaan_bahan_mentah_model.php */
/* Location: ./application/models/Pengadaan_bahan_mentah_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-15 22:35:14 */
/* http://harviacode.com */