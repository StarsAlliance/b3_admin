<?php
include_once ('connection.php');
$connection = new mysqli($host,$username,$password,$database) or die("Couldn't connect to mysql");
$query = "select name, ip, group_bits from clients where group_bits>40";
$result = $connection->query($query);
$i=0;

/**
 * @param $ip
 * @return string
 */
function сFlag($ip)
{
    $code = geoip_country_code_by_name ($ip);
    $lcode = strtolower($code);
    return '<img src="flag/'.$lcode.'.svg" />';
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administrators</title>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" rel="stylesheet" type="text/css" />
</head>
<table class="table table-striped table-bordered">
    <caption>Administrators</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Rights</th>
      <th scope="col">Country</th>
    </tr>
  </thead>
    <tbody>
<?php
while($row = mysqli_fetch_array($result))
{
    $i=$i+1;
    $flag='';
    echo '<tr>
    <th scope="row">'.$i.'</th>
      <td>'.$row['name'].'</td>
      <td>'.$row['group_bits'].'</td>
      <td>'.geoip_country_name_by_name($row ['ip']).'</td>
  </tr>';
}
?>
    </tbody>
</table>
</html>