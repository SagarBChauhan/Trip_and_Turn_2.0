<style>
.hover-controls {
    display: none;
}  
.hover-body:hover .hover-controls {
    display: block;
}  
.hover-body:hover .hover-controls {
background-color: rgba(0,0,0,0.2);
}  
</style>
<?php
$q = $_GET['q'];
//$c = $_GET['c'];
$vp=0;
if(isset($_GET['vp']))
{
    $vp = $_GET['vp'];
}
$COUNT=1;
include './Connection.php';
$sql="SELECT `Place_Id`, `Name`, `Type`, `Description`, `Pictures`,(SELECT tbl_city.Name FROM tbl_city WHERE tbl_city.City_Id=tbl_place.City_Id) AS City  FROM `tbl_place` WHERE `Name` LIKE '%$q%';";
//$sql="SELECT `Place_Id`, `Name`, `Type`, `Description`, `Pictures`,(SELECT tbl_city.Name FROM tbl_city WHERE tbl_city.City_Id=tbl_place.City_Id) AS City  FROM `tbl_place` WHERE `Name` LIKE '%$q%' OR (SELECT tbl_city.Name FROM tbl_city WHERE tbl_city.City_Id=tbl_place.City_Id) LIKE '%$c%';";
$result = mysqli_query($con,$sql);

if(isset($_GET['t']))
{
    echo "<div style='overflow-x:auto;'><table class='table' >
    <tr>
    <th>#</th>
    <th>Picture</th>
    <th>Name</th>
    <th>Type</th>
    <th>Description</th>
    <th>City</th>
    <th>Action</th>     
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>$COUNT</td>";   
        echo "<td><a href='Trip_and_Turn_2.0/". $row['Pictures'] . "' target='_blank'/><img class='zoom' src='Trip_and_Turn_2.0/". $row['Pictures'] ."' width='30px' height='30px' style='object-fit:cover;'></a></i></td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>";
        $s = substr($row['Description'], 0, 100);
        $resul = substr($s, 0, strrpos($s, ' '));
        if(strlen($row['Description'])>100){echo $resul.'...';}else{echo $row['Description'];} 
        echo "<td>" . $row['City'] . "</td>";    
        echo "<td><a href='Update_Place.php?fetch=" . $row['Place_Id'] . "' class='faa-parent animated-hover' data-toggle='tooltip' data-placement='top' title='Fetch'><i class='fas fa-bolt faa-tada'></i></a></td>";
        echo "</tr>";
        $COUNT++;
    }
    echo "</table><div>";
    echo "<div class='badge-info badge-pill w-80'>Total: ".$con->affected_rows." Results found..</div>";
}
else
{echo '<div class="row">';
    while($row = mysqli_fetch_array($result)) {   
        echo'<div class="card ml-3 hover-body faa-vertical animated-hover shadow" style="width:17.6rem; height:21rem;margin-top: 10px;
    margin-bottom: 10px;">
                <img class="card-img-top" src="Trip_and_Turn_2.0/'. $row['Pictures'] .'" alt="Card image cap" style="height: 10rem; object-fit: cover;">
                <div class="card-body">
                  <h6 class="card-text  text-capitalize"><i class="fas fa-map-marker-alt"></i> ' . $row['Name'] .' <span class="text-gray">('. $row['Type'] .')</span></h6>
                  <h6 class="card-text  text-capitalize"><i class="fas fa-compass"></i> City: <span class=" font-weight-normal">'. $row['City'] .'</span></h6>
                  <p class="card-text">';
        $s = substr($row['Description'], 0, 100);
        $resul = substr($s, 0, strrpos($s, ' '));
        if(strlen($row['Description'])>100){echo $resul.'...';}else{echo $row['Description'];} 
        echo '</p></div>
                <div class="card-img-overlay hover-controls " style="padding-top: 115px;">
                  <div class="footer justify-content-center">';
        if($vp==1)
        {
            echo '  <a href="Update_Place.php?fetch=' . $row['Place_Id'] .'" target="_blank" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
                        <i class="material-icons">mode_edit</i>
                    </a>
                    <a class="btn btn-danger btn-just-icon btn-fill btn-round text-white trash" id="'.$row['Place_Id'].'">
                        <i class="material-icons">delete</i>
                    </a>';
        }
        else {
            echo '<a href="#pablo" class="btn btn-info btn-just-icon btn-fill btn-round" data-toggle="modal" data-target="#previewModel' . $row['Place_Id'] .'">
                        <i class="material-icons">subject</i>
                    </a>
                    <a href="?fetch=' . $row['Place_Id'] .'" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
                        <i class="material-icons">mode_edit</i>
                    </a>
                    <a class="btn btn-danger btn-just-icon btn-fill btn-round text-white trash" id="'.$row['Place_Id'].'">
                        <i class="material-icons">delete</i>
                    </a>';
        }
            echo '</div>
                </div>
            </div>';    
        echo '<div class="modal fade" id="previewModel' . $row['Place_Id'] .'" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="card card-plain">
                          <div class="modal-header">
                            <h5 class="modal-title card-title">Place preview</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="card card-blog">
                                  <div class="card-header card-header-image">
                                      <a href="#pablo">
                                          <img class="img" src="Trip_and_Turn_2.0/'. $row['Pictures'] .'">
                                          <div class="card-title">
                                              <i class="fas fa-map-marker-alt"></i> ' . $row['Name'] .' ('. $row['Type'] .')
                                          </div>
                                      </a>
                                  </div>
                                  <div class="card-body">
                                      <h6 class="card-category text-info"><i class="fas fa-location-arrow"></i> '. $row['City'] .'</h6>
                                      <p class="card-description">
                                      '. $row['Description'].'
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>';
    }
    echo "</div><div class='badge-info badge-pill w-80'>Total: ".$con->affected_rows." Results found..</div>";

}

mysqli_close($con);
?>