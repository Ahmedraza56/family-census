<?php
include "header.php";
include "config.php";

$role = $_SESSION['role'];
if($role == 0){
    echo "<script>setTimeout(()=>{ window.location.href = 'form.php';})</script>";
    die();
}

 ?>


<!-- Sale & Revenue Start -->
<!-- <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Users</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Members</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Sale & Revenue End -->

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Members</h6>
            <!-- <a href="">Show All</a> -->
        </div>
        <div class="table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Family Name</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Spouse Name</th>
                        <th>Business Name</th>
                        <th>Business Address</th>
                        <th>Job Title</th>
                        <th>Mobile Number</th>
                        <th>Email Address</th>
                        <th>LinkedIn ID</th>
                        <th>Facebook ID</th>
                        <th>Twitter ID</th>
                        <th>Additional Info</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // SQL query to fetch data from the members table
                    $sql = "SELECT `id`, `user_id`, `first_name`, `last_name`, `family_name`, `date_of_birth`, `gender`, `father_name`, `mother_name`, `spouse_name`, `business_name`, `business_address`, `job_title`, `mobile_number`, `email`, `facebook_id`, `linkedin_id`, `twitter_id`, `additional_info` FROM `members` WHERE 1";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['family_name'] . "</td>";
                            echo "<td>" . $row['father_name'] . "</td>";
                            echo "<td>" . $row['mother_name'] . "</td>";
                            echo "<td>" . $row['date_of_birth'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['spouse_name'] . "</td>";
                            echo "<td>" . $row['business_name'] . "</td>";
                            echo "<td>" . $row['business_address'] . "</td>";
                            echo "<td>" . $row['job_title'] . "</td>";
                            echo "<td>" . $row['mobile_number'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['linkedin_id'] . "</td>";
                            echo "<td>" . $row['facebook_id'] . "</td>";
                            echo "<td>" . $row['twitter_id'] . "</td>";
                            echo "<td>" . $row['additional_info'] . "</td>";
                            echo "<td>";
                            echo "<a href='edit_member.php?id=" . $row['id'] . "'><i class='fas fa-edit'></i></a> &nbsp;";
                            echo "<a href='delete_member.php?id=" . $row['id'] . "' class='ms-2'><i style='color:red;' class='fas fa-trash-alt'></i></a>";
                            echo "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "<tr><td colspan='16'>No records found</td></tr>";
                    }

                    // Free result set
                    mysqli_free_result($result);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Recent Sales End -->

<?php include "footer.php" ?>
