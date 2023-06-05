<?php
include 'connection.php';
$conn = getConnection();

try{
    if ($_POST){
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $alamat = $_POST["alamat"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $agama = $_POST["agama"];
        $jurusan = $_POST["jurusan"];
        $universitas = $_POST["universitas"];
        $status = $_POST["status"];

        
         $statment = $conn->prepare("INSERT INTO `mahasiswa`(`nama`,`nim`,`alamat`,`jenis_kelamin`,`tanggal_lahir`, `agama`, `jurusan`, `universitas`, `status`) VALUES 
         (:nama,:nim,:alamat,:jenis_kelamin,:tanggal_lahir,:agama,:jurusan,:universitas,:status);");

         $statment->bindParam(':nama', $nama);
         $statment->bindParam(':nim', $nim);
         $statment->bindParam(':alamat', $alamat);
         $statment->bindParam(':jenis_kelamin', $jenis_kelamin);
         $statment->bindParam(':tanggal_lahir', $tanggal_lahir);
         $statment->bindParam(':agama', $agama);
         $statment->bindParam(':jurusan', $jurusan);
         $statment->bindParam(':universitas', $universitas);
         $statment->bindParam(':status', $status);

         $statment->execute();
         $respons["pesan"] = "Data berhasil dimasukkan";

         
        
       
    }
} catch (PDOException $e) {
    $respons["pesan"] = "Terjadi Kesalahan: " . $e->getMessage();   
}
echo json_encode($respons, JSON_PRETTY_PRINT);