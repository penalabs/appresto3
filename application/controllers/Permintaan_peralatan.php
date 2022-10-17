<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permintaan_peralatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Permintaan_peralatan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','permintaan_peralatan/pengiriman_peralatan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Permintaan_peralatan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Permintaan_peralatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pengiriman_peralatan_id' => $row->pengiriman_peralatan_id,
		'tanggal' => $row->tanggal,
		'jumlah' => $row->jumlah,
		'peralatan_id' => $row->peralatan_id,
		'id_users_logistik' => $row->id_users_logistik,
		'id_users_adminresto' => $row->id_users_adminresto,
		'status' => $row->status,
	    );
            $this->template->load('template','permintaan_peralatan/pengiriman_peralatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permintaan_peralatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('permintaan_peralatan/create_action'),
	    'pengiriman_peralatan_id' => set_value('pengiriman_peralatan_id'),
	    'tanggal' => set_value('tanggal'),
	    'jumlah' => set_value('jumlah'),
	    'peralatan_id' => set_value('peralatan_id'),
	    'id_users_logistik' => set_value('id_users_logistik'),
	    'id_users_adminresto' => set_value('id_users_adminresto'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','permintaan_peralatan/pengiriman_peralatan_form', $data);
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
		'peralatan_id' => $this->input->post('peralatan_id',TRUE),
		'id_users_logistik' => $this->input->post('id_users_logistik',TRUE),
		'id_users_adminresto' => $this->input->post('id_users_adminresto',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Permintaan_peralatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('permintaan_peralatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Permintaan_peralatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('permintaan_peralatan/update_action'),
		'pengiriman_peralatan_id' => set_value('pengiriman_peralatan_id', $row->pengiriman_peralatan_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'peralatan_id' => set_value('peralatan_id', $row->peralatan_id),
		'id_users_logistik' => set_value('id_users_logistik', $row->id_users_logistik),
		'id_users_adminresto' => set_value('id_users_adminresto', $row->id_users_adminresto),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','permintaan_peralatan/pengiriman_peralatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permintaan_peralatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pengiriman_peralatan_id', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'peralatan_id' => $this->input->post('peralatan_id',TRUE),
		'id_users_logistik' => $this->input->post('id_users_logistik',TRUE),
		'id_users_adminresto' => $this->input->post('id_users_adminresto',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Permintaan_peralatan_model->update($this->input->post('pengiriman_peralatan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permintaan_peralatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Permintaan_peralatan_model->get_by_id($id);

        if ($row) {
            $this->Permintaan_peralatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('permintaan_peralatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permintaan_peralatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('peralatan_id', 'peralatan id', 'trim|required');
	$this->form_validation->set_rules('id_users_logistik', 'id users logistik', 'trim|required');
	$this->form_validation->set_rules('id_users_adminresto', 'id users adminresto', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('pengiriman_peralatan_id', 'pengiriman_peralatan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pengiriman_peralatan.xls";
        $judul = "pengiriman_peralatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Peralatan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Logistik");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Adminresto");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Permintaan_peralatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->peralatan_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_logistik);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_adminresto);
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
        header("Content-Disposition: attachment;Filename=pengiriman_peralatan.doc");

        $data = array(
            'pengiriman_peralatan_data' => $this->Permintaan_peralatan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('permintaan_peralatan/pengiriman_peralatan_doc',$data);
    }
    public function status_dikirim($peralatan_id) 
    {
            $data = array(
            'status' => 'dikirim',
            );

            $this->Permintaan_peralatan_model->update($peralatan_id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permintaan_peralatan'));
        
    }
    public function status_belum_dikirim($peralatan_id) 
    {
            $data = array(
            'status' => 'belum dikirim',
            );

            $this->Permintaan_peralatan_model->update($peralatan_id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permintaan_peralatan'));
     }

}

/* End of file Permintaan_peralatan.php */
/* Location: ./application/controllers/Permintaan_peralatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-16 17:14:00 */
/* http://harviacode.com */