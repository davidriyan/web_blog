<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Web Blog</h1>
        <a href="add_article.php" class="btn btn-primary my-3">Tambah Artikel</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Judul Artikel</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                // $conn = mysqli_connect("localhost", "username", "password", "database");
                include('db_connect.php');

                // Periksa koneksi
                if (!$conn) {
                    die("Koneksi Gagal: " . mysqli_connect_error());
                }

                // Query untuk mengambil daftar artikel
                $query = "SELECT * FROM artikel";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['judul'] . "</td>";
                        echo "<td>
                                <a href='read_article.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Baca</a>
                                <a href='edit_article.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete_article.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Tidak ada artikel.</td></tr>";
                }

                // Tutup koneksi database
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>