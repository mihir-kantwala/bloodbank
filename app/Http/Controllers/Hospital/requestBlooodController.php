<?php
require_once 'db.php';

$type = "";
$name = "";
$email = "";
$organisation = "";
$bloodGroup = "";
$units = "";
$message = "";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $type         = trim($_POST["type"] ?? "");
    $name         = trim($_POST["name"] ?? "");
    $email        = trim($_POST["email"] ?? "");
    $organisation = trim($_POST["organisation"] ?? "");
    $bloodGroup   = trim($_POST["bloodGroup"] ?? "");
    $units        = trim($_POST["units"] ?? "");
    $message      = trim($_POST["message"] ?? "");
    
    // Basic validation
    if (!$type) {
        $errors[] = "Please select requestor type.";
    }
    if (!$name) {
        $errors[] = "Name / Contact Person is required.";
    }
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }
    if (!$bloodGroup) {
        $errors[] = "Please select a blood group.";
    }
    if (!$units || !is_numeric($units) || intval($units) <= 0) {
        $errors[] = "Please enter a valid number of units.";
    }
    
    if (empty($errors)) {
        // Save to DB
        $sql = "INSERT INTO blood_requests 
                (requestor_type, contact_name, organisation_name, email, blood_group, units_needed, additional_message)
                VALUES
                (:type, :name, :org, :email, :bg, :units, :msg)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':type'  => $type,
            ':name'  => $name,
            ':org'   => $organisation,
            ':email' => $email,
            ':bg'    => $bloodGroup,
            ':units' => intval($units),
            ':msg'   => $message,
        ]);
        
        echo "<p>Thank you — your request has been submitted.</p>";
        // Optionally redirect or stop further form display
        exit;
    }
}
?>
