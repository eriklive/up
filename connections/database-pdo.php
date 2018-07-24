<?
	include 'keys.php';

	try{
		$connection = new PDO(
			'mysql:host='.$keys->dbhost .';dbname='.$keys->dbname,
			$keys->dbuser, 
			$keys->dbpassword
		);
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
?>