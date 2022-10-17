<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengembalian_kas_investor_model extends CI_Model
{

    public $table = 'pengembalian_kas_investor';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,tanggal,nominal,s.full_name as nama_superadmin,o.full_name as nama_investor,nama_kas');
        $this->datatables->from('pengembalian_kas_investor');
        //add this line for join
        //$this->datatables->join('table2', 'pengembalian_kas_investor.field = table2.field');
        $this->datatables->join('tbl_user s', 'pengembalian_kas_investor.id_users = s.id_users');
        $this->datatables->join('tbl_user o', 'pengembalian_kas_investor.investor_id = o.id_users');
        $this->datatables->join('kas', 'pengembalian_kas_investor.kas_id = kas.kas_id');
        $this->datatables->add_column('action', anchor(site_url('pengembalian_kas_investor/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('pengembalian_kas_investor/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('pengembalian_kas_investor/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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
        $this->db->like('id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('id_users', $q);
	$this->db->or_like('investor_id', $q);
	$this->db->or_like('kas_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('id_users', $q);
	$this->db->or_like('investor_id', $q);
	$this->db->or_like('kas_id', $q);
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

/* End of file Pengembalian_kas_investor_model.php */
/* Location: ./application/models/Pengembalian_kas_investor_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-16 22:51:29 */
/* http://harviacode.com */