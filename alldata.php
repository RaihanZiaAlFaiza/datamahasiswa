<?php

include 'connection.php';

$koneksi = getConnection();

try {
    $statment = $koneksi->query("SELECT * FROM mahasiswa;");
    $statment->setFetchMode(PDO::FETCH_ASSOC);
    $result = $statment->fetchAll();


    echo json_encode($result, JSON_PRETTY_PRINT);

}  catch (PDOException $e){
    echo $e;
}