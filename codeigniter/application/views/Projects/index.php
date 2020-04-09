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
    <div class="panel panel-primary">
        <div class="panel-heading">
           <h2> All Projects</h2>
        </div>
   
<p class="bg-success"> 
<?php 
if($this->session->flashdata('project_created'))
{
    echo $this->session->flashdata('project_created');
}
?>
<?php 
if($this->session->flashdata('project_deleted'))
{
    echo $this->session->flashdata('project_deleted');
}
?>
<?php 
if($this->session->flashdata('project_updated'))
{
    echo $this->session->flashdata('project_updated');
}
?>
</p>

<div class="panel-body">
<a href="<?php echo"createProject"?>"><button class="btn btn-primary pull-right" style="margin-bottom:5px;" >Create Project</button></a>
<table class="table table-hover">
<tr>
<th>
project name
</th>
<th>
project Body
</th>
</tr>

<?php foreach($projects as $project): ?>
    <tr>
<?php echo "<td><a href='".base_url()."projects/display/".$project->id."'>".$project->project_name."</a></td>" ; ?>
<?php echo "<td>".$project->project_body."</td>" ; ?>
<?php echo "<td><a href='".base_url()."projects/delete/".$project->id."'><button class='btn btn-danger'>Delete</button></a></td>" ; ?>
</tr>
<?php endforeach;?>

</table>
</div>
</div>
</body>
</html>


