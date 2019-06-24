<?php include("db.php");

$fname = "";
$fat =  "";
$carbs = "";
$protein = "";
$kcals = "";
$price = "";
$error_array = "";

if (isset($_POST['create_button'])) {

    $fname = strip_tags($_POST['reg_fname']);
    $_SESSION['reg_fname'] = $fname;
    $fat = strip_tags($_POST['reg_fat']);
    $_SESSION['reg_fat'] = $fat;
    $carbs = strip_tags($_POST['reg_carbs']);
    $_SESSION['reg_carbs'] = $carbs;
    $protein = strip_tags($_POST['reg_protein']);
    $_SESSION['reg_protein'] = $protein;
    $kcals = strip_tags($_POST['reg_kcals']);
    $_SESSION['reg_kcals'] = $kcals;
    $price = strip_tags($_POST['reg_price']);
    $_SESSION['reg_price'] = $price;

    // Check if fname already exists

    $query = "SELECT count(*) as allcount FROM food_items WHERE fname='" . $fname . "'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $allcount = $row['allcount'];

    // insert

    if (empty($error_array) && $allcount == 0) {

        $query = mysqli_query($con, "INSERT INTO food_items VALUES ('', '$fname', '$fat', '$carbs', '$protein', '$kcals', '$price')");
    }
}


?>


<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Diet Tracker</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    
    <script type="text/javascript" src="javascript.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

    <div class="grid-container">
        <div class="grid-item">
            <br>
            <h5>Food Items</h5>
            <hr>

            <button class="btn btn-secondary" onClick="createFoodItem()">New Food Item</button>

            <div id="createFoodItem" class="hidden">
                <form id="foodForm" action="index.php" method="POST">
                    <div class="form-group">

                        <table style="width:100%">
                            <tr>
                                <td>name</td>
                                <td><input id="fname" name="reg_fname" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>fat</td>
                                <td><input id="fat" name="reg_fat" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>carbs</td>
                                <td><input id="carbs" name="reg_carbs" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>protein</td>
                                <td><input id="protein" name="reg_protein" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td>grams</td>
                            </tr>
                            <tr>
                                <td>kcals</td>
                                <td><input id="kcals" name="reg_kcals" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>price: €</td>
                                <td><input id="price" name="reg_price" type="text" class="form-control form-control-sm formFoodItem" required></td>
                                <td></td>
                            </tr>

                        </table>

                        list per:<br>
                        100 grams <input type="radio" name="grams" value="grams"><br>
                        piece <input type="radio" name="piece" value="piece">
                    </div>
                    <button class="btn btn-secondary" onClick="cancel()">Cancel</button>
                    <button type="submit" name="create_button" value="Create" class="btn btn-secondary" onClick="createItem()">Create</button>
                </form>

            </div>


            <div id="test" class="foodList">


            <table>
                    <tr>
                    </tr>
                    <?php
                    $sql = "SELECT id, fname from food_items";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {


                            echo "<tr>";

                            echo "<td>{$row['id']}</td>";
                            echo "<td><a rel='".$row['id']."' class='delete-this' href='javascript:void(0)'>{$row['fname']}</a></td>";
                
                
                            echo "</tr>";
                            


                        }
                    }
                    $con->close();
                  
                    ?>

                


            </div>

        </div>

        <script>

var id;
var deletethis = 'delete';


$(".delete-this").on('click', function(){

var id = $(this).attr('rel');

$.post("delete.php", {id: id, deletethis: deletethis}, function(data){



});

});    

</script>

     
</body>

</html>