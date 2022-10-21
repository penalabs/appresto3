<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produksi_detial_pemesanan_masakan_model extends CI_Model
{

    public $table = 'detial_pemesanan_masakan';
    public $id = 'detail_pemesanan_masakan_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('produksi_masakan.detail_pemesanan_masakan_id,pemesanan_masakan_id,detial_pemesanan_masakan.menu_masakan_id
        ,detial_pemesanan_masakan.tanggal,detial_pemesanan_masakan.harga,jumlah_pesan,subtotal,detial_pemesanan_masakan.status');
        $this->datatables->from('detial_pemesanan_masakan');
        //add this line for join
        //$this->datatables->join('table2', 'detial_pemesanan_masakan.field = table2.field');
        $this->datatables->join('menu_masakan', 'detial_pemesanan_masakan.menu_masakan_id = menu_masakan.menu_masakan_id');
        $this->datatables->join('produksi_masakan', 'detial_pemesanan_masakan.detail_pemesanan_masakan_id = produksi_masakan.detail_pemesanan_masakan_id');
        $this->datatables->add_column('action', anchor(site_url('produksi_detial_pemesanan_masakan/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('produksi_detial_pemesanan_masakan/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('produksi_detial_pemesanan_masakan/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'detail_pemesanan_masakan_id');
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
        $this->db->like('detail_pemesanan_masakan_id', $q);
	$this->db->or_like('pemesanan_masakan_id', $q);
	$this->db->or_like('menu_masakan_id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('jumlah_pesan', $q);
	$this->db->or_like('subtotal', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('detail_pemesanan_masakan_id', $q);
	$this->db->or_like('pemesanan_masakan_id', $q);
	$this->db->or_like('menu_masakan_id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('jumlah_pesan', $q);
	$this->db->or_like('subtotal', $q);
	$this->db->or_like('status', $q);
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

/* End of file Produksi_detial_pemesanan_masakan_model.php */
/* Location: ./application/models/Produksi_detial_pemesanan_masakan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-21 18:22:18 */
/* http://harviacode.com */