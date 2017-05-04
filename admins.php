<?php
ini_set('display_errors', '1');
include_once ('connection.php');
$connection = new mysqli($host,$username,$password,$database) or die("Couldn't connect to mysql");
$query = "select name, ip, group_bits from clients where group_bits>40";
$result = $connection->query($query);
$i=0;

/**
 * @param $ip
 * @return string
 */
function сFlag($ip){
    $code = geoip_country_code_by_name ($ip);
    $lcode = strtolower($code);
    return '<img src="flag/'.$lcode.'.svg" />';
}

echo'<table>
  <tbody>
    <tr>
      <th scope="col">#</th>
      <th scope="col"> </th>
      <th scope="col">Name</th>
      <th scope="col">Rights</th>
      <th scope="col">Country</th>
    </tr>';

while($row = mysqli_fetch_array($result))
{
    $i=$i+1;
    $flag='';
    echo '<tr>
    <th scope="row">'.$i.'</th>
    <td>'.$flag.'</td>
      <td>'.$row['name'].'</td>
      <td>'.$row['group_bits'].'</td>
      <td>'.geoip_country_name_by_name($row ['ip']).'</td>
  </tr>';
}
echo  '</tbody>
</table>';
?>

