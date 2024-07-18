<?php

include '../components/connect.php';

if(isset($_POST['submit'])){

   $id = unique_id();
   $dni = $_POST['dni'];
   $dni = filter_var($dni, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $ape_pat = $_POST['ape_pat'];
   $ape_pat = filter_var($ape_pat, FILTER_SANITIZE_STRING);
   $ape_mat = $_POST['ape_mat'];
   $ape_mat = filter_var($ape_mat, FILTER_SANITIZE_STRING);
   $profession = $_POST['profession'];
   $profession = filter_var($profession, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE email = ?");
   $select_tutor->execute([$email]);
   
   if($select_tutor->rowCount() > 0){
      $message[] = 'Email ya existe!';
   }else{
      if($pass != $cpass){
         $message[] = 'Contrasenas no coinciden!';
      }else{
         $insert_tutor = $conn->prepare("INSERT INTO `tutors`(id, dni, name, ape_pat, ape_mat, profession, email, password, image) VALUES(?,?,?,?,?,?,?,?,?)");
         $insert_tutor->execute([$id, $dni, $name, $ape_pat, $ape_mat, $profession, $email, $cpass, $rename]);
         move_uploaded_file($image_tmp_name, $image_folder);
         $message[] = 'Nuevo Tutor Registrado! Porfavor inicie sesion ahora';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body style="padding-left: 0;">

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message form">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- registro section inicio  -->

<section class="form-container">

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Nuevo Registro</h3>
      <div class="flex">
         <div class="col">
            <p>DNI <span>*</span></p>
            <input type="number" name="dni" placeholder="Ingrese su DNI" maxlength="50" required class="box">
            <p>Tu Apellido Paterno <span>*</span></p>
            <input type="text" name="ape_pat" placeholder="Ingrese su Apellido paterno" maxlength="50" required class="box">
            <p>Tu profesion <span>*</span></p>
            <select name="profession" class="box" required>
               <option value="" disabled selected>-- Seleccione su profesion</option>
               <option value="docente inicial">Docente Inicial</option>
               <option value="carrera tecnica docencia">Carrera Tecnica Docencia</option>
               <option value="psicologia">Psicologia</option>
               <option value="pedagogia en eduacion fisica">Pedagogia en Eduacion Fisica</option>
               <option value="lengua extranjera">Lengua Extranjera</option>
            </select>
            <p>Tu email <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" maxlength="20" required class="box">
         </div>
         <div class="col">
            <p>Tu nombre <span>*</span></p>
            <input type="text" name="name" placeholder="Ingrese su nombre" maxlength="50" required class="box">
            <p>Tu Apellido Materno <span>*</span></p>
            <input type="text" name="ape_mat" placeholder="Ingrese su Apellido materno" maxlength="50" required class="box">
            <p>Tu contrasena <span>*</span></p>
            <input type="password" name="pass" placeholder="enter your password" maxlength="20" required class="box">
            <p>Confirmar Contrasena <span>*</span></p>
            <input type="password" name="cpass" placeholder="confirm your password" maxlength="20" required class="box">
            <p>Selecionar Foto <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
         </div>
      </div>
      <p class="link">Ya eres uno de nuestros Docentes? <a href="login.php">Iniciar Sesion</a></p>
      <input type="submit" name="submit" value="Registrarse" class="btn">
   </form>

</section>

<!-- registro section fin -->












<script>

let darkMode = localStorage.getItem('dark-mode');
let body = document.body;

const enabelDarkMode = () =>{
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enabelDarkMode();
}else{
   disableDarkMode();
}

</script>
   
</body>
</html>