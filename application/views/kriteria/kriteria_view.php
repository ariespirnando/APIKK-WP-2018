<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Data
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Kriteria - List Data
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
              <th width="5%" class="center">Tipe</th> 
              <th width="15%" class="center">Kriteria</th>
							<th width="5%" class="center">Bobot (%)</th>
							<th width="5%" class="center">Normalisasi</th>
							<th width="45%" class="center">Persyaratan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              foreach ($result as $r) {
                ?>
                <tr>
                  <td class="center"><?php echo $i ?></td>
				  <td ><?php 
					  if($r['tipe']==1){
					  	echo 'Benefit';
					  }else{
					  	echo 'Cost';
					  }
					  ?>
				  </td>					 
                  <td ><?php echo $r['namaKriteria'] ?></td>
									<td class="center" ><?php echo $r['bobot'] ?> %</td>
									<td class="center" ><?php echo $r['normalisasi'] ?></td>
									<td >
										<?php
											$sql = "SELECT * FROM `syarat` WHERE idKriteria = ".$r['idKriteria'];
											$dt = $this->db->query($sql)->result_array();
											echo '<ul>';
											foreach ($dt as $d) { 
												echo '<li>'.$d['Keterangan']; 
											}
											echo '</ul>';
										?>
									</td>
                </tr>
                <?php
                $i++;
              }
            ?>
          </tbody>
        </table>
        <br>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
