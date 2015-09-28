<?php

class CamionesTrabajosController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'CamionesTrabajos';

	public function index()	{
		$this->set('trabajos', $this->CamionesTrabajo->find('all', array('order' => array('CamionesTrabajo.fecha' => 'DESC'))));
	}

	public function agregar(){
		$this->layout = false;
		$this->set('camiones',$this->CamionesTrabajo->Camion->find('list', array('fields' => array('Camion.id', 'Camion.info'))));

		$this->set('camiones_tabuladores',$this->CamionesTrabajo->CamionesTabulador->find('list', array('fields' => array('CamionesTabulador.id', 'CamionesTabulador.info'))));
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
	
			$this->CamionesTrabajo->create();

			//Asigna el resultado de la consulta
			$row =$this->CamionesTrabajo->save($this->request->data);
			if($row) {
				$this->Session->setFlash('Trabajo almacenado con éxito!', 'default', array(), 'success');
				return $this->redirect(array('action' => 'index'));					
			}
			else {
				$this->Session->setFlash('Error, no se pudo almacenar el registro!', 'default', array(), 'error');
			}
		}
	}
	public function editar($id = null){
		$this->layout = false;
		if (!$id) {
	        throw new NotFoundException(__('Trabajo invalido'));
	    }

	    $actividad = $this->CamionesTrabajo->findById($id);
	    if (!$actividad) {
	        throw new NotFoundException(__('Trabajo invalido'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		
	        $this->CamionesTrabajo->id = $id;
	    
	        if ($this->CamionesTrabajo->save($this->request->data)) {
	            $this->Session->setFlash('Trabajo actualizado con éxito!', 'default', array(), 'success');
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			   
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	    	
	    	$camiones = $this->CamionesTrabajo->Camion->find('first', array('conditions' => array('Camion.id' => $id)));
	    	
	    	$this->set('camiones',$this->CamionesTrabajo->Camion->find('list', array('fields' => array('Camion.id', 'Camion.info'))));
			//se obtienes los tabuladores de acuerdo al tipo de camiones
			$this->set('camiones_tabuladores',$this->CamionesTrabajo->CamionesTabulador->find('list', array('fields' => array('CamionesTabulador.id', 'CamionesTabulador.info'))));
	        $this->request->data = $actividad;
	    }
	}
	public function eliminar(){
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->CamionesTrabajo->delete($id)) {
	        $this->Session->setFlash('El Trabajo fue eliminado con éxito!', 'default', array(), 'success');
	    }		
		
	}
	
	public function consultarForm() {
		$this->set('camiones',$this->CamionesTrabajo->Camion->find('list', array('fields' => array('Camion.id', 'Camion.info'))));
	}

	public function resumenTrabajos() {
		if ($this->request->is('post')) {
			$this-> set('trabajos', $this->CamionesTrabajo->find('all', array('conditions' => array('AND' => array ('CamionesTrabajo.camion_id' => $this->request->data['camion_id'], 'CamionesTrabajo.fecha >=' => $this->request->data['desde'], 'CamionesTrabajo.fecha <=' => $this->request->data['hasta'] )))));        	
			$this->set('desde', $this->request->data['desde']);
			$this->set('hasta', $this->request->data['hasta']);

			$this->set('camiones', $this->CamionesTrabajo->Camion->find('first', array('conditions' => array('Camion.id' => $this->request->data['camion_id']))));
	    }
	}
	public function trabajo($desde, $hasta){
		# code...
		Configure::write('debug',2);
		$this->loadModel('CamionesTrabajo');
		$this->loadModel('Camion');
		$trabajo = new CamionesTrabajo();
		$camion = new Camion;
		
		$this->set('desde', $desde);
		$this->set('hasta', $hasta);
		
		
		$this->set('trabajos', $trabajo->find('all', array('conditions' => array('AND' => array('CamionesTrabajo.fecha >=' => $desde, 'CamionesTrabajo.fecha <=' => $hasta)) ,'order' => 'CamionesTrabajo.id')));
		
		$this->render();

	}
	public function reporte(){
		# code...
		Configure::write('debug',2);
		//leyendo los Modelos
		$this->loadModel('CamionesTrabajo');
		$this->loadModel('Camion');
		//Creando los Objetos
		$trabajo = new CamionesTrabajo();
		$camion = new Camion();
		//Realizando las Consultas
		$this->set('trabajos', $this->CamionesTrabajo->find('all', array('order'=>array('CamionesTrabajo.fecha'=>'DESC'))));

	}
}
?>