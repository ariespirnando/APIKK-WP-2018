<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Transaksi
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Alternative - Edit Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
				<div class="widget-box">
				 <div class="widget-header">
					 <h4 class="widget-title">Edit Nilai Divisi</h4>
				 </div>

				<div class="widget-body">
				<div class="widget-main no-padding">
				<form action="<?php echo $action ?>" method="post">
				<table class="table table-bordered table-hover" width="90%">
		           <thead>
					 <tr>
		               	<th colspan="2">Divisi / Alternative</th>
		               	<th colspan="2"><?php echo $row['vnamadivisi'].' - '.$row['tketerangan'] ?>
		               	<input type="hidden" name="alternativeId" value="<?php echo $row['ialternativ'] ?>">
		               	</th>
		             </tr>
		             <tr>
		               	<th width="5%" class="center">No</th>
		               	<th width="10%" class="center">Kriteria</th>
					 	<th width="70%" class="center">Persyaratan</th>
				 		<th width="5%" class="center">Bobot</th>
		             </tr>
		           </thead>
		           <tbody>
		             <?php
		               $i = 1;
		               foreach ($result as $r) {
		                 ?>
		                 <tr>
		                   <td class="center"><?php echo $i ?></td>
		                   <td style="vertical-align:middle;"><?php echo $r['namaKriteria'] ?></td>

		 									<td >
		 										<?php
		 											$sql = "SELECT * FROM `syarat` WHERE idKriteria = ".$r['idKriteria'];
		 											$dt = $this->db->query($sql)->result_array();
		 											foreach ($dt as $d) {
														$syn = "SELECT * FROM `nilai` WHERE isyarat=".$d['isyarat']." ORDER BY iurutan DESC";
														$to = $this->db->query($syn)->num_rows()+1;
														$is = $this->db->query($syn)->result_array();
		 											 ?>
													 	<table class="table table-bordered table-hover" width="90%">
															<tr>
																<td rowspan="<?php echo $to ?>" width="30%"><?php echo $d['Keterangan']?></td>
															</tr>
															<?php
																$ck = 0; 
																foreach ($is as $is) {
																	?>
																		<tr>
																			<td width="40%"><?php echo $is['tketerangan']?></td>
																			<td width="10%" class="center">  
																				<?php 
																					if($ck==$to-2){
																						?>
																							<input checked class="radio_<?php echo $d['isyarat']?>" name="radio_in_<?php echo $r['idKriteria']?>_<?php echo $d['isyarat']?>" type="radio" value="<?php echo $is['inilai'] ?>">
																						<?php
																					}else{
																						?>
																							<input class="radio_<?php echo $d['isyarat']?>" name="radio_in_<?php echo $r['idKriteria']?>_<?php echo $d['isyarat']?>" type="radio" value="<?php echo $is['inilai'] ?>"> 
																						<?php
																					}
																				?>
																				
																			</td>
																			<td width="10%" class="center"><?php echo $is['nilai_aktual']?></td>
																		</tr>
																	<?php
																	$ck++;
																}
														  ?>
														</table>
													 <?php
		 											}
		 										?>
		 									</td>
											<td class="center" style="vertical-align:middle;"><?php echo $r['bobot'] ?> %</td>
		                 </tr>
		                 <?php
		                 $i++;
		               }
		             ?>
		           </tbody>
							 <tfoot>
								 <tr>
									 <td colspan="4" >
										 	<button type="submit" class="btn btn-sm btn-success">
								 				Submit
								 			</button>
								 			<a href="<?php echo base_url()?>index.php/transaksi" class="btn btn-sm btn-warning">
								 				Back
								 			</a>
									 </td>
								 </tr>
							 </tfoot>
		         </table>
		         </form>
					 </div>
				 </div>
			 </div>
        <br>

			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
