<?php
class SomosController extends AppController{
	public function index()
	{
		# code...
	}
	public function mision()
	{
		# code...
	}
	public function consultarForm(){
		# code...
		$this->loadModel('CamionesTrabajo');
		$this->loadModel('MaquinariasTrabajo');
		$this->loadModel('Nomina');

		$maquina = New MaquinariasTrabajo();
		$trabajo = New CamionesTrabajo();
		$nomina = New Nomina();

		//$this->set('camiones',$this->CamionesTrabajo->Camion->find('list', array('fields' => array('Camion.id', 'CamionesTrabajo.costo'))));

		//$this->set('maquinarias', $this->MaquinariasTrabajo->Maquinaria->find('list',array('fields' => array('Maquinaria.id', 'Maquinaria.costo'))));
		$this->set('trabajos', $trabajo->find('all'));
		$this->set('maquinarias' ,$maquina->find('all'));
		$this->set('nominas', $nomina->find('all'));
	}
	public function resumenTrabajos(){ 
		$this->loadModel('CamionesTrabajo');
		$this->loadModel('MaquinariasTrabajo');
		$this->loadModel('Nomina');
		$trabajo = New CamionesTrabajo();
		$maquina = New MaquinariasTrabajo();
		$nomina = New Nomina();
		if ($this->request->is('post')) {
			# code...
			$this->set('trabajos', $trabajo->find('all', array('conditions' => array('AND' => array ('CamionesTrabajo.fecha >=' => $this->request->data['desde'], 'CamionesTrabajo.fecha <=' => $this->request->data['hasta'] )))));
			//$this->set('trabajos', $trabajo->find('all'));
			//$this->set('maquinarias', $maquina->find('all'));
			$this->set('maquinarias', $maquina->find('all', array('conditions' => array('AND' => array ('MaquinariasTrabajo.fecha >=' => $this->request->data['desde'], 'MaquinariasTrabajo.fecha <=' => $this->request->data['hasta'] )))));
			//$this->set('nominas', $nomina->find('all'));
			$this->set('nominas', $nomina->find('all', array('conditions' => array('AND' => array ('Nomina.fecha >=' => $this->request->data['desde'], 'Nomina.fecha <=' => $this->request->data['hasta'] )))));
			$this->set('desde', $this->request->data['desde']);
			$this->set('hasta', $this->request->data['hasta']);

			//$this->set('trabajos', $trabajo->find('first', array('conditions' => array('Camion.id' => 'camion_id'))));
		}

	}
	public function pdfTrabajos($desde, $hasta){
		# code...
		Configure::write('debug',2);
		//leyendo los Modelos
		$this->loadModel('CamionesTrabajo');
		$this->loadModel('MaquinariasTrabajo');
		$this->loadModel('Nomina');
		//Creando los Objetos
		$trabajo = New CamionesTrabajo();
		$maquina = New MaquinariasTrabajo();
		$nomina = New Nomina();

		//Parametros de las Fechas
		$this->set('desde', $desde);
		$this->set('hasta', $hasta);
		//Realizando las Consultas
		$this->set('trabajos', $trabajo->find('all'));
		//$this->set('trabajos', $trabajo->find('all', array('conditions' => array('AND' => array ('CamionesTrabajo.fecha >=' => $this->request->data['desde'], 'CamionesTrabajo.fecha <=' => $this->request->data['hasta'] )))));
		$this->set('maquinarias', $maquina->find('all'));
		$this->set('nominas', $nomina->find('all'));
		$this->render();

	}

	function respaldo($tables = '*') {

    $return = '';
    $this->loadModel('Nomina');
	$nomina = new Nomina();
    $modelName = $nomina;

    $dataSource = $nomina->getDataSource();
    $databaseName = $dataSource->getSchemaName();


    // Do a short header
    $return .= '-- Database: `' . $databaseName . '`' . "\n";
    $return .= '-- Generation time: ' . date('D jS M Y H:i:s') . "\n\n\n";


    if ($tables == '*') {
        $tables = array();
        $result = $nomina->query('SHOW TABLES');
        foreach($result as $resultKey => $resultValue){
            $tables[] = current($resultValue['TABLE_NAMES']);
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    // Run through all the tables
    foreach ($tables as $table) {
        $tableData = $nomina->query('SELECT * FROM ' . $table);

        $return .= 'DROP TABLE IF EXISTS ' . $table . ';';
        $createTableResult = $nomina->query('SHOW CREATE TABLE ' . $table);
        $createTableEntry = current(current($createTableResult));
        $return .= "\n\n" . $createTableEntry['Create Table'] . ";\n\n";

        // Output the table data
        foreach($tableData as $tableDataIndex => $tableDataDetails) {

            $return .= 'INSERT INTO ' . $table . ' VALUES(';

            foreach($tableDataDetails[$table] as $dataKey => $dataValue) {

                if(is_null($dataValue)){
                    $escapedDataValue = 'NULL';
                }
                else {
                    // Convert the encoding
                    $escapedDataValue = mb_convert_encoding( $dataValue, "UTF-8", "ISO-8859-1" );

                    // Escape any apostrophes using the datasource of the model.
                    $escapedDataValue = $nomina->getDataSource()->value($escapedDataValue);
                }

                $tableDataDetails[$table][$dataKey] = $escapedDataValue;
            }
            $return .= implode(',', $tableDataDetails[$table]);

            $return .= ");\n";
        }

        $return .= "\n\n\n";
    }

    // Set the default file name
    $fileName = $databaseName . '-backup-' . date('Y-m-d_H-i-s') . '.sql';

    // Serve the file as a download
    $this->autoRender = false;
    $this->response->type('Content-Type: text/x-sql');
    $this->response->download($fileName);
    $this->response->body($return);
}

}
?>