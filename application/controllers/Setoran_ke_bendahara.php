<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoran_ke_bendahara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Setoran_ke_bendahara_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','setoran_ke_bendahara/setoran_kasir_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Setoran_ke_bendahara_model->json();
    }

    public function read($id) 
    {
        $row = $this->Setoran_ke_bendahara_model->get_by_id($id);
        if ($row) {
            $data = array(
		'setoran_id' => $row->setoran_id,
		'nominal' => $row->nominal,
		'tanggal' => $row->tanggal,
		'id_users_bendahara' => $row->id_users_bendahara,
		'id_users_kasir' => $row->id_users_kasir,
		'status' => $row->status,
	    );
            $this->template->load('template','setoran_ke_bendahara/setoran_kasir_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoran_ke_bendahara'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('setoran_ke_bendahara/create_action'),
	    'setoran_id' => set_value('setoran_id'),
	    'nominal' => set_value('nominal'),
	    'tanggal' => set_value('tanggal'),
	    'id_users_bendahara' => set_value('id_users_bendahara'),
	    'id_users_kasir' => set_value('id_users_kasir'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','setoran_ke_bendahara/setoran_kasir_form', $data);
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
		'id_users_bendahara' => $this->input->post('id_users_bendahara',TRUE),
		'id_users_kasir' => $this->input->post('id_users_kasir',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Setoran_ke_bendahara_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('setoran_ke_bendahara'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Setoran_ke_bendahara_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('setoran_ke_bendahara/update_action'),
		'setoran_id' => set_value('setoran_id', $row->setoran_id),
		'nominal' => set_value('nominal', $row->nominal),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'id_users_bendahara' => set_value('id_users_bendahara', $row->id_users_bendahara),
		'id_users_kasir' => set_value('id_users_kasir', $row->id_users_kasir),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','setoran_ke_bendahara/setoran_kasir_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoran_ke_bendahara'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('setoran_id', TRUE));
        } else {
            $data = array(
		'nominal' => $this->input->post('nominal',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'id_users_bendahara' => $this->input->post('id_users_bendahara',TRUE),
		'id_users_kasir' => $this->input->post('id_users_kasir',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Setoran_ke_bendahara_model->update($this->input->post('setoran_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('setoran_ke_bendahara'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Setoran_ke_bendahara_model->get_by_id($id);

        if ($row) {
            $this->Setoran_ke_bendahara_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setoran_ke_bendahara'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoran_ke_bendahara'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('id_users_bendahara', 'id users bendahara', 'trim|required');
	$this->form_validation->set_rules('id_users_kasir', 'id users kasir', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('setoran_id', 'setoran_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "setoran_kasir.xls";
        $judul = "setoran_kasir";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Bendahara");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Kasir");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Setoran_ke_bendahara_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nominal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_bendahara);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_kasir);
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
        header("Content-Disposition: attachment;Filename=setoran_kasir.doc");

        $data = array(
            'setoran_kasir_data' => $this->Setoran_ke_bendahara_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('setoran_ke_bendahara/setoran_kasir_doc',$data);
    }

}

/* End of file Setoran_ke_bendahara.php */
/* Location: ./application/controllers/Setoran_ke_bendahara.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-21 17:54:06 */
/* http://harviacode.com */