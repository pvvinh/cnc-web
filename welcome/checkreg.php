<?php 
    
    require_once("../incfiles/connect.php");
    $username = trim($_POST['user']);
    $password = trim($_POST['pass']);
    $repassword = trim($_POST['re-pass']);
    $kq_user= mysqli_query("select * from account where username='".$username."' ");
   
    $partten = "/^[A-Za-z0-9_\.]{2,32}$/";
   
    
    



    if (!empty($username) && !empty($password) && !empty($repassword))
    {
        if(!preg_match($partten ,$username, $matchs))
            echo  "<font color='red'>Username bạn vừa nhập không đúng định dạng</font> ";
        else
        if (mysqli_num_rows($kq_user) > 0 )
            echo'Username already used';
        else 
            
                if ($password != $repassword)
                    echo'Mật khẩu không khớp';
                else 
                {
                    mysqli_query("INSERT INTO `account`(`username`, `password`) 
                        VALUES ('".$username."','".$password."')");
                    echo'Đăng kí Thành công! ';
                }
             
    }
    else{
        //neu dang nhap sai
        echo '<font color="red">Vui lòng nhập đầy đủ</font> ';
    }
?>