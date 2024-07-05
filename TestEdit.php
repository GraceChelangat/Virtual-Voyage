<!-- <?php
require("Connection.php");

if(isset($_GET['username'])){
    $username=$_GET['username'];
    $email=$row['email'];
        $image=$row['user_image'];
        $usergroup=$row['user_group'];

    $sql="SELECT username,email,password,user_image,user_group FROM users WHERE username=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $username=$row['username'];
            $email=$row['email'];
            $password=$row['password'];
            $image=$row['user_image'];
            $usergroup=$row['user_group'];
        }
    }

}else{
    echo "Invalid user";
    exit;
}


$sql2 = "SELECT group_name FROM groups";
$result2 = $conn->query($sql2);
$groups = [];

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $groups[] = $row;
    }
} else {
    $groups = null;
}
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>
<body>
    <div class="box">
        <div class="logo">
        <img src="./cooking.png">
        <p>Brother's kitchen &#169</p>
        </div>
    <div class="form">
    <h1>User registration</h1>
    <form action="./registerUpdate.php" method="post" enctype="multipart/form-data">
        <div class="input-box">
        <label for="username">Username: </label>
        <input id="username" type="text" required name="username" value="<?php echo $username; ?>"><br><br>
        </div>

        <div class="input-box">
            <label for="email">Email: </label><br>
            <input id="email" type="email" required name="email" value="<?php echo htmlspecialchars($user['email']); ?>"><br><br>
            </div>


        <div class="input-box">
        <label for="password">Password: </label>
        <input id="password" type="password" required name="password" value="<?php echo htmlspecialchars($user['password']);?>"><br><br>
        </div>
        
        
        <label for="user_image">User Image: </label><br>
        <input id="user_image" type="file" name="user_image"><br><br>

        <label for="group">User group:</label>     
        <select id="group" name="group">
        <?php
                if ($groups) {
                    foreach ($groups as $group) {
                        if ($group['group_name'] !== 'Admin') {
                            echo '<option value="' . htmlspecialchars($group['group_name']) . '">' . htmlspecialchars($group['group_name']) . '</option>';
                        }
                    }
                } else {
                    echo '<option value="">No group found</option>';
                }
                ?>

        </select><br><br>

        <input type="hidden" name="current_username" value="<?php echo htmlspecialchars($username); ?>">
        <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($user['user_image']); ?>">
    
        
        <button type="submit" value="Register">Register</button>
        
    </div>
    </form>
    
</body>
</html>