<?php
    if(isset($_POST['create'])){
        $firstname = $_POST['FirstName'];
        $mail = $_POST['E-mail'];
        $password = $_POST['Password'];
        $contact = $_POST['ContactNumber'];

        $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`) VALUES (NULL, '$firstname', '$mail', '$password', '$contact')";
        $res = mysqli_query($conn, $sql);
    }
?>