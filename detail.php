<?php
session_start();

include "config.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if the user is logged in by verifying the user ID in the session
if (!isset($_SESSION['user_id'])) {
    echo "User is not logged in. Please log in first.";
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user details from the database
$sql = "SELECT * FROM members WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user_details = mysqli_fetch_assoc($result);
} else {
    echo "No user details found.";
    exit();
}

// Update user details if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $family_name = mysqli_real_escape_string($conn, $_POST['family_name']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $father_name = mysqli_real_escape_string($conn, $_POST['father_name']);
    $mother_name = mysqli_real_escape_string($conn, $_POST['mother_name']);
    $spouse_name = mysqli_real_escape_string($conn, $_POST['spouse_name']);
    $business_name = mysqli_real_escape_string($conn, $_POST['business_name']);
    $business_address = mysqli_real_escape_string($conn, $_POST['business_address']);
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $facebook_id = mysqli_real_escape_string($conn, $_POST['facebook_id']);
    $linkedin_id = mysqli_real_escape_string($conn, $_POST['linkedin_id']);
    $twitter_id = mysqli_real_escape_string($conn, $_POST['twitter_id']);
    $additional_info = mysqli_real_escape_string($conn, $_POST['additional_info']);

    $update_sql = "UPDATE members SET 
        first_name='$first_name', 
        last_name='$last_name', 
        family_name='$family_name', 
        date_of_birth='$date_of_birth', 
        gender='$gender', 
        father_name='$father_name', 
        mother_name='$mother_name', 
        spouse_name='$spouse_name', 
        business_name='$business_name', 
        business_address='$business_address', 
        job_title='$job_title', 
        mobile_number='$mobile_number', 
        email='$email', 
        facebook_id='$facebook_id', 
        linkedin_id='$linkedin_id', 
        twitter_id='$twitter_id', 
        additional_info='$additional_info' 
        WHERE user_id='$user_id'";

    if (mysqli_query($conn, $update_sql)) {
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Refresh the user details after update
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $user_details = mysqli_fetch_assoc($result);
    }
}

mysqli_close($conn);
?>

<?php include "header.php" ?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h2 class="mt-4">Manage Detail</h2>
                <form id="userDetailsForm" action="" method="POST">
                <div class="mb-3 text-end">
                        <button type="button" class="btn btn-primary" id="editButton" onclick="enableEditing()">Edit</button>
                        <button type="submit" class="btn btn-success" id="updateButton" style="display:none;">Update</button>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_details['first_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user_details['last_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="family_name" class="form-label">Family Name</label>
                        <input type="text" class="form-control" id="family_name" name="family_name" value="<?php echo $user_details['family_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $user_details['date_of_birth']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $user_details['gender']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="father_name" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $user_details['father_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="mother_name" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo $user_details['mother_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="spouse_name" class="form-label">Spouse's Name</label>
                        <input type="text" class="form-control" id="spouse_name" name="spouse_name" value="<?php echo $user_details['spouse_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="business_name" class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" value="<?php echo $user_details['business_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="business_address" class="form-label">Business Address</label>
                        <input type="text" class="form-control" id="business_address" name="business_address" value="<?php echo $user_details['business_address']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="job_title" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo $user_details['job_title']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number</label>
                        <input type="tel" class="form-control" id="mobile_number" name="mobile_number" value="<?php echo $user_details['mobile_number']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_details['email']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="facebook_id" class="form-label">Facebook ID</label>
                        <input type="text" class="form-control" id="facebook_id" name="facebook_id" value="<?php echo $user_details['facebook_id']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="linkedin_id" class="form-label">LinkedIn ID</label>
                        <input type="text" class="form-control" id="linkedin_id" name="linkedin_id" value="<?php echo $user_details['linkedin_id']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="twitter_id" class="form-label">Twitter ID</label>
                        <input type="text" class="form-control" id="twitter_id" name="twitter_id" value="<?php echo $user_details['twitter_id']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="additional_info" class="form-label">Additional Information</label>
                        <textarea class="form-control" id="additional_info" name="additional_info" rows="3" readonly><?php echo $user_details['additional_info']; ?></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function enableEditing() {
    const form = document.getElementById('userDetailsForm');
    const inputs = form.querySelectorAll('input, textarea');
    inputs.forEach(input => input.removeAttribute('readonly'));
    document.getElementById('editButton').style.display = 'none';
    document.getElementById('updateButton').style.display = 'inline-block';
}
</script>

<?php include "footer.php" ?>
