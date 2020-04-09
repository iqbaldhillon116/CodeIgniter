<?php class Home extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();        
      
  
    }

    public function project()
    {
      $this->load->view("projects/index");
    }

    public function index()
    { $data['register']= 'layout/home_view';
      $this->load->view('main',$data);
    }


    public function login()
    {
     
       $username=$this->input->post('username');
       $password=$this->input->post('password');
       $this->form_validation->set_rules('username','Username','required');
       $this->form_validation->set_rules('password', 'Password', 'required');
          
       if($this->form_validation->run()==false)
          {
            $data=array
            (
              'errors'=>validation_errors()
            );
        
            $this->session->set_flashdata($data);
            if($this->session->userdata('login'))
            {
              $user_id=$this->session->userdata('id');
              $data['project_data']=$this->Project_model->get_user_project($user_id);
              $data['user_tasks']=$this->Tasks_model->get_user_tasks($user_id);

            }
            
           
            $data['register']='layout/home_view';
            $this->load->view('main',$data);
          }
        else
          {   
          $user=$this->Users_model->login($username,$password);
            if($user)
            {
            $userinfo=array('username'=>$username,'id'=>$user,'login'=>true);
            $user_id=$userinfo['id'];
            $this->session->set_userdata($userinfo);
            $data['project_data']=$this->Project_model->get_user_project($user_id);
            $data['user_tasks']=$this->Tasks_model->get_user_tasks($user_id);
            $data['register']='layout/home_view';
            $this->load->view('main',$data);
            }
            else
            {
            $this->session->set_flashdata('wrong','Wrong username or password');
            $data['register']='layout/home_view';
            $this->load->view('main',$data);
            }
          }
    }


      public function logout()
      {
        $this->session->sess_destroy();
        redirect("home/index");
      }

      public function register()
      {
        
      $this->form_validation->set_rules('username','Username','Trim|required');
      $this->form_validation->set_rules('password','Password','Trim|required');
      $this->form_validation->set_rules('firstName','First Name','Trim|required');
      $this->form_validation->set_rules('lastName','Last Name','Trim|required');
      $this->form_validation->set_rules('confirmPassword','Confirm Password','Trim|required|matches[password]');
          if($this->form_validation->run() == False)
            {
              $data['register']="layout/register";
              $this->load->view('main',$data);
            }
          else
          {
              $options=['cost'=>12];
              $encrypted_pass=password_hash($this->input->post('password'),PASSWORD_BCRYPT,$options);

              $username=$this->input->post('username');
              $password=$encrypted_pass;
              $confirmPassword=$this->input->post('confirmPassword');
              $email=$this->input->post('email');
              $firstName=$this->input->post('firstName');
              $lastName=$this->input->post('lastName');

              $createuser=array(
              'username'=>$username,
              'password'=>$password,
              'email'=>$email,
              'first_name'=>$firstName,
              'last_name'=>$lastName
                );
           $result= $this->Users_model->create_user($createuser);
           if($result==1)  
           {
              $this->session->set_flashdata("user_created",'one user registered successfully');
              $data['register']="layout/home_view";
              $this->load->view('main',$data);
              };
          }
      }
     
    }

    ?>