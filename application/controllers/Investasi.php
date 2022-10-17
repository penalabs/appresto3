<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Investasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Investasi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','investasi/investasi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Investasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Investasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'investasi_id' => $row->investasi_id,
		'nama_investasi' => $row->nama_investasi,
		'nominal' => $row->nominal,
		'tanggal' => $row->tanggal,
        'jumlah' => $row->jumlah,
        'masa_pemanfaatan' => $row->masa_pemanfaatan,
        'kas_id' => $row->kas_id,
		'id_users_bendahara' => $row->id_users_bendahara,
		'id_users_generalmaanager' => $row->id_users_generalmaanager,
	    );
            $this->template->load('template','investasi/investasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('investasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('investasi/create_action'),
	    'investasi_id' => set_value('investasi_id'),
	    'nama_investasi' => set_value('nama_investasi'),
	    'nominal' => set_value('nominal'),
	    'tanggal' => set_value('tanggal'),
        'jumlah' => set_value('jumlah'),
        'masa_pemanfaatan' => set_value('masa_pemanfaatan'),
        'kas_id' => set_value('kas_id'),
	    'id_users_bendahara' => set_value('id_users_bendahara'),
	    'id_users_generalmaanager' => set_value('id_users_generalmaanager'),
	);
        $this->template->load('template','investasi/investasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_investasi' => $this->input->post('nama_investasi',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
        'jumlah' => $this->input->post('jumlah',TRUE),
        'masa_pemanfaatan' => $this->input->post('masa_pemanfaatan',TRUE),
        'kas_id' => $this->input->post('kas_id',TRUE),
		'id_users_bendahara' => $this->input->post('id_users_bendahara',TRUE),
		'id_users_generalmaanager' => $this->input->post('id_users_generalmaanager',TRUE),
	    );

            $this->Investasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('investasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Investasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('investasi/update_action'),
		'investasi_id' => set_value('investasi_id', $row->investasi_id),
		'nama_investasi' => set_value('nama_investasi', $row->nama_investasi),
		'nominal' => set_value('nominal', $row->nominal),
		'tanggal' => set_value('tanggal', $row->tanggal),
        'jumlah' => set_value('jumlah', $row->jumlah),
        'masa_pemanfaatan' => set_value('masa_pemanfaatan', $row->masa_pemanfaatan),
        'kas_id' => set_value('kas_id', $row->kas_id),
		'id_users_bendahara' => set_value('id_users_bendahara', $row->id_users_bendahara),
		'id_users_generalmaanager' => set_value('id_users_generalmaanager', $row->id_users_generalmaanager),
	    );
            $this->template->load('template','investasi/investasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('investasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('investasi_id', TRUE));
        } else {
            $data = array(
		'nama_investasi' => $this->input->post('nama_investasi',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
        'jumlah' => $this->input->post('jumlah',TRUE),
        'masa_pemanfaatan' => $this->input->post('masa_pemanfaatan',TRUE),
        'kas_id' => $this->input->post('kas_id',TRUE),
		'id_users_bendahara' => $this->input->post('id_users_bendahara',TRUE),
		'id_users_generalmaanager' => $this->input->post('id_users_generalmaanager',TRUE),
	    );

            $this->Investasi_model->update($this->input->post('investasi_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('investasi'));
        }
    }

    public function status_disetujui($investasi_id) 
    {
            $data = array(
            'status' => 'disetujui',
            );

            $this->Investasi_model->update($investasi_id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('investasi'));
        
    }
    public function status_belum_disetujui($investasi_id) 
    {
            $data = array(
            'status' => 'belum disetujui',
            );

            $this->Investasi_model->update($investasi_id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('investasi'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Investasi_model->get_by_id($id);

        if ($row) {
            $this->Investasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('investasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('investasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_investasi', 'nama investasi', 'trim|required');
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('id_users_bendahara', 'id users bendahara', 'trim|required');
	$this->form_validation->set_rules('id_users_generalmaanager', 'id users generalmaanager', 'trim|required');

	$this->form_validation->set_rules('investasi_id', 'investasi_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "investasi.xls";
        $judul = "investasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Investasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Bendahara");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Generalmaanager");

	foreach ($this->Investasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_investasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nominal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_bendahara);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_generalmaanager);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=investasi.doc");

        $data = array(
            'investasi_data' => $this->Investasi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('investasi/investasi_doc',$data);
    }

}

/* End of file Investasi.php */
/* Location: ./application/controllers/Investasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-01 07:28:59 */
/* http://harviacode.com */