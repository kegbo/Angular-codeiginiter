<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {
	public function index(){
		$this->main();
	}
	public function main(){
		$this->load->view('index');
	}
	public function login(){
		//check for authentication and validation
	}
	public function signup(){
		//check for validation and authentication
		//	If check passed call model and create new object
	}
	public function howitworks(){
		// you can plug to different data fieldds
		//not really needed
	}
}