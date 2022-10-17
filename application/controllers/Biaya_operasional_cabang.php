<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_operasional_cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Biaya_operasional_cabang_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','biaya_operasional_cabang/biaya_operasional_cabang_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Biaya_operasional_cabang_model->json();
    }

    public function read($id) 
    {
        $row = $this->Biaya_operasional_cabang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'biaya_operasional_id' => $row->biaya_operasional_id,
		'nama_operasional' => $row->nama_operasional,
		'tanggal' => $row->tanggal,
		'nominal' => $row->nominal,
		'id_users_bendahara' => $row->id_users_bendahara,
		'resto_id' => $row->resto_id,
		'kas_id' => $row->kas_id,
	    );
            $this->template->load('template','biaya_operasional_cabang/biaya_operasional_cabang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biaya_operasional_cabang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('biaya_operasional_cabang/create_action'),
	    'biaya_operasional_id' => set_value('biaya_operasional_id'),
	    'nama_operasional' => set_value('nama_operasional'),
	    'tanggal' => set_value('tanggal'),
	    'nominal' => set_value('nominal'),
	    'id_users_bendahara' => set_value('id_users_bendahara'),
	    'resto_id' => set_value('resto_id'),
	    'kas_id' => set_value('kas_id'),
	);
        $this->template->load('template','biaya_operasional_cabang/biaya_operasional_cabang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_operasional' => $this->input->post('nama_operasional',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'id_users_bendahara' => $this->input->post('id_users_bendahara',TRUE),
		'resto_id' => $this->input->post('resto_id',TRUE),
		'kas_id' => $this->input->post('kas_id',TRUE),
	    );

            $this->Biaya_operasional_cabang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('biaya_operasional_cabang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Biaya_operasional_cabang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('biaya_operasional_cabang/update_action'),
		'biaya_operasional_id' => set_value('biaya_operasional_id', $row->biaya_operasional_id),
		'nama_operasional' => set_value('nama_operasional', $row->nama_operasional),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'nominal' => set_value('nominal', $row->nominal),
		'id_users_bendahara' => set_value('id_users_bendahara', $row->id_users_bendahara),
		'resto_id' => set_value('resto_id', $row->resto_id),
		'kas_id' => set_value('kas_id', $row->kas_id),
	    );
            $this->template->load('template','biaya_operasional_cabang/biaya_operasional_cabang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biaya_operasional_cabang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('biaya_operasional_id', TRUE));
        } else {
            $data = array(
		'nama_operasional' => $this->input->post('nama_operasional',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'id_users_bendahara' => $this->input->post('id_users_bendahara',TRUE),
		'resto_id' => $this->input->post('resto_id',TRUE),
		'kas_id' => $this->input->post('kas_id',TRUE),
	    );

            $this->Biaya_operasional_cabang_model->update($this->input->post('biaya_operasional_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('biaya_operasional_cabang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Biaya_operasional_cabang_model->get_by_id($id);

        if ($row) {
            $this->Biaya_operasional_cabang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('biaya_operasional_cabang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biaya_operasional_cabang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_operasional', 'nama operasional', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('id_users_bendahara', 'id users bendahara', 'trim|required');
	$this->form_validation->set_rules('resto_id', 'resto id', 'trim|required');
	$this->form_validation->set_rules('kas_id', 'kas id', 'trim|required');

	$this->form_validation->set_rules('biaya_operasional_id', 'biaya_operasional_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "biaya_operasional_cabang.xls";
        $judul = "biaya_operasional_cabang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Operasional");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Bendahara");
	xlsWriteLabel($tablehead, $kolomhead++, "Resto Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Kas Id");

	foreach ($this->Biaya_operasional_cabang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_operasional);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nominal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_bendahara);
	    xlsWriteNumber($tablebody, $kolombody++, $data->resto_id);
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
        header("Content-Disposition: attachment;Filename=biaya_operasional_cabang.doc");

        $data = array(
            'biaya_operasional_cabang_data' => $this->Biaya_operasional_cabang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('biaya_operasional_cabang/biaya_operasional_cabang_doc',$data);
    }

}

/* End of file Biaya_operasional_cabang.php */
/* Location: ./application/controllers/Biaya_operasional_cabang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-15 11:35:42 */
/* http://harviacode.com */