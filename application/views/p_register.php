<?php 
  if(isset($_SESSION['status']))
  {
    session_destroy();
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo base_url()."assets/dist/img/1.ico"; ?>"/>
  <title>BEAM | Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/bootstrap/dist/css/bootstrap.min.css"; ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/font-awesome/css/font-awesome.min.css"; ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/bower_components/Ionicons/css/ionicons.min.css"; ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/dist/css/AdminLTE.min.css"; ?>"><!-- 
  <link rel="shortcut icon" href="2.png"/> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url()."index.php/login"; ?>"><img class="light-logo" src="<?php echo base_url().'assets/dist/img/favicon.png'; ?>">&nbsp;<img class="dark-logo" src="<?php echo base_url().'assets/dist/img/logo-beam.png'; ?>"></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Silahkan Mendaftar ...</p>
    <?php 
      echo form_open('Register/index_register');
     ?>
      <div class="form-group has-feedback">
        <?php 
          $nama = array('name'=>'nama', 'maxlength'=>'100', 'value'=>'', 'size'=>'50', 'class' => 'form-control', 'placeholder' => 'Nama Lengkap');
          echo form_input($nama);
         ?> 
         <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php 
          $username = array('name'=>'usernama', 'maxlength'=>'100', 'value'=>'', 'size'=>'20', 'class' => 'form-control', 'placeholder' => 'Nama Pengguna');
          echo form_input($username);
         ?>
         <span class="glyphicon glyphicon-send form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php 
          $password = array('name'=>'password', 'maxlength'=>'100', 'value'=>'', 'size'=>'20', 'class' => 'form-control', 'placeholder' => 'Sandi');
          echo form_password($password);
         ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php 
          $repassword = array('name'=>'repassword', 'maxlength'=>'100', 'value'=>'', 'size'=>'20', 'class' => 'form-control', 'placeholder' => 'Konfirmasi Sandi');
          echo form_password($repassword);
         ?>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php 
          // $role = array('name'=>'role', 'maxlength'=>'20', 'value'=>'', 'size'=>'20', 'class' => 'form-control');
          // echo form_input($role);
          $options = array(
          '' => '-- Pilih Hak Akses --',
          'donatur' => 'Donatur',
          );
          echo form_dropdown('role', $options, '-- Pilih Hak Akses --', 'class="form-control"');
         ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo form_radio('jeniskelamin', 'Laki-Laki', FALSE); ?> Laki-Laki <?php echo form_radio('jeniskelamin', 'Perempuan', FALSE); ?> Perempuan<hr>
      </div>
      <div class="form-group has-feedback">
        <?php 
          $email = array('name'=>'email', 'maxlength'=>'100', 'value'=>'', 'size'=>'20', 'class' => 'form-control', 'placeholder' => 'Email');
          echo form_input($email);
         ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php 
          $notelp = array('name'=>'notelp', 'maxlength'=>'20', 'value'=>'', 'size'=>'20', 'class' => 'form-control', 'placeholder' => 'No Telepon');
          echo form_input($notelp);
         ?>
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="<?php echo base_url()."index.php/login"; ?>" class="text-center">Saya telah mempunyai Akun</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <?php 
            echo form_submit('submit', 'Daftar', 'id="submit" class="btn btn-primary btn-block btn-flat" onclick="validate()"');
           ?>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script language="javascript" type="text/javascript">
function validate()
{
  if(document.getElementById("password").value=="")
  {
    alert("Please Enter Your Password");
    document.getElementById("password").focus();
    return false;
  }
  if(document.getElementById("repassword").value=="")
  {
    alert("Please ReEnter Your Password");
    document.getElementById("repassword").focus();
    return false;
  }
  if(document.getElementById("repassword").value!="")
  {
    if(document.getElementById("repassword").value != document.getElementById("password").value)
    {
      alert("Confirm Password doesnot match!");
      document.getElementById("repassword").focus();
      return false;
    }
  }
  return true;
}
</script> 
</body>
</html>