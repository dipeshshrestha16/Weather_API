<?php
    //create the connection
    $conn = mysqli_connect("localhost","root","","isa");
    
    //query
    $sql = "SELECT * FROM weather";
    
    //run the query
    $result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather Data</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Weather Data</h1>
    <table>
        <tr>
            <th>City</th>
            <th>Temperature</th>
            <th>Humidity</th>
            <th>Pressure</th>
            <th>Description</th>
            <th>Windspeed</th>
            <th>Datetime</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['temperature']; ?></td>
            <td><?php echo $row['humidity']; ?></td>
            <td><?php echo $row['pressure']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['wind_speed']; ?></td>
            <td><?php echo $row['datetime']; ?></td>
        </tr>
        <?php } ?>

        <style>
            table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}
body{
    background: linear-gradient(135deg, #00e5fed0, #548a67d0);
}

th, td {
  padding: 8px;
  text-align: center;
  border: 1px solid #ddd;
}

th {
  background-color: #4CAF50;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}


        </style>
    </table>
</body>
</html>