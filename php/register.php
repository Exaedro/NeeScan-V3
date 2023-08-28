<?php
    $nombre = $_POST['username'];
    $email = $_POST['email'];
    $contra = $_POST['password'];

    $db = new mysqli('localhost', 'root', '', 'neescan');
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    $r = $db -> query($sql);

    while($row = $r -> fetch_array()) {
        if($row['email'] == $email) {
            header('Location: ../register.html');
            return;
        }
        $sql = "INSERT INTO usuarios (nombreDeUsuario, contra, email) VALUES ('$nombre', '$contra', '$email')";
        $db -> query($sql);
        header('Location: ../index.html');
    }

    $r -> free_result();
    $db -> close();
?>