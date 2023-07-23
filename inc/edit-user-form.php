<?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if(isset($_GET['id'])){
                            $id = $mysqli -> real_escape_string($_GET['id']);
                            $query = "SELECT * FROM user WHERE id = :id";
                            $params = [
                                ':id' => $id
                            ];
                            $sql  = "SELECT * FROM user WHERE id = $id";
    
                            //$res = executeQuery($query, $params);
                            $res = executeQueryV2($sql, $mysqli);
                            #print_r($res[0]);
    
                            if(!empty($res)){
                                $name  = $res[0]['name'];
                                $email  = $res[0]['email'];
                                $auth  = $res[0]['auth'];
                            }
                        }                      
                    }

                   #/dashboard/edit-user.php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {                        
                        if(isset($_POST['_token'])){
                            $token = $mysqli -> real_escape_string($_POST['_token']);
                            $name = $mysqli -> real_escape_string($_POST['name']);
                            $email = $mysqli -> real_escape_string($_POST['email']);
                            $password = $mysqli -> real_escape_string($_POST['password']);
                            $auth = $mysqli -> real_escape_string($_POST['auth']);

                            if($token != $_SESSION['_token']){
                                die("Invalid Token");
                            }else{
                                if(empty($password)){
                                    $query = "UPDATE `user` SET `auth` = '$auth', `name` = '$name' WHERE (`email` = '$email')";
                                    
                                }else{
                                    $newpass = password_hash($password, PASSWORD_DEFAULT);
                                    $query = "UPDATE `user` SET `auth` = '$auth', `name` = '$name', `password` = '$newpass' WHERE (`email` = '$email')";
                                   
                                }

                                if(executeQueryV2($query, $mysqli)){
                                    $notif = "<div class='container'>
                                                <div class='message promoted-boost-message' style='margin-top: 1rem;'>
                                                    <i class='fas fa-info-circle'></i> User Profile Update Successfully
                                                </div>
                                            </div>";
                                    
                                }
                            }
                        }
                    }

                    if(isset($notif)){ echo $notif; };
?>


<section class="register">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="inner">
                    <div class="top">
                        <h1>Edit User</h1>
                       
                        <p class="help is-danger"></p>
                    </div>

                    

                    <form method="POST" action="/dashboard/edit-user.php">
                        <input type="hidden" name="_token" value="<?php echo  $_SESSION["_token"]; ?>">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Name" name="name" required="" value="<?php if(isset($name)){ echo $name; } ?>">
                            </div>
                                                    </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" placeholder="Email" name="email" readonly value="<?php if(isset($email)){ echo $email; } ?>" >                                
                            </div>
                            <p class="help is-danger"></p>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input " type="password" placeholder=" New Password" name="password"  value="">                                
                            </div>
                            <p class="help is-danger"></p>
                        </div> 

                        <div class="field">
                            <label class="label">Role</label>
                            <div class="select full-width">
                                <select name="auth" class="full-width auth">
                                    <option value="">Pending</option> 
                                    <option <?php if(isset($auth)){ if($auth == 'user'){ echo 'selected'; } }  ?> value="user">User</option>
                                    <option <?php if(isset($auth)){ if($auth == 'admin'){ echo 'selected'; } }  ?> value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        
                        

                        <div class="field submit-button">
                            <div class="control">
                                <input type="submit" value="Save" class="button is-primary btn_block">
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>