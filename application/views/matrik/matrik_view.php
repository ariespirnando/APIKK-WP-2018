<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Matrik
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Matrik - List Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <table class="table table-striped table-bordered table-hover" width="90%">
          <thead>
            <tr>
              <th width="30%" class="center">Divisi/Kriteria</th> 
              <?php
              	foreach ($kriteria as $k) { 
              		?>
              			<th class="center"><?php echo $k['namaKriteria']?><br><i>
                    <?php 
                    if($k['tipe']==1){
                      echo 'Benefit';
                    }else{
                      echo 'Cost';
                    } 
                    ?>
                    </i></th>
              		<?php
              	}
              ?>
            </tr>
          </thead>
          <tbody>
             <?php
             	foreach ($result as $r) {
             		?>
             			<tr>
             				<td width="40%"><?php echo $r['vnamadivisi'].' - '.$r['tketerangan']?></td>
             				<?php 
             					foreach ($kriteria as $k) {  
             						$sqlBobot = "SELECT nilaiRangking FROM `rangking` WHERE 
             							ialternativ = ".$r['ialternativ']." AND idKriteria = ".$k['idKriteria'];
									$nilai    = $this->db->query($sqlBobot)->row_array();
									echo '<td class="center">';
									if(empty($nilai['nilaiRangking'])){
										echo '0';
									}else{
										echo $nilai['nilaiRangking'];
									} 
									echo '</td>';
             					}
             				?>
             			</tr>
             		<?php
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
