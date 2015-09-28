<?php

class MaquinariasTrabajosController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'MaquinariasTrabajos';

	public function index()	{
		$this->set('trabajos', $this->MaquinariasTrabajo->find('all', array('order' => array('MaquinariasTrabajo.fecha'=>'DESC'))));
	}

	public function agregar(){
		$this->layout = false;
		$this->set('maquinarias',$this->MaquinariasTrabajo->Maquinaria->find('list', array('fields' => array('Maquinaria.id', 'Maquinaria.info'))));

		//Verifica si es por metodo post
		if ($this->request->is('post')) {
	
			$this->MaquinariasTrabajo->create();

			//Asigna el resultado de la consulta
			$row =$this->MaquinariasTrabajo->save($this->request->data);
			if($row) {
				$this->Session->setFlash('Tipo  de Maquinaria almacenada con éxito!', 'default', array(), 'success');
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
	        throw new NotFoundException(__('Actividad invalidad'));
	    }

	    $actividad = $this->MaquinariasTrabajo->findById($id);
	    if (!$actividad) {
	        throw new NotFoundException(__('Actividad invalida'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		
	        $this->MaquinariasTrabajo->id = $id;
	    
	        if ($this->MaquinariasTrabajo->save($this->request->data)) {
	            $this->Session->setFlash('Actividad actualizada con éxito!', 'default', array(), 'success');
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			   
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	    	
	    	$maquinaria = $this->MaquinariasTrabajo->Maquinaria->find('first', array('conditions' => array('Maquinaria.id' => $id)));
	    	
	    	$this->set('maquinarias',$this->MaquinariasTrabajo->Maquinaria->find('list', array('fields' => array('Maquinaria.id', 'Maquinaria.info'))));
			//se obtienes los tabuladores de acuerdo al tipo de maquinaria
			$this->set('tabuladores',$this->MaquinariasTrabajo->Tabulador->find('list', array('conditions' => array('Tabulador.tipos_maquinaria_id' => $maquinaria['TiposMaquinaria']['id']) ,'fields' => array('Tabulador.id', 'Tabulador.info'))));
	        $this->request->data = $actividad;
	    }
	}
	public function eliminar(){
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->MaquinariasTrabajo->delete($id)) {
	        $this->Session->setFlash('El Actividad fue eliminada con éxito!', 'default', array(), 'success');
	    }		
		
	}

	public function consultarForm() {
		$this->set('maquinarias',$this->MaquinariasTrabajo->Maquinaria->find('list', array('fields' => array('Maquinaria.id', 'Maquinaria.info'))));
	}

	public function resumenTrabajos() {
		if ($this->request->is('post')) {
			$this-> set('trabajos', $this->MaquinariasTrabajo->find('all', array('conditions' => array('AND' => array ('MaquinariasTrabajo.maquinaria_id' => $this->request->data['maquinaria_id'], 'MaquinariasTrabajo.fecha >=' => $this->request->data['desde'], 'MaquinariasTrabajo.fecha <=' => $this->request->data['hasta'] )))));        	
			$this->set('desde', $this->request->data['desde']);
			$this->set('hasta', $this->request->data['hasta']);

			$this->set('maquinaria', $this->MaquinariasTrabajo->Maquinaria->find('first', array('conditions' => array('Maquinaria.id' => $this->request->data['maquinaria_id']))));
	    }
	}
	public function pdfTrabajos($desde, $hasta)	{
		# code...
		Configure::write('debug',2);
		$this->loadModel('MaquinariasTrabajo');
		$this->loadModel('Maquinaria');
		$trabajo = new MaquinariasTrabajo();
		$maquinaria = new Maquinaria;
		
		$this->set('desde', $desde);
		$this->set('hasta', $hasta);
		
		
		$this->set('trabajos', $trabajo->find('all', array('conditions' => array('AND' => array('MaquinariasTrabajo.fecha >=' => $desde, 'MaquinariasTrabajo.fecha <=' => $hasta)) ,'order' => 'MaquinariasTrabajo.id')));
		
		$this->render();
	}
	public function reporte(){
		# code...
		Configure::write('debug',2);
		//leyendo los modelos
		$this->loadModel('MaquinariasTrabajo');
		$this->loadModel('Maquinaria');
		//creando Objetos
		$trabajos = New MaquinariasTrabajo();
		$maquinaria = new Maquinaria();
		//haciendo la consulta
		$this->set('trabajos', $this->MaquinariasTrabajo->find('all', array('order' => array('MaquinariasTrabajo.fecha'=>'DESC'))));

	}
}
?>