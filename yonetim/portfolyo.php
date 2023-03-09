<?php
    session_start();
    include("ayar.php");

    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb") {
        header("Location: cikis.php");
    }

    $islem = $_GET["islem"];

    if ($islem == "sil") {
        $id = $_GET["id"];
        $sorgu = $baglan->query("delete from portfolyo where (id='$id')");
        echo "<script> window.location.href='portfolyo.php'; </script>";
    }

    if ($islem == "ekle") {
        $baslik = $_POST["baslik"];
        $resim = "img/".$_FILES["resim"]["name"]; //formlarla gönderilen dosyaların alımı files küresel değişkeni ile yapılır
        move_uploaded_file($_FILES["resim"]["tmp_name"], $resim);
        $sorgu = $baglan->query("insert into portfolyo (baslik,resim) values ('$baslik','$resim')");
        echo "<script> window.location.href='portfolyo.php'; </script>";
    }

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yönetim Paneli Portfolyo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="text-align:center;">

    <div style="text-align:center;">
            <!-- <a href="anasayfa.php">ANA SAYFA</a> - <a href="portfolyo.php">PORTFOLYO</a> - 
            <a href="hakkimizda.php">HAKKIMIZDA</a> - <a href="hizmetlerimiz.php">HİZMETLERİMİZ</a> - 
            <a href="projelerimiz.php">PROJELERİMİZ</a> - 
            <a href="cikis.php" onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin misiniz?')) 
            return false;">
            ÇIKIŞ</a>
            <br><hr><br><br> -->
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="anasayfa.php">Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="portfolyo.php">Portfolyo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hakkimizda.php">Hakkımızda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hizmetlerimiz.php">Hizmetlerimiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="projelerimiz.php">Projelerimiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cikis.php"  onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin misiniz?')) return false;">Çıkış</a>
                    </li>
                    </ul>
                </div>
            </nav>

        </div>

    <table class="table" width="100%" border="1">
        <thead>
            <tr align="center">
                <th>S. No</th>
                <th>Başlık</th>
                <th>Sil</th>
            </tr>
        </thead>
        <?php //her birini tablo şeklinde yansıtmak için
            $sirano = 0;
            $sorgu = $baglan->query("select * from portfolyo");
            while ($satir = $sorgu->fetch_object()) {
                $sirano++;
                echo "
                <tbody>
                <tr align='center'>
                <td>$sirano</td>
                <td>$satir->baslik</td>
                <td><a href='portfolyo.php?islem=sil&id=$satir->id'>Sil</td> 
                </tr>
                </tbody>";
            }
        ?>
    </table>

    <br><br>
        <div class="container">
        <form action="portfolyo.php?islem=ekle" enctype="multipart/form-data" method="post"> <!--Dsoya yükleyeceğimiz için enctype özelliğni yazdık ve ekleme işlemi yapacağını söyledik -->
        <b>Başlık:</b><input type="text" size="20" name="baslik"> 
        <b>Resim:</b><input type="file" name="resim">
        <button type="submit" value="kaydet" class="btn btn-success">KAYDET</button>
        </form>

        </div>
    


    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>