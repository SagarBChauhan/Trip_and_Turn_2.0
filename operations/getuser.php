<?php
$q = $_GET['q'];
$t = $_GET['t'];

$COUNT=1;
include './Connection.php';
$sql="SELECT `User_Id`, `First_Name`, `Middle_Name`, `Last_Name`, `Gender`, `DOB`, `Address`,"
        . " (SELECT tbl_country.sortname FROM tbl_country WHERE tbl_country.Country_Id=tbl_user.`Country_Id`) as country,"
        . " (SELECT tbl_state.Name FROM tbl_state WHERE tbl_state.State_Id=tbl_user.`State_Id`) as state,"
        . " (SELECT tbl_city.Name FROM tbl_city WHERE tbl_city.City_Id=tbl_user.`City_Id`) as 'city',"
        . " `PIN_Code`, `Contact_No`, `Email`, (SELECT tbl_login.User_Name FROM tbl_login WHERE tbl_login.Login_id=tbl_user.`Login_id`) as 'username',"
        . " (SELECT tbl_login.Status FROM tbl_login WHERE tbl_login.Login_id=tbl_user.`Login_id`) as 'Status',"
        . " `Profile_Picture`, `Social`, `Registration_Date`, tbl_user.`Last_Update_Time`"
        . " FROM `tbl_user` INNER JOIN tbl_login ON tbl_user.Login_id=tbl_login.Login_id WHERE tbl_login.Type='$t' AND "
        . "(`First_Name` LIKE '%$q%' OR Middle_Name LIKE '%$q%' or Last_Name LIKE '%$q%')";
$result = mysqli_query($con,$sql);
echo "<div style='overflow-x:auto;'><table class='table' >
<tr>
<th>#</th>
<th>Picture</th>
<th colspan='3'>Name</th>
<th>Address</th>
<th>country</th>
<th>state</th>
<th>city</th>
<th>Contact_No</th>
<th>Email</th>
<th>username</th>
<th><i class='fas fa-toggle-on'></i></th>
<th>Action</th>     
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>$COUNT</td>";   
    echo "<td><a href='". $row['Profile_Picture'] . "' target='_blank'/><img class='zoom rounded-circle' src='". $row['Profile_Picture'] ."' width='30px'></a></i></td>";
    echo "<td>" . $row['First_Name'] . "</td>";
    echo "<td>" . $row['Middle_Name'] . "</td>";
    echo "<td>" . $row['Last_Name'] . "</td>";
    echo "<td>" . $row['Address'] . "</td>";
    echo "<td>" . $row['country'] . "</td>";
    echo "<td>" . $row['state'] . "</td>";
    echo "<td>" . $row['city'] . "-" . $row['PIN_Code'] . "</td>";
    echo "<td>" . $row['Contact_No'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    if ($row['Status']==1)
    {
        echo "<td><i class='text-success far fa-check-circle'  data-toggle='tooltip' data-placement='top' title='Active'></i></td>";
        
    }
    else{
        echo "<td><i class='text-danger far fa-times-circle' data-toggle='tooltip' data-placement='top' title='Deactived'></i></td>";
    }
    
    echo "<td><a href='?fetch=" . $row['User_Id'] . "' class='faa-parent animated-hover' data-toggle='tooltip' data-placement='top' title='Fetch'><i class='fas fa-bolt faa-tada'></i></a></td>";
    echo "</tr>";
    $COUNT++;
}
echo "</table><div>";
echo "<div class='badge-info badge-pill w-80'>Total: ".$con->affected_rows." Results found..</div>";

mysqli_close($con);
?>
<img src="" alt=""/>