<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuanlkd extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('status');
		if ($cek == 'dosen'){
			$id_dosen = $_SESSION['data']['id'];
			$this->load->model('LKD');
			$pengajuan = $this->LKD->getPengajuanMingguan($id_dosen);
			$data['pengajuan'] = $pengajuan;
		$this->load->view('header_v');
		$this->load->view('dosen/pengajuanlkd_v',$data);
		$this->load->view('footer_v');
		}else{
			header("location:".base_url());
		}
	}

	public function edit()
	{
		$cek = $this->session->userdata('status');
		if ($cek == 'dosen'){
		$this->load->view('header_v');
		$this->load->view('dosen/editlkd_v');
		$this->load->view('footer_v');
		}else{
			header("location:".base_url());
		}
	}
}
