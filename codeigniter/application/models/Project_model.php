<?php 
class Project_model extends CI_Model
{
public function get_project()
{
$query=$this->db->get('projects');
return $query->result();
 
}
public function get_projects($project_id){
    $this->db->where('id',$project_id);
    $query=$this->db->get('projects');
    return $query->row();
}

public function get_user_project($user_id)
{
    $this->db->where('user_id',$user_id);
    $query=$this->db->get('projects');
    return $query->result();
}
    public function create_project($projectdata)
    {
        $insert=$this->db->insert('projects',$projectdata);
        return $insert;
   
    }
    public function edit_project($project_id,$projectdata)
    {
        $this->db->where('id',$project_id);
        $this->db->update('projects',$projectdata);

        return true;
    }
    
    public function delete_project($project_id)
    {
        $this->db->where('id',$project_id);
        $this->db->delete('projects');

        return true;
    }


    public function get_project_info($project_id)
    {
        $this->db->where('id',$project_id);
        $query=$this->db->get('projects');
        return $query->row();
    }

}
?>