<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $konten = $_POST["konten"];

    // Koneksi ke database
    // $conn = mysqli_connect("localhost", "username", "password", "nama_database");
    include('db_connect.php');

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }

    // Query untuk menambahkan artikel ke database
    $query = "INSERT INTO artikel (judul, konten) VALUES ('$judul', '$konten')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
