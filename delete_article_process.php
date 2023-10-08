<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article_id = $_POST["id"];

    // Koneksi ke database
    // $conn = mysqli_connect("localhost", "username", "password", "nama_database");
    include('db_connect.php');

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }

    // Query untuk menghapus artikel berdasarkan ID
    $query = "DELETE FROM artikel WHERE id = $article_id";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
