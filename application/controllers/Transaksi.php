<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function index()
	{
		$data = array();
		$sql = "SELECT * FROM `alternativ` t JOIN `divisi` d ON d.`idDivisi` = t.`idDivisi`";
		$sql2 = "SELECT * FROM `divisi` d WHERE d.idDivisi IN (SELECT t.idDivisi FROM alternativ t)";
		$sql3 = "SELECT * FROM `divisi` d";

		$c1 = $this->db->query($sql2)->num_rows();
		$c2 = $this->db->query($sql3)->num_rows();

		if($c1==$c2){
			$data['ck_al'] = 1;
		}else{
			$data['ck_al'] = 0;
		}

		$data['result'] = $this->db->query($sql)->result_array();
		$this->template->load('template_wp','transaksi/transaksi_view', $data);
	}
	function add(){
		$data = array();
		$sql = "SELECT * FROM `divisi` d WHERE d.idDivisi NOT IN (SELECT t.idDivisi FROM alternativ t)";
		$data['result'] = $this->db->query($sql)->result_array();
		$data['result_n'] = $this->db->query($sql)->num_rows();
		$data['action'] = base_url().'index.php/Transaksi/add_prosess';
		$this->template->load('template_wp','transaksi/transaksi_add', $data);
	}
	function add_prosess(){
		$idDivisi = $this->input->post('idDivisi');
		$data['idDivisi'] = $idDivisi;
		$this->db->insert('alternativ',$data);
		$this->session->set_flashdata('message', 'Alternative Divisi Berhasil di tambahkan');
    redirect(site_url('transaksi'));
	}
	function hapus($id){
		$this->db->where('ialternativ',$id);
		$this->db->delete('alternativ');

		$this->db->where('ialternativ',$id);
		$this->db->delete('rangking');

		$this->db->where('ialternativ',$id);
		$this->db->delete('detail');

		$this->session->set_flashdata('message', 'Alternative Divisi Berhasil di hapus');
    	redirect(site_url('transaksi'));
	}
	function edit($id){
		$data = array();
		$sql = "SELECT * FROM kriteria";
		$div = "SELECT * FROM `alternativ` a JOIN `divisi` d ON d.`idDivisi`=a.`idDivisi` WHERE a.`ialternativ`=".$id;
		$data['row'] = $this->db->query($div)->row_array();
		$data['result'] = $this->db->query($sql)->result_array();
		$data['action'] = base_url().'index.php/Transaksi/edit_prosess';
		$this->template->load('template_wp','transaksi/transaksi_edit', $data);
	}
	function view($id){
		$data = array();
		$sql = "SELECT * FROM kriteria";
		$div = "SELECT * FROM `alternativ` a JOIN `divisi` d ON d.`idDivisi`=a.`idDivisi` WHERE a.`ialternativ`=".$id;
		$data['row'] = $this->db->query($div)->row_array();
		$data['result'] = $this->db->query($sql)->result_array(); 
		$this->template->load('template_wp','transaksi/transaksi_edit_view', $data);
	}
	function edit_prosess(){
		$ialternativ 	= $this->input->post('alternativeId'); 
		$dt['isubmit']	=1; 
		$this->db->where('ialternativ',$ialternativ);
		$this->db->update('alternativ',$dt);

		$sq_syarat = "SELECT * FROM `syarat` order by idKriteria";
		$dt_syarat = $this->db->query($sq_syarat)->result_array();

		$this->db->where('ialternativ',$ialternativ);
		$this->db->delete('detail');
 
		foreach ($dt_syarat as $s) {
			$val = $this->input->post('radio_in_'.$s['idKriteria'].'_'.$s['isyarat']);
			if(!empty($val) && $val!=""){ 
				//Save Untuk Detail Not Matrik
				$dataIns['ialternativ'] = $ialternativ;
				$dataIns['idKriteria'] 	= $s['idKriteria'];
				$dataIns['isyarat'] 	= $s['isyarat'];
				$dataIns['inilai'] 		= $val;    
				$this->db->insert('detail',$dataIns);

			}
		}  

		$sq_kriteria = "SELECT * FROM `kriteria`";
		$dt_kriteria = $this->db->query($sq_kriteria)->result_array();  
 
		foreach ($dt_kriteria as $k) {  
			$sql_dtl = "SELECT s.`nilai`, s.`tipe`,n.`nilai_asli`,n.`nilai_aktual` FROM `detail` d 
						JOIN `syarat` s ON d.`isyarat` = s.`isyarat` 
						JOIN nilai n ON n.`inilai` = d.`inilai`
						WHERE d.idKriteria=".$k['idKriteria']." and d.ialternativ=".$ialternativ;
			$dt_dtl  = $this->db->query($sql_dtl)->result_array();

			$n_sum = array();
			$t_ary = 0;
			foreach ($dt_dtl as $dl) {
				 $n_r = 0;
				 if($dl['tipe']==0){
				 	if($dl['nilai_asli']<$dl['nilai']){
				 		$n_r = 0;
				 	}else{
				 		$n_r = $dl['nilai_aktual'];
				 	}
				 }else{
				 	if($dl['nilai_asli']>$dl['nilai']){
				 		$n_r = 0;
				 	}else{
				 		$n_r = $dl['nilai_aktual'];
				 	}
				 }  
				 array_push($n_sum,$n_r);
				 $t_ary ++;
			}  

			if (in_array("0", $n_sum)) {
				$dataRnk['nilaiRangking'] 	= 0;
			}else{
				$nilai = array_sum($n_sum)/$t_ary;
				$bobot = $k['bobot']/100;
				$dataRnk['nilaiRangking'] 	= $nilai*$bobot;
			}
			
			$this->db->where('ialternativ',$ialternativ);
			$this->db->where('idKriteria',$k['idKriteria']);
			$this->db->delete('rangking');

			$dataRnk['ialternativ'] 	= $ialternativ;
			$dataRnk['idKriteria'] 		= $k['idKriteria'];  
			$this->db->insert('rangking',$dataRnk); 
 
		}

		$this->session->set_flashdata('message', 'Alternative Divisi Berhasil di ubah');
  		redirect(site_url('transaksi'));
	}
	function reset(){ 
		$this->db->query("TRUNCATE TABLE  rangking"); 
		$this->db->query("TRUNCATE TABLE  alternativ"); 
		$this->db->query("TRUNCATE TABLE  detail"); 
		  
		$this->session->set_flashdata('message', 'Transaksi Berhasil di Reset');
  		redirect(site_url('transaksi'));
	}
}
