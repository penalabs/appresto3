<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemberian_biaya_operasional_cabang_model extends CI_Model
{

    public $table = 'biaya_operasional_cabang';
    public $id = 'biaya_operasional_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('biaya_operasional_id,catatan_biaya,tanggal,nominal,b.full_name as nama_bendahara,a.full_name as nama_adminresto,nama_resto,nama_kas,status');
        $this->datatables->from('biaya_operasional_cabang');
        //add this line for join
        //$this->datatables->join('table2', 'biaya_operasional_cabang.field = table2.field');
        $this->datatables->join('tbl_user b', 'b.id_users = biaya_operasional_cabang.id_users_adminresto');
        $this->datatables->join('tbl_user a', 'a.id_users = biaya_operasional_cabang.id_users_bendahara');
        $this->datatables->join('kas', 'kas.kas_id = biaya_operasional_cabang.kas_id');
        $this->datatables->join('resto', 'resto.resto_id = biaya_operasional_cabang.resto_id');

        $this->datatables->add_column('action', anchor(site_url('pemberian_biaya_operasional_cabang/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('pemberian_biaya_operasional_cabang/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('pemberian_biaya_operasional_cabang/status_diberikan/$1'),'<i class="fa  fa-check" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm'))." 
            ".anchor(site_url('pemberian_biaya_operasional_cabang/status_belum_diberikan/$1'),'<i class="fa fa-close" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm'))."  
            ".anchor(site_url('pemberian_biaya_operasional_cabang/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'biaya_operasional_id');
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
        $this->db->like('biaya_operasional_id', $q);
	$this->db->or_like('catatan_biaya', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('id_users_bendahara', $q);
	$this->db->or_like('id_users_adminresto', $q);
	$this->db->or_like('resto_id', $q);
	$this->db->or_like('kas_id', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('biaya_operasional_id', $q);
	$this->db->or_like('catatan_biaya', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('id_users_bendahara', $q);
	$this->db->or_like('id_users_adminresto', $q);
	$this->db->or_like('resto_id', $q);
	$this->db->or_like('kas_id', $q);
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

/* End of file Pemberian_biaya_operasional_cabang_model.php */
/* Location: ./application/models/Pemberian_biaya_operasional_cabang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-16 18:05:37 */
/* http://harviacode.com */