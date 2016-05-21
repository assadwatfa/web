<?php
/**
 * User: Hassan J.
 * Date: 5/14/16
 */


//include('../config.php');


/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */
function get_gravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array())
{
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function getPermissions($email)
{

    global $conn;
    $sql = "SELECT * FROM project_users WHERE email= '$email'";

    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $permissions = $row['permissions'];

        if ($permissions == 1) {
            return 1;
        } else if ($permissions == 2) {
            return 2;
        } else if ($permissions == 3) {
            return 3;
        } else {

        }
    } else {
        return -1;
    }
}

function getTasksAtm($email)
{
    global $conn;
    $sql = "SELECT * FROM project_requests_processing WHERE driver_email= '$email'";

    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);
    return $rowcount;

}

function checkAvailability($email)
{

    global $conn;
    $sql = "SELECT * FROM project_users WHERE email= '$email'";

    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);

    $sql2 = "SELECT * FROM project_unverified_users WHERE email= '$email'";

    $result2 = mysqli_query($conn, $sql2);
    $rowcount2 = mysqli_num_rows($result2);

    if ($rowcount > 0) {
        return 1;
    } else if ($rowcount2 > 0) {
        return 2;
    } else {
        return -1;
    }
}
