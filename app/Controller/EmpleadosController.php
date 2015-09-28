<?php

class EmpleadosController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'Empleados';

	public function index()	{
		$this->set('empleados', $this->Empleado->find('all', array('order' => 'apellidos')));
	}

	public function agregar(){
		$this->layout = false;
		$this->set('cargo',$this->Empleado->Cargo->find('list', array('fields' => array('Cargo.id', 'Cargo.nombre_cargo'))));
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
				//consulta existencia del registro
				$reg = $this->Empleado->find('first', array('conditions' => array('cedula' => $this->request->data['Empleado']['cedula'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Empleado existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->Empleado->create();
	
					//Asigna el resultado de la consulta
					$row =$this->Empleado->save($this->request->data);
					if($row) {
						$this->Session->setFlash('Empleado almacenado con éxito!', 'default', array(), 'success');
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
	        throw new NotFoundException(__('Empleado invalidad'));
	    }

	    $empleado = $this->Empleado->findById($id);
	    if (!$empleado) {
	        throw new NotFoundException(__('Empleado invalida'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		//consulta existencia del registro
				$reg = $this->Empleado->find('first', array('conditions' => array(
					'cedula' => $this->request->data['Empleado']['cedula'],
					'nombres' => $this->request->data['Empleado']['nombres'], 
					'apellidos' => $this->request->data['Empleado']['apellidos'], 
					'direccion' => $this->request->data['Empleado']['direccion'],
					'telefono' => $this->request->data['Empleado']['telefono'],
					'correo' => $this->request->data['Empleado']['correo'],
					'fecha_ingreso' => $this->request['Empleado']['fecha_ingreso'],
					'cargo_id'=> $this->request->data['Empleado']['cargo_id'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Empleado existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else {
			        $this->Empleado->id = $id;
		
			        if ($this->Empleado->save($this->request->data)) {
			            $this->Session->setFlash('Empleado actualizado con éxito!', 'default', array(), 'success');
			            return $this->redirect(array('action' => 'index'));
			        }
			        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			    }//fin else
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	    	$this->set('cargo',$this->Empleado->Cargo->find('list', array('fields' => array('Cargo.id', 'Cargo.nombre_cargo'))));
	        $this->request->data = $empleado;
	    }
	}
	public function eliminar(){
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->Empleado->delete($id)) {
	        $this->Session->setFlash('Empleado fue eliminado con éxito!', 'default', array(), 'success');
	    }		
		
	}
	public function listaEmpleados(){
		$this->layout = false;
		$this->loadModel('Cargo');
		$this->loadModel('Empleado');
		$empleado = new Empleado();
			$this->set('empleados', $empleado->find('all', array('order' => 'Empleado.cedula', 'recursive' => 2)));
		
	}
	
	public function generarNomina() {
		
	}
}
?>