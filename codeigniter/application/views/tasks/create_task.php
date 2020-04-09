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
<?php if($this->session->flashdata('taskerrors'))
{
    echo $this->session->flashdata('taskerrors');
}?>
</p>
<h1>Create task</h1>
    <?php $attributes=array('method'=>'post',"form_label"=>'create_task');?>
    <?php echo form_open("Tasks/create/".$this->uri->segment(3).'',$attributes);?>
    <?php 
    $taskname="task Name :";
    echo form_label($taskname);
    ?>
    <?php 
    $data=array('class'=>'form-control','type'=>'text','name'=>'task_name');
    echo form_input($data);
    ?>
      <?php 
    $taskname="task Body :";
    echo form_label($taskname);
    ?>
    <?php 
    $data=array('class'=>'form-control','name'=>'task_body');
    echo form_textarea($data);
    ?>

<?php 
    $taskname="Due Date :";
    echo form_label($taskname);
    ?>
    <?php 
    $data=array('class'=>'form-control','name'=>'task_due_date','type'=>'date');
    echo form_input($data);
    ?>
    <br>
    <?php 
     $submit =array(
        'class'=>'btn btn-primary',
        'name'=>'submit',
        'type'=>'submit',
        'value'=>'Create task'
         );
    echo form_submit($submit);?>
    <?php echo form_close();?>
   
</body>
</html>