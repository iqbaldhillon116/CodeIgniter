<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>

    <div >
  
    
    
    <h2>Registeration Form</h2>
 <?php 
if($this->session->flashdata('wrong')){
    echo $this->session->flashdata('wrong');
} ?>

<?php 
echo validation_errors("<p class='bg-danger'>"); ?>
 <!-- Registration  Form starts -->
 <?php
 $attribute=array('class'=>'form-group',
 'method'=>'post');
 echo  form_open('home/register',$attribute);?>
 <div class="form-group">
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
</div>

<div class="form-group">
<?php 
 echo "First Name";
 $input2 =array(
'class'=>'form-control',
'name'=>'firstName',
'type'=>'text',
'placeholder'=>'Firstname'
 );
 echo form_input($input2);
 ?>
</div>

<div class="form-group">
<?php 
 echo "Last Name";
 $input2 =array(
'class'=>'form-control',
'name'=>'lastName',
'type'=>'text',
'placeholder'=>'Lastname'
 );
 echo form_input($input2);
 ?>
</div>

<div class="form-group">
<?php 
 echo "Password";
 $input2 =array(
'class'=>'form-control',
'name'=>'password',
'type'=>'password',
'placeholder'=>'password'
 );
 echo form_input($input2);
 ?>
</div>

<div class="form-group">
<?php 
 echo "Confirm Password";
 $input2 =array(
'class'=>'form-control',
'name'=>'confirmPassword',
'type'=>'password',
'placeholder'=>'Retype password'
 );
 echo form_input($input2);
 ?>
</div>
<div class="form-group">
<?php 
 echo "Email";
 $input2 =array(
'class'=>'form-control',
'name'=>'email',
'type'=>'email',
'placeholder'=>'enter your email'
 );
 echo form_input($input2);
 ?>
</div>

<?php 
 $submit =array(
'class'=>'btn btn-primary',
'name'=>'submit',
'type'=>'submit',
'value'=>'Register'
 );
 echo form_submit($submit);
 ?>
 <?php echo form_close(); ?>

 <!-- Registration form ends -->
    </div>
</body>
</html>