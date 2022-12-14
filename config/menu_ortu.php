
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<img src="../assets/logo1-pip.jpeg" width="70" style="float:left; margin-right:5px; margin-top:5px;">
					<a class="navbar-brand" href="#"><span>APLIKASI PENDISTRIBUSIAN DANA PIP SDN KOTA BANJARBARU</span></a>
			
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background: #FFE4B5">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<?php
$query_foto = mysqli_query($koneksi, "SELECT nama, foto FROM user WHERE id_user = '$id_user'");
$data_foto = mysqli_fetch_array($query_foto);
				?>
				<img src="<?= $data_foto['foto'] ?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?= $data_foto['nama'] ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<ul class="nav menu">
			<li class="active"><a href="?page=dashboard"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="?page=akun"><em class="fa fa-user">&nbsp;</em> Data Diri</a></li>


			<li class="parent"><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-file">&nbsp;</em> Laporan <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="<?php isset($_GET['page']) && $_GET['page'] == "laporan_cair" ? print("active") : "" ?>" href="?page=laporan_cair">
						<span class="fa fa-arrow-right">&nbsp;</span> Lap. Pencairan PIP
					</a></li>
					<li><a class="<?php isset($_GET['page']) && $_GET['page'] == "guna_dana_data" ? print("active") : "" ?>" href="?page=guna_dana_data">
						<span class="fa fa-arrow-right">&nbsp;</span> Lap. Penggunaan Dana
					</a></li>
					
					
					
				</ul>
			</li>
			<li class="parent"><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-navicon">&nbsp;</em> Bahan Evaluasi <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
				
					<li><a class="<?php isset($_GET['page']) && $_GET['page'] == "ken_sol" ? print("active") : "" ?>" href="?page=ken_sol">
						<span class="fa fa-arrow-right">&nbsp;</span> Kendala & Solusi
					</a></li>
					<li><a class="<?php isset($_GET['page']) && $_GET['page'] == "laporan_ken_sol" ? print("active") : "" ?>" href="?page=laporan_ken_sol">
						<span class="fa fa-arrow-right">&nbsp;</span> Lap.Kendala & Solusi
					</a></li>
					</ul>
			</li>
			
			<li><a href="../config/logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->