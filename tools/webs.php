<?php 
include_once 'credenciales.php'; 

function webGenerate($domino, $id){
	return query("INSERT INTO `webs`(`dominio`,`idUsuario`) VALUES ('$domino', '$id')", true);
}

function getMyWebs($id){
	$query = "SELECT `idWeb`, `dominio`  FROM `webs` WHERE `idUsuario` = '$id' ";
	$webs = query($query, true);
    $array = [];
    foreach ($webs as $ownWeb) {
        $array[] = $ownWeb;
    }
    return $array;
}

function getWebs($id){
	$webs = query("SELECT `dominio` FROM `webs`", true);
	foreach($webs as $websData){
		if($id == $websData['dominio']){
			return 1;
		}
	}
	return 0;
}

function getAll(){
	 $query = "SELECT webs.dominio FROM `webs` ";
	 $webs = query($query, true);
	 $array = [];
	 foreach ($webs as $all){
	 	$array[] = $all;
	 }
	 return $array;
}

function deleteWebById($id){
	return query("DELETE FROM `webs` WHERE `webs`.`idWeb` = $id", true);
}


 ?>