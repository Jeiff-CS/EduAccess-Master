<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>inicio</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style-user.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- seleccion rapida section inicio  -->

<section class="user-manual">

   <h1 class="heading">Manual de Usuario</h1>

   <div class="box-container">

      <div class="box">
         <h3 class="title">Registro</h3>
         <img src="images/registro-user.png" alt="Panel Izquierdo" class="section-image " >
         <p>LLene todas las credenciales solicitadas y luego presione en <span>Registrarse</span> para crear su cuenta</p>
      </div>
      <b>.</b>

      <div class="box">
         <h3 class="title">Login</h3>
         <img src="images/login-user.png" alt="Panel Izquierdo" class="section-image" >
         <p>Con su cuenta ya creada puede iniciar sesion con su <span>Correo</span> y <span>Contrasena</span></p>
      </div>

      <b>.</b>
      
      <div class="box">
         <h3 class="title">Menu de Navegacion</h3>
         <img src="images/panelizquierdo.png" alt="Panel Izquierdo" class="section-image panel-izquierdo-image" >
         <p><span> View Profile:</span> Botón para ir a tu perfil de estudiante y revisar o modificar algunos parámetros.</p>
         <p><span> Home: </span>La página por defecto con algunos accesos rápidos.</p>
         <p><span>Sobre nosotros:</span> Sección con algunas reseñas y características resaltantes de EduAccess.</p>
         <p><span>Cursos: </span>Vista completa de todos los cursos y materias disponibles hasta la fecha.</p>
         <p><span>Profesores:</span> Los docentes que subieron el material educativo y se encuentran actualmente activos.</p>
         <p><span>Contacto:</span> Por si existe algún inconveniente o duda para resolver.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Menu de Navegacion</h3>
         <img src="images/perfil-user.png" alt="Panel Izquierdo" class="section-image" >
         <p>En la ventana de ver perfil se podra visualizar la interaccion del usuario con la pagina, podra actualizar sus datos personales, ver las playlist que guardo, los likes dados y los comentarios realizados.</p>
         <p><span>Actualizar perfil:</span> Botón para ir a tu perfil de estudiante y revisar o modificar tus datos, como correo, contrasena o foto de perfil.</p>
         <p><span>Ver Playlist: </span>Te redireccionara a una pagina donde podras ver todas las playlist que guardaste.</p>
         <p><span>Ver likes:</span> Te redireccionara a una pagina donde podras ver todos los videos a los que les dio un like.</p>
         <p><span>Ver comentarios: </span>Mostrará todos los comentarios publicados los cuales podra modificarlos y eliminarlos.</p>
      </div>

      <b>.</b>

      <div class="box">
            <h3 class="title">Inicio</h3>
            <img src="images/inicio-user.png" alt="Sección Home" class="section-image">
            <p>Aquí encontrarás algunos accesos rápidos como la cantidad total de likes, comentarios y listas de cursos, cada uno con su respectivo botón para dirigirte a esas secciones. También tienes a tu disposición las categorías mejor valoradas, así como los temas de mayor demanda y un apartado dedicado a ofrecer tus conocimientos mediante la opción de convertirte en tutor. En la parte de abajo tendrás algunos cursos populares o los que se añadieron recientemente.</p>
      </div>
      <b>.
      </b>
      <div class="box">
            <h3 class="title">Sobre Nosotros</h3>
            <img src="images/sobrenosotros.png" alt="Sección Sobre Nosotros" class="section-image">
            <p>Lo primero que verás en esta sección es una breve descripción del propósito de EduAcess, acompañado de un botón para ir directamente a la siguiente sección de la página y el siguiente ítem en esta documentación: los cursos. De igual modo, en la parte inferior puedes revisar algunas de las bondades de la página, así como reseñas de diferentes usuarios que quedaron satisfechos con el servicio o comentarios con aspectos en los que podemos mejorar. ¡Cualquier opinión constructiva será recibida con los brazos abiertos!</p>
      </div>

      <b>.</b>

      <div class="box">
            <h3 class="title">Cursos</h3>
            <img src="images/cursos-user.png" alt="Sección Cursos" class="section-image">
            <p>En esta sección encontrarás todos los cursos disponibles en EduAccess, contando con gran variedad de temas con materiales entretenidos para tus niños.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Ver Contenido</h3>
         <img src="images/contenido-user.png" alt="Sección Cursos" class="section-image">
         <p>En esta sección encontrarás todos los cursos disponibles en EduAccess, contando con gran variedad de temas con materiales entretenidos para tus niños.</p>
         <p><span>Guardar playlist:</span>Podras guardar los cursos que uno quiera.</p>
         <p><span>Videos: </span>Mostrara la cantidad de videos que tiene el curso.</p>
         <p><span>Titulo:</span>Titulo del curso.</p>
         <p><span>Fecha: </span>Fecha de publicacion del cruso.</p>
         <p><span>Video: </span>Podras ver el video.</p>
      </div>

      <b>.</b>

      <div class="box">
         <h3 class="title">Ver Comentarios</h3>
         <img src="images/comentario-user.png" alt="Sección Cursos" class="section-image">
         <p>En esta seccion podras ver y publicar comentarios sobre los videos.</p>
         <p><span>Like:</span>Podras dar like si el video te gusto y guardarlo en tu seccion de likes.</p>
         <p><span>Comentario: </span>Puedes dejar un comentario en la caja de comentarios.</p>
         <p>En la parte baja podras ver todos los comentarios sobre el video.</p>
      </div>

      <b>.</b>

      <div class="box">
            <h3 class="title">Profesores</h3>
            <img src="images/tutores-user.png" alt="Sección Profesores" class="section-image">
            <p>Aquí tendrás a tu disposición varios elementos que corresponden a los diferentes profesores que subieron su material a EduAccess y se encuentra público en la sección anterior (“Cursos”). Por cada profesor encontrarás un botón llamado Ver perfil que sirve para dirigirte a una sección dedicada a revisar la información del profesor en cuestión.</p>
      </div>
      <b>.
      </b>
      <div class="box">
         <h3 class="title">Contactanos</h3>
         <img src="images/contacto.png" alt="Sección Contacto" class="section-image">
         <p>Tendrás a tus disposición un formulario con diferentes campos para llenar con la información que se requiere (Nombre, correo que usaste para iniciar sesión, número de celular y el mensaje de tu inquietud o duda por resolver). Una vez hayas llenado todos los campos, dale al botón “Enviar mensaje” para enviar tu inquietud y contactar con un profesional.</p>
      </div>  

      <b>.</b>

      <div class="box">
         <h3 class="title">Utilizando el Modo Oscuro</h3>
         <img src="images/darkmode.png" alt="Activar Modo Oscuro" class="section-image">
         <p>EduAccess te ofrece una manera mucho más cómoda de visualizar tus cursos y seguir aprendiendo, de paso que descansas tu visión en el proceso. Para activar el modo oscuro, dirígete a la parte superior y dale clic al botón resaltado con un círculo como se visualiza en la imagen; notarás que toda la página cambiará inmediatamente a un estilo mucho más acogedor y suave a la vista. ¡Perfecto si estarás varias horas aprendiendo cosas nuevas!</p>
         <p>Para regresar al modo claro, sólo dale un clic de vuelta como hiciste antes y verás como todo volverá a la normalidad.</p>
      </div>

</section>

<!-- footer section inicio  -->
<?php include 'components/footer.php'; ?>
<!-- footer section fin -->

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>