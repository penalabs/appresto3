<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_masakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Menu_masakan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','menu_masakan/menu_masakan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Menu_masakan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Menu_masakan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'menu_masakan_id' => $row->menu_masakan_id,
		'nama_masakan' => $row->nama_masakan,
		'stok' => $row->stok,
		'gambar' => $row->gambar,
		'harga' => $row->harga,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','menu_masakan/menu_masakan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_masakan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu_masakan/create_action'),
	    'menu_masakan_id' => set_value('menu_masakan_id'),
	    'nama_masakan' => set_value('nama_masakan'),
	    'stok' => set_value('stok'),
	    'gambar' => set_value('gambar'),
	    'harga' => set_value('harga'),
	    'id_users' => set_value('id_users'),
	);
        $this->template->load('template','menu_masakan/menu_masakan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_masakan' => $this->input->post('nama_masakan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->Menu_masakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('menu_masakan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_masakan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu_masakan/update_action'),
		'menu_masakan_id' => set_value('menu_masakan_id', $row->menu_masakan_id),
		'nama_masakan' => set_value('nama_masakan', $row->nama_masakan),
		'stok' => set_value('stok', $row->stok),
		'gambar' => set_value('gambar', $row->gambar),
		'harga' => set_value('harga', $row->harga),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            $this->template->load('template','menu_masakan/menu_masakan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_masakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('menu_masakan_id', TRUE));
        } else {
            $data = array(
		'nama_masakan' => $this->input->post('nama_masakan',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
	    );

            $this->Menu_masakan_model->update($this->input->post('menu_masakan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu_masakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_masakan_model->get_by_id($id);

        if ($row) {
            $this->Menu_masakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu_masakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_masakan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_masakan', 'nama masakan', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('menu_masakan_id', 'menu_masakan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "menu_masakan.xls";
        $judul = "menu_masakan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Masakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users");

	foreach ($this->Menu_masakan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_masakan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=menu_masakan.doc");

        $data = array(
            'menu_masakan_data' => $this->Menu_masakan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('menu_masakan/menu_masakan_doc',$data);
    }

}

/* End of file Menu_masakan.php */
/* Location: ./application/controllers/Menu_masakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-17 07:03:22 */
/* http://harviacode.com */