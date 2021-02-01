<?php
    include"koneksi.php";
    $id = $_GET['no'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE no='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/web-uniska/data_mahasiswa.php'>";
?>