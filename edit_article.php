<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Artikel</h1>
        <?php
        if (isset($_GET['id'])) {
            $article_id = $_GET['id'];

            // Koneksi ke database
            // Koneksi ke database
            // $conn = mysqli_connect("localhost", "username", "password", "nama_database");
            include('db_connect.php');

            // Tutup koneksi database
            mysqli_close($conn);
        } else {
            echo "ID Artikel tidak valid.";
        }
        ?>
        <form action="edit_article_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $article_id; ?>">
            <div class="form-group">
                <label for="judul">Judul Artikel:</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="konten">Konten Artikel:</label>
                <textarea class="form-control" id="konten" name="konten" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>