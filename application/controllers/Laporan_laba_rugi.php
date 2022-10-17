<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_laba_rugi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Laporan_laba_rugi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {

        $this->template->load('template','laporan_laba_rugi/setoran_kasir_list');
    } 

    public function json_filter() {
        $tanggal_mulai=$this->input->post('tanggal_mulai');
        $tanggal_akhir=$this->input->post('tanggal_akhir');

        $where = array('tanggal >' => $tanggal_mulai);
        
        header('Content-Type: application/json');
        echo $this->Laporan_laba_rugi_model->json_filter($tanggal_mulai,$tanggal_akhir);
    }

    function get_laba_rugi()
    {
        $tanggal_mulai=$this->input->post('tanggal_mulai');
        $tanggal_akhir=$this->input->post('tanggal_akhir');

        $pendapatan=$query = $this->db->query("SELECT SUM(NOMINAL) as pendapatan FROM setoran_kasir WHERE tanggal > '.$tanggal_mulai.' AND tanggal < '.$tanggal_akhir.'");
        $biaya_operasional_kanwil=$query = $this->db->query("SELECT SUM(NOMINAL) as biaya_operasional_kanwil FROM biaya_operasional_kanwil WHERE tanggal > '.$tanggal_mulai.' AND tanggal < '.$tanggal_akhir.'");
        $biaya_operasional_cabang=$query = $this->db->query("SELECT SUM(NOMINAL) as biaya_operasional_cabang FROM biaya_operasional_cabang WHERE tanggal > '.$tanggal_mulai.' AND tanggal < '.$tanggal_akhir.'");
        $penyusutan_investasi=$query = $this->db->query("SELECT SUM(NOMINAL) as penyusutan_investasi FROM penyusutan_investasi WHERE tanggal > '.$tanggal_mulai.' AND tanggal < '.$tanggal_akhir.'");

       $hasil_pendapatan=$pendapatan->row();
       $pendapatannya=$hasil_pendapatan->pendapatan;

       $hasil_biaya_operasional_kanwil=$biaya_operasional_kanwil->row();
       $biaya_operasional_kanwilnya=$hasil_biaya_operasional_kanwil->biaya_operasional_kanwil;

       $hasil_biaya_operasional_cabang=$biaya_operasional_cabang->row();
       $biaya_operasional_cabangnya=$hasil_biaya_operasional_cabang->biaya_operasional_cabang;

       $hasil_penyusutan_investasi=$penyusutan_investasi->row();
       $penyusutan_investasinya=$hasil_penyusutan_investasi->penyusutan_investasi;

        $laba_bersih=$pendapatannya-($biaya_operasional_kanwilnya+$biaya_operasional_cabangnya)+$penyusutan_investasinya;

        $data = array(
            'laba_bersih' => $laba_bersih,
          );
        echo json_encode($data);
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Laporan_laba_rugi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Laporan_laba_rugi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'setoran_id' => $row->setoran_id,
		'nominal' => $row->nominal,
		'tanggal' => $row->tanggal,
		'id_users_bendahara' => $row->id_users_bendahara,
		'id_users_kasir' => $row->id_users_kasir,
		'status' => $row->status,
	    );
            $this->template->load('template','laporan_laba_rugi/setoran_kasir_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_laba_rugi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_laba_rugi/create_action'),
	    'setoran_id' => set_value('setoran_id'),
	    'nominal' => set_value('nominal'),
	    'tanggal' => set_value('tanggal'),
	    'id_users_bendahara' => set_value('id_users_bendahara'),
	    'id_users_kasir' => set_value('id_users_kasir'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','laporan_laba_rugi/setoran_kasir_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nominal' => $this->input->post('nominal',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'id_users_bendahara' => $this->input->post('id_users_bendahara',TRUE),
		'id_users_kasir' => $this->input->post('id_users_kasir',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Laporan_laba_rugi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('laporan_laba_rugi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Laporan_laba_rugi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan_laba_rugi/update_action'),
		'setoran_id' => set_value('setoran_id', $row->setoran_id),
		'nominal' => set_value('nominal', $row->nominal),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'id_users_bendahara' => set_value('id_users_bendahara', $row->id_users_bendahara),
		'id_users_kasir' => set_value('id_users_kasir', $row->id_users_kasir),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','laporan_laba_rugi/setoran_kasir_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_laba_rugi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('setoran_id', TRUE));
        } else {
            $data = array(
		'nominal' => $this->input->post('nominal',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'id_users_bendahara' => $this->input->post('id_users_bendahara',TRUE),
		'id_users_kasir' => $this->input->post('id_users_kasir',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Laporan_laba_rugi_model->update($this->input->post('setoran_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('laporan_laba_rugi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_laba_rugi_model->get_by_id($id);

        if ($row) {
            $this->Laporan_laba_rugi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('laporan_laba_rugi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_laba_rugi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('id_users_bendahara', 'id users bendahara', 'trim|required');
	$this->form_validation->set_rules('id_users_kasir', 'id users kasir', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('setoran_id', 'setoran_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "setoran_kasir.xls";
        $judul = "setoran_kasir";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Bendahara");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users Kasir");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Laporan_laba_rugi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nominal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_bendahara);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users_kasir);
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
        header("Content-Disposition: attachment;Filename=setoran_kasir.doc");

        $data = array(
            'setoran_kasir_data' => $this->Laporan_laba_rugi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('laporan_laba_rugi/setoran_kasir_doc',$data);
    }

}

/* End of file Laporan_laba_rugi.php */
/* Location: ./application/controllers/Laporan_laba_rugi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-15 13:17:59 */
/* http://harviacode.com */