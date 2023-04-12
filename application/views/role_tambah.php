<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<!--?php 
  $role = @$_SESSION['role'];
  $user = @$_SESSION['login'];
?-->
<?php 
  $cek = $this->session->userdata('username');
  if($cek==null)
  {
    header('location:'.base_url());
  }
 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo base_url()."assets/dist/img/favicon.png"; ?>"/>
  <title>BEAM | Hak Akses</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/bootstrap/dist/css/bootstrap.min.css"; ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/font-awesome/css/font-awesome.min.css"; ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/Ionicons/css/ionicons.min.css"; ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/dist/css/AdminLTE.min.css"; ?>">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/dist/css/skins/skin-blue.min.css"; ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<!-- data-toggle="modal" data-target="#modal-info" -->
<!-- <div class="modal modal-info fade" id="modal-info">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Info Modal</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url().'home'; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img class="light-logo" src="<?php echo base_url().'assets/dist/img/favicon.png'; ?>"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img class="light-logo" src="<?php echo base_url().'assets/dist/img/favicon.png'; ?>">&nbsp;<img class="dark-logo" src="<?php echo base_url().'assets/dist/img/logo-beam-dark.png'; ?>"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url().'/gambar/'.$this->session->userdata('gambar'); ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url().'/gambar/'.$this->session->userdata('gambar'); ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('username'); ?>
                  <small><?php echo $this->session->userdata('namarole'); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url().'user/profil/'.$this->session->userdata('id'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'logout'; ?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- beranda -->
        <li class="">
          <a href="<?php echo base_url().'home'; ?>">
            <i class="fa fa-dashcube"></i> <span>Beranda</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span> -->
          </a>
        </li>
        <?php
        if(!empty($menu))
        {
            foreach($menu as $datas)
            { if($datas->men_nama == 'keloladata') { ?> <li class="header">Pengelolaan Data Master</li>
        <!-- Optionally, you can add icons to the links -->
        <?php } else if($datas->men_nama == 'hakakses') { ?> <li class="active"><a href="<?php echo base_url().'role'; ?>"><i class="fa fa-users"></i> <span>Hak Akses </span></a></li>
        <?php } else if($datas->men_nama == 'pengguna') { ?> <li class=""><a href="<?php echo base_url().'user'; ?>"><i class="fa fa-user"></i> <span>Pengguna </span></a></li>
        <?php } else if($datas->men_nama == 'plant') { ?> <li class=""><a href="<?php echo base_url().'plant'; ?>"><i class="fa fa-building"></i> <span>Pabrik </span></a></li> 
        <?php } else if($datas->men_nama == 'area') { ?> <li class=""><a href="<?php echo base_url().'area'; ?>"><i class="fa fa-globe"></i> <span>Area </span></a></li> 
        <?php } else if($datas->men_nama == 'departemen') { ?> <li class=""><a href="<?php echo base_url().'departemen'; ?>"><i class="fa fa-location-arrow"></i> <span>Departemen </span></a></li> 
        <?php } else if($datas->men_nama == 'itempemeriksaan') { ?> <li class=""><a href="<?php echo base_url().'itemcheck'; ?>"><i class="fa fa-list-alt"></i> <span>Item Pemeriksaan </span></a></li>
        <?php } else if($datas->men_nama == 'jenisperalatan') { ?> <li class=""><a href="<?php echo base_url().'typeequip'; ?>"><i class="fa fa-cubes"></i> <span>Jenis Peralatan </span></a></li>
        <?php } else if($datas->men_nama == 'peralatan') { ?> <li class=""><a href="<?php echo base_url().'equip'; ?>"><i class="fa fa-cube"></i> <span>Peralatan </span></a></li>
        <?php } else if($datas->men_nama == 'transaksi') { ?> <li class="header">Transaksi</li>
        <?php } else if($datas->men_nama == 'pemindaikode') { ?> <li class=""><a href="<?php echo base_url().'scan'; ?>"><i class="fa fa-qrcode"></i> <span>Pemindai Kode </span></a></li>
        <?php } else if($datas->men_nama == 'lembarpemeriksaan') { ?> <li class=""><a href="<?php echo base_url().'checksheet'; ?>"><i class="fa fa-check-square-o"></i> <span>Lembar Pemeriksaan </span></a></li>
        <?php } else if($datas->men_nama == 'sentdraft') { ?> <li class=""><a href="<?php echo base_url().'checksheet/sentdraft'; ?>"><i class="fa fa-list-alt"></i> <span>Finalisasi Data </span></a></li>
        <?php } else if($datas->men_nama == 'sentapprovega') { ?> <li class=""><a href="<?php echo base_url().'checksheet/sentapprovega'; ?>"><i class="fa fa-list-alt"></i> <span>Persetujuan oleh PIC GA </span></a></li>
        <?php } else if($datas->men_nama == 'sentapproveuser') { ?> <li class=""><a href="<?php echo base_url().'checksheet/sentapproveuser'; ?>"><i class="fa fa-list-alt"></i> <span>Umpan Balik </span></a></li>
        <?php } else if($datas->men_nama == 'laporan') { ?> <li class="header">Laporan</li> <li class=""><a href="<?php echo base_url().'graph/harian'; ?>"><i class="fa fa-line-chart"></i> <span>Grafik Analisa Harian</span></a></li><li class=""><a href="<?php echo base_url().'graph/bulanan'; ?>"><i class="fa fa-line-chart"></i> <span>Grafik Analisa Bulanan</span></a></li><li class=""><a href="<?php echo base_url().'graph/kondisiitem'; ?>"><i class="fa fa-line-chart"></i> <span>Grafik Kondisi by Item</span></a></li>
        <?php }
            }
          }
        ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hak Akses
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'home'; ?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Hak Akses</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data</h3>
        </div>
      <?php
          echo form_open('role/tambah', 'class="form-horizontal"');
      ?>
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-10">
              <?php
                $deskripsi = array('name'=>'deskripsi', 'maxlength'=>'254','value'=>"", 'class'=>'form-control');
                echo form_input($deskripsi);
                echo form_error('deskripsi');
              ?>     
            </div>
          </div>
          <div class="panel box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Hak Akses Menu
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th>Menu</th>
                    <th><i>Access</i></th>
                    <th><i>Insert</i></th>
                    <th><i>Update</i></th>
                    <th><i>Delete</i></th>
                    <th><i>Special</i></th>
                  </tr>
                  <?php 
                    for($i = 1; $i < 17; $i++)
                    {
                      if($i==1)
                      { ?>
                      <tr class="bg-gray color-palette">
                        <td>Pengelolaan Data Master</td>
                      <?php
                      }
                      else if($i==2)
                      { ?>
                      <tr>
                        <td>Hak Akses</td>
                      <?php
                      }
                      else if($i==3)
                      { ?>
                      <tr>
                        <td>Pengguna</td>
                      <?php
                      }
                      else if($i==4)
                      { ?>
                      <tr>
                        <td>Pabrik</td>
                      <?php
                      }
                      else if($i==5)
                      { ?>
                      <tr>
                        <td>Area</td>
                      <?php
                      }
                      else if($i==6)
                      { ?>
                      <tr>
                        <td>Departemen</td>
                      <?php
                      }
                      else if($i==7)
                      { ?>
                      <tr>
                        <td>Item Pemeriksaan</td>
                      <?php
                      }
                      else if($i==8)
                      { ?>
                      <tr>
                        <td>Jenis Peralatan</td>
                      <?php
                      }
                      else if($i==9)
                      { ?>
                      <tr>
                        <td>Peralatan</td>
                      <?php
                      }
                      else if($i==10)
                      { ?>
                      <tr class="bg-gray color-palette">
                        <td>Transaksi</td>
                      <?php
                      }
                      else if($i==11)
                      { ?>
                      <tr>
                        <td>Pemindai Kode</td>
                      <?php
                      }
                      else if($i==12)
                      { ?>
                      <tr>
                        <td>Lembar Pemeriksaan</td>
                      <?php
                      }
                      else if($i==13)
                      { ?>
                      <tr>
                        <td>Daftar Persetujuan - Draft</td>
                      <?php
                      }
                      else if($i==14)
                      { ?>
                      <tr>
                        <td>Daftar Persetujuan - Approve by GA</td>
                      <?php
                      }
                      else if($i==15)
                      { ?>
                      <tr>
                        <td>Daftar Persetujuan - Approve by User</td>
                      <?php
                      }
                      else if($i==16)
                      { ?>
                      <tr class="bg-gray color-palette">
                        <td>Laporan</td>
                      <?php
                      }
                      for($x = 1; $x < 6; $x++)
                      {
                        ?>
                        <td>
                        <?php
                        echo form_checkbox($i.$x, 1, FALSE);
                        ?>
                        </td>
                        <?php
                      }
                      ?>
                      </tr>
                      <?php
                    }
                    ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="box-tools pull-right">
            <a href="<?php echo base_url().'role'; ?>" class="btn btn-default">Kembali</a> &nbsp;
            <?php 
              echo form_submit('submit', 'Simpan', 'id="submit" class="btn btn-info"');
            ?>
          </div>
        </div>
          <!-- /.box-footer -->
        <?php echo form_close(); ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">GAO3 ADM-KAP</a>.</strong> All rights reserved. Watermark by <a href="https://adminlte.io/themes/AdminLTE/index2.html">AdminLTE2</a>.
  </footer>
  <div class="control-sidebar-bg"></div>  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()."assets/bower_components/jquery/dist/jquery.min.js"; ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."assets/bower_components/bootstrap/dist/js/bootstrap.min.js"; ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/dist/js/adminlte.min.js"; ?>"></script>

<script>
  $('input[name=11]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=21]').prop('checked', true);
      $('input[name=31]').prop('checked', true);
      $('input[name=41]').prop('checked', true);
      $('input[name=51]').prop('checked', true);
      $('input[name=61]').prop('checked', true);
      $('input[name=71]').prop('checked', true);
      $('input[name=81]').prop('checked', true);
      $('input[name=91]').prop('checked', true);
    } else {
      $('input[name=21]').prop('checked', false);
      $('input[name=31]').prop('checked', false);
      $('input[name=41]').prop('checked', false);
      $('input[name=51]').prop('checked', false);
      $('input[name=61]').prop('checked', false);
      $('input[name=71]').prop('checked', false);
      $('input[name=81]').prop('checked', false);
      $('input[name=91]').prop('checked', false);
    }
  });
  $('input[name=11]').trigger('change');
  $('input[name=12]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=22]').prop('checked', true);
      $('input[name=32]').prop('checked', true);
      $('input[name=42]').prop('checked', true);
      $('input[name=52]').prop('checked', true);
      $('input[name=62]').prop('checked', true);
      $('input[name=72]').prop('checked', true);
      $('input[name=82]').prop('checked', true);
      $('input[name=92]').prop('checked', true);
    } else {
      $('input[name=22]').prop('checked', false);
      $('input[name=32]').prop('checked', false);
      $('input[name=42]').prop('checked', false);
      $('input[name=52]').prop('checked', false);
      $('input[name=62]').prop('checked', false);
      $('input[name=72]').prop('checked', false);
      $('input[name=82]').prop('checked', false);
      $('input[name=92]').prop('checked', false);
    }
  });
  $('input[name=12]').trigger('change');
  $('input[name=13]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=23]').prop('checked', true);
      $('input[name=33]').prop('checked', true);
      $('input[name=43]').prop('checked', true);
      $('input[name=53]').prop('checked', true);
      $('input[name=63]').prop('checked', true);
      $('input[name=73]').prop('checked', true);
      $('input[name=83]').prop('checked', true);
      $('input[name=93]').prop('checked', true);
    } else {
      $('input[name=23]').prop('checked', false);
      $('input[name=33]').prop('checked', false);
      $('input[name=43]').prop('checked', false);
      $('input[name=53]').prop('checked', false);
      $('input[name=63]').prop('checked', false);
      $('input[name=73]').prop('checked', false);
      $('input[name=83]').prop('checked', false);
      $('input[name=93]').prop('checked', false);
    }
  });
  $('input[name=13]').trigger('change');
  $('input[name=14]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=24]').prop('checked', true);
      $('input[name=34]').prop('checked', true);
      $('input[name=44]').prop('checked', true);
      $('input[name=54]').prop('checked', true);
      $('input[name=64]').prop('checked', true);
      $('input[name=74]').prop('checked', true);
      $('input[name=84]').prop('checked', true);
      $('input[name=94]').prop('checked', true);
    } else {
      $('input[name=24]').prop('checked', false);
      $('input[name=34]').prop('checked', false);
      $('input[name=44]').prop('checked', false);
      $('input[name=54]').prop('checked', false);
      $('input[name=64]').prop('checked', false);
      $('input[name=74]').prop('checked', false);
      $('input[name=84]').prop('checked', false);
      $('input[name=94]').prop('checked', false);
    }
  });
  $('input[name=14]').trigger('change');
  $('input[name=15]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=25]').prop('checked', true);
      $('input[name=35]').prop('checked', true);
      $('input[name=45]').prop('checked', true);
      $('input[name=55]').prop('checked', true);
      $('input[name=65]').prop('checked', true);
      $('input[name=75]').prop('checked', true);
      $('input[name=85]').prop('checked', true);
      $('input[name=95]').prop('checked', true);
    } else {
      $('input[name=25]').prop('checked', false);
      $('input[name=35]').prop('checked', false);
      $('input[name=45]').prop('checked', false);
      $('input[name=55]').prop('checked', false);
      $('input[name=65]').prop('checked', false);
      $('input[name=75]').prop('checked', false);
      $('input[name=85]').prop('checked', false);
      $('input[name=95]').prop('checked', false);
    }
  });
  $('input[name=15]').trigger('change');
  $('input[name=101]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=111]').prop('checked', true);
      $('input[name=121]').prop('checked', true);
      $('input[name=131]').prop('checked', true);
      $('input[name=141]').prop('checked', true);
      $('input[name=151]').prop('checked', true);
    } else {
      $('input[name=111]').prop('checked', false);
      $('input[name=121]').prop('checked', false);
      $('input[name=131]').prop('checked', false);
      $('input[name=141]').prop('checked', false);
      $('input[name=151]').prop('checked', false);
    }
  });
  $('input[name=101]').trigger('change');
  $('input[name=102]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=112]').prop('checked', true);
      $('input[name=122]').prop('checked', true);
      $('input[name=132]').prop('checked', true);
      $('input[name=142]').prop('checked', true);
      $('input[name=152]').prop('checked', true);
    } else {
      $('input[name=112]').prop('checked', false);
      $('input[name=122]').prop('checked', false);
      $('input[name=132]').prop('checked', false);
      $('input[name=142]').prop('checked', false);
      $('input[name=152]').prop('checked', false);
    }
  });
  $('input[name=102]').trigger('change');
  $('input[name=103]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=113]').prop('checked', true);
      $('input[name=123]').prop('checked', true);
      $('input[name=133]').prop('checked', true);
      $('input[name=143]').prop('checked', true);
      $('input[name=153]').prop('checked', true);
    } else {
      $('input[name=113]').prop('checked', false);
      $('input[name=123]').prop('checked', false);
      $('input[name=133]').prop('checked', false);
      $('input[name=143]').prop('checked', false);
      $('input[name=153]').prop('checked', false);
    }
  });
  $('input[name=103]').trigger('change');
  $('input[name=104]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=114]').prop('checked', true);
      $('input[name=124]').prop('checked', true);
      $('input[name=134]').prop('checked', true);
      $('input[name=144]').prop('checked', true);
      $('input[name=154]').prop('checked', true);
    } else {
      $('input[name=114]').prop('checked', false);
      $('input[name=124]').prop('checked', false);
      $('input[name=134]').prop('checked', false);
      $('input[name=144]').prop('checked', false);
      $('input[name=154]').prop('checked', false);
    }
  });
  $('input[name=104]').trigger('change');
  $('input[name=105]').change(function () {
    if ($(this).prop('checked')) {
      $('input[name=115]').prop('checked', true);
      $('input[name=125]').prop('checked', true);
      $('input[name=135]').prop('checked', true);
      $('input[name=145]').prop('checked', true);
      $('input[name=155]').prop('checked', true);
    } else {
      $('input[name=115]').prop('checked', false);
      $('input[name=125]').prop('checked', false);
      $('input[name=136]').prop('checked', false);
      $('input[name=146]').prop('checked', false);
      $('input[name=156]').prop('checked', false);
    }
  });
  $('input[name=105]').trigger('change');
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
