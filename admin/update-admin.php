<?php include('partials/menu.php') ?>
    <!-- main section starts -->
    <div class="main-content">
        <div class="wrapper">
        <h1>Update Admin</h1>
    <?php 
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if($result == TRUE){
            $count = mysqli_num_rows($result);
            if($count == 1){
            
                $row = mysqli_fetch_assoc($result);
                $full_name = $row['full_name'];
                $username = $row['username'];
                
            }
        }

    ?>


        <form action="" method="POST">

<table class="tbl-30">
    <tr>
        <td>Full Name: </td>
        <td>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
        </td>
    </tr>

    <tr>
        <td>Username: </td>
        <td>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
        </td>
    </tr>

</table>

</form>
<?php 

if(isset($_POST['submit'])){
     $id = $_POST['id'];
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];

     $sql = "UPDATE tbl_admin SET
     full_name = '$full_name',
     username = '$username' 
     WHERE id='$id'
     ";
   //Execute the Query
   $res = mysqli_query($conn, $sql);

   //Check whether the query executed successfully or not
   if($res==true)
   {
       //Query Executed and Admin Updated
       $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
       //Redirect to Manage Admin Page
       header('location:'.SITEURL.'admin/manage-admin.php');
   }
   else
   {
       //Failed to Update Admin
       $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
       //Redirect to Manage Admin Page
       header('location:'.SITEURL.'admin/manage-admin.php');
   }
}
?>

</div>
</div>
    <!-- main section ends -->
<?php include('partials/footer.php')?>