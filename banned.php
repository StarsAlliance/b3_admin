<?php
include_once ('connection.php');
$connection = new mysqli($host,$username,$password,$database) or die("Couldn't connect to mysql");
$query = "select client_id, admin_id, reason, time_expire from penalties";
$result = $connection->query($query);
?>
<!doctype html>
<html>
<head>
<title>Banned users</title>
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div id="wrapper">
<label for="textfield">Banned user:</label>
<input type="text" name="textfield" id="textfield">
<button type="button" class="btn btn-primary">Filter</button>
    <h1>Banned users</h1>
<table class="table table-striped table-bordered">
    <caption>Banned users</caption>
    <tbody>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Banned by</th>
        <th scope="col">Reason</th>
        <th scope="col">Expired</th>
    </tr>
<?php
    while($row = mysqli_fetch_array($result))
    {

 echo '<tr>
    <th scope="row">'.$i.'</th>
      <td>'.$row['client_id'].'</td>
      <td>'.$row['admin_id'].'</td>
      <td>'.$row ['reason'].'</td>
  </tr>';
    }
?>
    </tbody>
</table>
</div>
</body>
</html>
