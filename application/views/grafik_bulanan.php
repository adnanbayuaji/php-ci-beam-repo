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
  $bulanans = array(
    '1' => 'Januari',
    '2' => 'Februari',
    '3' => 'Maret',
    '4' => 'April',
    '5' => 'Mei',
    '6' => 'Juni',
    '7' => 'Juli',
    '8' => 'Agustus',
    '9' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
  );
  $cek = $this->session->userdata('username');
  if($cek==null)
  {
    header('location:'.base_url());
  }
  if(!empty($datas))
  {
    foreach($datas as $try){
        $bulan[] = $try->bulan;
        $total[] = $try->total;
    }
  }
  else
  {
    $bulan[] = "";
    $total[] = "";
  }
  if(!empty($oknokbyfunc))
  {
    foreach($oknokbyfunc as $try1){
        $tanggal1[] = $try1->tanggal;
        $okg[] = $try1->ok;
        $nokg[] = $try1->nok;
        $okbyfuncg[] = $try1->okbyfunc;
    }
  }
  else
  {
    $tanggal1[] = "";
    $okg[] = "";
    $nokg[] = "";
    $okbyfuncg[] = "";
  }
  if(!empty($feedback))
  {
    foreach($feedback as $try2){
        $tanggal2[] = $try2->tanggal;
        $total2[] = $try2->total;
    }
  }
  else
  {
    $tanggal2[] = "";
    $total2[] = "";
  }
 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo base_url()."assets/dist/img/favicon.png"; ?>"/>
  <title>BEAM | Grafik Bulanan</title>
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
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"; ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"; ?>">

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
        <?php } else if($datas->men_nama == 'hakakses') { ?> <li class=""><a href="<?php echo base_url().'role'; ?>"><i class="fa fa-users"></i> <span>Hak Akses </span></a></li>
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
        <?php } else if($datas->men_nama == 'laporan') { ?> <li class="header">Laporan</li> <li class=""><a href="<?php echo base_url().'graph/harian'; ?>"><i class="fa fa-line-chart"></i> <span>Grafik Analisa Harian</span></a></li><li class="active"><a href="<?php echo base_url().'graph/bulanan'; ?>"><i class="fa fa-line-chart"></i> <span>Grafik Analisa Bulanan</span></a></li><li class=""><a href="<?php echo base_url().'graph/kondisiitem'; ?>"><i class="fa fa-line-chart"></i> <span>Grafik Kondisi by Item</span></a></li>
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
    
    <section class="content-header">
      <h1>
        Grafik Analisa - Bulanan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'home'; ?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Grafik Bulanan</li>
      </ol>
    </section>

    <!-- Content Header (Page header) -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <?php
              echo form_open('graph/bulanan', 'class="form-horizontal"');
          ?>
          <div class="form-group">
            <div class="col-sm-3">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <?php
                  echo form_dropdown('tahun', $tahun, array(), array('class' => 'form-control select2'));
                  echo form_error('awal');
                ?>   
              </div> 
            </div>
            <div class="col-sm-1">
              <div style="text-align: center;">
                <?php 
                  echo form_submit('submit', 'Filter', 'id="submit" class="btn btn-info btn-sm"');
                ?>
              </div>
            </div>
            <div class="col-sm-8">
               
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Lembar Pemeriksaan</h3>
        </div>
        <div class="box-body">  
          <canvas id="myChart" width="400" height="150"></canvas>
          <br/>
          <div class="row justify-content-center">
            <div class="col-lg-12">
                <div style="text-align: center;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" id="btnShow">
                    <i class="fa fa-eye"></i>&nbsp;Tampilkan Detail
                  </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" id="btnHide" style="display:none;">
                    <i class="fa fa-eye-slash"></i>&nbsp;Sembunyikan Detail
                  </button>
                </div>
            </div>
          </div>
          <br/>
          <div runat="server" id="divChart" style="display:none;">
            <div class="form-group">
              <div class="col-lg-12">
                <div style="overflow: auto">
                  <table id="example2" class="table table-striped">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Bulan</th>
                        <?php
                        if(!empty($equip))
                        {
                          foreach($equip as $data)
                          {
                            ?>
                              <th> <?php 
                                  echo $data->equ_nama; ?> </th>
                        <?php
                          }
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        if(!empty($hasil))
                        {
                          foreach($hasil as $data)
                          {
                              ?>
                              <tr>
                              <td> <?php echo $no; ?> </td>
                              <td> <?php
                                    // $month_name = date("M", mktime(0, 0, 0, $data->bulan, 10));  
                                    // echo $month_name;
                                    echo $bulanans[$data->bulan];
                                     ?> </td>
                              <?php
                              if(!empty($equips))
                              {
                                foreach($equips as $datas)
                                {
                                  $strings = $datas->equ_replace;
                                  ?>
                                    <th><?php echo $data->$strings; ?> </th>
                              <?php
                                }
                              }
                              ?>
                              </tr>
                              <?php
                              $no++;
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
        </div> -->
      </div>
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">OK | NOK | OK by func</h3>
        </div>
        <div class="box-body">
          <canvas id="myChart1" width="400" height="150"></canvas>
          <br/>
          <div class="row justify-content-center">
            <div class="col-lg-12">
                <div style="text-align: center;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" id="btnShow1">
                    <i class="fa fa-eye"></i>&nbsp;Tampilkan Detail
                  </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" id="btnHide1" style="display:none;">
                    <i class="fa fa-eye-slash"></i>&nbsp;Sembunyikan Detail
                  </button>
                </div>
            </div>
          </div>
          <br/>
          <div runat="server" id="divChart1" style="display:none;">
            <div class="form-group">
              <div class="col-lg-12">
                <h3><b>OK</b></h3>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div style="overflow: auto">
                  <table id="example2" class="table table-striped">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <?php
                        if(!empty($equip))
                        {
                          foreach($equip as $data)
                          {
                            ?>
                              <th> <?php echo $data->equ_nama; ?> </th>
                        <?php
                          }
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        if(!empty($hasilok))
                        {
                          foreach($hasilok as $data)
                          {
                              ?>
                              <tr>
                              <td> <?php echo $no; ?> </td>
                              <td> <?php echo $bulanans[$data->bulan]; ?> </td>
                              <?php
                              if(!empty($equips))
                              {
                                foreach($equips as $datas)
                                {
                                  $strings = $datas->equ_replace;
                                  ?>
                                    <th><?php echo $data->$strings; ?> </th>
                              <?php
                                }
                              }
                              ?>
                              </tr>
                              <?php
                              $no++;
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <h3><b>NOK</b></h3>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div style="overflow: auto">
                  <table id="example2" class="table table-striped">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <?php
                        if(!empty($equip))
                        {
                          foreach($equip as $data)
                          {
                            ?>
                              <th> <?php echo $data->equ_nama; ?> </th>
                        <?php
                          }
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        if(!empty($hasilnok))
                        {
                          foreach($hasilnok as $data)
                          {
                              ?>
                              <tr>
                              <td> <?php echo $no; ?> </td>
                              <td> <?php echo $bulanans[$data->bulan]; ?> </td>
                              <?php
                              if(!empty($equips))
                              {
                                foreach($equips as $datas)
                                {
                                  $strings = $datas->equ_replace;
                                  ?>
                                    <th><?php echo $data->$strings; ?> </th>
                              <?php
                                }
                              }
                              ?>
                              </tr>
                              <?php
                              $no++;
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <h3><b>OK by Function</b></h3>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div style="overflow: auto">
                  <table id="example2" class="table table-striped">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <?php
                        if(!empty($equip))
                        {
                          foreach($equip as $data)
                          {
                            ?>
                              <th> <?php echo $data->equ_nama; ?> </th>
                        <?php
                          }
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        if(!empty($hasilokbyfunc))
                        {
                          foreach($hasilokbyfunc as $data)
                          {
                              ?>
                              <tr>
                              <td> <?php echo $no; ?> </td>
                              <td> <?php echo $bulanans[$data->bulan]; ?> </td>
                              <?php
                              if(!empty($equips))
                              {
                                foreach($equips as $datas)
                                {
                                  $strings = $datas->equ_replace;
                                  ?>
                                    <th><?php echo $data->$strings; ?> </th>
                              <?php
                                }
                              }
                              ?>
                              </tr>
                              <?php
                              $no++;
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
        </div> -->
      </div>
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Feedback User</h3>
        </div>
        <div class="box-body">
          <canvas id="myChart2" width="400" height="150"></canvas>
          <br/>
          <div class="row justify-content-center">
            <div class="col-lg-12">
                <div style="text-align: center;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" id="btnShow2">
                    <i class="fa fa-eye"></i>&nbsp;Tampilkan Detail
                  </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" id="btnHide2" style="display:none;">
                    <i class="fa fa-eye-slash"></i>&nbsp;Sembunyikan Detail
                  </button>
                </div>
            </div>
          </div>
          <br/>
          <div runat="server" id="divChart2" style="display:none;">
            <div class="form-group">
              <div class="col-lg-12">
                <div style="overflow: auto">
                  <table id="example2" class="table table-striped">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <?php
                        if(!empty($equip))
                        {
                          foreach($equip as $data)
                          {
                            ?>
                              <th> <?php echo $data->equ_nama; ?> </th>
                        <?php
                          }
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        if(!empty($hasilfeedback))
                        {
                          foreach($hasilfeedback as $data)
                          {
                              ?>
                              <tr>
                              <td> <?php echo $no; ?> </td>
                              <td> <?php echo $bulanans[$data->bulan]; ?> </td>
                              <?php
                              if(!empty($equips))
                              {
                                foreach($equips as $datas)
                                {
                                  $strings = $datas->equ_replace;
                                  ?>
                                    <th><?php echo $data->$strings; ?> </th>
                              <?php
                                }
                              }
                              ?>
                              </tr>
                              <?php
                              $no++;
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
        </div> -->
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
<script src="<?php echo base_url()."assets/chartjs/Chart.bundle.js"; ?>"></script>
<script src="<?php echo base_url()."assets/chartjs/samples/utils.js"; ?>"></script>
<script src="<?php echo base_url()."assets/bower_components/datatables.net/js/jquery.dataTables.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"; ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url()."assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"; ?>"></script>

<script>
    //Date picker
    $('#awal').datepicker({
      autoclose: true
    })

    //Date picker
    $('#akhir').datepicker({
      autoclose: true
    })


$(document).ready(function(){
  // var awal = document.getElementById("datepicker1").value;
  // var akhir = document.getElementById("datepicker2").value;
  // setup some local variables

  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    // some code..
    var ctx = document.getElementById("myChart");
    ctx.height = 300;
    var ctx1 = document.getElementById("myChart1");
    ctx1.height = 300;
    var ctx2 = document.getElementById("myChart2");
    ctx2.height = 300;
  }

  var ctx = $("#myChart");
  var myChart = new Chart(ctx, {
    type: 'line',
      data: {
          labels: <?php echo json_encode($bulan);?>,
          datasets: [{
              label: "Lembar Pemeriksaan",
              backgroundColor: window.chartColors.red,
              borderColor: window.chartColors.red,
              data: <?php echo json_encode($total);?>,
              fill: false,
          }]
      },
      options: {
          responsive: true,
          title:{
              display:true,
              text:'Laporan Pencatatan Lembar Pemeriksaan'
          },
          tooltips: {
              mode: 'index',
              intersect: false,
          },
          hover: {
              mode: 'nearest',
              intersect: true
          },
          scales: {
              xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Bulan'
                },
                ticks : {

                  // Here's where the magic happens:
                  callback: function( label, index, labels ) {

                      return translate_this_label( label );
                  }
                }
              }],
              yAxes: [{
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: 'Jumlah Pemeriksaan'
                  },
                  ticks: {
                      beginAtZero: true,
                      stepSize: 10
                  }
              }]
          }
      }
  });

  var ctx1 = $("#myChart1");
  var myChart1 = new Chart(ctx1, {
    type: 'bar',
      data: {
          labels: <?php echo json_encode($tanggal1);?>,
          datasets: [{
              label: "OK",
              backgroundColor: window.chartColors.green,
              borderColor: window.chartColors.green,
              data: <?php echo json_encode($okg);?>,
              fill: false,
          },{
            label: "NOK",
            backgroundColor: window.chartColors.red,
            borderColor: window.chartColors.red,
            data: <?php echo json_encode($nokg);?>,
            fill: false,
          },{
            label: "OK By Function",
            backgroundColor: window.chartColors.yellow,
            borderColor: window.chartColors.yellow,
            data: <?php echo json_encode($okbyfuncg);?>,
            fill: false,
          }]
      },
      options: {
          responsive: true,
          title:{
              display:true,
              text:'Grafik OK|NOK|OK by function'
          },
          tooltips: {
              mode: 'index',
              intersect: false,
          },
          hover: {
              mode: 'nearest',
              intersect: true
          },
          scales: {
              xAxes: [{
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: 'Bulan'
                  },
                  ticks : {

                    // Here's where the magic happens:
                    callback: function( label, index, labels ) {

                        return translate_this_label( label );
                    }
                  }
              }],
              yAxes: [{
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: 'Jumlah Kondisi'
                  },
                  ticks: {
                      beginAtZero: true,
                      stepSize: 10
                  }
              }]
          }
      }
  });

  var ctx2 = $("#myChart2");
  var myChart2 = new Chart(ctx2, {
    type: 'line',
      data: {
          labels: <?php echo json_encode($tanggal2);?>,
          datasets: [{
              label: "Feedback User",
              backgroundColor: window.chartColors.green,
              borderColor: window.chartColors.green,
              data: <?php echo json_encode($total2);?>,
              fill: false,
          }]
      },
      options: {
          responsive: true,
          title:{
              display:true,
              text:'Grafik Feedback User'
          },
          tooltips: {
              mode: 'index',
              intersect: false,
          },
          hover: {
              mode: 'nearest',
              intersect: true
          },
          scales: {
              xAxes: [{
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: 'Bulan'
                  },
                  ticks : {

                    // Here's where the magic happens:
                    callback: function( label, index, labels ) {

                        return translate_this_label( label );
                    }
                  }
              }],
              yAxes: [{
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: 'Jumlah Feedback'
                  },
                  ticks: {
                      beginAtZero: true,
                      stepSize: 10
                  }
              }]
          }
      }
  });
  // $(function () {
  //   $('#example2').DataTable({
  //     'paging'      : true,
  //     'lengthChange': false,
  //     'searching'   : false,
  //     'ordering'    : true,
  //     'info'        : false,
  //     'autoWidth'   : false, 
  //     aoColumns : [
  //       { sWidth: '10%' },
  //       { sWidth: '50%' },
  //       { sWidth: '40%' }
  //     ],
  //     'columnDefs': [
  //     {
  //       "targets": 0, // your case first column
  //       "className": "text-center"
  //     }]
  //   })
  // });
  $("#btnShow").click(function(){
      $("#btnShow").hide();
      $("#btnHide").show();
      $("#divChart").show();
  }); 
  $("#btnHide").click(function(){
      $("#btnShow").show();
      $("#btnHide").hide();
      $("#divChart").hide();
  }); 

  $("#btnShow1").click(function(){
      $("#btnShow1").hide();
      $("#btnHide1").show();
      $("#divChart1").show();
  }); 
  $("#btnHide1").click(function(){
      $("#btnShow1").show();
      $("#btnHide1").hide();
      $("#divChart1").hide();
  });  

  $("#btnShow2").click(function(){
      $("#btnShow2").hide();
      $("#btnHide2").show();
      $("#divChart2").show();
  }); 
  $("#btnHide2").click(function(){
      $("#btnShow2").show();
      $("#btnHide2").hide();
      $("#divChart2").hide();
  }); 
});

function translate_month( month ) {

var result = month;

switch(month) {

    case '1':
        result = 'Jan' ;
        break;
    case '2':
        result = 'Feb' ;
        break;
    case '3':
        result = 'Mar' ;
        break;
    case '4':
        result = 'Apr' ;
        break;
    case '5':
        result = 'Mei' ;
        break;
    case '6':
        result = 'Jun' ;
        break;
    case '7':
        result = 'Jul' ;
        break;
    case '8':
        result = 'Agu' ;
        break;
    case '9':
        result = 'Sep' ;
        break;
    case '10':
        result = 'Okt' ;
        break;
    case '11':
        result = 'Nov' ;
        break;
    case '12':
        result = 'Des' ;
        break;
}

return result;
}

function translate_this_label( label ) {

month = label.match(/^\d{1,2}$/g);

if ( ! month ) 
    return label;

translation = translate_month( month[0] );
return label.replace( month, translation, 'g' );
}

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
