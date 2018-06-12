<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Transaksi
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Alternative - List Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
				<?php
				    if($this->session->userdata('message') <> ''){
				        echo '<div class="alert alert-info">
						            <button class="close" data-dismiss="alert">
													<i class="ace-icon fa fa-times"></i>
												</button>
												'.$this->session->userdata('message').'
				        			</div>';
				    }
				?>


        <table class="table table-striped table-bordered table-hover" width="90%">
          <thead>
            <tr>
              <th width="5%" class="center">No</th>
              <th width="15%" class="center">Kode Divisi</th>
              <th width="30%" class="center">Nama Divisi</th>
              <th width="20%" class="center">
								<?php
									if($ck_al==1){
										echo 'Action';
									}else {
										?>
										<a href="<?php echo base_url()?>index.php/transaksi/add">
											<button class="btn btn-xs btn-primary">
												<i class="ace-icon fa fa-plus bigger-120"></i>
											</button>
										</a>
										<?php
									}
								?>
						</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              foreach ($result as $r) {
                ?>
                <tr>
                  <td class="center"><?php echo $i ?></td>
                  <td class="center"><?php echo $r['vnamadivisi'] ?></td>
                  <td><?php echo $r['tketerangan'] ?></td>
									<td class="center">
										<div class="btn-group">
											<?php 
												if($r['isubmit']==1){
											?>
											<a href="<?php echo base_url().'index.php/transaksi/view/'.$r['ialternativ'] ?>">
												<button class="btn btn-xs btn-info">
													<i class="ace-icon fa fa-exchange  bigger-120"></i>
												</button>
											</a>
											<?php 
												}else{
													?>
													<a href="#">
														<button disabled class="btn btn-xs btn-info">
															<i class="ace-icon fa fa-exchange  bigger-120"></i>
														</button>
													</a>
													<?php
												}
											?>

											<a href="<?php echo base_url().'index.php/transaksi/edit/'.$r['ialternativ'] ?>">
												<button class="btn btn-xs btn-warning">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</button>
											</a> 

											<a href="<?php echo base_url().'index.php/transaksi/hapus/'.$r['ialternativ'] ?>">
												<button class="btn btn-xs btn-danger">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</button>
											</a>

										</div>

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
