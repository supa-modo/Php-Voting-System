<!-- 
<?php
    include('connection.php');
    if (isset($_POST['submit'])) {
        $adminID = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from admin where username = '$adminID' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: admin_dashboard.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?> -->
    <?php
    include('connection.php');
    if (isset($_POST['submit'])) {
        $voterId = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from voters where voter_id = '$voterId' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: admin_dashboard.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>
