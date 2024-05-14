<?php
include "config.php";

$member_id = $_GET['id'];

$query = "SELECT * FROM members WHERE id = '$member_id'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: index.php");
    exit();
}

$member = mysqli_fetch_assoc($result);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $family_name = mysqli_real_escape_string($conn, $_POST['family_name']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $spouse_name = mysqli_real_escape_string($conn, $_POST['spouse_name']);
    $business_name = mysqli_real_escape_string($conn, $_POST['business_name']);
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $linkedin_id = mysqli_real_escape_string($conn, $_POST['linkedin_id']);
    $facebook_id = mysqli_real_escape_string($conn, $_POST['facebook_id']);
    $twitter_id = mysqli_real_escape_string($conn, $_POST['twitter_id']);
    $additional_info = mysqli_real_escape_string($conn, $_POST['additional_info']);



    $update_query = "UPDATE members SET first_name = '$first_name', last_name = '$last_name',
     family_name = '$family_name', date_of_birth = '$date_of_birth', gender = '$gender',
      spouse_name = '$spouse_name', business_name = '$business_name', job_title = '$job_title',
       mobile_number = '$mobile_number', email = '$email', linkedin_id = '$linkedin_id', facebook_id = '$facebook_id',
        twitter_id = '$twitter_id', additional_info = '$additional_info'  WHERE id = '$member_id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {

        header("Location: index.php");
        exit();
    } else {

        $error_message = "Failed to update member details. Please try again.";
    }
}

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
                <label for="father_name" class="form-label">Father Name</label>
                <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $member['father_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="mother_name" class="form-label">Mother Name</label>
                <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo $member['mother_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="family_name" class="form-label">Family Name</label>
                <input type="text" class="form-control" id="family_name" name="family_name" value="<?php echo $member['family_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $member['date_of_birth']; ?>">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $member['gender']; ?>">
            </div>

            <div class="mb-3">
                <label for="spouse_name" class="form-label">Spouse Name</label>
                <input type="text" class="form-control" id="spouse_name" name="spouse_name" value="<?php echo $member['spouse_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="business_name" class="form-label">Business Name</label>
                <input type="text" class="form-control" id="business_name" name="business_name" value="<?php echo $member['business_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo $member['job_title']; ?>">
            </div>
            <div class="mb-3">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="<?php echo $member['mobile_number']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $member['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="linkedin_id" class="form-label">Linkedin ID</label>
                <input type="text" class="form-control" id="linkedin_id" name="linkedin_id" value="<?php echo $member['linkedin_id']; ?>">
            </div>
            <div class="mb-3">
                <label for="facebook_id" class="form-label">Facebook ID</label>
                <input type="text" class="form-control" id="facebook_id" name="facebook_id" value="<?php echo $member['facebook_id']; ?>">
            </div>
            <div class="mb-3">
                <label for="twitter_id" class="form-label">Twitter ID</label>
                <input type="text" class="form-control" id="twitter_id" name="twitter_id" value="<?php echo $member['twitter_id']; ?>">
            </div>
            <div class="mb-3">
                <label for="additional_info" class="form-label">Additional Info</label>
                <input type="text" class="form-control" id="additional_info" name="additional_info" value="<?php echo $member['additional_info']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <?php include "footer.php";?>

