<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Data
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Rule - List Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <table class="table table-striped table-bordered table-hover" width="90%">
          <thead>
            <tr>
              <th width="5%" class="center">No</th>
              <th width="85%" class="center">Rule</th> 
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              foreach ($result as $r) {
                ?>
                <tr>
                  <td class="center"><?php echo $i ?></td> 
                  <td >
                  	<b>Jika </b>
                  	<?php 
                  		$sq_kriteria = "SELECT * FROM `syarat` WHERE idKriteria=".$r['idKriteria'];
                  		$dt_kriteria = $this->db->query($sq_kriteria)->result_array();
                  		$n=0;
                  		foreach ($dt_kriteria as $d) {
                  			$ket = '';
                  			if($d['tipe']==0){
                  				$ket = ' Lebih Kecil dari';
                  			}else{
                  				$ket = ' Lebih Besar dari';
                  			}
                  			if($n==0){
                  				echo ' '.$d['Keterangan'].$ket.' '.$d['nilai'].' '.$d['satuan'];
                  			}else{
                  				echo ' Atau '.$d['Keterangan'].$ket.' '.$d['nilai'].' '.$d['satuan'];
                  			}
                  			$n++;
                  		} 
                  	?> 
                  	<br><b>Maka nilai Transaksi Kriteria</b> <?php echo $r['namaKriteria']?> = 0
                  </td> 
                </tr>
                <?php
                $i++;
              }
            ?>
            <tr>
            	<td class="center"><?php echo $i++ ?></td> 
            	<td>
                  	<b>Jika Nilai Transaksi Tidak memenuhi syarat sesuai rule maka (nilai Kriteria sama dengan nilai aktual syarat / jumlah syarat dalam 1 kriteria) * Persentase Bobot Kriteria terpilih </b>
                </td> 
            </tr>
          </tbody>
        </table>
        <br>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
