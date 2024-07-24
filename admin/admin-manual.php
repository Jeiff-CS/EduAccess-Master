<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

$select_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
$select_contents->execute([$tutor_id]);
$total_contents = $select_contents->rowCount();

$select_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
$select_playlists->execute([$tutor_id]);
$total_playlists = $select_playlists->rowCount();

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE tutor_id = ?");
$select_likes->execute([$tutor_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
$select_comments->execute([$tutor_id]);
$total_comments = $select_comments->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manual Docente</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/style-teacher.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="user-manual">

   <h1 class="heading">Manual de Usuario</h1>

   <div class="box-container">

      <div class="box">
         <h3 class="title">Registro</h3>
         <img src="../images/registro-admin.png" alt="Panel Izquierdo" class="section-image " >
         <p>LLene todas las credenciales solicitadas y luego presione en <span>Registrarse</span> para crear su cuenta</p>
      </div>

      <div>.</div>

      <div class="box">
         <h3 class="title">Login</h3>
         <img src="../images/login-admin.png" alt="Panel Izquierdo" class="section-image" >
         <p>Con su Cuenta ya creada puede iniciar sesion con su <span>Correo</span> y <span>Contrasena</span></p>
      </div>


      <div class="box">
         <h3 class="title">Menu de Navegacion</h3>
         <img src="../images/menu-docente.png" alt="Panel Izquierdo" class="section-image panel-izquierdo-image" >
         <p><span> Ver Perfil:</span> Botón para ir a tu perfil de docente y revisar o modificar algunos parámetros.</p>
         <p><span> Home: </span>La página por defecto con algunos accesos rápidos.</p>
         <p><span>Playlist:</span> Son los cursos que el docente crea para que los alumnos los vean.</p>
         <p><span>Contenido: </span>Son lo videos dentro de las Playlist.</p>
         <p><span>Comentarios:</span> Son los Comentarios que los alumnos dejan como resena.</p>
         <p><span>Cerrar Sesion:</span>Boton de cierre de sesion de cuenta.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Detalle de Perfil</h3>
         <img src="../images/ver-perfil-admin.png" alt="Sección Home" class="section-image">
         <p>Podras el detalle de tu perfil, playlits, videos, likes, comentarios y poder actualizar tus credenciales con el boton de Actualizar Perfil.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Actualizar Datos</h3>
         <img src="../images/actualizar-admin.png" alt="Sección Home" class="section-image">
         <p>Podras ver o cambiar tus credenciales de la cuenta si lo vez necesario. Podras cambiar contrasena, correo o foto de perfil con el boton de actualizar.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Barra de Navegacion</h3>
         <img src="../images/nav-bar.png" alt="Sección Home" class="section-image">
         <p><span> Boton Inicio:</span> Te redirigira a la pagina principal.</p>
         <p><span> Barra de Navegacion: </span>Podras buscar algun curso creado.</p>
         <p><span>Barra de menu desplegable:</span> Podras hacer que la barra lateral aparezca o se oculte.</p>
         <p><span>Perfil: </span>Veras opciones de inicio y cierre de sesion.</p>
         <p><span>Modo Oscuro:</span>Podras cambiar la pagina entre modo oscuro y claro para descansar la vista.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Dashboard</h3>
         <img src="../images/dashboard.png" alt="Sección Home" class="section-image">
         <p>Podras ver un dashboard de el contenido como docente, Podras ver tu perfil, la cantidad de videos subidos, total de cursos creados, total de likes, total de comentarios.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Playlist</h3>
         <img src="../images/playlist.png" alt="Sección Home" class="section-image">
         <p>Podras ver la cantidad de cursos subidos a la pagina y su estado, para poder actualizar, eliminar o ver el contenido; siempre y cuento tenga cursos subidos, sino solo aparecera el boton de crear una nueva playlist.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Crear Playlist</h3>
         <img src="../images/crear-curso.png" alt="Sección Home" class="section-image">
         <p>Con el boton de <span>Agregar Playlist</span> puedes crear nuevos cursos.</p>
         <p><span> Estado:</span> Podras seleccionar el estado del curso, ACTIVO "visible" o INACTIVO "invisible" los alumno no podran acceder al curso.</p>
         <p><span> Nombre: </span>Nombre del Curso.</p>
         <p><span>Descripcion:</span> Breve descripcion del cruso.</p>
         <p><span>Miniatura: </span>Una foto de portada.</p>
         <p><span>Crear Playlist:</span>Si completas todos los campos ya puedes crear la nueva playlist.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Contenido</h3>
         <img src="../images/contenido.png" alt="Sección Home" class="section-image">
         <p>Podras ver el total de videos subidos a la plataforma y su estado, para poder actualizar, eliminar o ver el contenido; siempre y cuento tenga videos subidos, sino solo aparecera el boton de crear nuevo contenido. </p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Agregar Contenido</h3>
         <img src="../images/agregar-video.png" alt="Sección Home" class="section-image panel-izquierdo-image">
         <p>Podras subir videos a la plataforma asignandolos a una playlist o curso. </p>
         <p><span> Estado:</span> Podras seleccionar el estado del video, ACTIVO "visible" o INACTIVO "invisible" los alumno no podran acceder al curso.</p>
         <p><span> Titulo: </span>Nombre del Video.</p>
         <p><span> Descripcion: </span>Breve descripcion del video.</p>
         <p><span> Video Playlist: </span>Podras asginar el video a un playlist, para eso la playlist ya debe de destar creada.</p>
         <p><span>Miniatura: </span>Una foto de portada.</p>
         <p><span>Seleccionar Video:</span>Selecciona el video a subir.</p>
         <p><span>Subir video:</span>Si completas todos los campos ya puedes subir el nuevo video el cual sera asginado automaticamente.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Comentarios</h3>
         <img src="../images/comentario.png" alt="Sección Home" class="section-image">
         <p>Podras ver el total de comentaios que ponen los alumnos de los videos subidos, donde mostrara la fecha, el nombre del video que se comentó, un boton para ver el video, el contenido del comentario y un boton para eliminaar el comentario si lo ve necesario.</p>
      </div>

      <b>.</b>

</section>















<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>