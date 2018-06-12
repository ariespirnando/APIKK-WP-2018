<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Data
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Nilai - List Data
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
              <th width="35%" class="center">Persyaratan</th>
              <th width="50%" class="center">Parameter</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              foreach ($result as $r) {
                ?>
                <tr>
                  <td class="center"><?php echo $i ?></td>
                  <td><?php echo $r['Keterangan'] ?></td>
									<td>
										<table class="table table-striped table-bordered table-hover" width="90%">
											<?php
												$sql = "SELECT * FROM `nilai` WHERE isyarat = ".$r['isyarat']." ORDER BY `iurutan` DESC";
												$dt = $this->db->query($sql)->result_array();
												foreach ($dt as $d) {
													?>
														<tr>
															<td width="50%"><?php echo $d['tketerangan'] ?></td>
															<td width="40%"><?php echo $d['nilai_aktual'] ?></td>
														</tr>
													<?php
												}
											?>
										</table>
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
