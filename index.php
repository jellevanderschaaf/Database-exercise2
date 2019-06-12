<?php

$con = mysqli_connect("localhost", "root", "", "diet_tracker");

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
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
                        <input id="name" name="reg_name" type="text" class="form-control form-control-sm formFoodItem" placeholder="Name" required>
                        <input id="fat" name="reg_fat" type="text" class="form-control form-control-sm formFoodItem" placeholder="Fat" required>
                        <input id="carbs" name="reg_carbs" type="text" class="form-control form-control-sm formFoodItem" placeholder="Carbs" required>
                        <input id="protein" name="reg_protein" type="text" class="form-control form-control-sm formFoodItem" placeholder="Protein" required>
                        <input id="kcals" name="reg_kcals" type="text" class="form-control form-control-sm formFoodItem" placeholder="Kcals" required>
                        <input id="price" name="reg_price" type="text" class="form-control form-control-sm formFoodItem" placeholder="Price" required>
                    </div>
                    <button class="btn btn-secondary" onClick="cancel()">Cancel</button>
                    <button type="submit" name="register_button" value="Register" class="btn btn-secondary" onClick="createItem()">Create</button>
                </form>

            </div>


            <div id="test" class="foodList">

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; minced beef</div>
                    <button class="btn btn-info add" value="0" onCLick="addFoodItemToList(this.value)">+</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; egg</div>
                    <button class="btn btn-info add" value="1" onCLick="addFoodItemToList(this.value)">+</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; butter</div>
                    <button class="btn btn-info add" value="2" onCLick="addFoodItemToList(this.value)">+</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; chicken legg</div>
                    <button class="btn btn-info add" value="3" onCLick="addFoodItemToList(this.value)">+</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; mackerel</div>
                    <button class="btn btn-info add" value="4" onCLick="addFoodItemToList(this.value)">+</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; sardines</div>
                    <button class="btn btn-info add" value="5" onCLick="addFoodItemToList(this.value)">+</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; shrimps</div>
                    <button class="btn btn-info add" value="6" onCLick="addFoodItemToList(this.value)"> +</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; kefir</div>
                    <button class="btn btn-info add" value="7" onCLick="addFoodItemToList(this.value)">+</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; almond cake</div>
                    <button class="btn btn-info add" value="8" onCLick="addFoodItemToList(this.value)">+</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; apple</div>
                    <button class="btn btn-info add" value="9" onCLick="addFoodItemToList(this.value)">+</button>
                </div>

                <div class="FoodItem">
                    <div class="FoodItemName">&bull; blueberries</div>
                    <button class="btn btn-info add" value="10" onCLick="addFoodItemToList(this.value)">+</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="javascript.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>