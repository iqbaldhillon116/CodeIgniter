<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>


   
    <p class="bg-danger">
<?php if($this->session->flashdata('projecterrors'))
{
    echo $this->session->flashdata('projecterrors');
}?>
</p>
<h1>Edit Project</h1>
    <?php $attributes=array('method'=>'post',"form_label"=>'edit_project');?>
    <?php echo form_open("Projects/edit_project/".$project_data->id,$attributes);?>
    <?php 
    $projectname="Project Name :";
    echo form_label($projectname);
    ?>
    <?php 
    $data=array(
        'class'=>'form-control',
        'type'=>'text',
        'name'=>'project_name',
        'value'=>$project_data->project_name
    );
    echo form_input($data);
    ?>
      <?php 
    $projectname="Project Body :";
    echo form_label($projectname);
    ?>
    <?php 
    $data=array(
        'class'=>'form-control',
        'name'=>'project_body',
        'value'=>$project_data->project_body
    );
    echo form_textarea($data);
    ?>
    <br>
    <?php 
     $submit =array(
        'class'=>'btn btn-primary',
        'name'=>'submit',
        'type'=>'submit',
        'value'=>'Update Project'
         );
    echo form_submit($submit);?>
    <?php echo form_close();?>
   
</body>
</html>