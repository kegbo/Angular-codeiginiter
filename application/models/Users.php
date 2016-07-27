<?php
class User {
	private  $id;
	private  $firstname;
	private  $lastname;
	private  $email;
	private  $password;
	/* private  $mobile_phone;
	private  $postcode;
	private  $house_number;
	private  $street_name;
	private  $city;
	private  $region;
	private  $country; */
	private  $created;
	private  $task = array();
	private  $bids = array();

	
	public function __construct($first, $last, $email, $password ){
	
		$this->firstname = $first;
		$this->lastname = $last;
		$this->email = $email;
		$this->password = $password;
		$this->created = Date.now();
	}
	public function setID($id){
		$this->id = $id;
	}
	public function setTask($task){
		$this->task = $task;
	}
	public function setBids($bid){
		$this->bids = $bid;
	}
	public function expose() {
		return get_object_vars($this);
	}
	
}

class Users extends CI_Model{	
	private  $id;
	private  $firstname;
	private  $lastname;
	private  $email;
	private  $password;
	private  $created;
	private  $task = array();
	private  $bids = array();
	
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function create($data){
	
		
		$newUser = new User($data['firstname'], $data['lastname'], $data['email'], $data['password']);
		$this->db->insert('users', $newUser);		
		$userID = $this->db->insert_id();
		return $userID;
	}
	public function read($id){
		
		$query = $this->db->get_where('users',array('id' => $id));	
		foreach ($query->result() as $row)
		{
			$this->id = $row->id;
			$this->firstname = $row->firstname;
			$this->lastname = $row->lastname;
			$this->email = $row->email;
			$this->password = $row->password;
			$this->created = $row->created;	
		}
		$query = $this->db->get_where('task',array('customer_ID' => $this->id));
		foreach ($query->result() as $row)
		{
			array_push($this->task, $row->id);
		}
		$query = $this->db->get_where('task_application',array('tasker_id' => $this->id));
		foreach ($query->result() as $row)
		{
			array_push($this->bids, $row->id);
		}
		$user = new User($this->firstname,$this->lastname,$this->email,$this->password,$this->created);
		$user->setID($this->id);
		$user->setTask($this->task);
		$user->setBids($this->bids);
		$newUser = json_encode($user->expose());
		return $newUser;
		
	}
	public function query(){
		$users_list = array();
		$query = $this->db->get('users');
	
		
		
		foreach ($query->result() as $row)
		{
			$this->id = $row->id;
	        $this->firstname = $row->firstname;
			$this->lastname = $row->lastname;
			$this->email = $row->email;
			$this->password = $row->password;
			$this->created = $row->created;
	        
			$query2 = $this->db->get_where('task',array('customer_ID' => $row->id));
			foreach ($queryTask->result() as $rowTask)
			{
				array_push($this->task, $rowTask->id);
			}
	         $user = new User($this->firstname,$this->lastname,$this->email,$this->password,$this->created);
	         $user->setID($this->id);
	         $user->setTask($this->task);
	         $newUser = json_encode($user->expose());
	         array_push($users_list, $newUser);                
		}
			
		return $users_list;
	}
	public function update($id,$data){
		
		$newUser = new User($user['firstname'], $user['lastname'], $user['email'], $user['password']);
		$newUser->setID($id);
		$this->db->replace('users', $newUser);

		return json_encode($data);	
	}
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}

}