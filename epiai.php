<?php
require_once 'koneck.php';
if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {
        case 'lol':
        $true = 'true';
        $succes ='Show data user succes';
        $codesc = '200';
      	//Membuat SQL Query
      	$sql = "SELECT * FROM users";
      	//Mendapatkan Hasil
      	$r = mysqli_query($conn,$sql);
      	//Membuat Array Kosong
      	$result = array();
      	while($row = mysqli_fetch_array($r)){
      		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat
      		array_push($result,array(
      			"ID"=>$row['ID'],
      			"USERNAME"=>$row['USERNAME'],
      			"PASSWORD"=>$row['PASSWORD'],
      			"LEVEL"=>$row['LEVEL'],
      			"FULLNAME"=>$row['FULLNAME']
      		));
      	}
      	//Menampilkan Array dalam Format JSON
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$succes,
          'code'=>$codesc
        ));
      }
    }else{
      $id = $_GET['ID'];
      $true = 'true';
      $succes ='Show data user succes';
      $codesc = '200';
      $coderr = '204';
      $error = 'Data User not Found';
      //Membuat SQL Query ditentukan secara spesifik sesuai ID
      $sql = "SELECT * FROM users WHERE id=$id;";
      //Mendapatkan Hasil
      $r = mysqli_query($conn,$sql);
      //Memasukkan Hasil Kedalam Array
      $result = array();
      $row = mysqli_fetch_array($r);
      	array_push($result,array(
          "ID"=>$row['ID'],
          "USERNAME"=>$row['USERNAME'],
          "PASSWORD"=>$row['PASSWORD'],
          "LEVEL"=>$row['LEVEL'],
          "FULLNAME"=>$row['FULLNAME']
        ));
      
      
      //Menampilkan dalam format JSON
      if ($id<10) {
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$succes,
          'code'=>$codesc
        ));
      }else{
        echo json_encode(array(
          'succes' => $true,
          'data'=>array(),
          'message'=>$error,
          'code'=>$coderr
        ));
      }
    }
 ?>