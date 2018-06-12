<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule extends CI_Controller {
	public function index()
	{
		$data = array();
		$sql = "SELECT * FROM `kriteria`";
		$data['result'] = $this->db->query($sql)->result_array();
		$this->template->load('template_wp','rule/rule_view', $data);
	}
}
