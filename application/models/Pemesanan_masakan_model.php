<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan_masakan_model extends CI_Model
{

    public $table = 'pemesanan_masakan';
    public $id = 'pemesanan_maakan_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('pemesanan_maakan_id,no_antrian,nama_pembeli,total,dibayar,status,full_name as nama_waiter');
        $this->datatables->from('pemesanan_masakan');
        
        //add this line for join
        //$this->datatables->join('table2', 'pemesanan_masakan.field = table2.field');
        $this->datatables->join('tbl_user', 'tbl_user.id_users = pemesanan_masakan.id_users_waiter');
        $this->datatables->add_column('action', anchor(site_url('pemesanan_masakan/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('pemesanan_masakan/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))."
            ".anchor(site_url('detial_pemesanan_masakan/index/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))."
            ".anchor(site_url('pembayaran_pemesanan/index/$1'),'<i class="fa  fa-money" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))."    
                ".anchor(site_url('pemesanan_masakan/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'pemesanan_maakan_id');
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
        $this->db->like('pemesanan_maakan_id', $q);
	$this->db->or_like('no_antrian', $q);
	$this->db->or_like('nama_pembeli', $q);
	$this->db->or_like('id_users_waiter', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('pemesanan_maakan_id', $q);
	$this->db->or_like('no_antrian', $q);
	$this->db->or_like('nama_pembeli', $q);
	$this->db->or_like('id_users_waiter', $q);
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

/* End of file Pemesanan_masakan_model.php */
/* Location: ./application/models/Pemesanan_masakan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-17 05:58:30 */
/* http://harviacode.com */