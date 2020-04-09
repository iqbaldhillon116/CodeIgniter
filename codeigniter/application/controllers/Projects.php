<?php 
class Projects extends CI_Controller{

    public function __construct()
    {
        parent::__construct();    
        if(!$this->session->userdata('login'))
        {
           redirect('home/index');
        }
    }

        public function index()
        {
        $data['projects']= $this->Project_model->get_project();
        $data['register']='projects/index';
        $this->load->view('main',$data);
        }

        public function display($project_id)
        {
        $data['completed_tasks']=$this->Tasks_model->get_project_tasks($project_id,false);
        $data['Active_tasks']=$this->Tasks_model->get_project_tasks($project_id,true);
        $data['project_data']=$this->Project_model->get_projects($project_id);
        $data['register']='projects/display';     
        $this->load->view('main',$data);
        }

        public function createProject()
        {
            $data['register']="projects/create_Project";
          $this->load->view('main',$data);
        }

        public function insert_user()
        {
            $this->form_validation->set_rules('project_name',' Project Name','trim|required');
            $this->form_validation->set_rules('project_body',' Project Body','trim|required');
        
            if($this->form_validation->run()== False)
            { 
                $error=array('projecterrors'=>validation_errors());
               $this->session->set_flashdata($error);
                $data['register']='projects/create_project';
                $this->load->view('main',$data);
            }
            else
            {
                $projectdata=array(
                  'user_id'=>$this->session->userdata('id'),
                  'project_name'=>$this->input->post('project_name'),
                  'project_body'=>$this->input->post('project_body')
                );
              if($this->Project_model->create_project($projectdata))
              {
                  $this->session->set_flashdata('project_created','new project created successfully');
                  redirect('Projects/index');
              }

            }


        }

        public function edit_project($project_id)
        {
            $this->form_validation->set_rules('project_name',' Project Name','trim|required');
            $this->form_validation->set_rules('project_body',' Project Body','trim|required');
        
            if($this->form_validation->run()== False)
            {
                $error=array('projecterrors'=>validation_errors());
               $this->session->set_flashdata($error);

               $data['project_data']=$this->Project_model->get_project_info($project_id);
                 
               $data['register']='projects/edit_project';
                $this->load->view('main',$data);
            }
            else
            {
                $projectdata=array(
                  'project_name'=>$this->input->post('project_name'),
                  'project_body'=>$this->input->post('project_body')
                );
              if($this->Project_model->edit_project($project_id,$projectdata))
              {
                  $this->session->set_flashdata('project_updated','project has been updated successfully');
                  redirect('Projects/index');
              }

            }
         
        }

        public function delete($project_id)
        {
          
          if($this->Project_model->delete_project($project_id) && $this->Tasks_model->delete_tasks($project_id))
          {
            $this->session->set_flashdata('project_deleted','project has been deleted successfully');
                  redirect('Projects/index');
          }

        }



}
  ?>