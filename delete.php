<?php include("db.php");


if(isset($_POST['deletethis'])) {


    $id = mysqli_real_escape_string($con, $_POST['id']);

    $id = $_POST['id'];

    $query = "DELETE FROM food_items WHERE id = $id";

    $result_set = mysqli_query($con, $query);
    
    if(!$result_set) {

die("QUERY FAILED" . mysqli_error($con));


    }



}





?>


<script>

$(document).ready(function(){

var id;
var deletethis = 'delete';


$(".delete").on('click', function(){

id = $(".delete").attr('rel');

$.post("delete.php", {id: id, deletethis: deletethis}, function(data){

alert(id);

});

});    

</script>

