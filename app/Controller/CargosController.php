<?php

class CargosController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'Cargos';

	public function index()	{
		$this->set('cargos', $this->Cargo->find('all', array('order' => 'nombre_cargo')));
	}

	public function agregar(){
		$this->layout = false;
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
				//consulta existencia del registro
				$reg = $this->Cargo->find('first', array('conditions' => array('nombre_cargo' => $this->request->data['Cargo']['nombre_cargo'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Cargo ya existe!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->Cargo->create();
	
					//Asigna el resultado de la consulta
					$row =$this->Cargo->save($this->request->data);
					if($row) {
						$this->Session->setFlash('Cargo Creado con éxito!', 'default', array(), 'success');
						return $this->redirect(array('action' => 'index'));					
					}
					else {
						$this->Session->setFlash('Error, no se pudo almacenar el registro!', 'default', array(), 'error');
					}
				} //fin else
		}
	}
	public function editar($id = null){
		$this->layout = false;
		if (!$id) {
	        throw new NotFoundException(__('Cargo invalidad'));
	    }

	    $cargo = $this->Cargo->findById($id);
	    if (!$cargo) {
	        throw new NotFoundException(__('Cargo invalido'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		//consulta existencia del registro
				$reg = $this->Cargo->find('first', array('conditions' => array(
					'nombre_cargo' => $this->request->data['Cargo']['nombre_cargo'],
					'mensualidad' => $this->request->data['Cargo']['mensualidad'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Cargo existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else {
			        $this->Cargo->id = $id;
		
			        if ($this->Cargo->save($this->request->data)) {
			            $this->Session->setFlash('Cargo actualizado con éxito!', 'default', array(), 'success');
			            return $this->redirect(array('action' => 'index'));
			        }
			        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			    }//fin else
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	    	
	        $this->request->data = $cargo;
	    }
	}
	public function eliminar(){
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->Cargo->delete($id)) {
	        $this->Session->setFlash('Cargo eliminado con éxito!', 'default', array(), 'success');
	    }		
		
	}
	
}
?>