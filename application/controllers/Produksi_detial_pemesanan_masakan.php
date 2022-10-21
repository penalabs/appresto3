<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produksi_detial_pemesanan_masakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Produksi_detial_pemesanan_masakan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','produksi_detial_pemesanan_masakan/detial_pemesanan_masakan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produksi_detial_pemesanan_masakan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Produksi_detial_pemesanan_masakan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'detail_pemesanan_masakan_id' => $row->detail_pemesanan_masakan_id,
		'pemesanan_masakan_id' => $row->pemesanan_masakan_id,
		'menu_masakan_id' => $row->menu_masakan_id,
		'tanggal' => $row->tanggal,
		'harga' => $row->harga,
		'jumlah_pesan' => $row->jumlah_pesan,
		'subtotal' => $row->subtotal,
		'status' => $row->status,
	    );
            $this->template->load('template','produksi_detial_pemesanan_masakan/detial_pemesanan_masakan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi_detial_pemesanan_masakan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produksi_detial_pemesanan_masakan/create_action'),
	    'detail_pemesanan_masakan_id' => set_value('detail_pemesanan_masakan_id'),
	    'pemesanan_masakan_id' => set_value('pemesanan_masakan_id'),
	    'menu_masakan_id' => set_value('menu_masakan_id'),
	    'tanggal' => set_value('tanggal'),
	    'harga' => set_value('harga'),
	    'jumlah_pesan' => set_value('jumlah_pesan'),
	    'subtotal' => set_value('subtotal'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','produksi_detial_pemesanan_masakan/detial_pemesanan_masakan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pemesanan_masakan_id' => $this->input->post('pemesanan_masakan_id',TRUE),
		'menu_masakan_id' => $this->input->post('menu_masakan_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah_pesan' => $this->input->post('jumlah_pesan',TRUE),
		'subtotal' => $this->input->post('subtotal',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Produksi_detial_pemesanan_masakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('produksi_detial_pemesanan_masakan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produksi_detial_pemesanan_masakan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produksi_detial_pemesanan_masakan/update_action'),
		'detail_pemesanan_masakan_id' => set_value('detail_pemesanan_masakan_id', $row->detail_pemesanan_masakan_id),
		'pemesanan_masakan_id' => set_value('pemesanan_masakan_id', $row->pemesanan_masakan_id),
		'menu_masakan_id' => set_value('menu_masakan_id', $row->menu_masakan_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'harga' => set_value('harga', $row->harga),
		'jumlah_pesan' => set_value('jumlah_pesan', $row->jumlah_pesan),
		'subtotal' => set_value('subtotal', $row->subtotal),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','produksi_detial_pemesanan_masakan/detial_pemesanan_masakan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi_detial_pemesanan_masakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('detail_pemesanan_masakan_id', TRUE));
        } else {
            $data = array(
		'pemesanan_masakan_id' => $this->input->post('pemesanan_masakan_id',TRUE),
		'menu_masakan_id' => $this->input->post('menu_masakan_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah_pesan' => $this->input->post('jumlah_pesan',TRUE),
		'subtotal' => $this->input->post('subtotal',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Produksi_detial_pemesanan_masakan_model->update($this->input->post('detail_pemesanan_masakan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produksi_detial_pemesanan_masakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produksi_detial_pemesanan_masakan_model->get_by_id($id);

        if ($row) {
            $this->Produksi_detial_pemesanan_masakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produksi_detial_pemesanan_masakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi_detial_pemesanan_masakan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pemesanan_masakan_id', 'pemesanan masakan id', 'trim|required');
	$this->form_validation->set_rules('menu_masakan_id', 'menu masakan id', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('jumlah_pesan', 'jumlah pesan', 'trim|required');
	$this->form_validation->set_rules('subtotal', 'subtotal', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('detail_pemesanan_masakan_id', 'detail_pemesanan_masakan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detial_pemesanan_masakan.xls";
        $judul = "detial_pemesanan_masakan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Pemesanan Masakan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Menu Masakan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Pesan");
	xlsWriteLabel($tablehead, $kolomhead++, "Subtotal");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Produksi_detial_pemesanan_masakan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pemesanan_masakan_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->menu_masakan_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_pesan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->subtotal);
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
        header("Content-Disposition: attachment;Filename=detial_pemesanan_masakan.doc");

        $data = array(
            'detial_pemesanan_masakan_data' => $this->Produksi_detial_pemesanan_masakan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('produksi_detial_pemesanan_masakan/detial_pemesanan_masakan_doc',$data);
    }

}

/* End of file Produksi_detial_pemesanan_masakan.php */
/* Location: ./application/controllers/Produksi_detial_pemesanan_masakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-21 18:22:18 */
/* http://harviacode.com */