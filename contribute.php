<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ytcaption";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "CONTACT ADMINISTRATOR!";
    die("Connection failed: " . $conn->connect_error);
}
?>

<title>Contribute - YTCaptionCommunity</title>
<link rel="stylesheet" href="styles.css">
<h1>YTCaptionCommunity</h1>
<h2>Captioning that counts!</h2><br>

<ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="complete.html">Published Captions</a></li>
    <li><a href="contribute.php" class="active">Contribute</a></li>
    <li><a href="request.php">Get Captioned</a></li>
    <li style="float:right"><a href="login.php">Login</a></li>
</ul><br><br>

<body>
    <div style="padding-left: 50px; padding-right: 50px">
        <p>
            The following is a list of all the videos that have been submitted that need captions. If you'd
            like to contribute, upload a .srt file with the video captions. Take a look!
        </p><br><br>
    </div>
    <div style="padding-left: 50px; padding-right: 50px;">
        <p>
            <?php
            
            $operation = "SELECT * FROM videoinfo_proto WHERE status = 'Requested'";
            $result = mysqli_query($conn, $operation); // First parameter is just return of "mysqli_connect()" function
            echo "<br>";
            echo "<table border='1'>";
            while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                echo "<tr>";
                foreach ($row as $field => $value) { // I you want you can write this line like this: foreach($row as $value) {
                    echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </p>
    </div>
</body>

<?php

$conn->close();

?>