<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran_pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Pembayaran_pemesanan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pembayaran_pemesanan/pembayaran_pemesanan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pembayaran_pemesanan_model->json();
    }

    public function get_data_pemesanan(){
        $no_antrian=$this->input->post('no_antrian',TRUE);
        $sql="Select * from pemesanan_masakan where no_antrian='$no_antrian' AND status='belum dibayar'";    
        $query = $this->db->query($sql);
        $hasil=$query->row_array();
        echo json_encode($hasil);

       
    }

    public function read($id) 
    {
        $row = $this->Pembayaran_pemesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pembayaran_pemesanan_id' => $row->pembayaran_pemesanan_id,
		'tanggal' => $row->tanggal,
		'nominal' => $row->nominal,
		'pemesanan_masakan_id' => $row->pemesanan_masakan_id,
		'id_users_kasir' => $row->id_users_kasir,
	    );
            $this->template->load('template','pembayaran_pemesanan/pembayaran_pemesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran_pemesanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran_pemesanan/create_action'),
	    'pembayaran_pemesanan_id' => set_value('pembayaran_pemesanan_id'),
	    'tanggal' => set_value('tanggal'),
	    'nominal' => set_value('nominal'),
	    'pemesanan_masakan_id' => set_value('pemesanan_masakan_id'),
	    'id_users_kasir' => set_value('id_users_kasir'),
	);
        $this->template->load('template','pembayaran_pemesanan/pembayaran_pemesanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'pemesanan_masakan_id' => $this->input->post('pemesanan_masakan_id',TRUE),
		'id_users_kasir' => $this->input->post('id_users_kasir',TRUE),
	    );

            $this->Pembayaran_pemesanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pembayaran_pemesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembayaran_pemesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran_pemesanan/update_action'),
		'pembayaran_pemesanan_id' => set_value('pembayaran_pemesanan_id', $row->pembayaran_pemesanan_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'nominal' => set_value('nominal', $row->nominal),
		'pemesanan_masakan_id' => set_value('pemesanan_masakan_id', $row->pemesanan_masakan_id),
		'id_users_kasir' => set_value('id_users_kasir', $row->id_users_kasir),
	    );
            $this->template->load('template','pembayaran_pemesanan/pembayaran_pemesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran_pemesanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pembayaran_pemesanan_id', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'pemesanan_masakan_id' => $this->input->post('pemesanan_masakan_id',TRUE),
		'id_users_kasir' => $this->input->post('id_users_kasir',TRUE),
	    );

            $this->Pembayaran_pemesanan_model->update($this->input->post('pembayaran_pemesanan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembayaran_pemesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembayaran_pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_pemesanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembayaran_pemesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran_pemesanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('pemesanan_masakan_id', 'pemesanan masakan id', 'trim|required');
	$this->form_validation->set_rules('id_users_kasir', 'id users kasir', 'trim|required');

	$this->form_validation->set_rules('pembayaran_pemesanan_id', 'pembayaran_pemesanan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pembayaran_pemesanan.xls";
        $judul = "pembayaran_pemesanan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
	xlsWriteLabel($tablehead, $kolomhead++, "Pemesanan Masakan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Kasir");

	foreach ($this->Pembayaran_pemesanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nominal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pemesanan_masakan_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_kasir);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pembayaran_pemesanan.doc");

        $data = array(
            'pembayaran_pemesanan_data' => $this->Pembayaran_pemesanan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pembayaran_pemesanan/pembayaran_pemesanan_doc',$data);
    }

}

/* End of file Pembayaran_pemesanan.php */
/* Location: ./application/controllers/Pembayaran_pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-21 17:29:04 */
/* http://harviacode.com */