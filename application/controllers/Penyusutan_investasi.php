<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penyusutan_investasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Penyusutan_investasi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','penyusutan_investasi/penyusutan_investasi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Penyusutan_investasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Penyusutan_investasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'penusustan_id' => $row->penusustan_id,
		'nominal' => $row->nominal,
		'tanggal' => $row->tanggal,
		'investasi_id' => $row->investasi_id,
	    );
            $this->template->load('template','penyusutan_investasi/penyusutan_investasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyusutan_investasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penyusutan_investasi/create_action'),
	    'penusustan_id' => set_value('penusustan_id'),
	    'nominal' => set_value('nominal'),
	    'tanggal' => set_value('tanggal'),
	    'investasi_id' => set_value('investasi_id'),
	);
        $this->template->load('template','penyusutan_investasi/penyusutan_investasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nominal' => $this->input->post('nominal',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'investasi_id' => $this->input->post('investasi_id',TRUE),
	    );

            $this->Penyusutan_investasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('penyusutan_investasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penyusutan_investasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penyusutan_investasi/update_action'),
		'penusustan_id' => set_value('penusustan_id', $row->penusustan_id),
		'nominal' => set_value('nominal', $row->nominal),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'investasi_id' => set_value('investasi_id', $row->investasi_id),
	    );
            $this->template->load('template','penyusutan_investasi/penyusutan_investasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyusutan_investasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('penusustan_id', TRUE));
        } else {
            $data = array(
		'nominal' => $this->input->post('nominal',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'investasi_id' => $this->input->post('investasi_id',TRUE),
	    );

            $this->Penyusutan_investasi_model->update($this->input->post('penusustan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penyusutan_investasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penyusutan_investasi_model->get_by_id($id);

        if ($row) {
            $this->Penyusutan_investasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penyusutan_investasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyusutan_investasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('investasi_id', 'investasi id', 'trim|required');

	$this->form_validation->set_rules('penusustan_id', 'penusustan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penyusutan_investasi.xls";
        $judul = "penyusutan_investasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Investasi Id");

	foreach ($this->Penyusutan_investasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nominal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->investasi_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=penyusutan_investasi.doc");

        $data = array(
            'penyusutan_investasi_data' => $this->Penyusutan_investasi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penyusutan_investasi/penyusutan_investasi_doc',$data);
    }

}

/* End of file Penyusutan_investasi.php */
/* Location: ./application/controllers/Penyusutan_investasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-15 16:10:53 */
/* http://harviacode.com */