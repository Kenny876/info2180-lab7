<?php header('Content-Type: text/html; charset=ISO-8859-15');//needed to process strings with accents
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$country = $_GET['country'];
$all = $_GET['all'];
$stmt = $conn->query("SELECT * FROM countries");
$country_search = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
if($country == NULL && $all == false){
  echo 'NO VALID PARAMETERS';
}else if($all == true){
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo '<ul>';
  foreach ($results as $row) {
    echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
  }
  echo '</ul>';
}else{
  $results = $country_search->fetchAll(PDO::FETCH_ASSOC);
  echo '<ul>';
  foreach ($results as $row) {
    echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
  }
  echo '</ul>';
}