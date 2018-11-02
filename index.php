<html>
<head>
  <title>DATABASE</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container">
    <h2><center>DATA PESERTA</center>
    </h2>
    <table class="tabel" align="center">
  <tr>
    <th>Id</th>
    <th>Username</th>
    <th>Password</th>
    <th>Level</th>
    <th>Fullname</th>
    <th>Aksi</th>
  </tr></div>
  <?php
  
  include('koneck.php');

  $sql_tampil ="SELECT * FROM users";

  $peserta=mysqli_query($conn,$sql_tampil);



  while($baris_data=mysqli_fetch_array($peserta,MYSQLI_ASSOC)){
    ?>
    <tr>
      <td><?php echo $baris_data['ID']; ?></td>
      <td><?php echo $baris_data['USERNAME']; ?></td>
      <td><?php echo $baris_data['PASSWORD']; ?></td>
      <td><?php echo $baris_data['LEVEL']; ?></td>
      <td><?php echo $baris_data['FULLNAME']; ?></td>
      <td>

      <a href="edit.php?id=<?php echo $baris_data['ID']; ?>">Edit</a>
      <a href="delete.php?id=<?php echo $baris_data['ID']; ?>">Hapus</a>
      <a href="input.php">INPUT DATA</a>
      </td>
    </tr>
<?php } ?>
</body>
</html>
