<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<!--?php 
  $user = @$_SESSION['user'];
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
  <title>BEAM | Lembar Pemeriksaan</title>
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
  <style>
  table.center {
    margin-left:auto; 
    margin-right:auto;
  }
  </style>
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
    <nav class="navbar navbar-static-top" user="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" user="button">
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
          </a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-info-circle"></i> <?php echo $title ?>
            <small class="pull-right">Date: <?php echo date("d-m-Y"); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                <small></small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <!-- <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button> -->
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <div class="form-group">
                <div style="overflow: auto">
                  <table id="example1" class="table table-striped">
                    <thead>
                      <tr>
                          <th>Peralatan</th>
                          <th>Kode</th>
                          <th>Tanggal</th>
                          <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!empty($datalist))
                        {
                            foreach($datalist as $data)
                            {
                                ?>
                                <tr>
                                <td> <?php echo $data->equ_nama." ".$data->are_nama." ".$data->deq_lokasi; ?> </td>
                                <td> <?php echo $data->deq_kode; ?> </td>
                                <td> <?php echo $data->tch_tanggal; ?> </td>
                                <td> 
                                  <center>
                                  <?php 
                                    $dataw = array(
                                      'class' => 'btn btn-info btn-xs view_data',
                                      'type' => 'button',
                                      'id' => $data->tch_id,
                                      'content' => '<i class="fa fa-eye"></i>'
                                    );
                                    echo form_button($dataw);
                                  ?>
                                  </center>
                                </td>
                                </tr>
                                <?php
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
          <!-- /.box -->
        </div>
      </div>
    </section>
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

<div class="modal fade" id="impor-data">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tolak Data</h4>
      </div>
      <?php
        echo form_open('checksheet/tolakdata', 'enctype="multipart/form-data" id="frm-tolak"');
      ?>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Alasan Penolakan</label>
          <?php 
          $data = array(
            'name'        => 'txtAlasan',
            'id'          => 'txtAlasan',
            'rows'        => '5',
            'cols'        => '10',
            'style'       => 'width:100%',
            'class'       => 'form-control'
          );
          echo form_textarea($data); ?>
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

<div class="modal fade" id="myModal">
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


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
  <script type="text/javascript">
    $(document).ready(function(){
      var table = $('#example').DataTable({
        // 'ajax': 'https://api.myjson.com/bins/1us28', 
        
        'autoWidth'   : false, 
        aoColumns : [
          { sWidth: '5%'},
          { sWidth: '20%' },
          { sWidth: '20%' },
          { sWidth: '20%' },
          { sWidth: '5%' },
          { sWidth: '5%' },
          { sWidth: '5%' },
          { sWidth: '5%'},
          { sWidth: '5%'},
          { sWidth: '10%'}
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

      $('#submit, #submit-poin').on('click', function() {
        var $this = $(this);
        $this.button('loading');
          setTimeout(function() {
            $this.button('reset');
        }, 10000);
      });
      
      // Handle form submission event 
      $('#frm-tolak').on('submit', function(e){
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
      
      // Initiate DataTable function comes with plugin
      $('#example').DataTable();
      // Start jQuery click function to view Bootstrap modal when view info button is clicked
      $('#example').on('click', '.view_data', function(){
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
              $('#myModal').modal('show');
          }
        });
        // End AJAX function
      });


      // Start jQuery click function to view Bootstrap modal when view info button is clicked
      $('#example1').on('click', '.view_data', function(){
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
              $('#myModal').modal('show');
          }
        });
        // End AJAX function
      });
      
      // Start jQuery click function to view Bootstrap modal when view info button is clicked
      $('#example2').on('click', '.view_data', function(){
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
              $('#myModal').modal('show');
          }
        });
        // End AJAX function
      });
      
      // Start jQuery click function to view Bootstrap modal when view info button is clicked
      $('#example3').on('click', '.view_data', function(){
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
              $('#myModal').modal('show');
          }
        });
        // End AJAX function
      });

      // Start jQuery click function to view Bootstrap modal when view info button is clicked
      $('#example4').on('click', '.view_data', function(){
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
              $('#myModal').modal('show');
          }
        });
        // End AJAX function
      });

    });

    $(function () {
      $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false, 
        'aaSorting': [],
        aoColumns : [
          { sWidth: '50%' },
          { sWidth: '20%' },
          { sWidth: '20%' },
          { sWidth: '10%' }
        ],
        'columnDefs': [
        {
          "targets": 1, // your case first column
          "className": "text-center"
        },
        {
          "targets": 2, // your case first column
          "className": "text-center"
        }]
      }),
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false, 
        aoColumns : [
          { sWidth: '30%' },
          { sWidth: '40%' },
          { sWidth: '20%' },
          { sWidth: '10%' }
        ],
        'columnDefs': [
        {
          "targets": 0, // your case first column
          "className": "text-center"
        },
        {
          "targets": 3, // your case first column
          "className": "text-center"
        }]
      }),
      $('#example3').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false, 
        aoColumns : [
          { sWidth: '30%' },
          { sWidth: '40%' },
          { sWidth: '20%' },
          { sWidth: '10%' }
        ],
        'columnDefs': [
        {
          "targets": 0, // your case first column
          "className": "text-center"
        },
        {
          "targets": 3, // your case first column
          "className": "text-center"
        }]
      }),
      $('#example4').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false, 
        aoColumns : [
          { sWidth: '30%' },
          { sWidth: '40%' },
          { sWidth: '20%' },
          { sWidth: '10%' }
        ],
        'columnDefs': [
        {
          "targets": 0, // your case first column
          "className": "text-center"
        },
        {
          "targets": 3, // your case first column
          "className": "text-center"
        }]
      })
    });	
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>



 