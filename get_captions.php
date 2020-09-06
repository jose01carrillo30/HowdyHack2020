<?php

// DO YOUR PROCESSING
// SAVE TO DATABASE OF SOMETHING
function save ($status) {
  // return false;
  return true;
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ytcaption";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "{}";
    die("Connection failed: " . $conn->connect_error);
}

$operation = "SELECT * FROM videoinfo_proto WHERE status = 'Requested'"; //TODO: take status
$result = mysqli_query($conn, $operation); // First parameter is just return of "mysqli_connect()" function
echo "{\"output\":[";
$outer_first_run = true;
while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    if (! $outer_first_run) {
        echo ",";
    }
    echo "[";
    $outer_first_run = false;
    $inner_first_run = true;
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
        if (! $inner_first_run) {
            echo ",";
        }
        $inner_first_run = false;
        echo "\"" . $value . "\""; // I just did not use "htmlspecialchars()" function. 
    }
    echo "]";
}
echo "]}";

$conn->close();

// function console_log($output, $with_script_tags = true) {
//     $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
// ');';
//     if ($with_script_tags) {
//         $js_code = '<script>' . $js_code . '</script>';
//     }
//     echo $js_code;
// }
// //console_log('HELLO!');

// header('Content-Type: application/json');
// define('__ROOT__', dirname(dirname(__FILE__)));
// require_once(__ROOT__.'constants.php');

// $aResult = array();

// if( !isset($_POST['status']) ) { $aResult['error'] = 'No status specified!'; }

// if( !isset($aResult['error']) ) {

    
//     // switch($_POST['status']) {
//     //     case 'add':
//     //         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
//     //             $aResult['error'] = 'Error in arguments!';
//     //         }
//     //         else {
//     //             $aResult['result'] = add(floatval($_POST['arguments'][0]), floatval($_POST['arguments'][1]));
//     //         }
//     //         break;

//     //     default:
//     //         $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
//     //         break;
//     // }

// }

// echo json_encode($aResult);

?>