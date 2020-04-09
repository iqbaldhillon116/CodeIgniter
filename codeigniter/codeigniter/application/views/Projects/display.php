<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>

<div class="row">
<p class="bg-danger">
<?php 
if($this->session->flashdata('task_deleted'))
{
    echo $this->session->flashdata('task_deleted');
}
?>
<?php if($this->session->flashdata('project_created'))
{
    echo $this->session->flashdata('project_created');
}
?>
</p>
<p class="bg-success">
<?php if($this->session->flashdata('mark_done'))
{
    echo $this->session->flashdata('mark_done');
}

?>
<?php 
if($this->session->flashdata('task_created'))
{
    echo $this->session->flashdata('task_created');
}
?>
</p>
<p class="bg-danger">
<?php if($this->session->flashdata('mark_undone'))
{
    echo $this->session->flashdata('mark_undone');
}
?>
</p>
<div class="col-9">
    <div class="panel panel-primary">
        <div class="panel-heading">
<h1>Project Name: <?php echo $project_data->project_name;?></h1>
<p><b>Project Creation date :</b> <?php echo $project_data->date_created; ?></p>
</div>
<div class="panel-body">
<p><b>Project Description :</b>
<br>
<br>
 <?php echo $project_data->project_body; ?></p>
</div>
</div>


<div class="panel panel-danger">
<div class="panel-heading"><h3> Active Tasks:</h3></div>
<div class="panel-body">
<?php if($Active_tasks != 0):?>
<ul class="list-group">
<?php foreach($Active_tasks as $tasks):?>
  <li class="list-group-item"><a href="<?php echo base_url()."Tasks/display/".$tasks->task_id;?>"><?php echo $tasks->task_name?></a></li>
<br>

<?php endforeach;?>
</ul>
<?php endif;?>
<?php if($Active_tasks == 0):?>
<?php echo "No pending tasks";?>
<?php endif;?>
</div>
</div>
<div class="panel panel-success">
<div class="panel-heading">
<h3>Completed Tasks</h3>
</div>
<div class="panel-body">
<?php if($completed_tasks != 0):?>
<ul class="list-group">
<?php foreach($completed_tasks as $tasks):?>
  <li class="list-group-item"><a href="<?php echo base_url()."Tasks/display/".$tasks->task_id;?>"><?php echo $tasks->task_name?></a></li>
<br>

<?php endforeach;?>
</ul>
<?php endif;?>
<?php if($completed_tasks == 0):?>
<?php echo "No pending tasks";?>
<?php endif;?>
</div>
</div>
</div>
<div class="col-3 pull-right">
<h4>  Projects actions</h4>
    <ul class="list-group">
    <li class="list-group-item"><a href="<?php echo base_url();?><?php echo "Tasks/create/".$project_data->id; ?>">Create Task</a></li>
    <li class="list-group-item"><a href="<?php echo base_url();?><?php echo "Projects/edit_project/".$project_data->id; ?>">Edit</a></li>
    <li class="list-group-item"><a href="<?php echo base_url();?><?php echo "Projects/delete/".$project_data->id; ?>">Delete</a></li>
    </ul>
</div>
</body>
</html>