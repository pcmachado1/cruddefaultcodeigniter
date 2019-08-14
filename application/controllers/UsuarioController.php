<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuariocontroller extends CI_Controller {

	
	function __construct() 
	{
	 parent::__construct();
	 $this->load->helper('form');
	 $this->load->helper('url');
	 $this->load->helper('security');
	 $this->load->model('UsuariosModel','usuariosmodel');
	 $this->load->database();
	 }

	public function index()
	{
		redirect('usuariocontroller/teste');
		
	}

	public function teste(){

		$this->load->model('UsuariosModel','usuariosmodel');

		$dados['usuarios'] = $this->usuariosmodel->getUsuarios();

		$this->load->view('usuarios_view',$dados);
		//redirect('index.php/usuariocontroller/index');
 		//$this->load->view('teste', $dados);
 	}

 	public function editarusuario(){

 		// Load support assets
		 $this->load->library('form_validation');
		 $this->form_validation->set_error_delimiters(
		 '', '<br />');
		 // Set validation rules
		 $this->form_validation->set_rules('first_name',
		 'First Name',
		 'required|min_length[1]|max_length[125]');
		 $this->form_validation->set_rules('last_name',
		 'Last Name',
		 'required|min_length[1]|max_length[125]');
		 $this->form_validation->set_rules('email', 'Email',
		 'required|min_length[1]|
		 max_length[255]|valid_email');


 		if ($this->input->post()) {
		 $id = $this->input->post('id');
		 } else {
		 $id = $this->uri->segment(3);
		 }


		 // Begin validation
 		if ($this->form_validation->run() == FALSE) {

 		$query = $this->usuariosmodel->getUserDetails($id);

 		foreach ($query->result() as $row){

 			 $first_name = $row->nome;
 			 $last_name = $row->sobrenome;
 			 $email = $row->email;
 		}

 		$data['nome'] = array('name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', $first_name), 'maxlength' => '100', 'size' => '35', 'class' => 'form-control');
		$data['sobrenome'] = array('name' =>'last_name', 'id' => 'last_name','value' => set_value('last_name',$last_name), 'maxlength' => '100','size' => '35', 'class' => 'form-control');
		$data['email'] = array('name' => 'email','id' => 'email', 'value' => set_value('email', $email), 'maxlength' => '100', 'size' => '35' , 'class' => 'form-control');
		$data['id'] = array('id' => set_value('id', $id));


			 
		$this->load->view('edit_user', $data);

		} else { // Validation passed, now escape the data
		 $data = array('nome' =>$this->input->post('first_name'),'sobrenome' =>$this->input->post('last_name'),'email' => $this->input->post('email'),);


 		if ($this->usuariosmodel->editUsuarios($id, $data)) {
 			redirect('index.php/usuariocontroller/index');
 			}
 		}

 	}
 	public function novousuario(){

 		// Load support assets
		 $this->load->library('form_validation');
		 $this->form_validation->set_error_delimiters(
		 '', '<br />');
		 // Set validation rules
		 $this->form_validation->set_rules('first_name',
		 'First Name',
		 'required|min_length[1]|max_length[125]');
		 $this->form_validation->set_rules('last_name',
		 'Last Name',
		 'required|min_length[1]|max_length[125]');
		 $this->form_validation->set_rules('email', 'Email',
		 'required|min_length[1]|
		 max_length[255]|valid_email');

		  // Begin validation
 		if ($this->form_validation->run() == FALSE) {

 			$data['nome'] = array('name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', ''), 'maxlength' => '100', 'size' => '35', 'class' => 'form-control');
			$data['sobrenome'] = array('name' =>'last_name', 'id' => 'last_name','value' => set_value('last_name',''), 'maxlength' => '100','size' => '35', 'class' => 'form-control');
			$data['email'] = array('name' => 'email','id' => 'email', 'value' => set_value('email', ''), 'maxlength' => '100', 'size' => '35' , 'class' => 'form-control');

			$this->load->view('new_user', $data);

		} else { // Validation passed, now escape the data
		 $data = array('nome' =>$this->input->post('first_name'),'sobrenome' =>$this->input->post('last_name'),'email' => $this->input->post('email'),);


 		if ($this->usuariosmodel->novoUsuario($data)) {
 			redirect('index.php/usuariocontroller/index');
 			}
 		}	
 	}
 	public function deletarusuario(){

 		if ($this->input->post()) {
		 $id = $this->input->post('id');
		 } else {
		 $id = $this->uri->segment(3);
		 }

		 if ($this->usuariosmodel->deletarUsuario($id)) {
 			redirect('index.php/usuariocontroller/index');
 			}

 	}
 	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */