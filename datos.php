
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(style.css);
    </style>
</head>
<body> 
    <!-- 
    <img src="img/img.png" alt="" style="width: 800px;height: 600px;">
    -->
    <?php
// echo $_GET['email'];
//Informacion del usuario

$user = $_GET['email'];


//Database Connection
//                  direccionip,user,name_DB
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed : '.connect_error);
}else{
    
    $result = mysqli_query($conn, "SELECT * FROM registration");
    $res = mysqli_fetch_assoc($result);
    //echo $res['email'];
    $chk = $res['email'];
    if($user !== $chk){
        //                    code SQL    name_of_table
        $stmt = $conn->prepare("insert into registration(email)
        values(?)");
        $stmt->bind_param("s",$user);
        $stmt->execute();
        //   echo "<br> registration Successfuly...";
        $stmt->close();
    }
    
    
    $conn->close();
}
?>
</body>
</html>