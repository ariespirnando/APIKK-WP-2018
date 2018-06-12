<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	public function index()
	{
		$data = array();
		$sql = "SELECT * FROM `kriteria`";
		$data['result'] = $this->db->query($sql)->result_array(); 
		$sumBo ="SELECT SUM(`bobot`) AS bobot FROM kriteria";
		$sum = $this->db->query($sumBo)->row_array();
		$dt = $this->db->query($sql)->result_array();
		foreach ($dt as $d) {
			$float = $d['bobot']/$sum['bobot'];
			$sql = "UPDATE `kriteria` SET normalisasi='".$float."' WHERE idKriteria =".$d['idKriteria'];
			$this->db->query($sql);
		} 

		$this->template->load('template_wp','kriteria/kriteria_view', $data);
	}
}
