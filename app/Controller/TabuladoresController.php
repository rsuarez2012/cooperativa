<?php

class TabuladoresController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'Tabuladores';

	public function index()	{
		$this->loadModel("Tabulador");
		$this->set('tabuladores', $this->Tabulador->find('all', array('order' => 'tipos_maquinaria_id')));
		
	}

	public function agregar(){
		$this->loadModel("Tabulador");
		$this->loadModel("TiposMaquinaria");
		$this->set('maquinarias',$this->Tabulador->TiposMaquinaria->find('list', array('fields' => array('TiposMaquinaria.id', 'TiposMaquinaria.nombre'))));
		$this->layout = false;
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
				//consulta existencia del registro
				$reg = $this->Tabulador->find('first', array('conditions' => array(
					'tipo_maquinaria_id' => $this->request->data['Tabulador']['maquinaria'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Tabulador de la Maquinaria Ya existe!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->Tabulador->create();
		
					//Asigna el resultado de la consulta
					$row =$this->Tabulador->save($this->request->data);
					if($row) {
						$this->Session->setFlash('Tabulador de Maquinaria almacenado con éxito!', 'default', array(), 'success');
						return $this->redirect(array('action' => 'index'));					
					}
					else {
						$this->Session->setFlash('Error, no se pudo almacenar el registro!', 'default', array(), 'error');
					}
				} //fin else
		}
	}

	public function editar($id = null){
		$this->loadModel("Tabulador");
		$this->loadModel("TiposMaquinaria");
		//$this->set('maquinarias',$this->Tabulador->TiposMaquinaria->find('list', array('fields' => array('TiposMaquinaria.id', 'TiposMaquinaria.nombre'))));
		$this->layout = false;
		if (!$id) {
	        throw new NotFoundException(__('Maquinaria invalidad'));
	    }

	    $tabulador = $this->Tabulador->findById($id);
	    if (!$tabulador) {
	        throw new NotFoundException(__('Tabulador invalida'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		//consulta existencia del registro
				$reg = $this->Tabulador->find('first', array(
					'conditions' => array(//'nombre' => $this->request->data['Tabulador']['nombre'],
						'tipos_maquinaria_id' => $this->request->data['Tabulador']['tipos_maquinaria_id'], 
						'unidad' => $this->request->data['Tabulador']['unidad'], 
						'costo' => $this->request->data['Tabulador']['costo'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Tabulador de Maquinaria existe!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else {
			        $this->Tabulador->id = $id;
		
			        if ($this->Tabulador->save($this->request->data)) {
			            $this->Session->setFlash('Tabulador de Maquinaria actualizada con éxito!', 'default', array(), 'success');
			            return $this->redirect(array('action' => 'index'));
			        }
			        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			    }//fin else
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	    	
	    	$this->set('tipos_maquinarias',$this->Tabulador->TiposMaquinaria->find('list', array('fields' => array('TiposMaquinaria.id', 'TiposMaquinaria.nombre'))));
	        $this->request->data = $tabulador;
	    }
	}



	public function eliminar(){
		$this->loadModel("Tabulador");
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->Tabulador->delete($id)) {
	        $this->Session->setFlash('Tabulador de Maquinaria fue eliminada con éxito!', 'default', array(), 'success');
	    }		
		
	}
	
	public function costo($id = null) {
		$this->layout = false;
		
		$tab = $this->Tabulador->find('first', array('conditions' => array('Tabulador.id' => $id), 'recursive' => 0));
		$this->set('tabulador', $tab);
	}
}
?>