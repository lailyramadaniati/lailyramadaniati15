<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
</body>
    <style type="text/css">
        body{
  padding:20px 20px;
}

.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}
    </style>
    
    <div class="container col-md-11">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Tabel Data Mahasiswa
            </div>
            <div class="card-body">
            <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand"></a>
           <div class="form-group pull-right">
                    <input type="text" class="search form-control" placeholder="Cari data...">
            </div>
            </nav>
                <a href="index.php" class="btn btn-primary">Tambah Data</a>
                <table class="table table-hover table-bordered results">
                     <thead>
                    <tr>
                        <th>NO</th>
                        <th>NPM</th>
                        <th>NAMA</th>
                        <th>TEMPAT LAHIR</th>
                        <th>TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>KODEPOS</th>
                        <th>AKSI</th>
                    </tr>
                    <?php
                        include "koneksi.php";
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                        while($data=mysqli_fetch_array($tampil))
                        {
                    ?>
                    </thead>
                    <tbody>
                    <tr>
                        <td> <?php echo $no++; ?> </td>
                        <td> <?php echo $data['npm']; ?> </td>
                        <td> <?php echo $data['nama']; ?> </td>
                        <td> <?php echo $data['tempatlahir']; ?> </td>
                        <td> <?php echo $data['tanggallahir']; ?> </td>
                        <td> <?php echo $data['jeniskelamin']; ?> </td>
                        <td> <?php echo $data['alamat']; ?> </td>
                        <td> <?php echo $data['kodepos']; ?> </td>
                        <td>
                            <a href="edit_mahasiswa.php?no=<?php echo $data['no']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?no=<?php echo $data['no']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>

                        <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
          });
});
    </script>


</body>
</html>