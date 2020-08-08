<?php
$q = $_GET['q'];
$COUNT=1;
include './Connection.php';
$sql="SELECT * FROM `tbl_vehicle` WHERE `Company` LIKE '%$q%' or `Name` LIKE '%$q%' or `Model` LIKE '%$q%' or `Trans_Type_Id` LIKE '%$q%';";
$result = mysqli_query($con,$sql);

echo "<div style='overflow-x:auto;'>
        <table class='table' >
            <tr>
                <th>#</th>
                <th>Company</th>
                <th>Name</th>
                <th>Model</th>
                <th>Trans_Type_Id</th>
                <th>Cost_Per_KM</th>
                <th class='text-center'>Action</th>     
            </tr>";
while($row = mysqli_fetch_array($result)) 
{
        echo "<tr>";
        echo "<td>$COUNT</td>";   
        echo "<td>" . $row['Company'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Model'] . "</td>";
        echo "<td>" . $row['Trans_Type_Id'] . "</td>";
        echo "<td>" . $row['Cost_Per_KM'] . "</td>";
        echo "<td class='text-center'><a href='?fetch=" . $row['Vehicle_Id'] . "' class='faa-parent animated-hover' data-toggle='tooltip' data-placement='top' title='Fetch'><i class='fas fa-bolt faa-tada'></i></a></td>";
        echo "</tr>";
        $COUNT++;
}
echo    "</table>"
    . "<div>";
echo "<div class='badge-info badge-pill w-80'>Total: ".$con->affected_rows." Results found..</div>";
