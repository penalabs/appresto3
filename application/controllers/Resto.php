<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Resto_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','resto/resto_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Resto_model->json();
    }

    public function read($id) 
    {
        $row = $this->Resto_model->get_by_id($id);
        if ($row) {
            $data = array(
		'resto_id' => $row->resto_id,
		'nama_resto' => $row->nama_resto,
		'alamat_resto' => $row->alamat_resto,
		'telp_resto' => $row->telp_resto,
		'kanwil_id' => $row->kanwil_id,
	    );
            $this->template->load('template','resto/resto_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resto'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('resto/create_action'),
	    'resto_id' => set_value('resto_id'),
	    'nama_resto' => set_value('nama_resto'),
	    'alamat_resto' => set_value('alamat_resto'),
	    'telp_resto' => set_value('telp_resto'),
	    'kanwil_id' => set_value('kanwil_id'),
	);
        $this->template->load('template','resto/resto_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_resto' => $this->input->post('nama_resto',TRUE),
		'alamat_resto' => $this->input->post('alamat_resto',TRUE),
		'telp_resto' => $this->input->post('telp_resto',TRUE),
		'kanwil_id' => $this->input->post('kanwil_id',TRUE),
	    );

            $this->Resto_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('resto'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Resto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('resto/update_action'),
		'resto_id' => set_value('resto_id', $row->resto_id),
		'nama_resto' => set_value('nama_resto', $row->nama_resto),
		'alamat_resto' => set_value('alamat_resto', $row->alamat_resto),
		'telp_resto' => set_value('telp_resto', $row->telp_resto),
		'kanwil_id' => set_value('kanwil_id', $row->kanwil_id),
	    );
            $this->template->load('template','resto/resto_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resto'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('resto_id', TRUE));
        } else {
            $data = array(
		'nama_resto' => $this->input->post('nama_resto',TRUE),
		'alamat_resto' => $this->input->post('alamat_resto',TRUE),
		'telp_resto' => $this->input->post('telp_resto',TRUE),
		'kanwil_id' => $this->input->post('kanwil_id',TRUE),
	    );

            $this->Resto_model->update($this->input->post('resto_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('resto'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Resto_model->get_by_id($id);

        if ($row) {
            $this->Resto_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('resto'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resto'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_resto', 'nama resto', 'trim|required');
	$this->form_validation->set_rules('alamat_resto', 'alamat resto', 'trim|required');
	$this->form_validation->set_rules('telp_resto', 'telp resto', 'trim|required');
	$this->form_validation->set_rules('kanwil_id', 'kanwil id', 'trim|required');

	$this->form_validation->set_rules('resto_id', 'resto_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "resto.xls";
        $judul = "resto";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Resto");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Resto");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp Resto");
	xlsWriteLabel($tablehead, $kolomhead++, "Kanwil Id");

	foreach ($this->Resto_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_resto);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_resto);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp_resto);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kanwil_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=resto.doc");

        $data = array(
            'resto_data' => $this->Resto_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('resto/resto_doc',$data);
    }

}

/* End of file Resto.php */
/* Location: ./application/controllers/Resto.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-25 10:03:47 */
/* http://harviacode.com */