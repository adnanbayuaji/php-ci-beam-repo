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
  <title>BEAM | Jenis Peralatan</title>
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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"; ?>">
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/sweetalert2/package/dist/sweetalert2.min.css"; ?>">
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
        <?php } else if($datas->men_nama == 'jenisperalatan') { ?> <li class="active"><a href="<?php echo base_url().'typeequip'; ?>"><i class="fa fa-cubes"></i> <span>Jenis Peralatan </span></a></li>
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
      Jenis Peralatan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'home'; ?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Jenis Peralatan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Data</h3>
        </div>
      <?php
          echo form_open('typeequip/update/'.$hasil->equ_id, 'class="form-horizontal"');
      ?>
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Jenis Peralatan</label>
            <div class="col-sm-10">
              <?php
                $nama = array('name'=>'nama', 'maxlength'=>'254','value'=>$hasil->equ_nama, 'class'=>'form-control');
                echo form_input($nama);
                echo form_error('nama');
              ?>     
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Pengecekan Berkala</label>
            <div class="col-sm-10">
              <?php
                $options = array(
                  ''         => '-- Pilih Waktu --',
                  'harian'           => 'Harian',
                  'mingguan'         => 'Mingguan',
                  'bulanan'         => 'Bulanan',
                  'dwiwulan'         => 'Dwiwulan (Per 2 Bulan)',
                  'triwulan'         => 'Triwulan (Per 3 Bulan)',
                  'caturwulan'         => 'Caturwulan (Per 4 Bulan)',
                  'semester'         => 'Semester (Per 6 Bulan)',
                  'tahunan'         => 'Tahunan'
                );
                $extra = array('class'=>'form-control');
                echo form_dropdown('berkala', $options, $hasil->equ_berkala, $extra);
                echo form_error('berkala');
              ?>     
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="panel box box-secondary">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      Detail Poin Pemeriksaan
                    </a>
                  </h4>
                  <div class="box-tools pull-right">
                    <!-- <a href="<?php echo base_url().'typeequip/tambah'; ?>" class="btn btn-primary btn-sm">Tambah Poin</a> -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-poin">
                      Tambah Poin
                    </button>
                  </div>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                  <div class="box-body">
                    <div style="overflow: auto">
                      <table id="example3" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Poin Pemeriksaan</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            if(!empty($dtl_poin))
                            {
                                foreach($dtl_poin as $data)
                                {
                                    ?>
                                    <tr>
                                    <td> <?php echo $no; ?> </td>
                                    <td> <?php echo $data->dpo_namapoin; ?> </td>
                                    <td> <?php echo $data->dpo_satuan; ?> </td>
                                    <td> <a data-toggle="modal" data-target="#modal_edit_poin<?php echo $data->dpo_id;?>"><i class="fa fa-edit"></i></a> &nbsp;
                                    <a href='<?php echo base_url()."typeequip/delete_dtl_poin/".$data->dpo_id."/".$data->equ_id; ?>' class='tombol-hapus'><i class="fa fa-trash-o"></i></a>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                            }
                            // else
                            // {
                                ?>
                                <!-- <tr>
                                    <td colspan="4"><b>TIDAK ADA DATA</b></td>
                                </tr> -->
                                <?php
                            // }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="panel box box-secondary">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      Detail Item Pemeriksaan
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="box-body">
                    <div style="overflow: auto">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Item Pemeriksaan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            if(!empty($dtl_item))
                            {
                              foreach($dtl_item as $data)
                              {
                                $bool = false;
                                if(!empty($cek_item))
                                {
                                  foreach($cek_item as $datas)
                                  {
                                    if($datas->ite_id === $data->ite_id)
                                    {
                                      $bool = true;
                                    }
                                  }
                                }
                                ?>
                                <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $data->ite_obyek; ?> </td>
                                <td> 
                                <?php
                                if($bool)
                                {
                                  $data = array(
                                    'name'          => 'id_item[]',
                                    'class'            => 'delete_ite',
                                    'value'         => $data->ite_id,
                                    'checked'       => TRUE
                                  );
                                }
                                else{
                                  $data = array(
                                    'name'          => 'id_item[]',
                                    'class'            => 'delete_ite',
                                    'value'         => $data->ite_id,
                                    'checked'       => FALSE
                                  );
                                }
                                echo form_checkbox($data);
                                ?>  
                                </td>
                                </tr>
                                <?php
                                $no++;
                              }
                            }
                            // else
                            // {
                                ?>
                                <!-- <tr>
                                    <td colspan="3"><b>TIDAK ADA DATA</b></td>
                                </tr> -->
                                <?php
                            // }
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
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="box-tools pull-right">
            <a href="<?php echo base_url().'typeequip'; ?>" class="btn btn-default">Kembali</a> &nbsp;
            <?php 
              echo form_submit('submit', 'Ubah', 'id="submit" class="btn btn-info"');
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

<div class="modal fade" id="modal-poin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Poin Pemeriksaan</h4>
      </div>
      <?php
          echo form_open('typeequip/tambah_dtl_poin/'.$hasil->equ_id);
      ?>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Nama Pemeriksaan</label>
          <?php
            $poinnama = array('name'=>'poinnama', 'maxlength'=>'254','value'=>"", 'class'=>'form-control');
            echo form_input($poinnama);
            echo form_error('poinnama');
          ?>
        </div>
        <div class="form-group">
          <label class="control-label">Satuan</label>
          <?php
            $poinsatuan = array('name'=>'poinsatuan', 'maxlength'=>'254','value'=>"", 'class'=>'form-control');
            echo form_input($poinsatuan);
            echo form_error('poinsatuan');
          ?>  
        </div>
        <div class="form-group">
          <label class="control-label">Standar Minimal</label>
          <?php
            $standarmin = array('name'=>'standarmin', 'maxlength'=>'254','value'=>"", 'class'=>'form-control', 'onkeypress'=>'return hanyaAngka(event)');
            echo form_input($standarmin);
            echo form_error('standarmin');
          ?>  
        </div>
        <div class="form-group">
          <label class="control-label">Standar Maksimal</label>
          <?php
            $standarmax = array('name'=>'standarmax', 'maxlength'=>'254','value'=>"", 'class'=>'form-control', 'onkeypress'=>'return hanyaAngka(event)');
            echo form_input($standarmax);
            echo form_error('standarmax');
          ?>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          <?php 
            echo form_submit('submit', 'Simpan', 'id="submit-poin" class="btn btn-primary"');
          ?>
      </div>
      <?php echo form_close(); ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
if(!empty($dtl_poin))
{
  foreach($dtl_poin as $data)
  {
  ?>
<div class="modal fade" id="modal_edit_poin<?php echo $data->dpo_id;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Poin Pemeriksaan</h4>
      </div>
      <?php
          echo form_open('typeequip/update_poin2/'.$data->dpo_id."/".$data->equ_id);
      ?>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Nama Pemeriksaan</label>
          <?php
            $poinnama = array('name'=>'poinnama', 'maxlength'=>'254','value'=>$data->dpo_namapoin, 'class'=>'form-control');
            echo form_input($poinnama);
            echo form_error('poinnama');
          ?>
        </div>
        <div class="form-group">
          <label class="control-label">Satuan</label>
          <?php
            $poinsatuan = array('name'=>'poinsatuan', 'maxlength'=>'254','value'=>$data->dpo_satuan, 'class'=>'form-control');
            echo form_input($poinsatuan);
            echo form_error('poinsatuan');
          ?>  
        </div>
        <div class="form-group">
          <label class="control-label">Standar Minimal</label>
          <?php
            $standarmin = array('name'=>'standarmin', 'maxlength'=>'254','value'=>$data->dpo_standar_min, 'class'=>'form-control', 'onkeypress'=>'return hanyaAngka(event)');
            echo form_input($standarmin);
            echo form_error('standarmin');
          ?>  
        </div>
        <div class="form-group">
          <label class="control-label">Standar Maksimal</label>
          <?php
            $standarmax = array('name'=>'standarmax', 'maxlength'=>'254','value'=>$data->dpo_standar_max, 'class'=>'form-control', 'onkeypress'=>'return hanyaAngka(event)');
            echo form_input($standarmax);
            echo form_error('standarmax');
          ?>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          <?php 
            echo form_submit('submit', 'Ubah', 'id="submit-poin" class="btn btn-primary"'); 
          ?>
      </div>
      <?php echo form_close(); ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
  }
}
?>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()."assets/bower_components/jquery/dist/jquery.min.js"; ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."assets/bower_components/bootstrap/dist/js/bootstrap.min.js"; ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/dist/js/adminlte.min.js"; ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url()."assets/bower_components/datatables.net/js/jquery.dataTables.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/bower_components/sweetalert2/package/dist/sweetalert2.all.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/bower_components/sweetalert2/package/dist/sweetalert2.min.js"; ?>"></script>
<script src="<?php echo base_url()."assets/assets/js/myscript.js"; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/bower_components/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"; ?>"></script>

<script type="text/javascript">
  $(document).ready(function(){
    var table = $('#example').DataTable({
        // 'ajax': 'https://api.myjson.com/bins/1us28', 
        
        'autoWidth'   : false, 
        aoColumns : [
          { sWidth: '10%'},
          { sWidth: '80%' },
          { sWidth: '10%' }
        ],
        'columnDefs': [
          {
            'targets': 0, // your case first column
            "className": "text-center"
          }
        ],
      'order': [[1, 'asc']]
    });
  });

  // Handle form submission event 
  // $('#frm-example').on('submit', function(e){
  //     var form = this;
      
  //     var rows_selected = table.column(0).checkboxes.selected();
      
  //     // Iterate over all selected checkboxes
  //     $.each(rows_selected, function(index, rowId){
  //        // Create a hidden element 
  //        $(form).append(
  //            $('<input>')
  //               .attr('type', 'hidden')
  //               .attr('name', 'id[]')
  //               .val(rowId)
  //        );
  //     });
  //  });
  
  $(function () {
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false, 
      aoColumns : [
        { sWidth: '5'},
        { sWidth: '55%' },
        { sWidth: '30%' },
        { sWidth: '10%' }
      ],
      'columnDefs': [
      {
        "targets": 0, // your case first column
        "className": "text-center",
        "width": "5%"
      },
      {
        "targets": 3, // your case first column
        "className": "text-center",
        "width": "5%"
      }]
    })
  });

  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57)&& charCode != 46)
      return false;
    return true;
  }
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
