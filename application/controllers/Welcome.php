<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$data = array();
		$this->template->load('template_wp','welcome_message', $data);
	}
}
