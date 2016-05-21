<?php
include('../config.php');
if (isset($_GET['data'])) {
    $data = $_GET['data'];
    if ($data === "all") {
        print " <table class=\"table table-striped table-hover\" style=\"background-color: white\" id=\"myTable\">
        <tr>
            <th>Address</th>
            <th>User e-mail</th>
            <th>Driver e-mail</th>
            <th>Date processing</th>
        </tr>";

        $sql = "SELECT * FROM project_requests_processing ORDER BY date_processing DESC LIMIT 20";
        $return_array = array();
        if ($result = mysqli_query($conn, $sql)) {
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $return_array[] = $row;
                }
            }

            foreach ($return_array as $row) {
                print "<tr>";
                print "<td>" . $row['address'] . "</td>";
                print "<td>" . $row['email'] . "</td>";
                print "<td>" . $row['driver_email'] . "</td>";
                print "<td>" . $row['date_processing'] . "</td>";
                print "</tr>";
            }

            print "</table>";

//            array_push($return_array, $rows);
//            echo json_encode($return_array);

//            print "<br/>";
//            print  var_dump($return_array);
        } else {
            print "Couldn't fetch data.<br/>";
        }
    }
} else {
    print "You do not have access to this section.<br/>";
}