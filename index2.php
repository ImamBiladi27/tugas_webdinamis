<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<body>
<?Php 
include_once("connect2.php");
$books = mysqli_query($con, "SELECT buku.*, katalog.nama as nama_katalog,nama_penerbit,nama_pengarang FROM buku
                            LEFT JOIN katalog on katalog.id_katalog = buku.id_katalog
                            LEFT JOIN penerbit on penerbit.id_penerbit = buku.id_penerbit
                            LEFT JOIN pengarang on pengarang.id_pengarang = buku.id_pengarang ORDER BY judul ASC");
?>
    <div class="container">
    <div class="row" style="margin: 50px">
        <div class="col-md-2"></div>
        <div class="col-md-2">
        <a href ="index.php">Buku</a>
        </div>
       <div class="col-md-2 text-center">
        <a href ="katalog.php">Katalog</a>
        </div>
        <div class="col-md-2 text-center">
        <a href ="penerbit.php">Penerbit</a>
        </div>
        <div class="col-md-2 text-center">
        <a href ="pengarang.php">Pengarang</a>
        </div>
    </div>

    <div class="row">
    <div class="col-md-12">
    <a href="add.php" class="btn btn-primary">Add New Buku</a>
    </div>
    </div>
    
    <div class="row">
    <div class="col-md-12">
    <table class="table" border="2">
        <thead>
        <tr>
        <td class="text-center">ISBN</td>
        <td class="text-center">Judul</td>
        <td class="text-center">Tahun</td>
        <td class="text-center">Penerbit</td>
        <td class="text-center">Pengarang</td>
        <td class="text-center">Katalog</td>
        <td class="text-center">Stok</td>
        <td class="text-center">Harga Pinjam</td>
        <td class="text-center">Action</td>
        
        </tr>
        </thead>
        <tbody>
        <?php
            while($book = mysqli_fetch_array($books)){
                echo"
                <tr>
                <td><<img src="pic_trulli.jpg" alt="Italian Trulli">".$book['isbn']."</td>
                <td>".$book['judul']."</td>
                <td>".$book['tahun']."</td>
                <td>".$book['nama_penerbit']."</td>
                <td>".$book['nama_pengarang']."</td>
                <td>".$book['nama_katalog']."</td>
                <td>".$book['qty_stok']."</td>
                <td>".$book['harga_pinjam']."</td>
               <td class='text-center'>
               <a href='edit.php?isbn=".$book['isbn']."' class='btn btn-warning'>Edit</a>
               <a href='#' class='btn btn-danger' onclick='confirmation(`".$book['isbn']."`)'>Delete</a>
               
               </td>
            </tr> 
            ";
            }
        ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
</body>
</head>
</html>
<script type="text/javascript">
    function confirmation(isbn){
        if(confirm('Apakah anda yakin akan menghapus data buku ini ?')){
            window.location.href='delete.php?isbn='+isbn;
        }
    }
</script>