<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gaji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Gaji_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','gaji/gaji_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Gaji_model->json();
    }

    public function read($id) 
    {
        $row = $this->Gaji_model->get_by_id($id);
        if ($row) {
            $data = array(
		'gaji_id' => $row->gaji_id,
		'tanggal' => $row->tanggal,
		'nominal' => $row->nominal,
		'kas_id' => $row->kas_id,
	    );
            $this->template->load('template','gaji/gaji_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gaji'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('gaji/create_action'),
	    'gaji_id' => set_value('gaji_id'),
	    'tanggal' => set_value('tanggal'),
	    'nominal' => set_value('nominal'),
	    'kas_id' => set_value('kas_id'),
	);
        $this->template->load('template','gaji/gaji_form', $data);
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
		'kas_id' => $this->input->post('kas_id',TRUE),
	    );

            $this->Gaji_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('gaji'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gaji_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('gaji/update_action'),
		'gaji_id' => set_value('gaji_id', $row->gaji_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'nominal' => set_value('nominal', $row->nominal),
		'kas_id' => set_value('kas_id', $row->kas_id),
	    );
            $this->template->load('template','gaji/gaji_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gaji'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('gaji_id', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'kas_id' => $this->input->post('kas_id',TRUE),
	    );

            $this->Gaji_model->update($this->input->post('gaji_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('gaji'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Gaji_model->get_by_id($id);

        if ($row) {
            $this->Gaji_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gaji'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gaji'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('kas_id', 'kas id', 'trim|required');

	$this->form_validation->set_rules('gaji_id', 'gaji_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "gaji.xls";
        $judul = "gaji";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kas Id");

	foreach ($this->Gaji_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nominal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kas_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=gaji.doc");

        $data = array(
            'gaji_data' => $this->Gaji_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('gaji/gaji_doc',$data);
    }

}

/* End of file Gaji.php */
/* Location: ./application/controllers/Gaji.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-25 18:34:48 */
/* http://harviacode.com */