<!DOCTYPE html>
<html>

<head>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>	
    <title>Weather App</title>
	<link rel="stylesheet" type="text/css" href="dipeshshrestha_2329534.css">
</head>

<body>
    <video autoplay loop muted plays-inline class="vid">
        <source src="video1.mp4" type="video/mp4">
    </video>
	<div class="container">
		<h1>Weather App</h1>

		<div class="weather">
				<p class="city"> <span id="city"></span></p>
				<p class="icon"> <span id="icon"></span></p>
            <p class="description">Description: <i><span id="description"></span></i></p>
			<p class="temp">Temperature: <i><span id="temp"></span></i></p>
			<p class="humidity">Humidity: <i><span id="humidity"></span></i></p>
			<p class="wind">Wind: <i><span id="wind"></span></i></p>
			<p class="timezone">Timezone: <i><span id="timezone"></span></i></p>
            <form method="post" action="web.php" >
                <input type="submit" value="Go to Index">
            </form>
		</div>
	</div>
    
	<script src="dipeshshrestha_2329534.js"></script>
    <?php
    // Connect to MySQL database
    $conn = mysqli_connect("localhost", "root", "", "isa");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve weather data from API
    $json_data = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=siddharthanagar&appid=076f57868b4c911300602e866ae2ea8b");
    $data = json_decode($json_data, true);

    // Extract relevant weather data
    $city = $data['name'];
    $temp = $data['main']['temp'] - 273.15;
    $humidity = $data['main']['humidity'];
    $wind_speed = $data['wind']['speed'];
    $pressure = $data['main']['pressure'];
    $description = $data['weather'][0]['description'];
    $timestamp = $data['dt'];
    $date = gmdate("Y-m-d H:i:s", $timestamp + $data['timezone']);

    // Insert weather data into MySQL database
    $sql = "INSERT INTO weather (city, temperature, humidity, pressure, description, wind_speed, datetime) VALUES ('$city', '$temp', '$humidity', '$pressure', '$description', '$wind_speed', '$date')";
    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close MySQL connection
    mysqli_close($conn);
    ?>
</body>

</html>