<?php
    session_start();
    include("ayar.php");

    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb") {
        header("Location: cikis.php");
    }

    if ($_POST) {
        $aciklama = $_POST["aciklama"];
        $sorgu = $baglan->query("delete from hakkimizda");
        $sorgu = $baglan->query("insert into hakkimizda (aciklama) values ('$aciklama')");
        echo "<script> window.location.href='hakkimizda.php'; </script>";
    }

    $sorgu = $baglan->query("select * from hakkimizda");
    $satir = $sorgu->fetch_object();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yönetim Paneli Hakkımızda</title>
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

    <form action="" method="post">
        <b>İçerik:</b><br><br>
        <textarea style="width:80%;height:300px;" name="aciklama"><?php echo $satir->aciklama; ?></textarea><br><br>
        <button type="submit" value="kaydet" class="btn btn-success">KAYDET</button>
    </form>

    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>