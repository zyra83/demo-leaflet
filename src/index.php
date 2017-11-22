<!DOCTYPE html>
<html>
	<head>
		<title>test</title>
		<link rel="stylesheet" href="leaflet.css" />
		<style>
			body {
				height: 100%;
				width: 100%;
				position: absolute;
				background: rgb(255, 0, 0);
				margin: 0;
			}
			#map { height: 100%; width: 100%; }
		</style>
	</head>
	<body>
		<div id="map"></div>
		
		<script src="leaflet.js"></script>
		<script>
			var map = L.map("map").setView([43.983333, -0.633333],7)
			L.tileLayer('server/mbtiles.php?x={x}&y={y}&z={z}',
			{
					attribution: "Données TECOPS, fond OSM",
					minZoom: 1,
					maxZoom: 7,
					tms: true,
					reuseTiles: false,
					noWrap: true
				}
			).addTo(map);
			var marker = L.marker([43.983333, -0.633333]);
			marker.bindPopup("coucou").openPopup();
			marker.addTo(map);
		</script>
	</body>
</html>
