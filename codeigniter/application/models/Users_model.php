<?php 
class Users_model extends CI_Model
{
public function create_user($createuser)
{
$insert_data=$this->db->insert('login_page',$createuser);
return $insert_data;
}



    public function login($username,$password)
    {
$this->db->where('username',$username);
$result = $this->db->get('login_page');
if($result->num_rows() !=0)
{
   $db_password=$result->row(2)->password;
     if(password_verify($password, $db_password))
     {

     return $result->row(0)->user_id;
     }
     else
       {
     return false;
        }
}
else{
    return false;
}
    }


    public function get_users($user_id,$username)
    {
// $config['hostname']="localhost";
// $config['username']="root";
// $config['password']="";
// $config['database']="crud";

// $this->load->database($config);

//$query=$this->db->get('login_page');//this is equals to select * from login_page



//------*** Another way to use Query**-------

//$query=$this->db->query("select * from login_page");

//return $query->num_rows();//gives the count of rows
//return $query->num_fields();   // gives the count of columns


//passing parametr in query  


//$this->db->where('id',$user_id);



//passing multiple paramerter or setting multiple shere conditions


$this->db->where([
    'id'=> $user_id,
    'username' => $username
]);
$query=$this->db->get('login_page');
return $query->result();
}

// public function create_user($data)
// {
// $query=$this->db->insert('login_page',$data);
// if($query)
// {
//     echo "successfull";
    
// }
// else {
//     echo "no";
// }
// }

public function update_user($data,$id)
{
$this->db->where(["id"=>$id]);
$this->db->update('login_page',$data);

}

public function delete_user($id)
{
$this->db->where(["id"=>$id]);
$this->db->delete('login_page');

}

}