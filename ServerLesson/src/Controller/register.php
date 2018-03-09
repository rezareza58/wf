<?php 
include_once  __DIR__.'/init.php';

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $username = $_POST['username']??null;
    $password_1 = $_POST['password_1']??null;
    $password_2= $_POST['password_2']??null;
    $telephon = $_POST['telephone']?? null;
    $age = $_POST['age']??null;
    
    echo 'validate data' . "<br/>";
    echo 'if validation fail';


    $usernameSuccess = (is_string($username) && strlen($username) > 2);
    $passwordSuccess = ($password_1===$password_2 && strlen($password_1) > 7);
    $telephoneSuccess = (is_numeric($telephon) && strlen($telephon) >= 9);
    $ageSuccess = (is_numeric($age) && strlen($age) < 4);
    
    if ($usernameSuccess && $passwordSuccess){
        try {
            $connection = Service\DBConnector::getConnection();
        }catch (PDOException $exception){
            http_response_code(500);
            echo 'A problem accured, contact support';
        exit(10);
        }
        $sql = "INSERT INTO user(username, password) VALUES(\"$username\", \"$password_1\")";
        $affected = $connection->exec($sql);
        if(!$affected){
            echo implode(', ',$connection->errorInfo());
        }else {
            echo 'store data';
        }
        return;
 
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Insert title here</title>
		<style type="text/css">
		body{
		text-align:center;
		
		}
		
		form{
		background-color:#336699;
		border: 1px solid #336699;
		border-radius:10px;
		padding:20px;
		box-shadow: 10px 10px 6px rgba(0,0,0,0.5);
		width:50%;
		margin:auto;
		margin-top:50px;
		}
		input{
		margin-top:20px;
		
		border-radius:5px;
		border: 1px solid #00b386;
		height:30px;
		}
		label{
		text-color:#ffffff;
		}
		button{
		margin-top:20px;
		width:300px;
		border-radius:5px;
		background-color:#00b386;
		border: 1px solid #00b386;
		height:30px;
		box-shadow: 6px 6px 6px rgba(0,0,0,0.5);
		}
		</style>
	</head>
	<body>
    
    	<form action="/register.php" method="post">
    		<?php if(!($usernameSuccess ?? true)) {?>
    		<div>
    		<p>You have an error into your username</p>
    		<?php }?>
    		</div>
        	<label for="username">Your username :</label>
        	<input type="text" name="username" value="<?php echo htmlentities($username ??'')?>"/>
        	<br/>
        	
        	<?php if(!($passwordSuccess ?? true)) {?>
    		<div>
    		<p>You have an error into your password</p>
    		</div>
    		<?php }?>
        	<label for="password_1">Your password :</label>
        	<input type="password" name="password_1"/>
        	<br/>
        	
        	<label for="password_2">Your password :</label>
        	<input type="password" name="password_2"/>
        	<br/>
        	
        	<?php if(!($telephoneSuccess ?? true)) {?>
    		<div>
    		<p>You have an error into your tel no.</p>
    		</div>
    		<?php }?>
        	<label for="telephone" >Your Tel No. :</label>
        	<input type="number" name="telephone"/>
        	<br/>
        	
        	<?php if(!($ageSuccess ?? true)) {?>
    		<div>
    		<p>You have an error into your age</p>
    		</div>
    		<?php }?>
        	<label for="age">Your age :</label>
        	<input type="number" name="age"/>
        	<br/>
        	
        	<button type="submit">Submit</button>
        	
        	
        	
    	</form>
    	
	</body>
</html>