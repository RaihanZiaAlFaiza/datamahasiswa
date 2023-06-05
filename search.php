<?php

include 'connection.php';

$koneksi = getConnection();

$id = $_GET["nama"];

try{
    $statment = $koneksi->prepare("SELECT * FROM mahasiswa WHERE nama = :nama;");
    $statment ->bindParam(':nama', $id);
    $statment->execute();
    $statment->setFetchMode(PDO::FETCH_OBJ);
    $hasil = $statment->fetch();

    if ($hasil) {
        echo json_encode($hasil, JSON_PRETTY_PRINT);
    }else {
        http_response_code(404);
        $hasil["pesan"] = "Not Found";
        echo json_encode($hasil, JSON_PRETTY_PRINT);
    }

} catch (PDOException $e){
    echo $e;
}
