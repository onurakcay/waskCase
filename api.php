<?php include("connect.php");
if ($_POST) {
    if (isset($_FILES['file']['name'])) {
        /* Getting file name */
        $filename = $_FILES['file']['name'];
        /* Location */
        $location = "./upload/" . $filename;
        $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);

        /* Valid extensions */
        $valid_extensions = array("jpg", "jpeg", "png");

        $response = 0;
        /* Check file extension */
        if (in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                $response = $location;
            }
        }
        $name = $_POST['name'];
        $description = $_POST['description'];
        $message = $_POST['message'];
        $sql = "INSERT INTO ad (`name`,`description`,`message`,`image`) VALUES ('$name','$description','$message','$filename')";
        $result = mysqli_query($db, $sql);
        if ($result) {
            echo 1;
        } else {
            echo "Something happened. Please try again later";
        }
    } else {
        echo "Please select photo.";
    }
} else {
    $ad_array = array();
    $sqlGet = "SELECT * FROM ad";
    $resultGet = mysqli_query($db, $sqlGet);
    $satir = mysqli_num_rows($resultGet);
    if ($resultGet) {
        if ($satir == 0) {
        } else {
            while ($row = mysqli_fetch_array($resultGet)) {
                $ad_item = array(
                    'cevap' => '1',
                    'name' =>       $row['name'],
                    'description' =>       $row['description'],
                    'message' =>       $row['message'],
                    'image' =>     $row['image']
                );
                // Push to "data"
                array_push($ad_array, $ad_item);
            }
        }
    }

    echo json_encode(array("ads" => $ad_array));
}
