<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kanwil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Kanwil_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kanwil/kanwil_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kanwil_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kanwil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kanwil_id' => $row->kanwil_id,
		'nama_kanwil' => $row->nama_kanwil,
		'alamat_kanwil' => $row->alamat_kanwil,
		'telp_kanwil' => $row->telp_kanwil,
	    );
            $this->template->load('template','kanwil/kanwil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kanwil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kanwil/create_action'),
	    'kanwil_id' => set_value('kanwil_id'),
	    'nama_kanwil' => set_value('nama_kanwil'),
	    'alamat_kanwil' => set_value('alamat_kanwil'),
	    'telp_kanwil' => set_value('telp_kanwil'),
	);
        $this->template->load('template','kanwil/kanwil_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kanwil' => $this->input->post('nama_kanwil',TRUE),
		'alamat_kanwil' => $this->input->post('alamat_kanwil',TRUE),
		'telp_kanwil' => $this->input->post('telp_kanwil',TRUE),
	    );

            $this->Kanwil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kanwil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kanwil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kanwil/update_action'),
		'kanwil_id' => set_value('kanwil_id', $row->kanwil_id),
		'nama_kanwil' => set_value('nama_kanwil', $row->nama_kanwil),
		'alamat_kanwil' => set_value('alamat_kanwil', $row->alamat_kanwil),
		'telp_kanwil' => set_value('telp_kanwil', $row->telp_kanwil),
	    );
            $this->template->load('template','kanwil/kanwil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kanwil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kanwil_id', TRUE));
        } else {
            $data = array(
		'nama_kanwil' => $this->input->post('nama_kanwil',TRUE),
		'alamat_kanwil' => $this->input->post('alamat_kanwil',TRUE),
		'telp_kanwil' => $this->input->post('telp_kanwil',TRUE),
	    );

            $this->Kanwil_model->update($this->input->post('kanwil_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kanwil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kanwil_model->get_by_id($id);

        if ($row) {
            $this->Kanwil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kanwil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kanwil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kanwil', 'nama kanwil', 'trim|required');
	$this->form_validation->set_rules('alamat_kanwil', 'alamat kanwil', 'trim|required');
	$this->form_validation->set_rules('telp_kanwil', 'telp kanwil', 'trim|required');

	$this->form_validation->set_rules('kanwil_id', 'kanwil_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kanwil.xls";
        $judul = "kanwil";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kanwil");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Kanwil");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp Kanwil");

	foreach ($this->Kanwil_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kanwil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_kanwil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp_kanwil);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kanwil.doc");

        $data = array(
            'kanwil_data' => $this->Kanwil_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kanwil/kanwil_doc',$data);
    }

}

/* End of file Kanwil.php */
/* Location: ./application/controllers/Kanwil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-25 09:33:48 */
/* http://harviacode.com */