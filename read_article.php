<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Artikel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php
        if (isset($_GET['id'])) {
            $article_id = $_GET['id'];

            // Koneksi ke database
            // $conn = mysqli_connect("localhost", "username", "password", "nama_database");
            include('db_connect.php');

            // Periksa koneksi
            if (!$conn) {
                die("Koneksi Gagal: " . mysqli_connect_error());
            }

            // Query untuk mengambil artikel berdasarkan ID
            $query = "SELECT * FROM artikel WHERE id = $article_id";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "<h1>" . $row['judul'] . "</h1>";
                echo "<p>" . $row['konten'] . "</p>";
            } else {
                echo "Artikel tidak ditemukan.";
            }

            // Tutup koneksi database
            mysqli_close($conn);
        } else {
            echo "ID Artikel tidak valid.";
        }
        ?>
    </div>
</body>

</html>