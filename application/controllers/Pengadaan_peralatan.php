<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengadaan_peralatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Pengadaan_peralatan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pengadaan_peralatan/pengadaan_peralatan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pengadaan_peralatan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pengadaan_peralatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pengadaan_peralatan_id' => $row->pengadaan_peralatan_id,
		'peralatan_id' => $row->peralatan_id,
		'tanggal' => $row->tanggal,
		'harga' => $row->harga,
		'id_users_logistik' => $row->id_users_logistik,
	    );
            $this->template->load('template','pengadaan_peralatan/pengadaan_peralatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaan_peralatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengadaan_peralatan/create_action'),
	    'pengadaan_peralatan_id' => set_value('pengadaan_peralatan_id'),
	    'peralatan_id' => set_value('peralatan_id'),
	    'tanggal' => set_value('tanggal'),
	    'harga' => set_value('harga'),
	    'id_users_logistik' => set_value('id_users_logistik'),
	);
        $this->template->load('template','pengadaan_peralatan/pengadaan_peralatan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'peralatan_id' => $this->input->post('peralatan_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'id_users_logistik' => $this->input->post('id_users_logistik',TRUE),
	    );

            $this->Pengadaan_peralatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pengadaan_peralatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengadaan_peralatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengadaan_peralatan/update_action'),
		'pengadaan_peralatan_id' => set_value('pengadaan_peralatan_id', $row->pengadaan_peralatan_id),
		'peralatan_id' => set_value('peralatan_id', $row->peralatan_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'harga' => set_value('harga', $row->harga),
		'id_users_logistik' => set_value('id_users_logistik', $row->id_users_logistik),
	    );
            $this->template->load('template','pengadaan_peralatan/pengadaan_peralatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaan_peralatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pengadaan_peralatan_id', TRUE));
        } else {
            $data = array(
		'peralatan_id' => $this->input->post('peralatan_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'id_users_logistik' => $this->input->post('id_users_logistik',TRUE),
	    );

            $this->Pengadaan_peralatan_model->update($this->input->post('pengadaan_peralatan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengadaan_peralatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengadaan_peralatan_model->get_by_id($id);

        if ($row) {
            $this->Pengadaan_peralatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengadaan_peralatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaan_peralatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('peralatan_id', 'peralatan id', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('id_users_logistik', 'id users logistik', 'trim|required');

	$this->form_validation->set_rules('pengadaan_peralatan_id', 'pengadaan_peralatan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pengadaan_peralatan.xls";
        $judul = "pengadaan_peralatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Peralatan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Logistik");

	foreach ($this->Pengadaan_peralatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->peralatan_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_logistik);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pengadaan_peralatan.doc");

        $data = array(
            'pengadaan_peralatan_data' => $this->Pengadaan_peralatan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pengadaan_peralatan/pengadaan_peralatan_doc',$data);
    }

}

/* End of file Pengadaan_peralatan.php */
/* Location: ./application/controllers/Pengadaan_peralatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-16 14:20:51 */
/* http://harviacode.com */