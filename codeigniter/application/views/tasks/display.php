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
<div class="row">
<div class="col-9">
    <div class="panel panel-primary">
<div class="panel-heading"><h2> Task For Project :<?php echo $project_name?></h2></div>

<p class="bg-success"> 
<div class="panel-body">

<?php 
if($this->session->flashdata('task_updated'))
{
    echo $this->session->flashdata('task_updated');
}
?>

</p>
<table class="table table-hover">
<tr>
<th>
Task name
</th>
<th>
Task Description
</th>
<th>
Due Date
</th>

</tr>


    <tr>
<?php echo "<td>".$task->task_name ; ?>


<?php echo "<td>".$task->task_body."</td>" ; ?>
<?php echo "<td>".$task->due_date."</td>" ; ?>

</tr>
</table>
</div>
</div>
</div>
<div class="col-3 pull-right">
<h4>  Task actions</h4>
    <ul class="list-group">
    <li class="list-group-item"><?php echo "<a href=".base_url()."tasks/edit/".$task->task_id."> edit </a>";?></li>
    <li class="list-group-item"><?php echo "<a href=".base_url()."tasks/delete/".$task->task_id."> Delete </a></td>";?></li>
    <li class="list-group-item"><?php echo "<a href=".base_url()."tasks/mark_complete/".$task->task_id.">mark complete </a>";?> </li>
    <li class="list-group-item"> <?php echo "<a href=".base_url()."tasks/mark_incomplete/".$task->task_id.">mark incomplete </a>";?></li>
    </ul>
</div>
</div>
</body>
</html>