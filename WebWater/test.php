<?php
require("qs_connection.php");
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Memilih semua baris pada tabel marker
$query = "SELECT * FROM lokasi WHERE 1";
$result = mysql_query($query);
if (!$result) {
 die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Memulai XML dengan mencetak parent marker
echo '<markers>';

// Melakukan pengulangan untuk setiap node dibawah parent marker
while ($row = @mysql_fetch_assoc($result)){
 // Menambahkan kedalam XML
 
 echo '<marker ';
 echo 'name="' . parseToXML($row['nama']) . '" ';
 echo 'address="' . parseToXML($row['alamat']) . '" ';
 echo 'lat="' . $row['latitude'] . '" ';
 echo 'lng="' . $row['longitude'] . '" ';
 echo 'type="' . $row['status'] . '" ';
 echo '/>';
 
 /*
 echo '<marker ';
 echo 'name="' . parseToXML($row['name']) . '" ';
 echo 'address="' . parseToXML($row['address']) . '" ';
 echo 'lat="' . $row['latitude'] . '" ';
 echo 'lng="' . $row['longitude'] . '" ';
 echo 'type="' . $row['type'] . '" ';
 echo '/>';
 */
}

// End XML
echo '</markers>';

?>