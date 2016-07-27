<?php
class Tasks  {

	private  $id;
	private  $title;
	private  $description;
	private  $price;
	private  $created;
	private  $user_id;
	private  $bids = array();
	
	public function __construct($title, $description, $price,$user_id ){
		$this->title = $title;
		$this->description = $description;
		$this->price = $price;
		$this->created = Date.now();
		$this->user_id = $user_id;
	}
	public function setID($id){
		$this->id = $id;
	}
	public function setBids($bid){
		$this->bids = $bid;
	}
	public function expose() {
		return get_object_vars($this);
	}
}


class Task extends CI_Model {
	private  $id;
	private  $title;
	private  $description;
	private  $price;
	private  $bids = array();
	private  $users_id;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function create($data){
	
		
		$newTask = new Tasks($data['title'], $data['description'], $data['price'],$data['user_id']);
		$this->db->insert('task', $newTask);
		$taskId = $this->db->insert_id();
		return $taskId;
	}
	public function read($id){
		
		$query = $this->db->get_where('task',array('id' => $id));
		foreach ($query->result() as $row)
		{
			$this->id = $row->id;
			$this->description = $row->description;
			$this->title = $row->title;
			$this->price = $row->price;	
			$this->users_id = $row->user_id;
		}
		
		$query = $this->db->get_where('task_application',array('task_id' => $this->id));
		foreach ($query->result() as $row)
		{
			array_push($this->bids, $row->id);
		}
		$tsk = new Tasks($this->title,$this->description,$this->price);
		$tsk->setID($this->id);
		$tsk->setBids($this->bids);
		$newTask = json_encode($tsk->expose());
		return $newTask;
		
	}
	public function query(){
		$tasks_list = array();
		$query = $this->db->get('task');
		
		
		foreach ($query->result() as $row)
		{
			$this->id = $row->id;
			$this->description = $row->description;
			$this->title = $row->title;
			$this->price = $row->price;	
			$this->users_id = $row->user_id;
	         
	         $tsk = new Tasks($this->title,$this->description,$this->price);
			 $tsk->setID($this->id);
			 $newTask = json_encode($tsk->expose());
	         array_push($tasks_list, $newTask);             
		}
		
		return $tasks_list;
	}
	public function update($id,$data){
		
	
		$newTask = new Tasks($data['title'], $data['description'], $data['price'],$data['user_id']);
		$newTask->setID($id);
		$this->db->replace('task', $newTask);
		
		return json_encode($data);;
		
		
	}
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
	

}