<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unduhberkas extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('status');
		if ($cek == 'dosen'){
		$this->load->view('header_v');
		$this->load->view('dosen/unduhberkas_v');
		$this->load->view('footer_v');
		}else{
			header("location:".base_url());
		}
	}
}
