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

<?php if($this->session->userdata('login')): ?>
    <h1>Welcome <?php echo $this->session->userdata('username'); ?></h1>
   
   <div class="panel panel-primary">
   <div class="panel-heading">
    <h3>Your Projects</h3>
</div>
<div class="panel-body">
<table class="table table-hover">
<tr>
<th>
project name
</th>
<th>
project Description
</th>
</tr>

<?php foreach($project_data as $project): ?>
    <tr>
<?php echo "<td>".$project->project_name."</td>" ; ?>
<?php echo "<td>".$project->project_body."</td>" ; ?>
<?php echo "<td><a href=".base_url()."projects/display/".$project->id.">view</a></td>" ; ?>
</tr>
<?php endforeach;?>


</table>


</div>
    </div>
    


    <div class="panel panel-primary">
      <div class="panel-heading">
        <h2>Your Tasks</h2>
      </div>
      <div class="panel-body">
            <table class="table table-hover">
            <tr>
            <th>
            Task name
            </th>
            <th>
            Task Description
            </th>
            </tr>
            <?php foreach($user_tasks as $tasks): ?>
                <tr>
            <?php echo "<td>".$tasks->task_name."</td>" ; ?>
            <?php echo "<td>".$tasks->task_body."</td>" ; ?>
            <?php echo "<td><a href=".base_url()."Tasks/display/".$tasks->task_id.">view</a></td>" ; ?>
            </tr>
            <?php endforeach;?>
            </table>
      </div>
    </div>

<?php endif;?>
<?php if(!$this->session->userdata('login')):?>
<div class="jumbotron">
<h2>Hello,welcome to CI App</h2>
</div>
<?php endif;?>
</body>
</html>

