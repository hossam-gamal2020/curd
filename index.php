    <?php

/**
 * for connect php with sql
 * host = localhost
 * user = root
 * password
 * dbsName = crud
 *
 *
 */
$host = "localhost";
$user = "root";
$password = "";
$dbName = "crud";

$conn = mysqli_connect($host, $user, $password, $dbName);


//1-creat
if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $insert = "INSERT INTO `users` VALUES (null , '$name' , $salary)";
   $i = mysqli_query($conn, $insert);
}
//2-read = select

$select = "SELECT * FROM `users`";

$s = mysqli_query($conn, $select);

//3- update
$name ="";
$salary = "";
$update = false ;
if (isset($_GET['edit'])){
$update = true ;
$id= $_GET['edit'];

$select = "SELECT * FROM `users` where id = $id";

$ss = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($ss);
$name = $row ['name'];
$salary = $row ['salary'];


if (isset($_POST['update'])){
    $name = $_POST['name'];
    $salary = $_POST['salary'];
$update = "UPDATE `users` SET name = '$name' , salary = $salary where id = $id   ";

 $u =  mysqli_query($conn, $update);
if ($u) {
  echo "true updated";

header("location:/crud/index.php ");
} else {
echo "false updated";}


}


}

//4- delete

if (isset ($_GET['delete'])){ 
$id = $_GET ['delete'];

$delete = "DELETE FROM `users` WHERE id = $id ";
$d = mysqli_query( $conn , $delete);

header("location:/crud/index.php ");
}

//if ($conn) {
//echo "true connection" ;
//} else {
//echo "false connection";}

//crud ?
//1- creat = insert

//$insert = "INSERT INTO  `users`VALUES(NULL , 'hamada' , 300000)";

//$i = mysqli_query($conn , $insert);
//2- select = reading
/**$select = "SELECT * FROM `users`";
$s = mysqli_query($conn , $select);
foreach ($s as $data)
{
echo $data ['id'];
echo $data ['name'];
echo $data ['salary'];
};
 */

//if ($s){
//echo "true select";
//}else{
//  echo "false select";}
//if ($i) {
//echo "true insert";}
//else {
//echo "false";}
//3- update = update
//$update = "UPDATE `users` set name = 'updated from php' where id = 3";
//$u =  mysqli_query($conn , $update );
// 4- delete = delete
//$delete = "DELETE from `users` where id = '3'";
//$d = mysqli_query($conn , $delete);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="/crud/main.css">

</head>

<body>

    <div class="container mt-1 col-md-6">
        <div class="crud">

            <div class="crud-body">

                <form method="POST">
                    <div class="from-group">

                        <label>user name</label>

                        <input type="text" value=" <?php echo $name ?>" name="name" class="form-control" placeholder="name">
                    </div>

                    <div class="from-group">

                        <label>user salary</label>

                        <input type="text" value="<?php echo $salary ?>"   name="salary" class="form-control" placeholder="salary">
                    </div>

                    <?php if ($update):  ?>
                    <button name="update" class="btn btn-info"> update</button>
                    <?php else :?>
                    <button name="send" class="btn btn-info"> send data</button>
                    <?php endif ?>

                </form>

            </div>

        </div>

    </div>


    <div class="container col-md-6 mt-4">         
    <div class="card card-body">
        <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>SALARY</th>
                <th colspan="2">Action</th>

            </tr>
            <?php foreach ($s as $data) {   ?>
                <tr>
                    <th> <?php echo $data['id'] ?> </th>
                    <th> <?php echo $data['name'] ?> </th>
                    <th> <?php echo $data['salary'] ?> </th>
                    <th>   <a href="/crud/index.php?edit=<?php echo $data['id'] ?>   " class="btn btn-danger"> Edit </a> </th>
                    <th>   <a href="/crud/index.php?delete=<?php echo $data['id'] ?>   " class="btn btn-danger"> reomve </a> </th>

                </tr>
            <?php } ?>
        </table>
    </div>
    </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>

</html>