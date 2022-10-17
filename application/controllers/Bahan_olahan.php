<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bahan_olahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Bahan_olahan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','bahan_olahan/bahan_olahan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Bahan_olahan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Bahan_olahan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'bahan_olahan_id' => $row->bahan_olahan_id,
		'nama_bahan' => $row->nama_bahan,
		'satuan' => $row->satuan,
		'stok' => $row->stok,
	    );
            $this->template->load('template','bahan_olahan/bahan_olahan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bahan_olahan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bahan_olahan/create_action'),
	    'bahan_olahan_id' => set_value('bahan_olahan_id'),
	    'nama_bahan' => set_value('nama_bahan'),
	    'satuan' => set_value('satuan'),
	    'stok' => set_value('stok'),
	);
        $this->template->load('template','bahan_olahan/bahan_olahan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_bahan' => $this->input->post('nama_bahan',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Bahan_olahan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('bahan_olahan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bahan_olahan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bahan_olahan/update_action'),
		'bahan_olahan_id' => set_value('bahan_olahan_id', $row->bahan_olahan_id),
		'nama_bahan' => set_value('nama_bahan', $row->nama_bahan),
		'satuan' => set_value('satuan', $row->satuan),
		'stok' => set_value('stok', $row->stok),
	    );
            $this->template->load('template','bahan_olahan/bahan_olahan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bahan_olahan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('bahan_olahan_id', TRUE));
        } else {
            $data = array(
		'nama_bahan' => $this->input->post('nama_bahan',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Bahan_olahan_model->update($this->input->post('bahan_olahan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bahan_olahan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bahan_olahan_model->get_by_id($id);

        if ($row) {
            $this->Bahan_olahan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bahan_olahan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bahan_olahan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_bahan', 'nama bahan', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');

	$this->form_validation->set_rules('bahan_olahan_id', 'bahan_olahan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "bahan_olahan.xls";
        $judul = "bahan_olahan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Bahan");
	xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");

	foreach ($this->Bahan_olahan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_bahan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->satuan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=bahan_olahan.doc");

        $data = array(
            'bahan_olahan_data' => $this->Bahan_olahan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('bahan_olahan/bahan_olahan_doc',$data);
    }

}

/* End of file Bahan_olahan.php */
/* Location: ./application/controllers/Bahan_olahan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-15 22:56:28 */
/* http://harviacode.com */