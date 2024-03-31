<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styel.css">
</head>

<body dir="rtl">

<?php 
#الاتصال مع قاعده البيانات 
$host= 'localhost';
$user='root';
$pass='';
$db='student22';
$con= mysqli_connect($host,$user,$pass,$db);
#$res=mysqli_query($con,"select * form student2");
$res=mysqli_query($con,"SELECT * FROM student2");
$id='';
$name='';
$address='';
if (isset($_POST['id'])){
    $id= $_POST['id'];
}
if (isset($_POST['name'])){
    $name= $_POST['name'];
}
if (isset($_POST['address'])){
    $address= $_POST['address'];
}
$sqls='';

if(isset($_POST['add'])){
    $sqls = "insert into student2 value ($id,'$name','$address') ";
    mysqli_query($con,$sqls);
    header("location: index.php");
}

if(isset($_POST['del'])){
    $sqls = "DELETE FROM  student2 WHERE id='$id'";
  #حق محمد محسن $con->exec($sqls);
     mysqli_query($con,$sqls);
   # $sqls = "delete form student2 where name='$name' ";
    header("location: index.php");
}
?>
    <div id="mother">
        <form action="" method="POST">
            <aside>
                <div id="div">
                    <h3>بيانات الطالب</h3>
                    <label for="">رقم الطالب: </label><br>
                    <input type="text" name="id" id="id"><br>
                    <label for="">اسم الطالب:</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="">عنوان الطالب:</label><br>  
                    <input type="text" name="address" id="address"><br>
                    <button name="add">اضافة</button>
                    <button  id="dell" name="del"  >حذف</button>


                </div>

            </aside>

            <main>
                <table id="tbl">
                    <tr>
                        <th>الرقم التسلسلي </th>
                        <th>اسم الطالب</th>
                        <th>عنوان الطالب</th>
                    </tr>
                   <?php
                   while($row = mysqli_fetch_array($res))
                   {
                       echo '<tr>';
                       echo '<th>'.$row['id'].'</th>';
                       echo '<th>'.$row['name'].'</th>';
                       echo '<th>'.$row['address'].'</th>';
                       echo '</tr>';
                   }
                 
                   ?>
                </table>

            </main>


        </form>


    </div>



</body>

</html>