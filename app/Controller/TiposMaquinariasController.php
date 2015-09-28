<?php

class TiposMaquinariasController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'TiposMaquinarias';

	public function index()	{
		$this->loadModel("Tabulador");
		//$this->set('tiposmaquinarias', $this->TiposMaquinaria->find('all', array('order' => 'nombre')));
		//$this->set('maquinarias', $this->Maquinaria->find('all', array('order' => 'nombre')));
		$this->set('tiposmaquinarias', $this->TiposMaquinaria->find('all'));
	}

	public function agregar(){
		$this->layout = false;
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
				//consulta existencia del registro
				$reg = $this->TiposMaquinaria->find('first', array('conditions' => array('nombre' => $this->request->data['TiposMaquinaria']['nombre'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Tipo de Maquinaria existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->TiposMaquinaria->create();
		
					//Asigna el resultado de la consulta
					$row =$this->TiposMaquinaria->save($this->request->data);
					if($row) {
						$this->Session->setFlash('Tipo  de Maquinaria almacenada con éxito!', 'default', array(), 'success');
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
	        throw new NotFoundException(__('Tipo de Maquinaria invalidad'));
	    }

	    $tipo_maquinaria = $this->TiposMaquinaria->findById($id);
	    if (!$tipo_maquinaria) {
	        throw new NotFoundException(__('Tipos de Maquinaria invalida'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		//consulta existencia del registro
				$reg = $this->TiposMaquinaria->find('first', array('conditions' => array('nombre' => $this->request->data['TiposMaquinaria']['nombre'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Tipo de Maquinaria existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else {
			        $this->TiposMaquinaria->id = $id;
			    
			        if ($this->TiposMaquinaria->save($this->request->data)) {
			            $this->Session->setFlash('Tipo de Maquinaria actualizada con éxito!', 'default', array(), 'success');
			            return $this->redirect(array('action' => 'index'));
			        }
			        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			    }//fin else
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	        $this->request->data = $tipo_maquinaria;
	    }
	}
	public function eliminar(){
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->TiposMaquinaria->delete($id)) {
	        $this->Session->setFlash('El Tipo de Maquinaria fue eliminada con éxito!', 'default', array(), 'success');
	    }		
		
	}
	
}
?>