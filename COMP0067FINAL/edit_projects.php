<?php
session_start();

require('db_connect.php');
$stmt = $link->prepare("SELECT * FROM projects WHERE id_project = ?");
$stmt -> bind_param("i", $_GET['id_project']);
$stmt -> execute();
$result = $stmt->get_result(); // get the mysqli result
$project_data = $result->fetch_assoc(); // fetch data
$linker = 'Project_Card.php?id_project=' . $project_data['id_project'] .'';

$id_project = $_GET['id_project'];
$project_name = $_POST['project_name'] ? $_POST['project_name'] : $project_data['project_name'];
$project_sdg = $_POST['project_sdg'] ? $_POST['project_sdg'] : $project_data['project_sdg'];
$project_sector = $_POST['sector_id'] ? $_POST['sector_id'] : $project_data['id_sector_f'];
$project_keywords = $_POST['project_keywords'] ? $_POST['project_keywords'] : $project_data['project_keywords'];
$project_summary = $_POST['project_summary'] ? $_POST['project_summary'] : $project_data['project_summary'];
$project_description = $_POST['project_description'] ? $_POST['project_description'] : $project_data['project_description'];
$project_location = $_POST['project_location'] ? $_POST['project_location'] : $project_data['project_location'];
$project_budget = $_POST['project_budget'] ? $_POST['project_budget'] : $project_data['project_budget'];
$project_beneficiaries = $_POST['project_beneficiaries'] ? $_POST['project_beneficiaries'] : $project_data['project_beneficiaries'];
$project_contact_person = $_POST['project_contact_person'] ? $_POST['project_contact_person'] : $project_data['project_contact_person'];
$project_email = $_POST['project_email'] ? $_POST['project_email'] : $project_data['project_email'];
$project_phone = $_POST['project_phone'] ? $_POST['project_phone'] : $project_data['project_phone'];
$project_website = $_POST['project_website'] ? $_POST['project_website'] : $project_data['project_website'];
$project_timeline = $_POST['project_timeline'] ? $_POST['project_timeline'] : $project_data['project_timeline'];

$sql = "update projects set project_name=?, project_sdg=?, id_sector_f=?, project_keywords=?, project_summary=?,
        project_description=?, project_location=?, project_budget=?, project_beneficiaries=?, project_contact_person=?,
        project_email=?, project_phone=?, project_website=?, project_timeline=? where id_project=?";

$stmt1 = $link->prepare($sql);

$stmt1->bind_param('siisssssssssssi', $project_name, $project_sdg, $project_sector, $project_keywords, $project_summary,
    $project_description, $project_location, $project_budget, $project_beneficiaries, $project_contact_person, $project_email,
    $project_phone, $project_website, $project_timeline, $id_project);

$stmt1->execute();
if ($stmt1->error) {
    echo "FAILURE!!! " . $stmt1->error;
}

else header("Location: $linker");
$stmt1->close();

?>