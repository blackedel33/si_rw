<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/head') ?>

<body class="no-skin">
	<?php $this->load->view('admin/navbar') ?>

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		</script>

		<?php $this->load->view('admin/sidebar') ?>

		<div class="main-content">
			<div class="main-content-inner">
				<div class="breadcrumbs ace-save-state" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="#">Home</a>
						</li>						
						<li class="active">pembayaran</li>
					</ul><!-- /.breadcrumb -->

					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div><!-- /.nav-search -->
				</div>

				<div class="page-content">
					<div class="ace-settings-container" id="ace-settings-container">
						<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</div>

						<div class="ace-settings-box clearfix" id="ace-settings-box">
							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<div class="pull-left">
										<select id="skin-colorpicker" class="hide">
											<option data-skin="no-skin" value="#438EB9">#438EB9</option>
											<option data-skin="skin-1" value="#222A2D">#222A2D</option>
											<option data-skin="skin-2" value="#C6487E">#C6487E</option>
											<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
										</select>
									</div>
									<span>&nbsp; Choose Skin</span>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
									<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
									<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
									<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
									<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
									<label class="lbl" for="ace-settings-add-container">
										Inside
										<b>.container</b>
									</label>
								</div>
							</div><!-- /.pull-left -->

							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
									<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
									<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
									<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
								</div>
							</div><!-- /.pull-left -->
						</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

					<div class="page-header">
						<h1>
							Pembayaran
						</h1>
					</div><!-- /.page-header -->
					
<!-- 						<a href="<?= base_url() ?>rw/pembayaran/tambah">
							<button type="button" class="btn btn-sm btn-success"><i class="ace-icon fa fa-plus icon-on-right bigger-110"></i> Tambah pembayaran
							</button>
						</a> -->
						<br><br>

						Pilih tahun:
						<select id="tahun">
							<?php
							$m = date("Y") + 1;
							for ($i=2012; $i <= $m; $i++) {
								if($i == $tahun)
									$selected = "selected";
								else
									$selected = "";
								?>
								<option <?= $selected ?> value="<?= base_url() ?>rw/pembayaran/index/<?= $i ?>"><?= $i ?></option>
							<?php
							}
							?>
						</select>

						<br><br>

					<div id="result">
						<span style="font-size:20px;">Tahun : <?= $tahun ?></span><br><br>
						<table id="simple-table" class="table  table-bordered table-hover"  border=1 width=100% cellpadding=5px>
							<thead>
								<tr>
									<th class="detail-col">No.</th>
									<th>Nama</th>																
									<th>1</th>
									<th>2</th>
									<th>3</th>
									<th>4</th>
									<th>5</th>
									<th>6</th>
									<th>7</th>
									<th>8</th>
									<th>9</th>
									<th>10</th>
									<th>11</th>
									<th>12</th>
								</tr>
							</thead>

							<tbody>												
								<?php 
								$i = 1;
								foreach ($warga as $w): ?>
									<tr>
										<td><?= $i ?></td>
										<td><?= $w->nama ?></td>
										<?php
										for ($i=0; $i < 12; $i++) { 
											$status = isset($pembayaran[$w->id][$i]->status) ? "L" : "B";
										?>
											<td><?= $status ?></td>
										<?php
										} ?>
									</tr>
								<?php 
								$i++;
								endforeach; ?>
							</tbody>
						</table>
					</div>
					
					<button onClick="printElem('result')">Print</button>

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

<?php $this->load->view('admin/footer') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $("#tahun").change(function()
		{
		    document.location.href = $(this).val();
		});
	});
</script>
</body>
</html>
