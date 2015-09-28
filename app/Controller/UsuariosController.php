<?php

class UsuariosController extends AppController {
	public $helpers = array('Html', 'Form', 'Ajax');
	public $components = array('Session');
	public $name = 'Usuarios';

	
	function beforeFilter() {
		$this->__validateLoginStatus();
		
	}

	function login() {
		$this->layout = 'sesion';
		
		if(!empty($this->request->data)) {
			
			if(($usuario = $this->Usuario->validateLogin($this->request->data)) == true) {				
				$this->Session->write('usuario', $usuario);
				$this->redirect(array('controller' => 'Camiones'));
				exit();
			}
			else {
				$this->Session->setFlash('Usuario invalido', 'default', array(), 'error');
				$this->redirect(array('action' => 'login'));				
			}
		}
	}

	function inicio() {
		$this->layout = 'sesion';
	}
	 
	function logout()
	{
		$this->Session->delete('usuario');
		$this->Session->destroy();
		$this->redirect(array('action' => 'login'));
	}
	 
	function __validateLoginStatus()
	{
		if($this->action != 'login' && $this->action != 'logout')
		{
			if($this->Session->check('usuario') == false)
			{
				$this->redirect(array('action' => 'login'));
				
			}
		}
	}
	public function index() {
		$this->set('usuarios', $this->Usuario->find('all', array('order' => 'apellidos')));

	}

	public function agregar(){
		$this->layout = false;
		
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
			$this->Usuario->create();
			//Asigna el resultado de la consulta
			$salt = '$cooperativa$/';
	        $this->request->data['Usuario']['clave'] = sha1(md5($salt.$this->request->data['Usuario']['clave']));
	     
			$row =$this->Usuario->save($this->request->data);
			if($row) {
				$this->Session->setFlash('Usuario almacenado con éxito!', 'default', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			}
			else {
				$this->Session->setFlash(__('No se pudo almacenar registro'));
			}				
		}
	}
	public function editar($id = null){
		$this->layout = false;
		
		if (!$id) {
	        throw new NotFoundException(__('Usuario invalido'));
	    }

	    $Usuario = $this->Usuario->findById($id);
	    if (!$Usuario) {
	        throw new NotFoundException(__('Usuario invalido'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	        $this->Usuario->id = $id;
	        $salt = '$cooperativa$/';
	        $this->request->data['Usuario']['clave'] = sha1(md5($salt.$this->request->data['Usuario']['clave']));

	        if ($this->Usuario->save($this->request->data)) {
	        	
	            $this->Session->setFlash('Usuario actualizado con éxito!', 'default', array(), 'success');
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('No se pudo actualizada.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $Usuario;
	    }
	}
	public function eliminar(){
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->Usuario->delete($id)) {
	        $this->Session->setFlash('El usuario fue eliminado con éxito!', 'default', array(), 'success');
	    }		
		
	}

}
?>
