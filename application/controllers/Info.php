<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {
	public function index()
	{
		$data = array();
		$this->template->load('template_wp','info', $data);
	}
}
