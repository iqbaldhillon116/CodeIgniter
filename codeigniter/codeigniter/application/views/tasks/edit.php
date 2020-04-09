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
<?php if($this->session->flashdata('taskerrors'))
{
    echo $this->session->flashdata('taskerrors');
}?>
</p>
<h1>Edit tasks</h1>
    <?php $attributes=array('method'=>'post',"form_label"=>'edit_task');?>
    <?php echo form_open("tasks/edit/".$task_info->task_id.'',$attributes);?>
    <?php 
    $taskname="task Name :";
    echo form_label($taskname);
    ?>
    <?php 
    $data=array(
        'class'=>'form-control',
        'type'=>'text',
        'name'=>'task_name',
        'value'=>$task_info->task_name
    );
    echo form_input($data);
    ?>
      <?php 
    $taskname="tasks Body :";
    echo form_label($taskname);
    ?>
    <?php 
    $data=array(
        'class'=>'form-control',
        'name'=>'task_body',
        'value'=>$task_info->task_body
    );
    echo form_textarea($data);
    ?>
    <br>
    <?php 
    $taskname="Due date :";
    echo form_label($taskname);
    ?>
    <?php 
    $data=array(
        'class'=>'form-control',
        'name'=>'task_due_date',
        'type'=>'date',
        'value'=>$task_info->due_date
    );
    echo form_input($data);
    ?>
    <br>
    <?php 
     $submit =array(
        'class'=>'btn btn-primary',
        'name'=>'submit',
        'type'=>'submit',
        'value'=>'Update task'
         );
    echo form_submit($submit);?>
    <?php echo form_close();?>
   
</body>
</html>