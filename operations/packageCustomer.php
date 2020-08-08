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
.rounded {
    text-shadow:none;
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
$sql="SELECT `Package_Id`, `Name`, `Type`, `Cost`, (SELECT tbl_place.Name FROM tbl_place WHERE tbl_place.Place_Id=tbl_package.Place_Id) as place, `Description`, `Picture`, `Number_Person`, `Days`, `Nights`, `Last_Update_Time` FROM `tbl_package` WHERE `Name` LIKE '%$q%' Or Type LIKE '%$q%';";
$result = mysqli_query($con,$sql);

if(isset($_GET['t']))
{
    echo "<div style='overflow-x:auto;'><table class='table' >
    <tr>
    <th>#</th>
    <th>Picture</th>
    <th>Name</th>
    <th>Type</th>
    <th>Cost</th>
    <th>place</th>
    <th>Description</th>
    <th>Number_Person</th>
    <th>Days</th>
    <th>Nights</th>
    <th>Last_Update_Time</th>
    <th>Action</th>     
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>$COUNT</td>";   
        echo "<td><a href='Trip_and_Turn_2.0/". $row['Picture'] . "' target='_blank'/><img class='zoom' src='Trip_and_Turn_2.0/". $row['Picture'] ."' width='30px' height='30px' style='object-fit:cover;'></a></i></td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Cost'] . "</td>";
        echo "<td>" . $row['place'] . "</td>";
        echo "<td>";
        $s = substr($row['Description'], 0, 100);
        $resul = substr($s, 0, strrpos($s, ' '));
        if(strlen($row['Description'])>100){echo $resul.'...';}else{echo $row['Description'];} 
        echo "<td>" . $row['Number_Person'] . "</td>";    
        echo "<td>" . $row['Days'] . "</td>";    
        echo "<td>" . $row['Nights'] . "</td>";    
        echo "<td>" . $row['Last_Update_Time'] . "</td>";    
        echo "<td><a href='Update_Package.php?fetch=" . $row['Package_Id'] . "' class='faa-parent animated-hover' data-toggle='tooltip' data-placement='top' title='Fetch'><i class='fas fa-bolt faa-tada'></i></a></td>";
        echo "</tr>";
        $COUNT++;
    }
    echo "</table><div>";
    echo "<div class='badge-info badge-pill w-80'>Total: ".$con->affected_rows." Results found..</div>";
}
else
{echo '<div class="row">';
    while($row = mysqli_fetch_array($result)) {   
        echo'   <div class="col-md-3 ml-auto mr-auto">
                    <div class="card card-pricing bg-primary hover-body  faa-vertical animated-hover " style="width:17.6rem; height:30rem; margin-top: 10px;    margin-bottom: 10px;">
                        <div class="card-body text-center">
                            <div class="card-icon">
                                <img class="img-raised rounded img-fluid" style="height: 150px;width: 150px;" src="Trip_and_Turn_2.0/'. $row['Picture'] .'" alt=""/>
                            </div>
                            <h2 class="card-title">'. $row['Name'] .'</h2>
                            <h3 class="card-title">'. $row['Cost'] .' &#x20B9; </h3>
                            <h5 class="card-title  text-capitalize""><i class="fas fa-map-marker-alt"></i>  '. $row['place'] .' <span class="font-weight-bold">('. $row['Type'] .')</span></h5>
                            <div class="row py-2 bg-light rounded" style="text-shadow: 21px 4px 20px #3a0144;">
                                <div class="col-md-4 p-2" >
                                    <i class="fas fa-user-astronaut fa-2x text-primary"><span class=" bg-white text-primary rounded px-1 ml-2">'. $row['Number_Person'] . '</span></i>
                                </div>
                                <div class="col-md-4 p-2" >
                                    <i class="fas fa-sun fa-2x text-primary""><span class="title bg-white text-primary rounded px-1 ml-2">'. $row['Days'] . '</span></i>
                                </div>
                                <div class="col-md-4 p-2" >
                                    <i class="fas fa-moon fa-2x text-primary""><span class="title bg-white text-primary rounded px-1 ml-2">'. $row['Nights'] . '</span></i>
                                </div>
                            </div>                            
                            <p class="card-description">';
        $s = substr($row['Description'], 0, 100);
        $resul = substr($s, 0, strrpos($s, ' '));
        if(strlen($row['Description'])>100){echo $resul.'...';}else{echo $row['Description'];} 
                           echo' </p>
                        </div>
                        <div class="footer justify-content-center border-top">
                        <i class="fas fa-history"> '. $row['Last_Update_Time'] .'</i>
                       </div>
                <div class="card-img-overlay hover-controls " style="padding-top: 200px">
                  <div class="footer justify-content-center">';
        if($vp==1)
        {
            echo '  <a href="?fetch=' . $row['Package_Id'] .'" target="_blank" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd" rel="tooltip" title="book now">
                        <i class="material-icons">done</i>
                    </a>
                    <a class="btn btn-danger btn-just-icon btn-fill btn-round text-white trash" id="'.$row['Package_Id'].'" rel="tooltip" title="Add to wish list">
                        <i class="material-icons">favorite</i>
                    </a>';
        }
        else {
            echo '<a href="#pablo" class="btn btn-info btn-just-icon btn-fill btn-round" data-toggle="modal" data-target="#previewModel' . $row['Package_Id'] .'">
                        <i class="material-icons">subject</i>
                    </a>
                    <a href="?fetch=' . $row['Package_Id'] .'" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
                        <i class="material-icons">mode_edit</i>
                    </a>
                    <a class="btn btn-danger btn-just-icon btn-fill btn-round text-white trash" id="'.$row['Package_Id'].'">
                        <i class="material-icons">delete</i>
                    </a>';
        }
            echo '</div>
                </div>
                    </div>
                </div>';   
        echo '<div class="modal fade" id="previewModel' . $row['Package_Id'] .'" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="card card-plain">
                          <div class="modal-header">
                            <h5 class="modal-title card-title">Package preview</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="card card-blog">
                                  <center>
                                  <div class="card-header card-header-image" style="width:266px;height:266px;">
                                      <a href="#pablo">
                                      
                                          <img class="img" src="Trip_and_Turn_2.0/'. $row['Picture'] .'">
                                          <div class="card-title">
                                              <i class="fas fa-map-marker-alt"></i> ' . $row['Name'] .' ('. $row['Type'] .')
                                          </div>
                                      </a>                                
                                  </div>
                                  </center>      
                                  <div class="card-body text-center">
                                      <h6 class="card-category text-info"><i class="fas fa-location-arrow"></i> '. $row['place'] .'</h6>
                                        <div class="row">
                                            <div class="col-md-4 p-2" >
                                                <i class="fas fa-user-astronaut fa-2x text-primary"><span class=" bg-white text-primary rounded px-1 ml-2">2</span></i>
                                            </div>
                                            <div class="col-md-4 p-2" >
                                                <i class="fas fa-sun fa-2x text-primary""><span class="title bg-white text-primary rounded px-1 ml-2">2</span></i>
                                            </div>
                                            <div class="col-md-4 p-2" >
                                                <i class="fas fa-moon fa-2x text-primary""><span class="title bg-white text-primary rounded px-1 ml-2">2</span></i>
                                            </div>
                                        </div>   
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