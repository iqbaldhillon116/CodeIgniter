<?php 
$Reg="";
$Home="";
$Pro="";

if($this->uri->segment(2)=="register")
{
  $Reg="active";
}
elseif($this->uri->segment(2)=="login")
{
$Home="active";
}
elseif($this->uri->segment(1)=="Projects")
{
$Pro="active";
}
elseif($this->uri->segment(1)=="home")
{
  $Home="active";
}
else
{
  $Pro="active";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>/asset/css/custom.css">
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 



    <title>Document</title>
</head>
<body>




<!-- navbar starts --> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CI App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo $Home;?>">
        <a class="nav-link" href="<?php echo base_url();?>home/login">Home </a>
      </li>
      <?php if(!$this->session->userdata('login')): ?>
      <li class="nav-item <?php echo $Reg;?>">
        <a class="nav-link" href="<?php echo base_url()."home/register";?>">Register</a>
      </li>
      <?php endif;?>
    
    <?php if($this->session->userdata('login')):?>
      
      <li class="nav-item <?php echo $Pro;?>">
        <a class="nav-link" href="<?php echo base_url()."Projects/index";?>">Projects </a>
      </li></ul>

      
    <ul class="navbar-nav my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."home/logout";?>">Logout </a>
      </li></ul>
    <?php endif;?>
  </div>
</nav>
<!--  navbar ends -->


    <div class="container" >
  <div class="row">
    <div class="col-3" >
  
    <p class="bg-danger">
 <?php 
if($this->session->flashdata('wrong')){
    echo $this->session->flashdata('wrong');
 
} ?>
</p>
<p class="bg-danger">
<?php 
if($this->session->flashdata('errors')){
    echo $this->session->flashdata('errors');
} ?>
</p>

 <!-- Login Form starts -->
 <?php
if(!$this->session->userdata('login')):?>
<?php
echo "<h2>Login</h2>";
 $attribute=array('class'=>'form-group',
 'method'=>'post');
 echo  form_open('home/login',$attribute);?>
 <?php 
echo "<br>"; 
 echo "Username";


 $input =array(
'class'=>'form-control',
'name'=>'username',
'type'=>'text',
'placeholder'=>'username'
 );
 echo form_input($input);
 ?>

<?php 
 echo "<br>";
 echo "Password";


 $input2 =array(
'class'=>'form-control',
'name'=>'password',
'type'=>'password',
'placeholder'=>'password'
 );
 echo form_input($input2);
 ?>

<?php 
echo "<br>";
 $submit =array(
'class'=>'btn btn-primary',
'name'=>'submit',
'type'=>'submit',
'value'=>'submit'
 );
 echo form_submit($submit);
 ?>
 <?php echo form_close(); ?>
<?php endif?>
 <!-- login form ends -->
    </div>
    <div class="col-9" >
    
    <p class="bg-success"> 
   <?php if($this->session->flashdata('user_created')){
     echo $this->session->flashdata('user_created'); 
   }?>
   </p>
   <p class="bg-danger">
<?php 
if($this->session->flashdata('no_access')){
    echo $this->session->flashdata('no_access');
} ?>
</p>

   <?php $this->load->view($register); 
  
  
   ?>
    </div>
    </div>
    </div>
</body>
</html>