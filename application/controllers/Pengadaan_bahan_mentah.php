<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengadaan_bahan_mentah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Pengadaan_bahan_mentah_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pengadaan_bahan_mentah/pengadaan_bahan_mentah_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pengadaan_bahan_mentah_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pengadaan_bahan_mentah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pengadaan_bahan_mentah_id' => $row->pengadaan_bahan_mentah_id,
		'tanggal' => $row->tanggal,
		'jumlah' => $row->jumlah,
		'bahan_mentah_id' => $row->bahan_mentah_id,
		'id_users_logistik' => $row->id_users_logistik,
	    );
            $this->template->load('template','pengadaan_bahan_mentah/pengadaan_bahan_mentah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaan_bahan_mentah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengadaan_bahan_mentah/create_action'),
	    'pengadaan_bahan_mentah_id' => set_value('pengadaan_bahan_mentah_id'),
	    'tanggal' => set_value('tanggal'),
	    'jumlah' => set_value('jumlah'),
	    'bahan_mentah_id' => set_value('bahan_mentah_id'),
	    'id_users_logistik' => set_value('id_users_logistik'),
	);
        $this->template->load('template','pengadaan_bahan_mentah/pengadaan_bahan_mentah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'bahan_mentah_id' => $this->input->post('bahan_mentah_id',TRUE),
		'id_users_logistik' => $this->input->post('id_users_logistik',TRUE),
	    );

            $this->Pengadaan_bahan_mentah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pengadaan_bahan_mentah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengadaan_bahan_mentah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengadaan_bahan_mentah/update_action'),
		'pengadaan_bahan_mentah_id' => set_value('pengadaan_bahan_mentah_id', $row->pengadaan_bahan_mentah_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'bahan_mentah_id' => set_value('bahan_mentah_id', $row->bahan_mentah_id),
		'id_users_logistik' => set_value('id_users_logistik', $row->id_users_logistik),
	    );
            $this->template->load('template','pengadaan_bahan_mentah/pengadaan_bahan_mentah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaan_bahan_mentah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pengadaan_bahan_mentah_id', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'bahan_mentah_id' => $this->input->post('bahan_mentah_id',TRUE),
		'id_users_logistik' => $this->input->post('id_users_logistik',TRUE),
	    );

            $this->Pengadaan_bahan_mentah_model->update($this->input->post('pengadaan_bahan_mentah_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengadaan_bahan_mentah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengadaan_bahan_mentah_model->get_by_id($id);

        if ($row) {
            $this->Pengadaan_bahan_mentah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengadaan_bahan_mentah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaan_bahan_mentah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('bahan_mentah_id', 'bahan mentah id', 'trim|required');
	$this->form_validation->set_rules('id_users_logistik', 'id users logistik', 'trim|required');

	$this->form_validation->set_rules('pengadaan_bahan_mentah_id', 'pengadaan_bahan_mentah_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pengadaan_bahan_mentah.xls";
        $judul = "pengadaan_bahan_mentah";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Bahan Mentah Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Logistik");

	foreach ($this->Pengadaan_bahan_mentah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bahan_mentah_id);
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
        header("Content-Disposition: attachment;Filename=pengadaan_bahan_mentah.doc");

        $data = array(
            'pengadaan_bahan_mentah_data' => $this->Pengadaan_bahan_mentah_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pengadaan_bahan_mentah/pengadaan_bahan_mentah_doc',$data);
    }

}

/* End of file Pengadaan_bahan_mentah.php */
/* Location: ./application/controllers/Pengadaan_bahan_mentah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-15 22:35:14 */
/* http://harviacode.com */