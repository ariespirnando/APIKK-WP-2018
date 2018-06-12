<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	public function index()
	{
		$data = array();
		$sql = "SELECT * FROM `syarat`";
		$data['result'] = $this->db->query($sql)->result_array();
		$this->template->load('template_wp','nilai/nilai_view', $data);
	}
}
