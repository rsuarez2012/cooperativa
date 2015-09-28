<?php

class CamionesTabuladoresController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'CamionesTabuladores';

	public function index()	{
		$this->loadModel("CamionesTabulador");
		$this->set('tabuladorcamiones', $this->CamionesTabulador->find('all', array('order' => 'unidad')));
		
	}

	public function agregar(){
		$this->loadModel("CamionesTabulador");
		$this->layout = false;
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
				//consulta existencia del registro
				$reg = $this->CamionesTabulador->find('first', array('conditions' => array('unidad' => $this->request->data['CamionesTabulador']['km'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Km del Tabulador Ya existe!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->CamionesTabulador->create();
		
					//Asigna el resultado de la consulta
					$row =$this->CamionesTabulador->save($this->request->data);
					if($row) {
						$this->Session->setFlash('Km y Costo del Tabulador almacenada con éxito!', 'default', array(), 'success');
						return $this->redirect(array('action' => 'index'));					
					}
					else {
						$this->Session->setFlash('Error, no se pudo almacenar el registro!', 'default', array(), 'error');
					}
				} //fin else
		}
	}
	public function editar($id = null){
		$this->loadModel("CamionesTabulador");
		$this->layout = false;
		if (!$id) {
	        throw new NotFoundException(__('Tabulador invalida'));
	    }

	    $tabulador_camion = $this->CamionesTabulador->findById($id);
	    if (!$tabulador_camion) {
	        throw new NotFoundException(__('Tabulador invalida'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		//consulta existencia del registro
				$reg = $this->CamionesTabulador->find('first', array('conditions' => array(
					'km' => $this->request->data['CamionesTabulador']['km'],
					'costo' => $this->request->data['CamionesTabulador']['costo'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Km y Costo existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else {
			        $this->CamionesTabulador->id = $id;
			    
			        if ($this->CamionesTabulador->save($this->request->data)) {
			            $this->Session->setFlash('Km y Costo actualizada con éxito!', 'default', array(), 'success');
			            return $this->redirect(array('action' => 'index'));
			        }
			        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			    }//fin else
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	        $this->request->data = $tabulador_camion;
	    }
	}
	public function eliminar(){
		$this->loadModel("CamionesTabulador");
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->CamionesTabulador->delete($id)) {
	        $this->Session->setFlash('Km y Costo fue eliminada con éxito!', 'default', array(), 'success');
	    }		
		
	}

	public function costo($id = null) {
		$this->loadModel("CamionesTabulador");
		$this->layout = false;
		
		$tab = $this->CamionesTabulador->find('first', array('conditions' => array('CamionesTabulador.id' => $id), 'recursive' => 0));
		$this->set('tabulador', $tab);
	}

	public function tabulador(){
		# code...
		$this->layout = false;
		$this->loadModel('CamionesTabulador');
		$tabulador = new CamionesTabulador();
		$this->set('tabuladores', $tabulador->find('all', array('order' => 'CamionesTabulador.costo', 'recursive' => 1)));
	}
	
}
?>