<?php
// Koneksi ke MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_diri_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$user = $_POST['username'];
$pass = $_POST['password'];

// Simpan data ke database
$sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
if ($conn->query($sql) === TRUE) {
    header("Location: produk.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
