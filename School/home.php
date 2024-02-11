<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: whitesmoke;

        }
        #mother{
            width: 100%;
            font-size: 20px;

        }
        main{
            float: left;
            border: 1px solid gray;
            padding: 7px;

        }
        input{
            padding: 4px;
            border: 2px solid black;
            text-align: center;
            font-size: 17px;
        }
        aside{
            text-align: center;
            width: 300px;
            float: right;
            border: 1px solid black;
            padding: 10px;
            font-size: 20px;
            background-color: silver;
            color: white;
        }
        #tbl{
            width: 890px;
            font-size: 20px;
            text-align: center;
        }
        #tbl th{
            background-color: silver;
            color: white;
            font-size: 20px;
            padding: 10px;
            
        }
    </style>
    <title>Document</title>
</head>
<body dir='rtl'>
    <?php
    //  الاتصال بي قاعده البيانات
    $dbuser = "root";
     $dbpassword = "" ;
    $host = 'localhost';
  $database = "student1";
  $connection = new mysqli($host , $dbuser , $dbpassword , $database , 3307);
  $res= mysqli_query($connection, "select * from student");
  #button variable
  $id='';
  $name='';
  $address='';
  if (isset($_POST['id'])) {
    $id=$_POST['id'];
  }
  if (isset($_POST['name'])) {
    $name=$_POST['name'];
  }
  if (isset($_POST['address'])) {
    $address=$_POST['address'];
  } 
  $sqls='';
  if (isset($_POST['add'])) {
    $sqls = "insert into student value($id,'$name','$address')";
    mysqli_query($connection,$sqls);
    header("location: home.php");
  }
   if (isset($_POST['del'])) {
    $sqls= "delete from student where name='$name'";
    mysqli_query($connection,$sqls);
    header("location: home.php");

   }

    ?>
    <div id="mother">
        <form method='POST'>
            <!-- لوحه التحكم  -->
            <aside>
   <div id ='div'>
    <img src="https://images.pexels.com/photos/4939645/pexels-photo-4939645.jpeg?auto=compress&cs=tinysrgb&w=600" alt ='logo site' width="100px">
      <h3>لوحه المدير</h3>
      <label for="">رقم الطالب</label><br>
      <input type="text" name="id" id='id'><br>
      <label for="">اسم الطالب</label><br>
      <input type="text" name="name" id="name"><br>
      <label for="">عنوان الطالب</label><br>
      <input type="text" name="address" id="address"><br><br>
      <button name="add">اضافه طالب </button>
      <button name='del'> حذف الطالب</button>

   </div>
            </aside>
            <!-- عرض بيانات الطلاب -->

            <main>
                <table id='tbl'>
                    <tr>
                        <th>  الرقم التسلسلي </th>
                        <th>اسم الطالب </th>
                        <th>عنوان الطالب</th>
                    </tr>
                    <?php
                    while ( $row = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "</tr>";
                    }
                    
                    ?>
                </table>
            </main>

        </form>

    </div>
</body>
</html>