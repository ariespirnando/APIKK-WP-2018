<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Rangking
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Rangking - Detail Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div> 
        <div class="page-header">
          <h1>
          <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Matrik
          </small> 
          </h1>
        </div>
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
        <div class="page-header">
          <h1>
          <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Normalisasi
          </small> 
          </h1>
        </div>
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
                        $sqlBobot = "SELECT nilaivektor FROM `rangking` WHERE 
                          ialternativ = ".$r['ialternativ']." AND idKriteria = ".$k['idKriteria'];
                  $nilai    = $this->db->query($sqlBobot)->row_array();
                  echo '<td class="center">';
                  if(empty($nilai['nilaivektor'])){
                    echo '0';
                  }else{
                    echo number_format($nilai['nilaivektor'],5);
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
        <div class="page-header">
          <h1>
          <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Vektor & Preferensi 
          </small> 
          </h1>
        </div>
        <table class="table table-striped table-bordered table-hover" width="90%">
          <thead>
            <tr>
              <th width="30%" class="center">Divisi</th> 
              <th width="30%" class="center">Nilai Vektor</th> 
              <th width="30%" class="center">Nilai Preferensi</th>  
            </tr>
          </thead>
          <tbody>
             <?php
              foreach ($result as $r) {
                ?>
                  <tr>
                    <td><?php echo $r['vnamadivisi'].' - '.$r['tketerangan']?></td>
                    <?php 
                      $sqlNilai = "SELECT nilaiVektor , nilaiRangking FROM `alternativ` WHERE ialternativ =".$r['ialternativ'];
                      $dtNilai  = $this->db->query($sqlNilai)->row_array();
                      if(empty($dtNilai['nilaiVektor'])){
                        $dtNilai['nilaiVektor'] = 0;
                      }else{
                        $dtNilai['nilaiVektor'] = number_format($dtNilai['nilaiVektor'],5);
                      }

                      if(empty($dtNilai['nilaiRangking'])){
                        $dtNilai['nilaiRangking'] = 0;
                      }else{
                        $dtNilai['nilaiRangking'] = number_format($dtNilai['nilaiRangking']*100,5);
                      }
                    ?>
                    <td class="center"><?php echo $dtNilai['nilaiVektor']?></td>
                    <td class="center"><?php echo $dtNilai['nilaiRangking']?></td> 
                  </tr>
                <?php
              }
             ?>
          </tbody>
          <tfoot>
                 <tr>
                   <td colspan="3" > 
                      <a href="<?php echo base_url()?>index.php/rangking" class="btn btn-sm btn-warning">
                        Back
                      </a>
                   </td>
                 </tr>
               </tfoot>
        </table>
        <br>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
