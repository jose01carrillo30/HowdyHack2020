<title>Get Captioned - YTCaptionCommunity</title>
<link rel="stylesheet" href="styles.css">
<h1>YTCaptionCommunity</h1>
<h2>Captioning that counts!</h2><br>

<ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="complete.html">Published Captions</a></li>
    <li><a href="contribute.html">Contribute</a></li>
    <li><a href="request.php" class="active">Get Captioned</a></li>
    <li style="float:right"><a href="login.php">Login</a></li>
</ul><br><br>

<body>
    <div style="padding-left: 50px; padding-right: 50px">
        <p>
            Need to have a video captioned? No problem! Just give us some basic information about the video
            and one of our contributors will gladly create captions for the video.
        </p><br><br>
    </div>
    <div style="padding-left: 50px; padding-right: 50px;">
        <form action="" method="POST" style="font-family: TitilliumReg; font-size: 20px;" >
            Video Name: <input type="text" name="vidname" style="margin-bottom: 10px" /><br>
            Link: <input type="text" name="vidlink" style="margin-bottom: 20px" /><br>
            <input type="Submit" name="submit" style="margin-bottom: 20px; font-family: TitilliumReg; font-size: 20px;" />
        </form>
    </div>
</body>

<?php
if (isset($_POST['submit'])) {
    if (!isset($_POST['vidname']) || !isset($_POST['vidlink']) || trim($_POST['vidname']) == '' || trim($_POST['vidlink']) == '') {
        ?>
        <div style="padding-left: 50px; padding-right: 50px">
            <p style="font-family: TitilliumBold;">
                ERROR! All fields are required and must be filled out!
            </p>
        </div>
        <?php
    } else {
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


        $operation = "INSERT INTO videoinfo_proto(vidname, vidlink, UUID) VALUES('$_POST[vidname]','$_POST[vidlink]',UUID())";
        if ($conn->query($operation) === TRUE) {
            ?>
            <div style="padding-left: 50px; padding-right: 50px">
                <p style="font-family: TitilliumBold;">
                    Caption request submitted successfully!
                </p>
            </div>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "CONTACT ADMINISTRATOR!";
        }

        $conn->close();
    }
}

?>