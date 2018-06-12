<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matrik extends CI_Controller {
	public function index()
	{
		$data = array();
		$sql  = "SELECT DISTINCT(r.`ialternativ`),d.`tketerangan`,d.`vnamadivisi` FROM `rangking` r 
			JOIN `alternativ` a ON a.`ialternativ` = r.`ialternativ`
			JOIN divisi d ON d.`idDivisi` = a.`idDivisi`";
		$sqlK = "SELECT * FROM kriteria ORDER BY idKriteria";
		$data['kriteria'] = $this->db->query($sqlK)->result_array();
		$data['result'] = $this->db->query($sql)->result_array();

		if($this->db->query($sql)->num_rows()>0){
			$this->template->load('template_wp','matrik/matrik_view', $data);
		}else{
			$this->session->set_flashdata('message', 'Matrik tidak ditemukan, silakan melakukan proses Transaksi');
  			redirect(site_url('transaksi'));
		}

		
	}
}
