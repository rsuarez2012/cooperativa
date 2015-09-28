<?php

class NominasController extends AppController{
	public $components = array('Session');
	public $helpers = array('Html', 'Form', 'Ajax');
		
	public $name = 'Nominas';

	public function index()	{
		$this->set('nominas', $this->Nomina->find('all', array('order' => 'fecha')));
	}

	public function agregar(){
		$this->layout = false;
		
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
				//consulta existencia del registro
				$reg = $this->Nomina->find('first', array('conditions' => array('placa' => $this->request->data['Nomina']['placa'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Nomina existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else{
					$this->Nomina->create();
	
					//Asigna el resultado de la consulta
					$row =$this->Nomina->save($this->request->data);
					if($row) {
						$this->Session->setFlash('Nomina almacenada con éxito!', 'default', array(), 'success');
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
	        throw new NotFoundException(__('Nomina invalidad'));
	    }

	    $nomina = $this->Nomina->findById($id);
	    if (!$nomina) {
	        throw new NotFoundException(__('Nomina invalida'));
	    }
	    //en caso que venga desde el formulario
	    if ($this->request->is(array('post', 'put'))) {
	    		//consulta existencia del registro
				$reg = $this->Nomina->find('first', array('conditions' => array(
					'placa' => $this->request->data['Nomina']['placa'],
					'marca' => $this->request->data['Nomina']['marca'], 
					'modelo' => $this->request->data['Nomina']['modelo'], 
					'anio' => $this->request->data['Nomina']['anio'], 
					'mts' => $this->request->data['Nomina']['mts'], 
					'chofer' => $this->request->data['Nomina']['chofer'], 
					'cedu_chofer' => $this->request->data['Nomina']['cedu_chofer'])));
				//en caso de existir el registro
				if($reg){
					$this->Session->setFlash('Error, Nomina existente!', 'default', array(), 'error');
					return $this->redirect(array('action' => 'index'));
				}
				else {
			        $this->Nomina->id = $id;
		
			        if ($this->Nomina->save($this->request->data)) {
			            $this->Session->setFlash('Nomina actualizada con éxito!', 'default', array(), 'success');
			            return $this->redirect(array('action' => 'index'));
			        }
			        $this->Session->setFlash('Error, no se pudo actualizar el registro!', 'default', array(), 'error');
			    }//fin else
	    }
	    //vista del form editar
	    if (!$this->request->data) {
	    	
	        $this->request->data = $nomina;
	    }
	}
	public function eliminar(){
		//Verifica si es por metodo post
		if (!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
	    $id = $this->request->data[id];
	    if ($this->Nomina->delete($id)) {
	        $this->Session->setFlash('Nomina fue eliminada con éxito!', 'default', array(), 'success');
	    }		
		
	}

	public function registrar() {
		//Verifica si es por metodo post
		if ($this->request->is('post')) {
			//se carga el modelo empleados
			$this->loadModel("Empleado");
			$empleado = new Empleado();
			//se consultan todos los empleados
			$empleados = $empleado->find('all', array('order' => 'Empleado.cedula'));

			$fecha = date("Y-m-d");
			$mes = $this->request->data['Nomina']['mes'];
			$quincena = $this->request->data['Nomina']['quincena'];
			//se crea la nomina
			$i = 0;
			foreach ($empleados as $emp) {
				$this->request->data['N'][$i]['empleado_id'] = $emp['Empleado']['id'];
				$this->request->data['N'][$i]['mes'] = $this->request->data['Nomina']['mes'];
				$this->request->data['N'][$i]['quincena'] = $this->request->data['Nomina']['quincena'];
				$this->request->data['N'][$i]['fecha'] = $fecha;
				$this->request->data['N'][$i]['sueldo'] = $emp['Cargo']['mensualidad']/2;
				$i++;
			}

			$reg = $this->Nomina->find('first', array('conditions' => array('Nomina.mes' => $mes, 'Nomina.quincena' => $quincena)));
			//en caso de existir el registro
			if($reg){
				$this->Session->setFlash('Error, Nomina existente!', 'default', array(), 'error');
				return $this->redirect(array('action' => 'mostrar', $mes, $quincena));
			}
			else{
				//se guarda la nomina
				$row =$this->Nomina->saveAll($this->request->data['N']);
				if($row) {
					$this->Session->setFlash('Nomina almacenada con éxito!', 'default', array(), 'success');
					return $this->redirect(array('action' => 'mostrar', $mes, $quincena));					
				}
				else {
					$this->Session->setFlash('Error, no se pudo almacenar el registro!', 'default', array(), 'error');
				}//endelse
			}//endelse validacion existencia registros

		}

	}

	public function mostrar($mes, $quincena) {
		if($mes!=null) {
			$this->set('nomina', $this->Nomina->find('all', array('conditions' => array('Nomina.mes' => $mes, 'Nomina.quincena' => $quincena))));
		}
		else{
			$this->Session->setFlash('Error al generar la nomina', 'default', array(), 'success');
			return $this->redirect(array('action' => 'generar'));					
		}
	}	

	public function pdfNomina($mes,$quincena){
		Configure::write('debug',2);

		$this->loadModel('Empleado');
		$this->loadModel('Nomina');

		$empleado = New Empleado();
		$nomina = New Nomina();

		$this->set('nominas', $nomina->find('all', array('conditions' => array('Nomina.mes' => $mes, 'Nomina.quincena' => $quincena))));
	}
	
}
?>