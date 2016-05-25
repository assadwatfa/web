<?php
/**
 * User: Hassan J.
 * Date: 5/20/16
 */

include('../config.php');
if (isset($_GET['data'])) {
    $data = $_GET['data'];
    if ($data === "all") {
        print " <table class=\"table table-striped table-hover\" style=\"background-color: white\" id=\"myTable\">
        <tr>
            <th>Address</th>
            <th>User e-mail</th>
            <th>Driver e-mail</th>
            <th>Status</th>
            <th>Date processing</th>
        </tr>";

        $sql0 = "SELECT * FROM project_requests ORDER BY date_added DESC LIMIT 10";
        $return_array0 = array();
        if ($result0 = mysqli_query($conn, $sql0)) {
            $rowcount0 = mysqli_num_rows($result0);
            if ($rowcount0 > 0) {
                while ($row = mysqli_fetch_array($result0, MYSQLI_ASSOC)) {
                    $return_array0[] = $row;
                }
            }

            foreach ($return_array0 as $row) {
                print "<tr>";
                print "<td>" . $row['address'] . "</td>";
                print "<td> Private </td>";
                print "<td> Not assigned </td>";
                print "<td> Requested </td>";
                print "<td>" . $row['date_added'] . "</td>";
                print "</tr>";
            }
        } else {
            print "Couldn't fetch data.<br/>";
        }

        $sql1 = "SELECT * FROM project_requests_processing ORDER BY date_processing DESC LIMIT 10";
        $return_array1 = array();
        if ($result1 = mysqli_query($conn, $sql1)) {
            $rowcount1 = mysqli_num_rows($result1);
            if ($rowcount1 > 0) {
                while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                    $return_array1[] = $row;
                }
            }

            foreach ($return_array1 as $row) {
                print "<tr>";
                print "<td>" . $row['address'] . "</td>";
                print "<td> Private </td>";
                print "<td>" . $row['driver_email'] . "</td>";
                print "<td> Processing </td>";
                print "<td>" . $row['date_processing'] . "</td>";
                print "</tr>";
            }
        } else {
            print "Couldn't fetch data.<br/>";
        }


        $sql2 = "SELECT * FROM project_requests_done ORDER BY date_done DESC LIMIT 10";
        $return_array2 = array();
        if ($result2 = mysqli_query($conn, $sql2)) {
            $rowcount2 = mysqli_num_rows($result2);
            if ($rowcount2 > 0) {
                while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                    $return_array2[] = $row;
                }
            }

            foreach ($return_array2 as $row) {
                print "<tr>";
                print "<td>" . $row['address'] . "</td>";
                print "<td> Private </td>";
                print "<td>" . $row['driver_email'] . "</td>";
                print "<td> Done </td>";
                print "<td>" . $row['date_done'] . "</td>";
                print "</tr>";
            }
        } else {
            print "Couldn't fetch data.<br/>";
        }
        print "</table>";
    }
} else {
    print "You do not have access to this section.<br/>";
}