<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peralatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Peralatan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','peralatan/peralatan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Peralatan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Peralatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'peralatan_id' => $row->peralatan_id,
		'nama_peralatan' => $row->nama_peralatan,
		'stok' => $row->stok,
	    );
            $this->template->load('template','peralatan/peralatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peralatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('peralatan/create_action'),
	    'peralatan_id' => set_value('peralatan_id'),
	    'nama_peralatan' => set_value('nama_peralatan'),
	    'stok' => set_value('stok'),
	);
        $this->template->load('template','peralatan/peralatan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_peralatan' => $this->input->post('nama_peralatan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Peralatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('peralatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Peralatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('peralatan/update_action'),
		'peralatan_id' => set_value('peralatan_id', $row->peralatan_id),
		'nama_peralatan' => set_value('nama_peralatan', $row->nama_peralatan),
		'stok' => set_value('stok', $row->stok),
	    );
            $this->template->load('template','peralatan/peralatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peralatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('peralatan_id', TRUE));
        } else {
            $data = array(
		'nama_peralatan' => $this->input->post('nama_peralatan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Peralatan_model->update($this->input->post('peralatan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peralatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Peralatan_model->get_by_id($id);

        if ($row) {
            $this->Peralatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('peralatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peralatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_peralatan', 'nama peralatan', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');

	$this->form_validation->set_rules('peralatan_id', 'peralatan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "peralatan.xls";
        $judul = "peralatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Peralatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");

	foreach ($this->Peralatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_peralatan);
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
        header("Content-Disposition: attachment;Filename=peralatan.doc");

        $data = array(
            'peralatan_data' => $this->Peralatan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('peralatan/peralatan_doc',$data);
    }

}

/* End of file Peralatan.php */
/* Location: ./application/controllers/Peralatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-16 14:23:56 */
/* http://harviacode.com */