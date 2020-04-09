<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>


   
    <p class="bg-danger">
<?php if($this->session->flashdata('projecterrors'))
{
    echo $this->session->flashdata('projecterrors');
}?>
</p>
<h1>Create Project</h1>
    <?php $attributes=array('method'=>'post',"form_label"=>'create_project');?>
    <?php echo form_open("Projects/insert_user",$attributes);?>
    <?php 
    $projectname="Project Name :";
    echo form_label($projectname);
    ?>
    <?php 
    $data=array('class'=>'form-control','type'=>'text','name'=>'project_name');
    echo form_input($data);
    ?>
      <?php 
    $projectname="Project Body :";
    echo form_label($projectname);
    ?>
    <?php 
    $data=array('class'=>'form-control','name'=>'project_body');
    echo form_textarea($data);
    ?>
    <br>
    <?php 
     $submit =array(
        'class'=>'btn btn-primary',
        'name'=>'submit',
        'type'=>'submit',
        'value'=>'Create Project'
         );
    echo form_submit($submit);?>
    <?php echo form_close();?>
   
</body>
</html>