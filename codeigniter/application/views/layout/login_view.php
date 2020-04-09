<h1>login form</h1>


<?php $attributes=['id'=>'login_form','class'=>'form_horizontal']?>
<?php if($this->session->flashdata('errors')):?>
  <?php  echo $this->session->flashdata('errors');?>
<?php endif;?>
<?php echo form_open('home/login',$attributes);?>

<div class="form-group">

<?php  echo form_label("username");?>
<?php  $data=array(
'class'=>'form-control',
'placeholder'=>'enter username',
'name'=>'username'
);?>

<?php echo form_input($data);?>

</div>


<div class="form-group">

<?php  echo form_label("Password");?>
<?php  $data=array(
'class'=>'form-control',
'placeholder'=>'enter password',
'name'=>'password'
);?>

<?php echo form_password($data);?>

</div>
<div class="form-group">


<?php  $data=array(
'class'=>'btn btn-primary',
'value'=>'Login',
'name'=>'submit'
);?>

<?php echo form_submit($data);?>

</div>



<?php echo form_close(); ?>