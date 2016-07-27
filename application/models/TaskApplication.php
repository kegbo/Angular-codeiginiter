<?php
class Bid{
	private $id;
	private $user_id;
	private $task_id;
	private $accepted;
	
	public function __construct($user_id, $task_id, $accepted ){
		
		$this->user_id = $user_id;
		$this->task_id = $task_id;
		$this->created = Date.now();
		$this->accepted = $accepted;
	}
	
	public function expose() {
		return get_object_vars($this);
	}
}

class TaskApplication extends CI_Model {
	private $id;
	private $user_id;
	private $task_id;
	private $accepted;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function create($data){
	
		
		$newApplication = new Bid($data['user_id'], $data['task_id'],$data['accepted']);
		$this->db->insert('task_application', $newApplication);
		$bidId = $this->db->insert_id();
		return $bidId;
	}
	public function read($id){
		
		$query = $this->db->get_where('task_application',array('id' => $id));
		foreach ($query->result() as $row)
		{
			$this->id = $row->id;
			$this->task_id = $row->task_id;
			$this->user_id = $row->tasker_id;
			$this->accepted = $row->accepted;	
		
		}
				
		$bid = new Bid($this->task_id,$this->user_id,$this->accepted);
		$bid->setID($this->id);
		$newApplication = json_encode($tsk->expose());
		return $newApplication;
		
	}
	public function query(){
		$bid_list = array();
		$query = $this->db->get('task_application');
		
		
		foreach ($query->result() as $row)
		{
			$this->id = $row->id;
			$this->task_id = $row->task_id;
			$this->user_id = $row->tasker_id;
			$this->accepted = $row->accepted;	
	         
	        $bid = new Bid($this->task_id,$this->user_id,$this->accepted);
			$bid->setID($this->id);
			$newApplication = json_encode($tsk->expose());
	        array_push($bid_list, $newApplication);             
		}
		
		return $bid_list;
	}
	public function update($id,$data){
		
		
		$newApplication = new Bid($tsk['user_id'], $tsk['task_id'],$tsk['accepted']);
		$newApplication->setID($id);
		$this->db->replace('task_application', $newApplication);
		
		return json_encode($data);
		
		
	}
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('task_application');
	}
	

}