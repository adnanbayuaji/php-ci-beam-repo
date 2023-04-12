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

  $kondisi=[];
  $total=[];
  $color=[];
  if(!empty($datas))
  {
    foreach($datas as $try){
        $kondisi[] = $try->kondisi;
        $total[] = $try->total;
        $color[] = $try->color;
    }
  }
  $kondisi2=[];
  $total2=[];
  $color2=[];
  if(!empty($datas2))
  {
    foreach($datas2 as $try2){
        $kondisi2[] = $try2->kondisi;
        $total2[] = $try2->total;
        $color2[] = $try2->color; 
    }
  }

  
  $kondisiall=[];
  $totalall=[];
  $colorall=[];
  if(!empty($datasall))
  {
    foreach($datasall as $try){
        $kondisiall[] = $try->kondisi;
        $totalall[] = $try->total;
        $colorall[] = $try->color;
    }
  }

  $kondisiallbeam=[];
  $totalallbeam=[];
  $colorallbeam=[];
  if(!empty($datasallbeam))
  {
    foreach($datasallbeam as $try){
        $kondisiallbeam[] = $try->kondisi;
        $totalallbeam[] = $try->total;
        $colorallbeam[] = $try->color;
    }
  }

  $equip=[];
  $totalok=[];
  $totalokbyfunc=[];
  $totalnok=[];
  if(!empty($datas3))
  {
    foreach($datas3 as $try3){
      $equip[] = $try3->equip;
      $totalok[] = $try3->totalok;
      $totalokbyfunc[] = $try3->totalokbyfunc;
      $totalnok[] = $try3->totalnok;
    }
  }
 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo base_url()."assets/dist/img/favicon.png"; ?>"/>
  <title>BEAM | Beranda</title>
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
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/sweetalert2/package/dist/sweetalert2.min.css"; ?>">
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"; ?>">
  
  <link type="text/css" href="<?php echo base_url()."assets/bower_components/jquery-datatables-checkboxes/css/dataTables.checkboxes.css"; ?>" rel="stylesheet" />

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
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('item'); ?>" ></div>
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
        <li class="active">
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
        Beranda
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'home'; ?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Beranda</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
      <?php if($akses->men_update == '1' && $akses->men_access == '1' && $akses->men_insert == '1' ){ ?>

      <!-- untuk bagian yang rusak dan okbyfunc -->
      <!-- Info boxes -->
      <div class="row">
        <a href='<?php echo base_url()."Checksheet/listnokall"; ?>'>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Not OK</span>
              <span class="info-box-number"><?php echo $datanok->nok; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        </a>
        <a href='<?php echo base_url()."Checksheet/listokbyfuncall"; ?>'>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">OK By Function</span>
              <span class="info-box-number"><?php echo $dataokbyfunc->okbyfunc; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        </a>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik OK/NOK</h3>
            </div>
            <div class="box-body">
              <canvas id="okChart" height="300"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Grafik OK/NOK</h3>
            </div>
            <div class="box-body">
              <canvas id="detokChart"></canvas>
              <!-- <br/>
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
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Outstanding Checksheet</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div style="overflow: auto">
                  <table id="example3" class="table table-striped">
                    <thead>
                      <tr>
                          <!-- <th>NO</th> -->
                          <th>Alat</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                          <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        if(!empty($csoverdue))
                        {
                          foreach($csoverdue as $data2)
                          {
                            ?>
                            <tr>
                              <!-- <td> <?php //echo $no; ?> </td> -->
                              <td> <?php echo $data2->equ_nama." ".$data2->are_nama." ".$data2->deq_lokasi; ?> </td>
                              <td> <?php echo $data2->tch_tanggal; ?> </td>
                              <td> <?php echo $data2->approves; ?> </td>
                              <td> 
                              <!-- kasih kondisi lagi -->
                              <a href='<?php echo base_url()."checksheet/berandakonfir/".$data2->tch_id."/".$data2->tch_approval; ?>' class='beranda-konfir'><i class="fa fa-check"></i></a>&nbsp;
                              <a href='#myModal' id="custId" data-toggle="modal" data-id="<?php echo $data2->tch_id; ?>" data-approval="<?php echo $data2->tch_approval; ?>" data-alat="<?php echo $data2->equ_nama." ".$data2->deq_lokasi; ?>" data-tanggal="<?php echo $data2->tch_tanggal; ?>" data-status="<?php echo $data2->approves; ?>"  ><i class="fa fa-times"></i></a>
                              </td>
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
        <div class="col-lg-3">
          <div class="row">
            <div class="col-lg-12">
              <!-- small box -->
              <a href='<?php echo base_url()."Checksheet/listjumlahall"; ?>'>
              <div class="small-box bg-aqua myBox">
                <div class="inner">
                  <h3><?php echo $jumlah->jumlah; ?></h3>
                  <p>Jumlah Checksheet</p>
                </div>
                <div class="icon">
                  <i class="fa fa-info-circle"></i>
                </div>
              </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <!-- small box -->
              <a href='<?php echo base_url()."Checksheet/listontimeall"; ?>'>
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $ontime->ontime; ?></h3>
                  <p>Ontime</p>
                </div>
                <div class="icon">
                  <i class="fa fa-check-square-o"></i>
                </div>
              </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <!-- small box -->
              <a href='<?php echo base_url()."Checksheet/listoverdueall"; ?>'>
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $overdue->overdue; ?></h3>
                  <p>Outstanding</p>
                </div>
                <div class="icon">
                  <i class="fa fa-hourglass-end"></i>
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Outstanding Checking Equip</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div style="overflow: auto">
                  <table id="example1" class="table table-striped">
                    <thead>
                      <tr>
                          <!-- <th>NO</th> -->
                          <th>Alat</th>
                          <th>Kode</th>
                          <th>Aksi</th>
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
                                <!-- <td> <?php //echo $no; ?> </td> -->
                                <td> <?php echo $data->equ_nama." ".$data->are_nama." ".$data->deq_lokasi; ?> </td>
                                <td> <?php echo $data->deq_kode; ?> </td>
                                <td> <a href='<?php echo base_url()."checksheet/insert/".$data->equ_id."/".$data->deq_id; ?>'><i class="fa fa-edit"></i></a> </td>
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
            <!-- /.box-body -->
            <!-- <div class="box-footer">
            </div> -->
          </div>
        </div>
      </div>
      
      <!-- all plant -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rekapitulasi Seluruh Plant</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <h2 class="description-percentage text-blue"><?php echo $jumlahall->jumlah; ?></h2>
                    <span class="description-text text-blue">Jumlah Checksheet</span>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <h2 class="description-percentage text-green"><?php echo $ontimeall->ontime; ?></h2>
                    <span class="description-text text-green">Checksheet Ontime</span>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <h2 class="description-percentage text-red"><?php echo $overdueall->overdue; ?></h2>
                    <span class="description-text text-red">Checksheet Outstanding</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Grafik OK/NOK</strong>
                  </p>
                  <div class="chart">
                    <canvas id="okallchart" height="300"></canvas>
                  </div>
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
                </div>
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Grafik BEAM Checksheet</strong>
                  </p>
                  <div class="chart">
                    <canvas id="beamallchart" height="300"></canvas>
                  </div>
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
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group" id="divChart1" style="display:none;">
                    <div style="overflow: auto">
                      <table id="example7" class="table table-striped">
                        <thead>
                          <tr>
                              <th>Area Pabrik</th>
                              <th>OK</th>
                              <th>OK By Function</th>
                              <th>NOK</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            if(!empty($tableallok))
                            {
                                foreach($tableallok as $data7)
                                {
                                    ?>
                                    <tr>
                                    <td> <?php echo $data7->pla_nama." (".$data7->pla_kodearea.")"; ?> </td>
                                    <td> <?php if( isset( $data7->ok ) ) { echo $data7->ok; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data7->okbyfunc ) ) { echo $data7->okbyfunc; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data7->nok ) ) { echo $data7->nok; } else { echo "0"; } ?> </td>
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
                  <div class="form-group" id="divChart2" style="display:none;">
                    <div style="overflow: auto">
                      <table id="example8" class="table table-striped">
                        <thead>
                          <tr>
                              <th>Area Pabrik</th>
                              <th>Total Itemcheck</th>
                              <th>OK</th>
                              <th>Repaired</th>
                              <th>Broken</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            if(!empty($tableallbeam))
                            {
                                foreach($tableallbeam as $data8)
                                {
                                    ?>
                                    <tr>
                                    <td> <?php echo $data8->pla_nama." (".$data8->pla_kodearea.")"; ?> </td>
                                    <td> <?php if( isset( $data8->total_item ) ) { echo $data8->total_item; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data8->ok_item ) ) { echo $data8->ok_item; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data8->repair_item ) ) { echo $data8->repair_item; } else { echo "0"; }?> </td>
                                    <td> <?php if( isset( $data8->broken_item ) ) { echo $data8->broken_item; } else { echo "0"; } ?> </td>
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
          </div>
        </div>
      </div>

      <?php } else if($akses->men_update == '1' && $akses->men_access == '1' ){ ?>

      <div class="row">
        <a href='<?php echo base_url()."Checksheet/listnok"; ?>'>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Not OK</span>
              <span class="info-box-number"><?php echo $datanok->nok; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        </a>
        <a href='<?php echo base_url()."Checksheet/listokbyfunc"; ?>'>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">OK By Function</span>
              <span class="info-box-number"><?php echo $dataokbyfunc->okbyfunc; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        </a>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik OK/NOK</h3>
            </div>
            <div class="box-body">
              <canvas id="okChart" height="300"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Grafik OK/NOK</h3>
            </div>
            <div class="box-body">
              <canvas id="detokChart"></canvas>
              <!-- <br/>
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
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Outstanding Checksheet</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div style="overflow: auto">
                  <table id="example3" class="table table-striped">
                    <thead>
                      <tr>
                          <!-- <th>NO</th> -->
                          <th>Alat</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                          <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        if(!empty($csoverdue))
                        {
                          foreach($csoverdue as $data2)
                          {
                            ?>
                            <tr>
                              <!-- <td> <?php //echo $no; ?> </td> -->
                              <td> <?php echo $data2->equ_nama." ".$data2->are_nama." ".$data2->deq_lokasi; ?> </td>
                              <td> <?php echo $data2->tch_tanggal; ?> </td>
                              <td> <?php echo $data2->approves; ?> </td>
                              <td> 
                              <!-- kasih kondisi lagi -->
                              <a href='<?php echo base_url()."checksheet/berandakonfir/".$data2->tch_id."/".$data2->tch_approval; ?>' class='beranda-konfir'><i class="fa fa-check"></i></a>&nbsp;
                              <a href='#myModal' id="custId" data-toggle="modal" data-id="<?php echo $data2->tch_id; ?>" data-approval="<?php echo $data2->tch_approval; ?>" data-alat="<?php echo $data2->equ_nama." ".$data2->deq_lokasi; ?>" data-tanggal="<?php echo $data2->tch_tanggal; ?>" data-status="<?php echo $data2->approves; ?>"  ><i class="fa fa-times"></i></a>
                              </td>
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
        <div class="col-lg-3">
          <div class="row">
            <div class="col-lg-12">
              <!-- small box -->
              <a href='<?php echo base_url()."Checksheet/listjumlah"; ?>'>
              <div class="small-box bg-aqua myBox">
                <div class="inner">
                  <h3><?php echo $jumlah->jumlah; ?></h3>
                  <p>Jumlah Checksheet</p>
                </div>
                <div class="icon">
                  <i class="fa fa-info-circle"></i>
                </div>
              </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <!-- small box -->
              <a href='<?php echo base_url()."Checksheet/listontime"; ?>'>
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $ontime->ontime; ?></h3>
                  <p>Ontime</p>
                </div>
                <div class="icon">
                  <i class="fa fa-check-square-o"></i>
                </div>
              </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <!-- small box -->
              <a href='<?php echo base_url()."Checksheet/listoverdue"; ?>'>
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $overdue->overdue; ?></h3>
                  <p>Outstanding</p>
                </div>
                <div class="icon">
                  <i class="fa fa-hourglass-end"></i>
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rekapitulasi Seluruh Plant</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <h2 class="description-percentage text-blue"><?php echo $jumlahall->jumlah; ?></h2>
                    <span class="description-text text-blue">Jumlah Checksheet</span>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <h2 class="description-percentage text-green"><?php echo $ontimeall->ontime; ?></h2>
                    <span class="description-text text-green">Checksheet Ontime</span>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <h2 class="description-percentage text-red"><?php echo $overdueall->overdue; ?></h2>
                    <span class="description-text text-red">Checksheet Outstanding</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Grafik OK/NOK</strong>
                  </p>
                  <div class="chart">
                    <canvas id="okallchart" height="300"></canvas>
                  </div>
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
                </div>
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Grafik BEAM Checksheet</strong>
                  </p>
                  <div class="chart">
                    <canvas id="beamallchart" height="300"></canvas>
                  </div>
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
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group" id="divChart1" style="display:none;">
                    <div style="overflow: auto">
                      <table id="example7" class="table table-striped">
                        <thead>
                          <tr>
                              <th>Area Pabrik</th>
                              <th>OK</th>
                              <th>OK By Function</th>
                              <th>NOK</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            if(!empty($tableallok))
                            {
                                foreach($tableallok as $data7)
                                {
                                    ?>
                                    <tr>
                                    <td> <?php echo $data7->pla_nama." (".$data7->pla_kodearea.")"; ?> </td>
                                    <td> <?php if( isset( $data7->ok ) ) { echo $data7->ok; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data7->okbyfunc ) ) { echo $data7->okbyfunc; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data7->nok ) ) { echo $data7->nok; } else { echo "0"; } ?> </td>
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
                  <div class="form-group" id="divChart2" style="display:none;">
                    <div style="overflow: auto">
                      <table id="example8" class="table table-striped">
                        <thead>
                          <tr>
                              <th>Area Pabrik</th>
                              <th>Total Itemcheck</th>
                              <th>OK</th>
                              <th>Repaired</th>
                              <th>Broken</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            if(!empty($tableallbeam))
                            {
                                foreach($tableallbeam as $data8)
                                {
                                    ?>
                                    <tr>
                                    <td> <?php echo $data8->pla_nama." (".$data8->pla_kodearea.")"; ?> </td>
                                    <td> <?php if( isset( $data8->total_item ) ) { echo $data8->total_item; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data8->ok_item ) ) { echo $data8->ok_item; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data8->repair_item ) ) { echo $data8->repair_item; } else { echo "0"; }?> </td>
                                    <td> <?php if( isset( $data8->broken_item ) ) { echo $data8->broken_item; } else { echo "0"; } ?> </td>
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
          </div>
        </div>
      </div>

      <?php } else if($akses->men_update == '1' ){ ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik OK/NOK</h3>
            </div>
            <div class="box-body">
              <canvas id="okChart" height="300"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Grafik OK/NOK</h3>
            </div>
            <div class="box-body">
              <canvas id="detokChart"></canvas>
              <!-- <div class="row justify-content-center">
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
              </div> -->
            </div>
          </div>
        </div>
      </div>

      <?php } else if($akses->men_access == '1' ){ ?>
      
      <div class="row">
        <a href='<?php echo base_url()."Checksheet/listnok"; ?>'>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Not OK</span>
              <span class="info-box-number"><?php echo $datanok->nok; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        </a>
        <a href='<?php echo base_url()."Checksheet/listokbyfunc"; ?>'>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">OK By Function</span>
              <span class="info-box-number"><?php echo $dataokbyfunc->okbyfunc; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        </a>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik OK/NOK</h3>
            </div>
            <div class="box-body">
              <canvas id="okChart" height="300"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Grafik OK/NOK</h3>
            </div>
            <div class="box-body">
              <canvas id="detokChart"></canvas>
              <!-- <br/>
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
              </div> -->
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <!-- small box -->
          <a href='<?php echo base_url()."Checksheet/listjumlah"; ?>'>
          <div class="small-box bg-aqua myBox">
            <div class="inner">
              <h3><?php echo $jumlah->jumlah; ?></h3>
              <p>Jumlah Checksheet</p>
            </div>
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
          </div>
          </a>
        </div>
        <div class="col-lg-4">
          <!-- small box -->
          <a href='<?php echo base_url()."Checksheet/listontime"; ?>'>
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $ontime->ontime; ?></h3>
              <p>Ontime</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-square-o"></i>
            </div>
          </div>
          </a>
        </div>
        <div class="col-lg-4">
          <!-- small box -->
          <a href='<?php echo base_url()."Checksheet/listoverdue"; ?>'>
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $overdue->overdue; ?></h3>
              <p>Outstanding</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass-end"></i>
            </div>
          </div>
          </a>
        </div>        
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rekapitulasi Seluruh Plant</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <h2 class="description-percentage text-blue"><?php echo $jumlahall->jumlah; ?></h2>
                    <span class="description-text text-blue">Jumlah Checksheet</span>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <h2 class="description-percentage text-green"><?php echo $ontimeall->ontime; ?></h2>
                    <span class="description-text text-green">Checksheet Ontime</span>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <h2 class="description-percentage text-red"><?php echo $overdueall->overdue; ?></h2>
                    <span class="description-text text-red">Checksheet Outstanding</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Grafik OK/NOK</strong>
                  </p>
                  <div class="chart">
                    <canvas id="okallchart" height="300"></canvas>
                  </div>
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
                </div>
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Grafik BEAM Checksheet</strong>
                  </p>
                  <div class="chart">
                    <canvas id="beamallchart" height="300"></canvas>
                  </div>
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
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group" id="divChart1" style="display:none;">
                    <div style="overflow: auto">
                      <table id="example7" class="table table-striped">
                        <thead>
                          <tr>
                              <th>Area Pabrik</th>
                              <th>OK</th>
                              <th>OK By Function</th>
                              <th>NOK</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            if(!empty($tableallok))
                            {
                                foreach($tableallok as $data7)
                                {
                                    ?>
                                    <tr>
                                    <td> <?php echo $data7->pla_nama." (".$data7->pla_kodearea.")"; ?> </td>
                                    <td> <?php if( isset( $data7->ok ) ) { echo $data7->ok; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data7->okbyfunc ) ) { echo $data7->okbyfunc; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data7->nok ) ) { echo $data7->nok; } else { echo "0"; } ?> </td>
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
                  <div class="form-group" id="divChart2" style="display:none;">
                    <div style="overflow: auto">
                      <table id="example8" class="table table-striped">
                        <thead>
                          <tr>
                              <th>Area Pabrik</th>
                              <th>Total Itemcheck</th>
                              <th>OK</th>
                              <th>Repaired</th>
                              <th>Broken</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            if(!empty($tableallbeam))
                            {
                                foreach($tableallbeam as $data8)
                                {
                                    ?>
                                    <tr>
                                    <td> <?php echo $data8->pla_nama." (".$data8->pla_kodearea.")"; ?> </td>
                                    <td> <?php if( isset( $data8->total_item ) ) { echo $data8->total_item; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data8->ok_item ) ) { echo $data8->ok_item; } else { echo "0"; } ?> </td>
                                    <td> <?php if( isset( $data8->repair_item ) ) { echo $data8->repair_item; } else { echo "0"; }?> </td>
                                    <td> <?php if( isset( $data8->broken_item ) ) { echo $data8->broken_item; } else { echo "0"; } ?> </td>
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
          </div>
        </div>
      </div>

      <?php } if($trial == '1'){ ?>
      <div class="row">
        <?php
          echo form_open('checksheet/readCatatan', 'class="form-horizontal" id="frm-example"');
        ?>
        <div class="col-lg-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Catatan</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div class="col-md-12">
                  <div style="overflow: auto">
                    <table id="example5" class="table table-striped">
                      <thead>
                        <tr>
                            <th></th>
                            <th>Kode Alat</th>
                            <th>Alat</th>
                            <th>Departemen</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $no = 1;
                          if(!empty($catatanall))
                          {
                            foreach($catatanall as $data2)
                            {
                              ?>
                              <tr>
                                <td> <?php echo $data2->tch_id; ?> </td>
                                <td> <?php echo $data2->deq_kode; ?> </td>
                                <td> <?php echo $data2->equ_nama." ".$data2->are_nama." ".$data2->deq_lokasi; ?> </td>
                                <td> <?php echo $data2->dept_nama; ?> </td>
                                <td> <?php echo $data2->tch_tanggal; ?> </td>
                                <td> 
                                  <?php 
                                    $dataw = array(
                                      'class' => 'btn btn-info btn-xs view_data',
                                      'type' => 'button',
                                      'id' => $data2->tch_id,
                                      'content' => '<i class="fa fa-eye"></i>'
                                    );
                                    echo form_button($dataw);
                                  ?>
                                </td>
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
            <div class="box-footer">
              <?php $datar = array(
                'class' => 'btn btn-primary pull-right',
                'type' => 'submit',
                'id' => 'submit',
                'content' => '<i class="fa fa-check-square-o"></i> Tandai telah dibaca',
                'data-loading-text' => "Sedang diproses"
              );
              echo form_button($datar); ?>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
        <?php
          echo form_open('checksheet/readFeedback', 'class="form-horizontal" id="frm-example1"');
        ?>
        <div class="col-lg-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Feedback</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div class="col-md-12">
                  <div style="overflow: auto">
                    <table id="example6" class="table table-striped">
                      <thead>
                        <tr>
                            <th></th>
                            <th>Kode Alat</th>
                            <th>Alat</th>
                            <th>Departemen</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $no = 1;
                          if(!empty($feedback))
                          {
                            foreach($feedback as $data2)
                            {
                              ?>
                              <tr>
                                <td> <?php echo $data2->tch_id; ?></td>
                                <td> <?php echo $data2->deq_kode; ?> </td>
                                <td> <?php echo $data2->equ_nama." ".$data2->are_nama." ".$data2->deq_lokasi; ?> </td>
                                <td> <?php echo $data2->dept_nama; ?> </td>
                                <td> <?php echo $data2->tch_tanggal; ?> </td>
                                <td> 
                                  <?php 
                                    $dataw = array(
                                      'class' => 'btn btn-info btn-xs view_data',
                                      'type' => 'button',
                                      'id' => $data2->tch_id,
                                      'content' => '<i class="fa fa-eye"></i>'
                                    );
                                    echo form_button($dataw);
                                  ?>
                                </td>
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
            <div class="box-footer">
              <?php $datar = array(
                'class' => 'btn btn-primary pull-right',
                'type' => 'submit',
                'id' => 'submit',
                'content' => '<i class="fa fa-check-square-o"></i> Tandai telah dibaca',
                'data-loading-text' => "Sedang diproses"
              );
              echo form_button($datar); ?>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
      <?php } if($trial == '2'){ ?>
      <div class="row">
        <?php
          echo form_open('checksheet/readFeedback', 'class="form-horizontal" id="frm-example1"');
        ?>
        <div class="col-lg-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Feedback</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div class="col-md-12">
                  <div style="overflow: auto">
                    <table id="example6" class="table table-striped">
                      <thead>
                        <tr>
                            <th></th>
                            <th>Kode Alat</th>
                            <th>Alat</th>
                            <th>Departemen</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $no = 1;
                          if(!empty($feedback))
                          {
                            foreach($feedback as $data2)
                            {
                              ?>
                              <tr>
                                <td> <?php echo $data2->tch_id; ?> </td>
                                <td> <?php echo $data2->deq_kode; ?> </td>
                                <td> <?php echo $data2->equ_nama." ".$data2->are_nama." ".$data2->deq_lokasi; ?> </td>
                                <td> <?php echo $data2->dept_nama; ?> </td>
                                <td> <?php echo $data2->tch_tanggal; ?> </td>
                                <td> 
                                  <?php 
                                    $dataw = array(
                                      'class' => 'btn btn-info btn-xs view_data',
                                      'type' => 'button',
                                      'id' => $data2->tch_id,
                                      'content' => '<i class="fa fa-eye"></i>'
                                    );
                                    echo form_button($dataw);
                                  ?>
                                </td>
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
            <div class="box-footer">
              <?php $datar = array(
                'class' => 'btn btn-primary pull-right',
                'type' => 'submit',
                'id' => 'submit',
                'content' => '<i class="fa fa-check-square-o"></i> Tandai telah dibaca',
                'data-loading-text' => "Sedang diproses"
              );
              echo form_button($datar); ?>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
      <?php } if($trial == '3'){ ?>
      <div class="row">
        <?php
          echo form_open('checksheet/readCatatan', 'class="form-horizontal" id="frm-example"');
        ?>
        <div class="col-lg-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Catatan</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div class="col-md-12">
                  <div style="overflow: auto">
                    <table id="example5" class="table table-striped">
                      <thead>
                        <tr>
                            <th></th>
                            <th>Kode Alat</th>
                            <th>Alat</th>
                            <th>Departemen</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $no = 1;
                          if(!empty($catatan))
                          {
                            foreach($catatan as $data2)
                            {
                              ?>
                              <tr>
                                <td> <?php echo $data2->tch_id; ?> </td>
                                <td> <?php echo $data2->deq_kode; ?> </td>
                                <td> <?php echo $data2->equ_nama." ".$data2->are_nama." ".$data2->deq_lokasi; ?> </td>
                                <td> <?php echo $data2->dept_nama; ?> </td>
                                <td> <?php echo $data2->tch_tanggal; ?> </td>
                                <td> 
                                  <?php 
                                    $dataw = array(
                                      'class' => 'btn btn-info btn-xs view_data',
                                      'type' => 'button',
                                      'id' => $data2->tch_id,
                                      'content' => '<i class="fa fa-eye"></i>'
                                    );
                                    echo form_button($dataw);
                                  ?>
                                </td>
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
            <div class="box-footer">
              <?php $datar = array(
                'class' => 'btn btn-primary pull-right',
                'type' => 'submit',
                'id' => 'submit',
                'content' => '<i class="fa fa-check-square-o"></i> Tandai telah dibaca',
                'data-loading-text' => "Sedang diproses"
              );
              echo form_button($datar); ?>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
      <?php }?>

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

<div class="modal fade" id="myModalNote">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        
        <div id="tch_result"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tolak Data</h4>
      </div>
      <?php
        echo form_open('checksheet/tolakdatadash', 'enctype="multipart/form-data" id="frm-tolak"');
      ?>
      <div class="modal-body">
        <?php 
          echo form_hidden('tchid');
          echo form_hidden('approval');
          ?>
        <div class="form-group">
          <label class="control-label">Alat</label><br/>
          <div id="alat"></div>
        </div>
        <div class="form-group">
          <label class="control-label">Tanggal</label><br/>
          <div id="tanggal"></div>
        </div>
        <div class="form-group">
          <label class="control-label">Status</label><br/>
          <div id="status"></div>
        </div>
        <div class="form-group">
          <label class="control-label">Alasan Penolakan</label>
          <?php 
          $x = array(
            'name'        => 'txtAlasan',
            'id'          => 'txtAlasan',
            'rows'        => '5',
            'cols'        => '10',
            'style'       => 'width:100%',
            'class'       => 'form-control'
          );
          echo form_textarea($x); ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          <?php 
            echo form_submit('submit', 'Simpan', 'id="submit-poin" class="btn btn-primary" data-loading-text="Processing"');
          ?>
      </div>
      <?php echo form_close(); ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()."assets/bower_components/jquery/dist/jquery.min.js"; ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."assets/bower_components/bootstrap/dist/js/bootstrap.min.js"; ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/dist/js/adminlte.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/chartjs/Chart.bundle.js"; ?>"></script>
<script src="<?php echo base_url()."assets/chartjs/samples/utils.js"; ?>"></script>
<script src="<?php echo base_url()."assets/chartjs/chartjs-plugin-datalabels.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/bower_components/datatables.net/js/jquery.dataTables.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/bower_components/sweetalert2/package/dist/sweetalert2.all.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/bower_components/sweetalert2/package/dist/sweetalert2.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/assets/js/myscript.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/bower_components/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"; ?>"></script>

<script>

$(document).ready(function(){
  // $(".myBox").click(function() {
  //   alert("yuk");
    
      
  // });

  var table = $('#example5').DataTable({
    // 'ajax': 'https://api.myjson.com/bins/1us28', 
    'autoWidth'   : false, 
    aoColumns : [
      { sWidth: '5%' },
      { sWidth: '10%' },
      { sWidth: '50%' },
      { sWidth: '15%' },
      { sWidth: '15%' },
      { sWidth: '5%' }
    ],
    'columnDefs': [
      {
        'targets': 0, // your case first column
        "className": "text-center",
        'checkboxes': {
          'selectRow': true
        }
      }
    ],
    'select': {
      'style': 'multi'
    },
    'order': [[1, 'asc']]
  });

  var table1 = $('#example6').DataTable({
    // 'ajax': 'https://api.myjson.com/bins/1us28', 
    'autoWidth'   : false, 
    aoColumns : [
      { sWidth: '5%' },
      { sWidth: '10%' },
      { sWidth: '50%' },
      { sWidth: '15%' },
      { sWidth: '15%' },
      { sWidth: '5%' }
    ],
    'columnDefs': [
      {
        'targets': 0, // your case first column
        "className": "text-center",
        'checkboxes': {
          'selectRow': true
        }
      }
    ],
    'select': {
      'style': 'multi'
    },
    'order': [[1, 'asc']]
  });

  // Handle form submission event 
  $('#frm-example').on('submit', function(e){
      var form = this;
      var rows_selected = table.column(0).checkboxes.selected();
      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
        // Create a hidden element 
        $(form).append(
            $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id_item[]')
                .val(rowId)
        );
      });
  });

  // Handle form submission event 
  $('#frm-example1').on('submit', function(e){
      var form = this;
      var rows_selected = table1.column(0).checkboxes.selected();
      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
        // Create a hidden element 
        $(form).append(
            $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id_item[]')
                .val(rowId)
        );
      });
  });
  
  $('#submit, #submit-poin').on('click', function() {
    var $this = $(this);
    $this.button('loading');
      setTimeout(function() {
        $this.button('reset');
    }, 10000);
  });

  // $('#submit-poin').on('click', function() {
  //   var $this = $(this);
  //   $this.button('loading');
  //     setTimeout(function() {
  //       $this.button('reset');
  //   }, 10000);
  // });
  
  var ctx = $("#beamallchart");
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($kondisiallbeam);?>,
      datasets: [{
        label: "Grafik Kondisi by Item",
        backgroundColor: <?php echo json_encode($colorallbeam);?>,
        data: <?php echo json_encode($totalallbeam);?>,
        fill: false,
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      plugins: {
      datalabels: {
        formatter: (value, ctx) => {
          let sum = parseInt("0");
          let dataArr = ctx.chart.data.datasets[0].data;
          dataArr.map(data => {
            sum += parseInt(data);
          });
          let percentage = (value / sum * 100).toFixed(0)+"%";
          return percentage;
        },
        color: '#fff'
      }
      }
    }
  });

  var ctx = $("#myChart");
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($kondisi2);?>,
      datasets: [{
        label: "Grafik Kondisi by Item",
        backgroundColor: <?php echo json_encode($color2);?>,
        data: <?php echo json_encode($total2);?>,
        fill: false,
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      plugins: {
      datalabels: {
        formatter: (value, ctx) => {
          let sum = parseInt("0");
          let dataArr = ctx.chart.data.datasets[0].data;
          dataArr.map(data => {
            sum += parseInt(data);
          });
          let percentage = (value / sum * 100).toFixed(0)+"%";
          return percentage;
        },
        color: '#fff'
      }
      }
    }
  });

  var ctx = $("#beamall");
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($kondisi2);?>,
      datasets: [{
        label: "Grafik Kondisi by Item",
        backgroundColor: <?php echo json_encode($color2);?>,
        data: <?php echo json_encode($total2);?>,
        fill: false,
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      plugins: {
      datalabels: {
        formatter: (value, ctx) => {
          let sum = parseInt("0");
          let dataArr = ctx.chart.data.datasets[0].data;
          dataArr.map(data => {
            sum += parseInt(data);
          });
          let percentage = (value / sum * 100).toFixed(0)+"%";
          return percentage;
        },
        color: '#fff'
      }
      }
    }
  });

  // Initiate DataTable function comes with plugin
  $('#example5').DataTable();
  // Start jQuery click function to view Bootstrap modal when view info button is clicked
  $('#example5').on('click', '.view_data', function(){
  // Get the id of selected phone and assign it in a variable called phoneData
    var tchData = $(this).attr('id');
    // Start AJAX function
    $.ajax({
      // Path for controller function which fetches selected phone data
      url: "<?php echo base_url() ?>Checksheet/getViewData",
      // Method of getting data
      method: "POST",
      // Data is sent to the server
      data: {tchData:tchData},
      // Callback function that is executed after data is successfully sent and recieved
      success: function(data){
        // Print the fetched data of the selected phone in the section called #phone_result 
        // within the Bootstrap modal
          $('#tch_result').html(data);
          // Display the Bootstrap modal
          $('#myModalNote').modal('show');
          $('#example999').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : false,
            aoColumns : [
              { sWidth: '15%' },
              { sWidth: '55%' },
              { sWidth: '30%' }
            ]
          });
      }
    });
    // End AJAX function
  });

  // Initiate DataTable function comes with plugin
  $('#example6').DataTable();
  // Start jQuery click function to view Bootstrap modal when view info button is clicked
  $('#example6').on('click', '.view_data', function(){
  // Get the id of selected phone and assign it in a variable called phoneData
    var tchData = $(this).attr('id');
    // Start AJAX function
    $.ajax({
      // Path for controller function which fetches selected phone data
      url: "<?php echo base_url() ?>Checksheet/getViewData",
      // Method of getting data
      method: "POST",
      // Data is sent to the server
      data: {tchData:tchData},
      // Callback function that is executed after data is successfully sent and recieved
      success: function(data){
        // Print the fetched data of the selected phone in the section called #phone_result 
        // within the Bootstrap modal
          $('#tch_result').html(data);
          // Display the Bootstrap modal
          $('#myModalNote').modal('show');
          $('#example999').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : false,
            aoColumns : [
              { sWidth: '15%' },
              { sWidth: '55%' },
              { sWidth: '30%' }
            ]
          });
      }
    });
    // End AJAX function
  });
  
  var ctx = $("#okChart");
  var myChart = new Chart(ctx, {
    type: 'pie',
      data: {
          labels: <?php echo json_encode($kondisi);?>,
          datasets: [{
              label: "Grafik OK/NOK",
              backgroundColor: <?php echo json_encode($color);?>,
              data: <?php echo json_encode($total);?>,
              fill: false,
          }]
      },
      options: {
        responsive: true,
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        plugins: {
          datalabels: {
            formatter: (value, ctx) => {
                let sum = parseInt("0");
                let dataArr = ctx.chart.data.datasets[0].data;
                dataArr.map(data => {
                    sum += parseInt(data);
                });
                let percentage = (value / sum * 100).toFixed(0)+"%";
                return percentage;
            },
            color: '#fff'
          }
        }
      }
  });

  var ctx = $("#okallchart");
  var myChart = new Chart(ctx, {
    type: 'pie',
      data: {
          labels: <?php echo json_encode($kondisiall);?>,
          datasets: [{
              label: "Grafik OK/NOK",
              backgroundColor: <?php echo json_encode($colorall);?>,
              data: <?php echo json_encode($totalall);?>,
              fill: false,
          }]
      },
      options: {
        responsive: true,
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        plugins: {
          datalabels: {
            formatter: (value, ctx) => {
                let sum = parseInt("0");
                let dataArr = ctx.chart.data.datasets[0].data;
                dataArr.map(data => {
                    sum += parseInt(data);
                });
                let percentage = (value / sum * 100).toFixed(0)+"%";
                return percentage;
            },
            color: '#fff'
          }
        }
      }
  });

  var ctx = $("#detokChart");
    var color = Chart.helpers.color;
    var myChart = new Chart(ctx, {
      type: 'bar',
        data: {
            labels: <?php echo json_encode($equip);?>,
            datasets: [{
                label: 'OK',
                backgroundColor: '#0CE8B2',
                borderColor: window.chartColors.green,
                borderWidth: 1,
                data: <?php echo json_encode($totalok);?>
            }, {
                label: 'OK by Function',
                backgroundColor: '#FFF60D',
                borderColor: window.chartColors.yellow,
                borderWidth: 1,
                data: <?php echo json_encode($totalokbyfunc);?>
            }, {
                label: 'NOK',
                backgroundColor: '#FF3859',
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: <?php echo json_encode($totalnok);?>
            }]
        },
        options: {
            responsive: true,
            title:{
                display:false,
                text:'Detail Grafik OK/NOK'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
                callbacks: {
                  label: function(tooltipItem, data) {
                      var label = data.datasets[tooltipItem.datasetIndex].label || '';
                      if (label) {
                          label += ': ';
                      }
                      label += isNaN(tooltipItem.yLabel) ? '0' : tooltipItem.yLabel;
                      return label;
                  }
              }
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
                        labelString: 'Alat'
                    },
                    ticks: {
                      autoSkip: false
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Jumlah Alat'
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 10
                    }
                }]
            }
        }
    });

  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      pageLength : 5,
      lengthMenu: [[5, 10, 20], [5, 10, 20]], 
      aoColumns : [
        { sWidth: '60%' },
        { sWidth: '30%' },
        { sWidth: '10%' },
      ]
    }),
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false, 
      aoColumns : [
        { sWidth: '40%' },
        { sWidth: '30%' },
        { sWidth: '10%' },
        { sWidth: '10%' },
        { sWidth: '10%' }
      ]
    }),
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false, 
      pageLength : 5,
      lengthMenu: [[5, 10, 20], [5, 10, 20]],
      aoColumns : [
        { sWidth: '45%' },
        { sWidth: '30%' },
        { sWidth: '10%' },
        { sWidth: '15%' }
      ]
    }),
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false, 
      aoColumns : [
        { sWidth: '20%' },
        { sWidth: '15%' },
        { sWidth: '15%' },
        { sWidth: '15%' },
        { sWidth: '10%' },
        { sWidth: '15%' }
      ]
    }),
    $('#example7').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false, 
      aoColumns : [
        { sWidth: '55%' },
        { sWidth: '15%' },
        { sWidth: '15%' },
        { sWidth: '15%' }
      ]
    }),
    $('#example8').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false, 
      aoColumns : [
        { sWidth: '40%' },
        { sWidth: '15%' },
        { sWidth: '15%' },
        { sWidth: '15%' },
        { sWidth: '15%' }
      ]
    })
  });
  $('#myModal').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    var rowtgl = $(e.relatedTarget).data('tanggal');
    var rowstat = $(e.relatedTarget).data('status');
    var rowalat = $(e.relatedTarget).data('alat');
    var rowapproval = $(e.relatedTarget).data('approval');
    
    $("input[name='tchid']").val(rowid);//Show fetched data from database
    $('#tanggal').html(rowtgl);//Show fetched data from database
    $('#status').html(rowstat);//Show fetched data from database
    $('#alat').html(rowalat);//Show fetched data from database
    $("input[name='approval']").val(rowapproval);//Show fetched data from database
  });
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
      $('#btnHide2').trigger('click');
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
      $('#btnHide1').trigger('click');
  }); 
  $("#btnHide2").click(function(){
      $("#btnShow2").show();
      $("#btnHide2").hide();
      $("#divChart2").hide();
  }); 
});

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>