<?php
session_start();

require('db_connect.php');

$id_user = $_SESSION['user']['id_user'];
$ngo_name = $_POST['ngo_name'] ? $_POST['ngo_name'] : $_SESSION['user']['ngo_name'];
$address = $_POST['address'] ? $_POST['address'] : $_SESSION['user']['address'];
$contact_person = $_POST['contact_person'] ? $_POST['contact_person'] : $_SESSION['user']['contact_person'];
$phone = $_POST['phone'] ? $_POST['phone'] : $_SESSION['user']['phone'];
$email = $_POST['email'] ? $_POST['email'] : $_SESSION['user']['email'];
$number_of_employees = $_POST['number_of_employees'] ? $_POST['number_of_employees'] : $_SESSION['user']['number_of_employees'];
$number_of_volunteers = $_POST['number_of_volunteers'] ? $_POST['number_of_volunteers'] : $_SESSION['user']['number_of_volunteers'];
$username = $_POST['username'] ? $_POST['username'] : $_SESSION['user']['username'];
$password = $_POST['password'] ? $_POST['password'] : $_SESSION['user']['password'];
$website = $_POST['website'] ? $_POST['website'] : $_SESSION['user']['website'];
$countries_of_operation = $_POST['countries_of_operation'] ? $_POST['countries_of_operation'] : $_SESSION['user']['countries_of_operation'];

$query = "update users set ngo_name=?, address=?, contact_person=?, phone=?, email=?, number_of_employees=?, number_of_volunteers=?,
                 username=?, password=?, website=?, countries_of_operation=? where id_user=?";

$stmt1 = $link->prepare($query);

$stmt1->bind_param('sssssssssssi', $ngo_name, $address, $contact_person, $phone, $email,
    $number_of_employees, $number_of_volunteers, $username, $password, $website, $countries_of_operation, $id_user);

$stmt1->execute();
$result = $link->query($query);

if ($stmt1->error) {
    echo "FAILURE!!! " . $stmt1->error;
    header("Location: Frontend_Edit_NGO_Details.php");
}

else $query1 = "SELECT * FROM users WHERE id_user = '$id_user'";
$queryResult =mysqli_query($link, $query1);
$row = mysqli_fetch_assoc($queryResult);
$_SESSION['user'] = $row; //$_SESSION['user']['NGO_name']

$stmt1->close();

$query2 = "update projects set project_ngo_name='$ngo_name' where id_user_f='$id_user'";

echo $query;
$result = $link->query($query);
$result2 = $link->query($query2);

if ($result2 === TRUE) {
    $query3 = "SELECT * FROM projects WHERE id_user_f = '$id_user'";
    $queryResult2 = mysqli_query($link,$query3);
    if ($queryResult2 == null) {
        echo "Error reconnecting to database";
        exit;
    }
}
header("Location: Frontend_Edit_NGO_Details.php");

?>