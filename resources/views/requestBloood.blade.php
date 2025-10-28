
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blood Bank / Blood Request Form</title>
    <style>
        .error { color: red; }
        form { max-width: 600px; margin: auto; }
        label { display: block; margin-top: 10px; }
        input, select, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 10px 20px; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Blood Bank / Blood Request Form</h2>

<?php
if (!empty($errors)) {
    echo "<div class='error'><ul>";
    foreach ($errors as $e) {
        echo "<li>" . htmlspecialchars($e) . "</li>";
    }
    echo "</ul></div>";
}
?>

<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="type">Requestor Type</label>
    <select id="type" name="type" required>
        <option value="">-- Select --</option>
        <option value="Individual"   <?= $type==="Individual"   ? "selected" : "" ?>>Individual</option>
        <option value="Hospital"     <?= $type==="Hospital"     ? "selected" : "" ?>>Hospital</option>
        <option value="NGO"          <?= $type==="NGO"          ? "selected" : "" ?>>NGO</option>
        <option value="Organisation" <?= $type==="Organisation" ? "selected" : "" ?>>Organisation</option>
        <option value="Research"     <?= $type==="Research"     ? "selected" : "" ?>>Research Purpose</option>
    </select>

    <label for="name">Name / Contact Person</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>

    <label for="organisation">Organisation / Hospital Name (if applicable)</label>
    <input type="text" id="organisation" name="organisation" value="<?= htmlspecialchars($organisation) ?>">

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

    <label for="bloodGroup">Blood Group Needed</label>
    <select id="bloodGroup" name="bloodGroup" required>
        <option value="">-- Select Blood Group --</option>
        <?php
        $groups = ["A+","A-","B+","B-","O+","O-","AB+","AB-"];
        foreach ($groups as $g) {
            $sel = ($bloodGroup === $g) ? "selected" : "";
            echo "<option value=\"$g\" $sel>$g</option>";
        }
        ?>
    </select>

    <label for="units">Number of Units Needed</label>
    <input type="number" id="units" name="units" min="1" value="<?= htmlspecialchars($units) ?>" required>

    <label for="message">Additional Message / Details</label>
    <textarea id="message" name="message" rows="4"><?= htmlspecialchars($message) ?></textarea>

    <button type="submit">Submit Request</button>
</form>

</body>
</html>
