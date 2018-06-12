<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Transaksi
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Alternative - Add Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
				<div class="widget-box">
				 <div class="widget-header">
					 <h4 class="widget-title">Add Alternativ</h4>
				 </div>

				 <div class="widget-body">
					 <div class="widget-main no-padding">
						 <form action="<?php echo $action ?>" method="post">
							 <fieldset>
								 <select name="idDivisi">
									 <?php
									 	foreach ($result as $r) {
										 	?>
												<option value="<?php echo $r['idDivisi']?>"><?php echo $r['vnamadivisi'].'-'.$r['tketerangan']?></option>
											<?php
									 	}
									 ?>
								 </select>
								 <button type="submit" class="btn btn-sm btn-success">
									 Submit
								 </button>
								 <a href="<?php echo base_url()?>index.php/transaksi" class="btn btn-sm btn-warning">
									 Back
								 </a>
								 <br>
							 </fieldset>
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
