<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $family_name = mysqli_real_escape_string($conn, $_POST['community']);
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
    // $community = mysqli_real_escape_string($conn, $_POST['community']);

    session_start();
    $user_id = $_SESSION['user_id'];
    // SQL query to insert data into the members table
    $sql = "INSERT INTO members(user_id,first_name, last_name, family_name, date_of_birth, gender, father_name, mother_name, spouse_name, business_name, business_address, job_title, mobile_number, email, facebook_id, linkedin_id, twitter_id, additional_info) 
            VALUES ('$user_id','$first_name', '$last_name', '$family_name', '$date_of_birth', '$gender', '$father_name', '$mother_name', '$spouse_name', '$business_name', '$business_address', '$job_title', '$mobile_number', '$email', '$facebook_id', '$linkedin_id', '$twitter_id', '$additional_info')";


    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Form Submitted Successfully');</script>";
        header("Location: index.php");
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    exit(); 
}
?>

<?php include "header.php" ?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">User Registration Form</h6>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="family_name" class="form-label">Family Name</label>
                        <input type="text" class="form-control" id="family_name" name="family_name">
                    </div> -->
                    <div class="mb-3">
                        <label for="community" class="form-label">Community Name</label>
                        <select class="form-select" id="community" name="community" required>
                            <?php
                            $sql = "SELECT community_name FROM community";
                            $result = mysqli_query($conn, $sql);
                            
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $community_name = $row['community_name'];
                                    echo "<option value='$community_name'>$community_name</option>";
                                }
                            } else {
                                echo "<option value='' disabled>No communities found</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="father_name" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name">
                    </div>
                    <div class="mb-3">
                        <label for="mother_name" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name">
                    </div>
                    <div class="mb-3">
                        <label for="spouse_name" class="form-label">Spouse's Name</label>
                        <input type="text" class="form-control" id="spouse_name" name="spouse_name">
                    </div>
                    <div class="mb-3">
                        <label for="business_name" class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="business_name" name="business_name">
                    </div>
                    <div class="mb-3">
                        <label for="business_address" class="form-label">Business Address</label>
                        <input type="text" class="form-control" id="business_address" name="business_address">
                    </div>
                    <div class="mb-3">
                        <label for="job_title" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="job_title" name="job_title">
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number</label>
                        <input type="tel" class="form-control" id="mobile_number" name="mobile_number">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="facebook_id" class="form-label">Facebook ID</label>
                        <input type="text" class="form-control" id="facebook_id" name="facebook_id">
                    </div>
                    <div class="mb-3">
                        <label for="linkedin_id" class="form-label">LinkedIn ID</label>
                        <input type="text" class="form-control" id="linkedin_id" name="linkedin_id">
                    </div>
                    <div class="mb-3">
                        <label for="twitter_id" class="form-label">Twitter ID</label>
                        <input type="text" class="form-control" id="twitter_id" name="twitter_id">
                    </div>
                    <div class="mb-3">
                        <label for="additional_info" class="form-label">Additional Information</label>
                        <textarea class="form-control" id="additional_info" name="additional_info" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>