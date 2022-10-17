<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengadaan_peralatan_model extends CI_Model
{

    public $table = 'pengadaan_peralatan';
    public $id = 'pengadaan_peralatan_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('pengadaan_peralatan_id,nama_peralatan,tanggal,harga,full_name as nama_logistik');
        $this->datatables->from('pengadaan_peralatan');
        //add this line for join
        //$this->datatables->join('table2', 'pengadaan_peralatan.field = table2.field');
        $this->datatables->join('tbl_user l', 'l.id_users = pengadaan_peralatan.id_users_logistik');
        $this->datatables->join('peralatan', 'peralatan.peralatan_id = pengadaan_peralatan.peralatan_id');
        $this->datatables->add_column('action', anchor(site_url('pengadaan_peralatan/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('pengadaan_peralatan/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('pengadaan_peralatan/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'pengadaan_peralatan_id');
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
        $this->db->like('pengadaan_peralatan_id', $q);
	$this->db->or_like('peralatan_id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('id_users_logistik', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('pengadaan_peralatan_id', $q);
	$this->db->or_like('peralatan_id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('harga', $q);
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

/* End of file Pengadaan_peralatan_model.php */
/* Location: ./application/models/Pengadaan_peralatan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-16 14:20:51 */
/* http://harviacode.com */