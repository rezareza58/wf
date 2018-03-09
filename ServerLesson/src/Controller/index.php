
<?php
$currentTimeSlot = (new DateTime())->format('H');
$range = range(0,10);

if ($currentTimeSlot >12) {
    $toDisplay = 'good morning';
}elseif ($currentTimeSlot <18) {
    $toDisplay = 'good afternoon';
}elseif ($currentTimeSlot <18) {
    $toDisplay = 'good evening';
}else ($currentTimeSlot <18) {
    $toDisplay = "sleep!"
};



$firstname = $_GET['firstname']?? 'John';
$firstname = htmlentities($firstname);
//$firstname =htmlentities($_GET['firstname']?? 'John');

$lastname = $_GET['lastname']?? 'Doe';
$lastname = htmlentities($lastname);
//$lastname =htmlentities($_GET['lastname']?? 'John');

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Insert title here</title>
	</head>
	<body>
	hello <?php echo $firstname . " " . $lastname?>
		The current time is: <?php echo $toDisplay;?>
		<?php foreach ($range as $element){
		    echo '<li>' . $element . '</li>';
		}?>
	</body>
</html>