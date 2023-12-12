<?php

use Master\staffkesra;
use Master\penerimahibah;
use Master\bupati;
use Master\Menu;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$staffkesra = new staffkesra($dataKoneksi);
$penerimahibah = new penerimahibah($dataKoneksi);
$bupati = new bupati($dataKoneksi);
//$staffkesra ->tambah()
$target = @$_GET['target'];
$act = @$_GET['act']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">CRUD OOP</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['link']; ?>" class="nav-link">
                                    <?php echo $r['text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>

            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat Datang di Beranda";
                //====start content staffkesra====
            } elseif ($target == "staffkesra") {
                if ($act == "tambah_staffkesra") {
                    echo $staffkesra->tambah();
                } elseif ($act == "simpan_staffkesra") {
                    if ($staffkesra->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=staffkesra'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=staffkesra'
                        </script>";
                    }
                } elseif ($act == "edit_staffkesra") {
                    $id = $_GET['id'];
                    echo $staffkesra->edit($id);
                } elseif ($act == "update_staffkesra") {
                    if ($staffkesra->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=staffkesra'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=staffkesra'
                        </script>";
                    }
                } elseif ($act == "delete_staffkesra") {
                    $id = $_GET['id'];
                    if ($staffkesra->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=staffkesra'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=staffkesra'
                        </script>";
                    }
                } else {
                    echo $staffkesra->index();
                }
                //====And Content staffkesra====
            } elseif ($target == "penerimahibah") {
                if ($act == "tambah_penerimahibah") {
                    echo $penerimahibah->tambah();
                } elseif ($act == "simpan_penerimahibah") {
                    if ($penerimahibah->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=penerimahibah'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=penerimahibah'
                        </script>";
                    }
                } elseif ($act == "edit_penerimahibah") {
                    $id = $_GET['id'];
                    echo $penerimahibah->edit($id);
                } elseif ($act == "update_penerimahibah") {
                    if ($penerimahibah->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=penerimahibah'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=penerimahibah'
                        </script>";
                    }
                } elseif ($act == "delete_penerimahibah") {
                    $id = $_GET['id'];
                    if ($penerimahibah->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=penerimahibah'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=penerimahibah'
                        </script>";
                    }
                } else {
                    echo $penerimahibah->index();
                }
            } elseif ($target == "bupati") {
                if ($act == "tambah_bupati") {
                    echo $bupati->tambah();
                } elseif ($act == "simpan_bupati") {
                    if ($bupati->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=bupati'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=bupati'
                        </script>";
                    }
                } elseif ($act == "edit_bupati") {
                    $id = $_GET['id'];
                    echo $bupati->edit($id);
                } elseif ($act == "update_bupati") {
                    if ($bupati->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=bupati'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=bupati'
                        </script>";
                    }
                } elseif ($act == "delete_bupati") {
                    $id = $_GET['id'];
                    if ($bupati->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=bupati'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=bupati'
                        </script>";
                    }
                } else {
                    echo $bupati->index();
                }
            } else {
                echo "Page 404 Not found";
            }
            ?>
        </div>
    </div>
</body>

</html>