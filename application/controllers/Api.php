<?php
//require 'application/libraries/REST_Controller.php';
require(APPPATH.'libraries/REST_Controller.php');
defined('BASEPATH') OR exit('No direct script access allowed');



class Api extends REST_Controller {
	public function users_get($id=''){
		
		if($id){
			
			$data = $this->users->read($id);
			
			if($data){
				$this->response($data,200);
			}else{
				$this->response(array('error' => 'User does not exist'),
						404);
			}
			
		}
		else {
			$data = $this->users->query();
		
			if($data){
				$this->response($data,200);
				
			}else{
				$this->response(array('error' => 'No Users found'),
						200);
			}
		}
			
	}
 	public function users_post(){
 		
 		$data = $this->_post_args;
		try {
			
			$id = $this->users->create($data);
		} catch (Exception $e) {
			// Here the model can throw exceptions like the following:
			// * Invalid input data:
                        //   throw new Exception('Invalid request data', 400);
			// * Conflict when attempting to create, like a resubmit:
                        //   throw new Exception('Widget already exists', 409)
			$this->response(array('error' => $e->getMessage()),
                                        $e->getCode());
		}
		if ($id) {
			$user = $this->users->read($id);
			$this->response(user, 201); // 201 is the HTTP response code
		} else
			$this->response(array('error' => 'User could not be created'),
                                        404);
 	}
	public function users_put($id){
		$data = $this->_put_args;
		try {
			$user = $this->users->update($id,$data);
			
			//throw new Exception('Invalid request data', 400); // test code
		} catch (Exception $e) {
			// Here the model can throw exceptions like the following:
			// * For invalid input data: new Exception('Invalid request data', 400)
			// * For a conflict when attempting to create, like a resubmit: new Exception('Widget already exists', 409)
			$this->response(array('error' => $e->getMessage()), $e->getCode());
		}
		if ($user) {
			$this->response($user, 200); // 200 being the HTTP response code
		} else
			$this->response(array('error' => 'User could not be found'), 404);
	}
	public function users_delete($id){
	
		try {
				$user = $this->users->read($id);
				
			//throw new Exception('Invalid request data', 400); // test code
		} catch (Exception $e) {
			// Here the model can throw exceptions like the following:
			// * For invalid input data: new Exception('Invalid request data', 400)
			// * For a conflict when attempting to create, like a resubmit: new Exception('Widget already exists', 409)
			$this->response(array('error' =>
					'Invalid User'), 400);
		}
		
		
		if($user) {
			try {
				$this->users->delete($id);
			} catch (Exception $e) {
				// Here the model can throw exceptions like the following:
				// * Client is not authorized: new Exception('Forbidden', 403)
				$this->response(array('error' => $e->getMessage()),
						$e->getCode());
			}
			$this->response("success", 200); // 200 being the HTTP response code
		} else
			$this->response(array('error' => 'Users could not be found'), 404);
	}
	public function task_get($id=''){
		if($id){
			
			$data = $this->task->read($id);
			
			if($data){
				$this->response($data,200);
			}else{
				$this->response(array('error' => 'Task does not exist'),
						404);
			}
			
		}
		else {
			$data = $this->task->query();
		
			if($data){
				$this->response($data,200);
			}else{
				$this->response(array('error' => 'No Task found'),
						200);
			}
		}
	}
	public function task_post(){
		$data = $this->_post_args;
		try {
				
			$id = $this->task->create($data);
		} catch (Exception $e) {
			// Here the model can throw exceptions like the following:
			// * Invalid input data:
			//   throw new Exception('Invalid request data', 400);
			// * Conflict when attempting to create, like a resubmit:
			//   throw new Exception('Widget already exists', 409)
			$this->response(array('error' => $e->getMessage()),
					$e->getCode());
		}
		if ($id) {
			$tasks = $this->task->read($id);
			$this->response(tasks, 201); // 201 is the HTTP response code
		} else
			$this->response(array('error' => 'Task could not be created'),
					404);
	
	}
	
	public function task_put($id){
		$data = $this->_put_args;
		try {
			$task = $this->tasks->update($id,$data);
			
			//throw new Exception('Invalid request data', 400); // test code
		} catch (Exception $e) {
			// Here the model can throw exceptions like the following:
			// * For invalid input data: new Exception('Invalid request data', 400)
			// * For a conflict when attempting to create, like a resubmit: new Exception('Widget already exists', 409)
			$this->response(array('error' => $e->getMessage()), $e->getCode());
		}
		if ($task) {
			$this->response($task, 200); // 200 being the HTTP response code
		} else
			$this->response(array('error' => 'Task could not be found'), 404);
	}
	public function task_delete($id){
	
		try {
				$task = $this->task->read($id);
				
			//throw new Exception('Invalid request data', 400); // test code
		} catch (Exception $e) {
			// Here the model can throw exceptions like the following:
			// * For invalid input data: new Exception('Invalid request data', 400)
			// * For a conflict when attempting to create, like a resubmit: new Exception('Widget already exists', 409)
			$this->response(array('error' =>
					'Invalid Task'), 400);
		}
		
		
		if($task) {
			try {
				$this->task->delete($id);
			} catch (Exception $e) {
				// Here the model can throw exceptions like the following:
				// * Client is not authorized: new Exception('Forbidden', 403)
				$this->response(array('error' => $e->getMessage()),
						$e->getCode());
			}
			$this->response("success", 200); // 200 being the HTTP response code
		} else
			$this->response(array('error' => 'Task could not be found'), 404);
	}
	
	public function taskapplication_post(){
			
		$data = $this->_post_args;
		try {
				
			$id = $this->taskapplication->create($data);
		} catch (Exception $e) {
			// Here the model can throw exceptions like the following:
			// * Invalid input data:
			//   throw new Exception('Invalid request data', 400);
			// * Conflict when attempting to create, like a resubmit:
			//   throw new Exception('Widget already exists', 409)
			$this->response(array('error' => $e->getMessage()),
					$e->getCode());
		}
		if ($id) {
			$user = $this->taskapplication->read($id);
			$this->response(user, 201); // 201 is the HTTP response code
		} else
			$this->response(array('error' => 'Application could not be submitted'),
					404);
	}
	
	
}