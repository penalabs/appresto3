<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_investasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Laporan_investasi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','laporan_investasi/transaksi_kas_investor_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Laporan_investasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Laporan_investasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tanggal' => $row->tanggal,
		'nominal' => $row->nominal,
		'id_users' => $row->id_users,
		'investor_id' => $row->investor_id,
		'kas_id' => $row->kas_id,
	    );
            $this->template->load('template','laporan_investasi/transaksi_kas_investor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_investasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_investasi/create_action'),
	    'id' => set_value('id'),
	    'tanggal' => set_value('tanggal'),
	    'nominal' => set_value('nominal'),
	    'id_users' => set_value('id_users'),
	    'investor_id' => set_value('investor_id'),
	    'kas_id' => set_value('kas_id'),
	);
        $this->template->load('template','laporan_investasi/transaksi_kas_investor_form', $data);
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

            $this->Laporan_investasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('laporan_investasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Laporan_investasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan_investasi/update_action'),
		'id' => set_value('id', $row->id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'nominal' => set_value('nominal', $row->nominal),
		'id_users' => set_value('id_users', $row->id_users),
		'investor_id' => set_value('investor_id', $row->investor_id),
		'kas_id' => set_value('kas_id', $row->kas_id),
	    );
            $this->template->load('template','laporan_investasi/transaksi_kas_investor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_investasi'));
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

            $this->Laporan_investasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('laporan_investasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_investasi_model->get_by_id($id);

        if ($row) {
            $this->Laporan_investasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('laporan_investasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_investasi'));
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

	foreach ($this->Laporan_investasi_model->get_all() as $data) {
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
            'transaksi_kas_investor_data' => $this->Laporan_investasi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('laporan_investasi/transaksi_kas_investor_doc',$data);
    }

}

/* End of file Laporan_investasi.php */
/* Location: ./application/controllers/Laporan_investasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-16 22:12:03 */
/* http://harviacode.com */