<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Investor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Investor_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','investor/investor_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Investor_model->json();
    }

    public function read($id) 
    {
        $row = $this->Investor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'investor_id' => $row->investor_id,
		'nama_investor' => $row->nama_investor,
		'alamat_investor' => $row->alamat_investor,
		'telp_investor' => $row->telp_investor,
		'id_users_owner' => $row->id_users_owner,
	    );
            $this->template->load('template','investor/investor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('investor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('investor/create_action'),
	    'investor_id' => set_value('investor_id'),
	    'nama_investor' => set_value('nama_investor'),
	    'alamat_investor' => set_value('alamat_investor'),
	    'telp_investor' => set_value('telp_investor'),
	    'id_users_owner' => set_value('id_users_owner'),
	);
        $this->template->load('template','investor/investor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_investor' => $this->input->post('nama_investor',TRUE),
		'alamat_investor' => $this->input->post('alamat_investor',TRUE),
		'telp_investor' => $this->input->post('telp_investor',TRUE),
		'id_users_owner' => $this->input->post('id_users_owner',TRUE),
	    );

            $this->Investor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('investor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Investor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('investor/update_action'),
		'investor_id' => set_value('investor_id', $row->investor_id),
		'nama_investor' => set_value('nama_investor', $row->nama_investor),
		'alamat_investor' => set_value('alamat_investor', $row->alamat_investor),
		'telp_investor' => set_value('telp_investor', $row->telp_investor),
		'id_users_owner' => set_value('id_users_owner', $row->id_users_owner),
	    );
            $this->template->load('template','investor/investor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('investor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('investor_id', TRUE));
        } else {
            $data = array(
		'nama_investor' => $this->input->post('nama_investor',TRUE),
		'alamat_investor' => $this->input->post('alamat_investor',TRUE),
		'telp_investor' => $this->input->post('telp_investor',TRUE),
		'id_users_owner' => $this->input->post('id_users_owner',TRUE),
	    );

            $this->Investor_model->update($this->input->post('investor_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('investor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Investor_model->get_by_id($id);

        if ($row) {
            $this->Investor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('investor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('investor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_investor', 'nama investor', 'trim|required');
	$this->form_validation->set_rules('alamat_investor', 'alamat investor', 'trim|required');
	$this->form_validation->set_rules('telp_investor', 'telp investor', 'trim|required');
	$this->form_validation->set_rules('id_users_owner', 'id users owner', 'trim|required');

	$this->form_validation->set_rules('investor_id', 'investor_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "investor.xls";
        $judul = "investor";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Investor");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Investor");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp Investor");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Owner");

	foreach ($this->Investor_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_investor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_investor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp_investor);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_owner);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=investor.doc");

        $data = array(
            'investor_data' => $this->Investor_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('investor/investor_doc',$data);
    }

}

/* End of file Investor.php */
/* Location: ./application/controllers/Investor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-16 22:44:30 */
/* http://harviacode.com */