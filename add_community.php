<?php 

include "header.php";

$role = $_SESSION['role'];
if($role == 0){
    echo "<script>setTimeout(()=>{ window.location.href = 'form.php';})</script>";
    die();
}

if(isset($_POST['save'])){

    $name = $_POST['community_name'];


    $sql = "INSERT INTO community(community_name)
    values ('$name')";

        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Form Submitted Successfully');</script>";
            echo"<script>setTimeout(()=>{ window.location.href = 'index.php'; })</script>";
        } else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
}
?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Community Form</h6>
                <form method="POST">
                    <div class="mb-3">
                        <label for="community_name" class="form-label">Community Name</label>
                        <input type="text" class="form-control" id="community_name" name="community_name" required placeholder="Enter Community Name">
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Add Community</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php";?>