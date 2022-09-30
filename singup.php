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

$arr['userid'] = create_userid();
$condition = true;
while($condition) {

    $query = "select id from users where userid = :userid limit 1";
    $stm = $DB-> prepare($query);
    if ($stm) {
        $check = $stm->execute($arr); 
        if($check){ 

        $data = $stm->fetchAll(PDO::FETCH_ASSOC);

        if(is_array($data) && count($data) > 0) {

            $arr['userid'] = create_userid();
            continue;
        }
    }

    }
    $condition = false;
}


$arr['name'] = $_POST['name'];
$arr['email'] = $_POST['email'];
$arr['password'] = hash('sha1', $_POST['password']);
$arr['rank'] = "user";

$query = "insert into users (userid,name,email,password,rank) values (:userid,:name,:email,:password,:rank)";
    $stm = $DB->prepare($query);
    if ($stm) {
        $check = $stm->execute($arr);
        if(!$check){
            $error = "could not save to database";

        } 
        if($error == "") {
            header("location: login.php");
            die;
        }
    }
 }
?>
<?php include "header.php" ?>

    <h1>sing up </h1>

    <div class="main-content">

        <form method="POST">
            <input class="input" type="text" name="name" placeholder="Name" required><br>
            <input class="input" type="email" name="email" placeholder="Email" required><br>
            <input class="input" type="password" name="password" placeholder="password" required><br>
            <br>
            <input class="button" type="submit" value="Singup"> <br>
        </form>

    </div>


<?php include "footer.php" ?>