<?php
session_start();
require_once("../koneksi/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input (misalnya, pastikan username dan password tidak kosong)
    if (empty($username) || empty($password)) {
        echo '<div class="alert alert-danger">Username dan Password tidak boleh kosong.</div>';
        exit();
    }

    // Gunakan prepared statement untuk menghindari SQL Injection
    $query = $conn->prepare("SELECT * FROM admin WHERE username = :username");
    $query->bindParam(":username", $username); // Mengikat parameter (menghindari SQL Injection)
    $query->execute();

    // Fetch the result
    $result = $query->fetch();

    if ($result === false) {
        // Jika username tidak ditemukan
        header('Location: login.php?error=Username atau Password salah');
        exit();
    } else {
        if ($password == $result['password']) {
            // Jika password valid, set session untuk login admin
            $_SESSION['idadmin'] = $result['id_admin']; // Menyimpan ID admin dalam session

            // Redirect ke dashboard admin
            header("Location: dashboard.php");
            exit();
        } else {
            // Jika password salah
            header('Location: login.php?error=Username atau Password salah');
            exit();
        }
    }
}

$query->closeCursor();
$conn = null;
