<?php 

$konek = mysqli_connect("localhost","root","","loginmulti");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $valid = mysqli_query($konek, "SELECT * FROM data WHERE username='$username' and password='$password'");
    $cek = mysqli_num_rows($valid);

    if($cek>0){
        $datarole = mysqli_fetch_array($valid);
        $role = $datarole['role'];

        if($role=='admin'){
            $_SESSION['log'] = "logged";
            $_SESSION['role'] = "Admin";
            header('location:admin');
        }else{
            $_SESSION['log'] = "logged";
            $_SESSION['role'] = "User";
            header('location:user');
        }

    }else{
        header('location:gagal.php');
    }
};


?>