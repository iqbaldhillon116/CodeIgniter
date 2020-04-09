<?php 
class Tasks_model extends CI_Model
{
    public function get_tasks($task_id)
    {
        $this->db->where('task_id',$task_id);
        $query=$this->db->get('tasks');
        return $query->row();
    }

    public function edit_task($task_id,$task_data)
    {
        $this->db->where('task_id',$task_id);
       $query= $this->db->update('tasks',$task_data);
        return $query;
    }
    public function create_task($task_data)
    {
        $this->db->insert('tasks',$task_data);
        return true;
    }

    public function delete_task($task_id)
    {   $this->db->where('task_id',$task_id);
        $this->db->delete('tasks');
        return true; 
    }

    public function get_project_tasks($project_id,$active=true)
    {
//SELECT `projects`.`project_name`, `projects`.`id`, `tasks`.`project_id`, `tasks`.`task_name`, `tasks`.`task_id` FROM `projects` JOIN `tasks` ON `tasks`.`project_id`=`projects`.`id` WHERE `task`.`project_id` = '10' AND `tasks`.`status` =0

        $this->db->select('
        projects.project_name,
        projects.id,
        tasks.project_id,
        tasks.task_name,
        tasks.task_id
        ');
        $this->db->from('projects');
        $this->db->join('tasks','tasks.project_id=projects.id');
        $this->db->where('tasks.project_id',$project_id);

        if($active==true)
        {
            $this->db->where('tasks.status',0);
        }
        else
        {
            $this->db->where('tasks.status',1);
        }

        $query=$this->db->get();

        if($query->num_rows()<1)
        {
            return false;
        }
        else
        {
            return $query->result();
        }

    }

    public function get_project_id($task_id)
    {
        $this->db->where('task_id',$task_id);
        $query=$this->db->get('tasks');
        return $query->row()->project_id;
    }

    public function get_project_name($project_id)
    {
        $this->db->where('id',$project_id);
        $query=$this->db->get('projects');
        return $query->row()->project_name;
    }

    public function delete_tasks($project_id)
    {
        $this->db->where('project_id',$project_id);
        $this->db->delete('tasks');
        return true;
    }
    public function mark_task_complete($task_id)
    {
        $this->db->set('status',1);
        $this->db->where('task_id',$task_id);
        $this->db->update('tasks');
        return true;
    }

    public function mark_task_incomplete($task_id)
    {
        $this->db->set('status',0);
        $this->db->where('task_id',$task_id);
        $this->db->update('tasks');
        return true;
    }

    public function get_user_tasks($user_id)
{
    $this->db->where('user_id',$user_id);
    $this->db->join('projects','projects.id=tasks.project_id');
    $query=$this->db->get('tasks');
    return $query->result();
}
}
?>