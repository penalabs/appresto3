<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produksi_pemesanan_masakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Produksi_pemesanan_masakan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','produksi_pemesanan_masakan/pemesanan_masakan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produksi_pemesanan_masakan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Produksi_pemesanan_masakan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pemesanan_maakan_id' => $row->pemesanan_maakan_id,
		'no_antrian' => $row->no_antrian,
		'nama_pembeli' => $row->nama_pembeli,
		'id_users_waiter' => $row->id_users_waiter,
		'total' => $row->total,
		'dibayar' => $row->dibayar,
		'status' => $row->status,
	    );
            $this->template->load('template','produksi_pemesanan_masakan/pemesanan_masakan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi_pemesanan_masakan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produksi_pemesanan_masakan/create_action'),
	    'pemesanan_maakan_id' => set_value('pemesanan_maakan_id'),
	    'no_antrian' => set_value('no_antrian'),
	    'nama_pembeli' => set_value('nama_pembeli'),
	    'id_users_waiter' => set_value('id_users_waiter'),
	    'total' => set_value('total'),
	    'dibayar' => set_value('dibayar'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','produksi_pemesanan_masakan/pemesanan_masakan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_antrian' => $this->input->post('no_antrian',TRUE),
		'nama_pembeli' => $this->input->post('nama_pembeli',TRUE),
		'id_users_waiter' => $this->input->post('id_users_waiter',TRUE),
		'total' => $this->input->post('total',TRUE),
		'dibayar' => $this->input->post('dibayar',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Produksi_pemesanan_masakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('produksi_pemesanan_masakan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produksi_pemesanan_masakan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produksi_pemesanan_masakan/update_action'),
		'pemesanan_maakan_id' => set_value('pemesanan_maakan_id', $row->pemesanan_maakan_id),
		'no_antrian' => set_value('no_antrian', $row->no_antrian),
		'nama_pembeli' => set_value('nama_pembeli', $row->nama_pembeli),
		'id_users_waiter' => set_value('id_users_waiter', $row->id_users_waiter),
		'total' => set_value('total', $row->total),
		'dibayar' => set_value('dibayar', $row->dibayar),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','produksi_pemesanan_masakan/pemesanan_masakan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi_pemesanan_masakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pemesanan_maakan_id', TRUE));
        } else {
            $data = array(
		'no_antrian' => $this->input->post('no_antrian',TRUE),
		'nama_pembeli' => $this->input->post('nama_pembeli',TRUE),
		'id_users_waiter' => $this->input->post('id_users_waiter',TRUE),
		'total' => $this->input->post('total',TRUE),
		'dibayar' => $this->input->post('dibayar',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Produksi_pemesanan_masakan_model->update($this->input->post('pemesanan_maakan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produksi_pemesanan_masakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produksi_pemesanan_masakan_model->get_by_id($id);

        if ($row) {
            $this->Produksi_pemesanan_masakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produksi_pemesanan_masakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi_pemesanan_masakan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_antrian', 'no antrian', 'trim|required');
	$this->form_validation->set_rules('nama_pembeli', 'nama pembeli', 'trim|required');
	$this->form_validation->set_rules('id_users_waiter', 'id users waiter', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');
	$this->form_validation->set_rules('dibayar', 'dibayar', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('pemesanan_maakan_id', 'pemesanan_maakan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pemesanan_masakan.xls";
        $judul = "pemesanan_masakan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Antrian");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pembeli");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Waiter");
	xlsWriteLabel($tablehead, $kolomhead++, "Total");
	xlsWriteLabel($tablehead, $kolomhead++, "Dibayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Produksi_pemesanan_masakan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_antrian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pembeli);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_waiter);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dibayar);
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
        header("Content-Disposition: attachment;Filename=pemesanan_masakan.doc");

        $data = array(
            'pemesanan_masakan_data' => $this->Produksi_pemesanan_masakan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('produksi_pemesanan_masakan/pemesanan_masakan_doc',$data);
    }

}

/* End of file Produksi_pemesanan_masakan.php */
/* Location: ./application/controllers/Produksi_pemesanan_masakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-21 18:20:58 */
/* http://harviacode.com */