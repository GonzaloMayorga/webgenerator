<?php 

	define('HOST', 'localhost');
	define('USER', 'adm_webgenerator'); // Nro de carnet
	define('PASS', 'webgenerator2020'); // clave de usuario
	define('DB', webgenerator);

	// Conecta con la base de datos con los datos de credencial
	// ========================================================
	function dbConnect(){
		$db = new mysqli(HOST, USER, PASS, DB);

		if($db->connect_errno){
			echo ("Error de conexión con la base de datos");
			exit();	
		}
		
		return $db;	
	}

	// Ejecuta una consulta sql en la base de datos y retorna
	// =======================================================
function query($sentence,$show){
        $db = dbConnect();
        $response = $db->query($sentence);

        if($db->errno){
            if($show){
                echo('<p style="font-size:5rem;color:red">HAY UN ERROR EN LA SENTENCIA SQL</p>');
                echo $db->error;
            }
            return false;
        }
        if($response !== true){
            $result = $response->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
        return -3;
    }
 ?>