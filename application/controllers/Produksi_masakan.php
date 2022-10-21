<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produksi_masakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Produksi_masakan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','produksi_masakan/produksi_masakan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produksi_masakan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Produksi_masakan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'produksi_masakan_id' => $row->produksi_masakan_id,
		'tanggal' => $row->tanggal,
		'bahan_olahan_id' => $row->bahan_olahan_id,
		'jumlah_bahan' => $row->jumlah_bahan,
		'detail_pemesanan_masakan_id' => $row->detail_pemesanan_masakan_id,
		'status' => $row->status,
	    );
            $this->template->load('template','produksi_masakan/produksi_masakan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi_masakan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produksi_masakan/create_action'),
	    'produksi_masakan_id' => set_value('produksi_masakan_id'),
	    'tanggal' => set_value('tanggal'),
	    'bahan_olahan_id' => set_value('bahan_olahan_id'),
	    'jumlah_bahan' => set_value('jumlah_bahan'),
	    'detail_pemesanan_masakan_id' => set_value('detail_pemesanan_masakan_id'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','produksi_masakan/produksi_masakan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'bahan_olahan_id' => $this->input->post('bahan_olahan_id',TRUE),
		'jumlah_bahan' => $this->input->post('jumlah_bahan',TRUE),
		'detail_pemesanan_masakan_id' => $this->input->post('detail_pemesanan_masakan_id',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Produksi_masakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('produksi_masakan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produksi_masakan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produksi_masakan/update_action'),
		'produksi_masakan_id' => set_value('produksi_masakan_id', $row->produksi_masakan_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'bahan_olahan_id' => set_value('bahan_olahan_id', $row->bahan_olahan_id),
		'jumlah_bahan' => set_value('jumlah_bahan', $row->jumlah_bahan),
		'detail_pemesanan_masakan_id' => set_value('detail_pemesanan_masakan_id', $row->detail_pemesanan_masakan_id),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','produksi_masakan/produksi_masakan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi_masakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('produksi_masakan_id', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'bahan_olahan_id' => $this->input->post('bahan_olahan_id',TRUE),
		'jumlah_bahan' => $this->input->post('jumlah_bahan',TRUE),
		'detail_pemesanan_masakan_id' => $this->input->post('detail_pemesanan_masakan_id',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Produksi_masakan_model->update($this->input->post('produksi_masakan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produksi_masakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produksi_masakan_model->get_by_id($id);

        if ($row) {
            $this->Produksi_masakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produksi_masakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi_masakan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('bahan_olahan_id', 'bahan olahan id', 'trim|required');
	$this->form_validation->set_rules('jumlah_bahan', 'jumlah bahan', 'trim|required');
	$this->form_validation->set_rules('detail_pemesanan_masakan_id', 'detail pemesanan masakan id', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('produksi_masakan_id', 'produksi_masakan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "produksi_masakan.xls";
        $judul = "produksi_masakan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Bahan Olahan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Bahan");
	xlsWriteLabel($tablehead, $kolomhead++, "Detail Pemesanan Masakan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Produksi_masakan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bahan_olahan_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_bahan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->detail_pemesanan_masakan_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=produksi_masakan.doc");

        $data = array(
            'produksi_masakan_data' => $this->Produksi_masakan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('produksi_masakan/produksi_masakan_doc',$data);
    }

}

/* End of file Produksi_masakan.php */
/* Location: ./application/controllers/Produksi_masakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-21 18:09:03 */
/* http://harviacode.com */