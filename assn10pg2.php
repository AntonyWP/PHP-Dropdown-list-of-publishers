<?php
echo "<tr><th> Choose a publisher name, click submit and the page will display the titles of the books that publisher has.</th></tr>";
$host = "courses";
$user = "";
$password = "";
$db = "henrybooks";

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT * FROM Publisher";

echo '<form action="assn10pg2.php" method="post">';
echo 'Select Publisher Name ';
echo '<SELECT name="Publisher">';
foreach($conn->query($sql) as $row)
{
   echo '<option value = "';
   echo $row ["PublisherCode"];
   echo '">';
   echo $row ["PublisherName"];
   echo '</option>';

}
echo '</select>';
echo '<br><input type="submit" name="submit"  value="Submit"><br>';
echo '</form>';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $pub = $_POST['Publisher'];
   $sql = "SELECT distinct book.Title FROM  Book book, Publisher publishet WHERE book.PublisherCode = '$pub'";
   $row = $conn->query($sql);
   foreach($row as $r)
   {
      echo $r ['Title'];
   }
}
include "footer.html";
?>

