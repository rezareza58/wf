<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My title here</title>
    </head>
    <body>
<?php
$displayAccountUsername = $_GET['username'] ?? null;

if (!$displayAccountUsername || !is_string($displayAccountUsername)) {
    ?>
    	<div>
    		<p>To be displayed, this page need a valid numeric id as query string parameter</p>
    	</div>
    <?php 
} else {
    try {
        $connection = new PDO('mysql:host=localhost;dbname=register', 'root');
    } catch (PDOException $exception) {
        http_response_code(500);
        echo 'A problem occured, contact support';
        exit(1);
    }
    
    $sql = 'SELECT* FROM user WHERE username = :username';
    $statment = $connection->prepare($sql);
    $statment->bindParam('username', $displayAccountUsername, PDO::PARAM_STR);
    $statment->execute();
    
    // case of fetchAll
    $allResults = $statment->fetchAll();
    if (empty($allResults)) {
        ?>
    	<div>
    		<p>To be displayed, this page need a valid username as query string parameter</p>
    	</div>
    	<?php 
    	return;
    }
    
    foreach ($allResults as $aLine) {
        ?>
    	<div>
    		<p>id : <?php echo $aLine['id']; ?></p>
    		<p>Username : <?php echo $aLine['username']; ?></p>
    		<p>Password : <?php echo $aLine['password']; ?></p>
    	</div>
    	<?php 
    }
    
    // Case of fetch
    // while ( ($aLine = $results->fetch()) !== false ){
    //     $aLine['username'];
    //     $aLine['password'];
    // }
}
?>
    </body>
</html>
 
