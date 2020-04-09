<?php 
class Tasks extends CI_Controller{


public function display($task_id)
{
    $data['task']=$this->Tasks_model->get_tasks($task_id);
    $data['project_id']=$this->Tasks_model->get_project_id($task_id);
    $data['project_name']=$this->Tasks_model->get_project_name($data['project_id']);
    $data['register']="tasks/display";
    $this->load->view('main',$data);
}

public function create($project_id)
        {
            $this->form_validation->set_rules('task_name',' Task Name','trim|required');
            $this->form_validation->set_rules('task_body',' Task Body','trim|required');
        
            if($this->form_validation->run()== False)
            { 
                $error=array('taskerrors'=>validation_errors());
               $this->session->set_flashdata($error);
              
                $data['register']='Tasks/create_task';
                $this->load->view('main',$data);
            }
            else
            {
                $taskdata=array(
                  'project_id'=>$project_id,
                  'task_name'=>$this->input->post('task_name'),
                  'task_body'=>$this->input->post('task_body'),
                  'due_date'=>$this->input->post('task_due_date')
                );
              if($this->Tasks_model->create_task($taskdata))
              {   
                  
                  $this->session->set_flashdata('task_created','New Project Task has been created successfully');
                  redirect('projects/display/'.$project_id);
              }

            }


        }




public function edit($task_id)
{

    $this->form_validation->set_rules('task_name',' Task Name','trim|required');
    $this->form_validation->set_rules('task_body',' Task Body','trim|required');

    if($this->form_validation->run()== False)
    { 
        $error=array('taskerrors'=>validation_errors());
       $this->session->set_flashdata($error);
       $data['task_info']=$this->Tasks_model->get_tasks($task_id);
        $data['register']='Tasks/edit';
        $this->load->view('main',$data);
    }
    else
    {
        $task_data=array(
          'task_name'=>$this->input->post('task_name'),
          'task_body'=>$this->input->post('task_body'),
          'due_date'=>$this->input->post('task_due_date')
        );
      if($this->Tasks_model->edit_task($task_id,$task_data))
      {
          $this->session->set_flashdata('task_updated','new task updated successfully');
          redirect('Tasks/display/'.$task_id);
      }

    }
}

public function delete($task_id)
{   
    $Project_id=$this->Tasks_model->get_project_id($task_id);
    $this->Tasks_model->delete_task($task_id);
    $this->session->set_flashdata('task_deleted','task has been deleted successfully');
    redirect('Projects/display/'.$Project_id);
}

public function mark_complete($task_id)
{
    if($this->Tasks_model->mark_task_complete($task_id))
    {
        $Project_id=$this->Tasks_model->get_project_id($task_id);
        $this->session->set_flashdata('mark_done','One Project Task has been completed');
        redirect('Projects/display/'.$Project_id.'');
    }
}

public function mark_incomplete($task_id)
{
    if($this->Tasks_model->mark_task_incomplete($task_id))
    {
        $Project_id=$this->Tasks_model->get_project_id($task_id);
        $this->session->set_flashdata('mark_undone','The project Task has been set to incomplete');
        redirect('Projects/display/'.$Project_id.'');
    }
}



}
?>