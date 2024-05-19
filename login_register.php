<?php
   require('connection.php');
    session_start();
    #for login
    if(isset($_POST['login']))
    {
        $query="SELECT * from `connected_users` where `email`='$_POST[email_username]' or `username`='$_POST[email_username]'";
        $result=mysqli_query($con,$query);

        if($result){
            if(mysqli_num_rows($result)==1){
                $result_fetch=mysqli_fetch_assoc($result);
                if(password_verify($_POST['password'],$result_fetch['password'])){
                    $_SESSION['logged_in']=true;
                    $_SESSION['username']=$result_fetch['username'];
                    header("location: reg_pg.php");
                }
                else{ #not matched
                    echo "
                    <script>
                    alert('Password incorrect');
                    window.location.href='login_pg.php';
                    </script>
                    ";
                }
            }
            else{
                echo "
                <script>
                alert('Email or username not correct');
                window.location.href='login_pg.php';
                </script>
                ";
            }
        }
        else{
            echo "
            <script>
            alert('Cannot run query21');
            window.location.href='login_pg.php';
            </script>
            ";
        }
    }



   #for registration
   if(isset($_POST['register']))
   {
    $user_exist_query="SELECT * FROM `connected_users` where `username`='$_POST[username]' or `email`='$_POST[email]' ";
    $result = mysqli_query($con,$user_exist_query);
    if($result){
        
        if(mysqli_num_rows($result)>0){
            #if any user has already taken username or email
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['username']==$_POST['username'])
            {
                #error for already registered username    
            echo "
            <script>
            alert('$result_fetch[username]Username already taken');
            window.location.href='login_pg.php';
            </script>
            ";
            }
            else{
            #error for mail already registered
            echo "
            <script>
            alert('$result_fetch[email]Email already exists');
            window.location.href='login_pg.php';
            </script>  
            ";
            }
        }
        else{
            $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $query="INSERT INTO `connected_users`(`Full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
            if(mysqli_query($con,$query)){
                echo "
                <script>
                alert('Registration Succesfull');
                window.location.href='login_pg.php';
                </script>
                ";   
            }
            else{
                echo "
                <script>
                alert('Cannot run query');
                window.location.href='login_pg.php';
                </script>
                ";
            }
        }
    }
    else{
        echo "
        <script>
        alert('Cannot run query12');
        window.location.href='login_pg.php';
        </script>
        ";
    }
   }   
?>