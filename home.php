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

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- seleccion rapida section inicio  -->

<section class="quick-select">

   <h1 class="heading">Seleccion rapida</h1>

   <div class="box-container">

      <?php
         if($user_id != ''){
      ?>
      <div class="box">
         <h3 class="title">likes y comentarios</h3>
         <p>Total likes : <span><?= $total_likes; ?></span></p>
         <a href="likes.php" class="inline-btn">ver likes</a>
         <p>Total comentarios : <span><?= $total_comments; ?></span></p>
         <a href="comments.php" class="inline-btn">Ver comentarios</a>
         <p>Guardar playlist : <span><?= $total_bookmarked; ?></span></p>
         <a href="bookmark.php" class="inline-btn">Ver marcados</a>
      </div>
      <?php
         }else{ 
      ?>
      <div class="box" style="text-align: center;">
         <h3 class="title">Porfavor loguese o registrese</h3>
          <div class="flex-btn" style="padding-top: .5rem;">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">registro</a>
         </div>
      </div>
      <?php
      }
      ?>

      <div class="box">
         <h3 class="title">Top categorias</h3>
         <div class="flex">
            <a href="playlist.php?get_id=XEpN3Yca7s5TCMXYEofq"><i class="fa-solid fa-font"></i><span>Letras</span></a>
            <a href="playlist.php?get_id=pH04f83ao8e1NG9KEfz0"><i class="fa-solid fa-1"></i><span>Numeros</span></a>
            <a href="playlist.php?get_id=OvDzKJP0QKnydVJ1surl"><i class="fa-solid fa-hippo"></i><span>Animales</span></a>
            <a href="playlist.php?get_id=vlcV6Ks8pcz9clDDxR1t"><i class="fa-solid fa-face-laugh-beam"></i><span>Emociones</span></a>
            <a href="playlist.php?get_id=kDl8fhGFy3KLmQjVHZG8"><i class="fa-solid fa-palette"></i><span>Colores</span></a>
            <a href="playlist.php?get_id=AIztxp3xdsESr5pD39R5"><i class="fa-solid fa-gamepad"></i><span>Juegos</span></a>
            <a href="playlist.php?get_id=LV04SdIpuGeozNe4kack"><i class="fas fa-vial"></i><span>Ciencia</span></a>
         </div>
      </div>

      <div class="box">
         <h3 class="title">Temas Populares</h3>
         <div class="flex">
            <a href="playlist.php?get_id=TjVsDBcUUj27xIpg0tFe"><i class="fa-solid fa-calculator"></i><span>Matematica</span></a>
            <a href="playlist.php?get_id=3dX8xOadZW1HtmXW440S"><i class="fa-solid fa-shapes"></i><span>Figuras</span></a>
            <a href="playlist.php?get_id=9c8MnDZpL4P3iqf3Htc6"><i class="fa-solid fa-earth-americas"></i><span>Sistema Solar</span></a>
            <a href="playlist.php?get_id=wLtpgh5lsFffWk3qvULB"><i class="fa-solid fa-person-snowboarding"></i><span>Deporte</span></a>
            <a href="#"><i class="fa-solid fa-landmark"></i><span>Historia</span></a>
         </div>
      </div>

      <div class="box tutor">
         <h3 class="title">Volverse Tutor</h3>
         <p>Quieres ser tutor?, Date prisa que se acaban las plazas, Tap!! Tap!! Tap!!!</p>
         <a href="admin/register.php" class="inline-btn">Empezar</a>
      </div>

   </div>

</section>

<!-- quick select section fin -->

<!-- courses section inicio  -->

<section class="courses">

   <h1 class="heading">Ultimos Cursos</h1>

   <div class="box-container">

      <?php
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? ORDER BY date DESC LIMIT 6");
         $select_courses->execute(['active']);
         if($select_courses->rowCount() > 0){
            while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
               $course_id = $fetch_course['id'];

               $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
               $select_tutor->execute([$fetch_course['tutor_id']]);
               $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="box">
         <div class="tutor">
            <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_tutor['name']; ?></h3>
               <span><?= $fetch_course['date']; ?></span>
            </div>
         </div>
         <img src="uploaded_files/<?= $fetch_course['thumb']; ?>" class="thumb" alt="">
         <h3 class="title"><?= $fetch_course['title']; ?></h3>
         <a href="playlist.php?get_id=<?= $course_id; ?>" class="inline-btn">Ver playlist</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">No hay Cursos Agregados!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <a href="courses.php" class="inline-option-btn">Ver mas</a>
   </div>

</section>

<!-- courses section fin -->












<!-- footer section inicio  -->
<?php include 'components/footer.php'; ?>
<!-- footer section fin -->

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>