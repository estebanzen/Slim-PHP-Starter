<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// manejo de errores
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

// Obtener todos los clientes.
$app->get('/api/clientes',function(Request $request,Response $response){

	$consulta = "SELECT * FROM clientes";

	try {
		// instancia de base de datos
		$db = new db();

		// Coneccion
		// die('coscm');
		$db = $db->conectar();
		$ejecutar = $db->query($consulta);
		$clientes = $ejecutar->fetchAll(PDO::FETCH_OBJ);
		$db = null;

		// Exportar y mostrar en JSON
		echo json_encode($clientes);


	} catch(PDOExeption $e) {
		echo '{"error": {"text":'.$e->getMessage().'}';
	}

});

// Obtener cliente por id.
$app->get('/api/clientes/{id}',function(Request $request,Response $response){

	$id = $request->getAttribute('id');

	$consulta = "SELECT * FROM clientes WHERE id='$id'";

	try {
		// instancia de base de datos
		$db = new db();

		// Coneccion
		// die('coscm');
		$db = $db->conectar();
		$ejecutar = $db->query($consulta);
		$cliente = $ejecutar->fetchAll(PDO::FETCH_OBJ);
		$db = null;

		// Exportar y mostrar en JSON un solo cliente
		echo json_encode($cliente);


	} catch(PDOExeption $e) {
		echo '{"error": {"text":'.$e->getMessage().'}';
	}

});

// Agregar un cliente.
/* Fromato json
{
	"nombre": "Juan",
	"apellidos": "Munjia",
	"telefono": "1123663234",
	"email": "juan@munjia.ion",
	"direccion": "ganno 3231",
	"ciudad": "Tijuana",
	"departamento": "H"
}
 */
$app->post('/api/clientes/agregar',function(Request $request,Response $response){

	$nombre = $request->getParam('nombre');
	$apellidos = $request->getParam('apellidos');
	$telefono = $request->getParam('telefono');
	$email = $request->getParam('email');
	$direccion = $request->getParam('direccion');
	$ciudad = $request->getParam('ciudad');
	$departamento = $request->getParam('departamento');

	$consulta = "INSERT INTO clientes (nombre, apellidos, telefono, email, direccion, ciudad, departamento) VALUES (:nombre, :apellidos, :telefono, :email, :direccion, :ciudad, :departamento)";

	try {
		// instancia de base de datos
		$db = new db();

		// Coneccion
		$db = $db->conectar();
		$stmt = $db->prepare($consulta);

		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':apellidos', $apellidos);
		$stmt->bindParam(':telefono', $telefono);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':direccion', $direccion);
		$stmt->bindParam(':ciudad', $ciudad);
		$stmt->bindParam(':departamento', $departamento);

		$stmt->execute();

		echo '{"notice": {"text": "Cliente Agregado" }';

	} catch(PDOExeption $e) {
		echo '{"error": {"text":'.$e->getMessage().'}';
	}

});



// Actualizar un cliente.
/* Fromato json
{
	"nombre": "Juan",
	"apellidos": "Munjia",
	"telefono": "1123663234",
	"email": "juan@munjia.ion",
	"direccion": "ganno 3231",
	"ciudad": "Tijuana",
	"departamento": "H"
}
 */
$app->put('/api/clientes/actualizar/{id}',function(Request $request,Response $response){

	$id = $request->getAttribute('id');

	$nombre = $request->getParam('nombre');
	$apellidos = $request->getParam('apellidos');
	$telefono = $request->getParam('telefono');
	$email = $request->getParam('email');
	$direccion = $request->getParam('direccion');
	$ciudad = $request->getParam('ciudad');
	$departamento = $request->getParam('departamento');

	$consulta = "UPDATE clientes SET
					nombre = :nombre,
					apellidos = :apellidos,
					telefono = :telefono,
					email = :email,
					direccion = :direccion,
					ciudad = :ciudad,
					departamento = :departamento
					WHERE id = $id";

	try {
		// instancia de base de datos
		$db = new db();

		// Coneccion
		$db = $db->conectar();
		$stmt = $db->prepare($consulta);

		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':apellidos', $apellidos);
		$stmt->bindParam(':telefono', $telefono);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':direccion', $direccion);
		$stmt->bindParam(':ciudad', $ciudad);
		$stmt->bindParam(':departamento', $departamento);

		$stmt->execute();

		echo '{"notice": {"text": "Cliente Actualizado" }';

	} catch(PDOExeption $e) {
		echo '{"error": {"text":'.$e->getMessage().'}';
	}

});


// Borrar cliente por id.
$app->delete('/api/clientes/borrar/{id}',function(Request $request,Response $response){

	$id = $request->getAttribute('id');

	$consulta = "DELETE FROM clientes WHERE id=$id";

	try {
		// instancia de base de datos
		$db = new db();

		// Coneccion
		// die('coscm');
		$db = $db->conectar();
		$stmt = $db->prepare($consulta);
		$stmt->execute();
		$db = null;

		echo '{"notice": {"text": "Cliente Borrado" }';



	} catch(PDOExeption $e) {
		echo '{"error": {"text":'.$e->getMessage().'}';
	}

});