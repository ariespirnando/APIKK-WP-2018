<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
				<h1>
					Rangking
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Rangking - View
					</small>
				</h1>
			</div>
				<div class="pull-right"></div>
			</div>
		<div> 
			<div class="row">
									 

			<div class="col-sm-4"> 
				<div class="row center" >  
					<div class="space-4"></div><div class="space-4"></div>
					<span class="profile-picture">
						<img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" src="<?php echo base_url() ?>assets/images/avatars/profile-pic.jpg">
					</span>

					<div class="space-4"></div>

					<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
						<div class="inline position-relative">
							<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
								<span class="white">Novellpharm Master</span>
							</a>

						</div>
					</div> 
				</div>
			</div>

			<div class="col-sm-8"> 
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box">
							<div class="widget-header widget-header-flat">
								<h4 class="smaller">
									<i class="ace-icon fa fa-flag"></i>
									Rangking
								</h4> 
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<table class="table table-bordered table-hover" width="90%"> 
							          <tbody>
							          	<tr>
											 <td colspan="3" > 
										 			<a href="<?php echo base_url()?>index.php/rangking/detail" class="btn btn-sm btn-warning">
										 				Detail
										 			</a>
											 </td>
										 </tr> 
							          	<?php 
							          		$i = 1;
							          		foreach ($result as $r) {
							          			$color = "";
							          			$pers = " %";
							          			if(empty($r['rank']) or $r['rank']==0){
							          				$color = ' bgcolor="#696969"';
							          				$pers = " ";
							          			}
							          			?>
							          				<tr <?php echo $color ?>>
							          					<td><?php echo $i?></td>
							          					<td><?php echo $r['tketerangan']?></td>
							          					<td><?php echo number_format($r['rank'],5).$pers?> </td>
							          				</tr>
							          			<?php
							          			$i++;
							          		}
							          	?>
							          </tbody> 
										 
							          </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        	<br>
		</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
