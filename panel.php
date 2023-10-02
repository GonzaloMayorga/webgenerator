<?php 
session_start();
include_once 'tools/usuarios.php';
include_once 'tools/webs.php';
define('IDUSER', $_SESSION['Usuario'][0]['idUsuario']);

if(!isset($_SESSION['Usuario'])){
   header('Location: login.php');
}


if(isset($_POST['enviar'])){
   define('DOMAIN', $_POST['in']);
   if(getWebs(IDUSER.DOMAIN) == 0){
      webGenerate(IDUSER.DOMAIN,IDUSER);
      shell_exec('./scripts/wix.sh '.IDUSER.DOMAIN);
   }else{
      echo (IDUSER.DOMAIN." Ya existe en la base de datos");
   }
}


if(isset($_GET['download'])){
   shell_exec('./scripts/comprimir.sh '.$_GET['download']);
   header('Location: webs/' . $_GET["download"] . '.zip');
}




 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Bienvenido al panel</title>
 </head>
 <body>
   <h1>Bienvenido a tu panel</h1>
    <a href="logout.php">Cerrar Sesion de <?php echo($_SESSION['Usuario'][0]['idUsuario']) ?></a>

    <form method="POST">
      <label for="in">Generar web de:</label>
       <input type="text" name="in" >
       <input type="submit" value="Crear web" name="enviar">
    </form>

    <?php 
      $dominios = getMyWebs(IDUSER);
         foreach ($dominios as $dominio) {
            //echo $dominio['idWeb'];
            echo "<br>";   
            echo "<a href='webs/".$dominio['dominio']."/index.php'>".$dominio['dominio']."</a>";
            echo "<a href='?download=".$dominio['dominio']."'> Descargar web</a>";
            echo "<a href='?delete=".$dominio['dominio']."'> Eliminar</a>";
            echo "<br>";

         }
            if(isset($_GET['delete'])){
               shell_exec('./scripts/delete.sh '.$_GET['delete']);
               deleteWebById($dominio['idWeb']);
               header('Location: panel.php');
            }    

     ?>

<?php 


if($_SESSION['Usuario'][0]['email'] == 'admin@server.com'){
   if($_SESSION['Usuario'][0]['password'] == 'serveradmin'){
      $dominios = getAll();
         foreach ($dominios as $dominio) {
            echo "<br>";   
            echo "<a href='webs/".$dominio['dominio']."/index.php'>".$dominio['dominio']."</a>";
            echo "<br>";
         }  
   }
}
   

 ?>

 	
 </body>
 </html>