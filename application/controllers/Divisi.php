<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {
	public function index()
	{
		$data = array();
		$sql = "SELECT * FROM `divisi`";
		$data['result'] = $this->db->query($sql)->result_array();
		$data['result_n'] = $this->db->query($sql)->num_rows();
		$this->template->load('template_wp','divisi/divisi_view', $data);
	}
}
