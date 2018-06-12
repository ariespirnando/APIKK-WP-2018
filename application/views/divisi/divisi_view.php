<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Data
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Divisi - List Data
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
              <th width="15%" class="center">Kode Divisi</th>
              <th width="35%" class="center">Nama Divisi</th>
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
