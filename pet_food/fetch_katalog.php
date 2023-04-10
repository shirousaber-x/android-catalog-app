<?php
include "myconnection.php";

$sql = "SELECT * FROM pet_food ORDER BY id_pet_food";
$movie = array();
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$temp = array();
		$temp['id_pet_food'] = $row['id_pet_food'];
		$temp['nama_pet_food'] = $row['nama_pet_food'];
		$temp['image'] = "http://192.168.1.111:81/pet_food/" . $row['image'];
        $temp['deskripsi'] = $row['deskripsi'];
        $temp['harga'] = $row['harga'];
		array_push($movie, $temp);
		// echo " id: " . $row["movie_id"] . $ " - Name: " . $row["movie_name"], " " . $row["movie_picture"];
	}
} else {
	echo "0 results";
}

// urai menjadi file JSONip
echo json_encode($movie, JSON_UNESCAPED_SLASHES, JSON_PRETTY_PRINT);
$conn->close();

//echo "Connected successfully";
?>