<?php
/*
http://127.0.0.1/leaflet/server/mbtiles.php?x=2223&y=2647&z=12
http://127.0.0.1/leaflet/server/mbtiles.php?x=2225&y=2647&z=12
127.0.0.1/leaflet/server/mbtiles.php?x=2225&y=2646&z=12
*/

$zoom = $_GET['z'];
$column = $_GET['x'];
$row = $_GET['y'];
  try
  {
    // Open the database
    $conn = new PDO("sqlite:control-room.mbtiles");

    // Query the tiles view and echo out the returned image
	$sql = "SELECT * FROM tiles WHERE zoom_level = $zoom AND tile_column = $column AND tile_row = $row";
	$q = $conn->prepare($sql);
	$q->execute();

	$q->bindColumn(1, $zoom_level);
	$q->bindColumn(2, $tile_column);
	$q->bindColumn(3, $tile_row);

	while($tile_data = $q->fetch())
	{
		header("Content-Type: image/png");
		header("Expires: Tue, 12 May 2015 08:08:05 GMT");

		echo $tile_data["tile_data"];
	}
  }
  catch(PDOException $e)
  {
    print 'Exception : '.$e->getMessage();
  }
?>
