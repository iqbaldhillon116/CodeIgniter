<?php 


class Users extends CI_Controller {


	public function show($user_id){


		// $this->load->model('user_model');

		$data['results'] = $this->user_model->get_users($user_id, 'suave');


	 // $data['results'] = $this->user_model->get_users(2); 

		$this->load->view('user_view',$data);

		


		// foreach ($result as $object) {
		
		// 	echo $object->username . "<br>";
			
		// }


	}





}











 ?>