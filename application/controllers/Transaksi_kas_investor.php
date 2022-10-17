<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_kas_investor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Transaksi_kas_investor_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','transaksi_kas_investor/transaksi_kas_investor_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Transaksi_kas_investor_model->json();
    }
 
    public function read($id) 
    {
        $row = $this->Transaksi_kas_investor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tanggal' => $row->tanggal,
		'nominal' => $row->nominal,
		'id_users' => $row->id_users,
		'investor_id' => $row->investor_id,
		'kas_id' => $row->kas_id,
	    );
            $this->template->load('template','transaksi_kas_investor/transaksi_kas_investor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_kas_investor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi_kas_investor/create_action'),
	    'id' => set_value('id'),
	    'tanggal' => set_value('tanggal'),
	    'nominal' => set_value('nominal'),
	    'id_users' => set_value('id_users'),
	    'investor_id' => set_value('investor_id'),
	    'kas_id' => set_value('kas_id'),
	);
        $this->template->load('template','transaksi_kas_investor/transaksi_kas_investor_form', $data);
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
		'id_users' => $this->input->post('id_users',TRUE),
		'investor_id' => $this->input->post('investor_id',TRUE),
		'kas_id' => $this->input->post('kas_id',TRUE),
	    );

            $this->Transaksi_kas_investor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('transaksi_kas_investor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_kas_investor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_kas_investor/update_action'),
		'id' => set_value('id', $row->id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'nominal' => set_value('nominal', $row->nominal),
		'id_users' => set_value('id_users', $row->id_users),
		'investor_id' => set_value('investor_id', $row->investor_id),
		'kas_id' => set_value('kas_id', $row->kas_id),
	    );
            $this->template->load('template','transaksi_kas_investor/transaksi_kas_investor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_kas_investor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
		'investor_id' => $this->input->post('investor_id',TRUE),
		'kas_id' => $this->input->post('kas_id',TRUE),
	    );

            $this->Transaksi_kas_investor_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_kas_investor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_kas_investor_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_kas_investor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi_kas_investor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_kas_investor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');
	$this->form_validation->set_rules('investor_id', 'investor id', 'trim|required');
	$this->form_validation->set_rules('kas_id', 'kas id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "transaksi_kas_investor.xls";
        $judul = "transaksi_kas_investor";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users");
	xlsWriteLabel($tablehead, $kolomhead++, "Investor Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Kas Id");

	foreach ($this->Transaksi_kas_investor_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nominal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users);
	    xlsWriteNumber($tablebody, $kolombody++, $data->investor_id);
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
        header("Content-Disposition: attachment;Filename=transaksi_kas_investor.doc");

        $data = array(
            'transaksi_kas_investor_data' => $this->Transaksi_kas_investor_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('transaksi_kas_investor/transaksi_kas_investor_doc',$data);
    }

}

/* End of file Transaksi_kas_investor.php */
/* Location: ./application/controllers/Transaksi_kas_investor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-25 11:07:59 */
/* http://harviacode.com */