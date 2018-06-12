<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rangking extends CI_Controller {
	public function index()
	{
		 $sqlVe = "SELECT r.`ialternativ`,r.`idKriteria`, r.`nilaiRangking`,k.`normalisasi`, k.`tipe` FROM 
		 			`rangking` r JOIN `kriteria` k ON k.`idKriteria`=r.`idKriteria`";
		 $ckNum = $this->db->query($sqlVe)->num_rows();
		 if($ckNum>0){ 
			 $dtVe = $this->db->query($sqlVe)->result_array();

			 //Update Vektor S
			 foreach ($dtVe as $dv) {
			 	if($dv['tipe']==1){
			 		$vek = pow($dv['nilaiRangking'],$dv['normalisasi']);
			 	}else{
			 		$min = -1 * $dv['normalisasi'];
			 		$vek = pow($dv['nilaiRangking'],$min);
			 	}
			 	$sql = "UPDATE `rangking` SET nilaivektor='".$vek."' WHERE ialternativ =".$dv['ialternativ']." 
			 			AND idKriteria =".$dv['idKriteria'];
				$this->db->query($sql);
			 }

			 $sqlAlt = "SELECT DISTINCT (r.`ialternativ`) FROM `rangking` r ";
			 $dtAlt  = $this->db->query($sqlAlt)->result_array();

			 $preferensi = 0;
			 foreach ($dtAlt as $da) {
			 	 $sqlV = "SELECT nilaiVektor FROM `rangking` r WHERE ialternativ=".$da['ialternativ'];
			 	 $kaliVek = 1;
			 	 $dtV = $this->db->query($sqlV)->result_array();
			 	 foreach ($dtV as $v) {
			 	 	$kaliVek = $v['nilaiVektor']*$kaliVek;
			 	 }

			 	 $sql = "UPDATE `alternativ` SET nilaiVektor='".$kaliVek."' WHERE ialternativ =".$da['ialternativ'];
				 $this->db->query($sql);

				 $preferensi += $kaliVek;
			 }

			 //Update Preferensi 
			 $sqlAlp = "SELECT ialternativ,`nilaiVektor` FROM `alternativ`";
			 $dtAlp  = $this->db->query($sqlAlp)->result_array();
			 foreach ($dtAlp as $dAlp) {
			 	 if(empty($dAlp['nilaiVektor']) || $dAlp['nilaiVektor']==0){
			 	 	$pref = 0;
			 	 }else{
			 	 	$pref = $dAlp['nilaiVektor']/$preferensi;
			 	 } 
			 	 $sql = "UPDATE `alternativ` SET nilaiRangking='".$pref."' WHERE ialternativ =".$dAlp['ialternativ'];
				 $this->db->query($sql);
			 }

			$sqlAk = "SELECT (a.`nilaiRangking`*100) AS rank, d.`tketerangan`, d.`vnamadivisi` FROM alternativ a 
				JOIN `divisi` d ON a.`idDivisi` = d.`idDivisi` 
				WHERE a.`ialternativ` IN(SELECT DISTINCT(`ialternativ`) FROM `rangking`)
				ORDER BY a.`nilaiRangking` DESC";
			$data['result'] = $this->db->query($sqlAk)->result_array();
			$this->template->load('template_wp','rangking/rangking_view', $data);
		}else{
			$this->session->set_flashdata('message', 'Rangking tidak ditemukan, silakan melakukan proses Transaksi');
  			redirect(site_url('transaksi'));
		}
		

	}

	function detail()
	{
		$data = array();
		$sql  = "SELECT DISTINCT(r.`ialternativ`),d.`tketerangan`,d.`vnamadivisi` FROM `rangking` r 
			JOIN `alternativ` a ON a.`ialternativ` = r.`ialternativ`
			JOIN divisi d ON d.`idDivisi` = a.`idDivisi`";
		$sqlK = "SELECT * FROM kriteria ORDER BY idKriteria";
		$data['kriteria'] = $this->db->query($sqlK)->result_array();
		$data['result'] = $this->db->query($sql)->result_array();

		if($this->db->query($sql)->num_rows()>0){
			$this->template->load('template_wp','rangking/rangking_detail', $data);
		}else{
			$this->session->set_flashdata('message', 'Matrik tidak ditemukan, silakan melakukan proses Transaksi');
  			redirect(site_url('transaksi'));
		}

		
	}
}
