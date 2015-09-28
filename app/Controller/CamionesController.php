<?php

class CamionesController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'Camiones';

	public function index()	{
		$this->set('camiones', $this->Camion->find('all', array('order' => 'placa')));
	}

	public function agregar(){
		$this->layout = false;
		
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
				//consulta existencia del registro
				$reg = $this->Camion->find('first', array('conditions' => array('placa' => $this->request->data['Camion']['placa'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Camión existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->Camion->create();
	
					//Asigna el resultado de la consulta
					$row =$this->Camion->save($this->request->data);
					if($row) {
						$this->Session->setFlash('Camión almacenado con éxito!', 'default', array(), 'success');
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
	        throw new NotFoundException(__('Camion invalidad'));
	    }

	    $camion = $this->Camion->findById($id);
	    if (!$camion) {
	        throw new NotFoundException(__('Camion invalida'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		//consulta existencia del registro
				$reg = $this->Camion->find('first', array('conditions' => array(
					'placa' => $this->request->data['Camion']['placa'],
					'marca' => $this->request->data['Camion']['marca'], 
					'modelo' => $this->request->data['Camion']['modelo'], 
					'anio' => $this->request->data['Camion']['anio'], 
					'mts' => $this->request->data['Camion']['mts'], 
					'chofer' => $this->request->data['Camion']['chofer'], 
					'cedu_chofer' => $this->request->data['Camion']['cedu_chofer'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Camión existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else {
			        $this->Camion->id = $id;
		
			        if ($this->Camion->save($this->request->data)) {
			            $this->Session->setFlash('Camión actualizado con éxito!', 'default', array(), 'success');
			            return $this->redirect(array('action' => 'index'));
			        }
			        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			    }//fin else
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	    	
	        $this->request->data = $camion;
	    }
	}
	public function eliminar(){
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->Camion->delete($id)) {
	        $this->Session->setFlash('Camión fue eliminado con éxito!', 'default', array(), 'success');
	    }		
		
	}
	public function listaCamiones(){
		$this->layout = false;
		$this->loadModel('Camion');
		$camion = new Camion();
		$this->set('camiones', $camion->find('all', array('order' => 'Camion.placa', 'recursive' => 1)));
		
	}
	
	public function verTrabajos($id=null) {
		$this->layout = false;
		$this->set('trabajos', $this->Camion->find('first', array('conditions' => array('Camion.id' => $id), 'recursive' => 2)));
		
	}

	public function pdfTrabajo($id=null) {
		configure::write('debug',2);
		$this->set('trabajos', $this->Camion->find('first', array('conditions' => array('Camion.id' => $id), 'recursive' => 2)));
		
	}

	
}
?>