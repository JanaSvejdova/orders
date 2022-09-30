<?php 
    function create_userid() {
        $lenght = rand(4,20);
        $number = "";
        for ($i=0; $i < $lenght; $i++) {
            $new_rand = rand(0,9);
            $number = $number . $new_rand;

        }
        return $number;
    }

if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (!$DB = new PDO("mysql:host=localhost;dbname=orders", "root", "")) {
            die("could not connect");

        }


$arr['email'] = $_POST['email'];
$arr['password'] = hash('sha1', $_POST['password']);


$query = "select * from users where email = :email && password = :password limit 1";
    $stm = $DB->prepare($query);
    if ($stm) {
        $check = $stm->execute($arr);
        if(!$check){
            
            $error = "wrong username or password";

        } 
        if($error == "") {
            $_SESSION['myid'] = 
            header("location: login.php");
            die;
        }
    }
 } ?> 

<?php include "header.php" ?>
<h1>  nastavení prav na přihlašení</h1>
<title>log in</title>
    <body>
    <form method="POST">
        <div class="main-content">
            <table class="center log" >
              <tr> 
                <td>
                    Přihlašení
                </td>
            </tr>
        <tr>
                <td>
                <input class="input" type="email" name="email" placeholder="Email" required><br>
                </td>
            </tr>
                <br>
            <tr>
                <td >
                <input class="input" type="password" name="password" placeholder="password" required><br>
                </td>
            </tr>
            <tr>
                <td >
                <input class="button" type="submit" value="Login"> <br>
                </td>
            </tr>
            
            </table>  
</form>      
        </div>
<?php include "footer.php" ?>