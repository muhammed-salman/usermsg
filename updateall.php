<?php
/*
This Work is Licensed under a Creative Commons Attribution-NonCommercial 4.0 International License.
You are free to:
Share — copy and redistribute the material in any medium or format
Adapt — remix, transform, and build upon the material
The licensor cannot revoke these freedoms as long as you follow the license terms.
Under the following terms:
Attribution — You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
NonCommercial — You may not use the material for commercial purposes.
No additional restrictions — You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.

Notices:
You do not have to comply with the license for elements of the material in the public domain or where your use is permitted by an applicable exception or limitation.
No warranties are given. The license may not give you all of the permissions necessary for your intended use. For example, other rights such as publicity, privacy, or moral rights may limit how you use the material.

Author: Muhammed Salman Shamsi

Created on: Jun 22, 2017
*/
?>
<html>
    <head>
        <?php require_once 'header.php' ?>
        <title>User Messenger: Update Others' Profile</title>
    </head>
    <body>
        <?php require_once 'navigationbar.php'?>
        <div class="container">
<?php if($loggedin){ 
        if($_SESSION[role]==1 || $_SESSION[role]==2){    
                      $result=  queryMysql("Select userid from UserProfile order by userid");    
?>
            <h2 class="text-center">Update Others' Profile</h2>
            
<?php
if(mysqli_num_rows($result)>0){
    echo '<form role="form" method="post" action="updateprofile.php">
                <fieldset class="form-group">
                    <label for="user">Select User</label>
                    <select class="form-control" id="user" name="user" required>';
    echo "<option value=''>------</option>";
    while($row=mysqli_fetch_array($result)){
            echo "<option value='".$row['userid']."'>".$row['userid']."</option>";    
    }
 
            echo    ' </select>
                    <br>
                    <button type="submit" class="btn btn-primary col-lg-3 col-md-4 col-sm-10">Go</button>    
            </form>'; 
}
else{
    echo '<div class="message alert alert-info col-lg-12 col-md-12 col-sm-12">No Users\' Profiles Found.</div>';
}
}
else{
       echo '<div class="alert alert-danger">Access Denied! You are not authorized to view this section.</div>';
       header("Refresh: 2; url=index.php");
}
}
else{ 
    echo '<div class="alert alert-danger">Please LogIn to use System</div>';
    header("Refresh: 2; url=login.php");
}            
    echo '<br><br>';
require_once 'footer.php';
