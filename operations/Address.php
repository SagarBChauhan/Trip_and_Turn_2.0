<?php
include './Connection.php';
if (! empty($_POST["country_id"])) {
    $query = "SELECT * FROM tbl_state WHERE Country_Id = '" . $_POST["country_id"] . "'";
    $results = mysqli_query($con, $query);
    ?>
<option value disabled selected>Select State</option>
<?php
    foreach ($results as $state) {
        ?>
<option value="<?php echo $state["State_Id"]; ?>"><?php echo $state["Name"]; ?></option>
<?php
    }
}

if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM tbl_city WHERE State_Id = '" . $_POST["state_id"] . "' order by name asc";
    $results = mysqli_query($con, $query);
    ?>
<option value disabled selected>Select City</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["City_Id"]; ?>"><?php echo $city["Name"]; ?></option>
<?php
    }
}

if (! empty($_POST["city_id"])) {
    $query = "SELECT * FROM `tbl_place` WHERE City_Id='". $_POST["city_id"]."' order by name asc";
     $results = mysqli_query($con, $query);
    ?>
<option value disabled selected>Select Place</option>
<?php
    foreach ($results as $place) {
        ?>
<option value="<?php echo $place["Place_Id"]; ?>"><?php echo $place["Name"]; ?></option>
<?php
    }
}
?>

