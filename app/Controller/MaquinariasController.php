<?php

class MaquinariasController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'Maquinarias';

	public function index()	{
		$this->set('maquinarias', $this->Maquinaria->find('all', array('order' => 'serial')));
	}

	public function agregar(){
		$this->layout = false;
		$this->set('tipos_maquinarias',$this->Maquinaria->TiposMaquinaria->find('list', array('fields' => array('TiposMaquinaria.id', 'TiposMaquinaria.nombre'))));
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
				//consulta existencia del registro
				$reg = $this->Maquinaria->find('first', array('conditions' => array('nombre' => $this->request->data['Maquinaria']['serial'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Maquinaria existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->Maquinaria->create();
	
					//Asigna el resultado de la consulta
					$row =$this->Maquinaria->save($this->request->data);
					if($row) {
						$this->Session->setFlash('Maquinaria almacenada con éxito!', 'default', array(), 'success');
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
	        throw new NotFoundException(__('Maquinaria invalidad'));
	    }

	    $maquinaria = $this->Maquinaria->findById($id);
	    if (!$maquinaria) {
	        throw new NotFoundException(__('Maquinaria invalida'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		//consulta existencia del registro
				$reg = $this->Maquinaria->find('first', array(
					'conditions' => array('serial' => $this->request->data['Maquinaria']['serial'],
						'tipo_maquinaria_id' => $this->request->data['Maquinaria']['tipo_maquinaria_id'], 
						'modelo' => $this->request->data['Maquinaria']['modelo'], 
						'marca' => $this->request->data['Maquinaria']['marca'],
						'anio' => $this->request->data['Maquinaria']['anio'],
						'propietario' => $this->request->data['Maquinaria']['propietario'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Maquinaria existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else {
			        $this->Maquinaria->id = $id;
		
			        if ($this->Maquinaria->save($this->request->data)) {
			            $this->Session->setFlash('Maquinaria actualizada con éxito!', 'default', array(), 'success');
			            return $this->redirect(array('action' => 'index'));
			        }
			        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			    }//fin else
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	    	$this->set('tipos_maquinarias',$this->Maquinaria->TiposMaquinaria->find('list', array('fields' => array('TiposMaquinaria.id', 'TiposMaquinaria.nombre'))));
	        $this->request->data = $maquinaria;
	    }
	}
	public function eliminar(){
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->Maquinaria->delete($id)) {
	        $this->Session->setFlash('Maquinaria fue eliminada con éxito!', 'default', array(), 'success');
	    }		
		
	}
	
	public function tabulador($id=null) {
			$this->layout = false;
			
			$tab = $this->Maquinaria->find('first', array('conditions' => array('Maquinaria.id' => $id), 'recursive' => 2));
			$tab = Set::extract('/TiposMaquinaria/.', $tab);
			$this->set('maquinaria', $tab);
	}
	public function listaMaquinarias(){
		# code...
		$this->layout = false;
		$this->loadModel('Maquinaria');
		$this->loadModel('TiposMaquinaria');
		$maquinaria = new Maquinaria();
		$this->set('maquinarias', $maquinaria->find('all', array('order' => 'Maquinaria.marca', 'recursive' => 2)));

	}

	public function verTrabajos($id=null) {
		$this->layout = false;
		$this->set('trabajos', $this->Maquinaria->find('first', array('conditions' => array('Maquinaria.id' => $id), 'recursive' => 2)));
	}

	public function pdfTrabajo($id=null) {
		configure::write('debug',2);
		$this->set('trabajos', $this->Maquinaria->find('first', array('conditions' => array('Maquinaria.id' => $id), 'recursive' => 2)));
		
	}
}
?>