<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Kas_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kas/kas_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kas_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kas_id' => $row->kas_id,
		'nama_kas' => $row->nama_kas,
		'saldo' => $row->saldo,
	    );
            $this->template->load('template','kas/kas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kas/create_action'),
	    'kas_id' => set_value('kas_id'),
	    'nama_kas' => set_value('nama_kas'),
	    'saldo' => set_value('saldo'),
	);
        $this->template->load('template','kas/kas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kas' => $this->input->post('nama_kas',TRUE),
		'saldo' => $this->input->post('saldo',TRUE),
	    );

            $this->Kas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kas/update_action'),
		'kas_id' => set_value('kas_id', $row->kas_id),
		'nama_kas' => set_value('nama_kas', $row->nama_kas),
		'saldo' => set_value('saldo', $row->saldo),
	    );
            $this->template->load('template','kas/kas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kas_id', TRUE));
        } else {
            $data = array(
		'nama_kas' => $this->input->post('nama_kas',TRUE),
		'saldo' => $this->input->post('saldo',TRUE),
	    );

            $this->Kas_model->update($this->input->post('kas_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kas_model->get_by_id($id);

        if ($row) {
            $this->Kas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kas', 'nama kas', 'trim|required');
	$this->form_validation->set_rules('saldo', 'saldo', 'trim|required');

	$this->form_validation->set_rules('kas_id', 'kas_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kas.xls";
        $judul = "kas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kas");
	xlsWriteLabel($tablehead, $kolomhead++, "Saldo");

	foreach ($this->Kas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->saldo);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kas.doc");

        $data = array(
            'kas_data' => $this->Kas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kas/kas_doc',$data);
    }

}

/* End of file Kas.php */
/* Location: ./application/controllers/Kas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-14 20:39:01 */
/* http://harviacode.com */