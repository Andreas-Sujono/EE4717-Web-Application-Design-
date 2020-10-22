<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = 'f32ee';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>JavaJam Coffee House</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div id="root">
        <header>
            <img 
                src="./headerImage.gif" 
                class="header-image"
            />
        </header>
        <main>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="music.html">Music</a></li>
                    <li><a href="jobs.html">Jobs</a></li>
                    <li class="active"><a href="salesReport.php">Daily Sales Report</a></li>
                </ul>
            </nav>
            <div class="right-column">
               <table class="report-table">
                   <tr>
                       <th>Menu</th>
                       <th>Price</th>
                       <th>Quantity</th>
                       <th>Subtotal</th>
                   </tr>
                   <?php 
                    $sql = "SELECT * FROM `Menu`";
                    $result = $conn->query($sql);
                    
                        $highest = 0;
                        $highest_name = '';
                        $total = 0;

                        while($row = $result->fetch_assoc()) {

                            $subtotal = $row["price"] * $row["quantity"];
                            $total = $total + $subtotal;
                            if($subtotal > $highest){
                                $highest = $subtotal;
                                $highest_name = $row["name"];
                            }

                            echo "<tr>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>$".$row["price"]."</td>";
                            echo "<td>".$row["quantity"]."</td>";
                            echo "<td>$".$subtotal."</td>";
                            echo "</tr>";
                        }

                        echo "<tr>";
                        echo "<td colspan='4' style='text-align:right'> Total = $".$total."</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td colspan='4' style='text-align:right'> Highest Sales = ".$highest_name."</td>";
                        echo "</tr>";
                    
                   ?>
                </table>
            </div>
        </main>

        <footer>
            <div class="footer-content">
                <i><small>
                    Copyright &copy; 2014 Javajam Coffee House <br/>
                    <a href="mailto:andreas@sujono.com">andreas@sujono.com</a>
                </small></i>
                
            </div>
        </footer>
    </div>
</body>

</html>
