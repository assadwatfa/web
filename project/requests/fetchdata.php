<?php
include('../config.php');
if (isset($_GET['data'])) {
    $data = $_GET['data'];
    if ($data === "all") {
        $sql = "SELECT * FROM project_requests_processing ORDER BY date_processing DESC";
        $return_array = array();
        if ($result = mysqli_query($conn, $sql)) {
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $return_array[] = $row;
                }
            }

//            array_push($return_array, $rows);
            echo json_encode($return_array);

//            print "<br/>";
//            print  var_dump($return_array);
        } else {
            print "Couldn't fetch data.<br/>";
        }
    }
} else {
    print "You do not have access to this section.<br/>";
}