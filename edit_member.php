<?php
include "config.php";

$member_id = $_GET['id'];

$query = "SELECT * FROM members WHERE id = '$member_id'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: index.php");
    exit();
}

// Fetch member details
$member = mysqli_fetch_assoc($result);

// Check if the logged-in user has permission to edit this member
// You can add your logic here to check user roles or permissions

// Handle form submission for updating member details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $family_name = mysqli_real_escape_string($conn, $_POST['family_name']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    // Add other fields as needed...

    // Update member details in the database
    $update_query = "UPDATE members SET first_name = '$first_name', last_name = '$last_name', family_name = '$family_name', date_of_birth = '$date_of_birth' WHERE id = '$member_id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Redirect to index page or show a success message
        header("Location: index.php");
        exit();
    } else {
        // Handle update error
        $error_message = "Failed to update member details. Please try again.";
    }
}

// Close database connection
mysqli_close($conn);
ob_flush()
?>
<?php include "header.php";?>
<div class="container-fluid pt-4 px-4">
        <h1>Edit Member</h1>
        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $member['first_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $member['last_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="family_name" class="form-label">Family Name</label>
                <input type="text" class="form-control" id="family_name" name="family_name" value="<?php echo $member['family_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $member['date_of_birth']; ?>">
            </div>
            <!-- Add other fields here -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <?php include "footer.php";?>

