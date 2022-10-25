
<?php

$conn = pg_connect("postgres://postgres://cdrrsktpbfjwaj:d4c2d8e20c64df217eb3cfd68d25b1641f924bf2db54b84b53cdca94d24ede8c@ec2-44-209-24-62.compute-1.amazonaws.com:5432/d9a7o0ldo4aahk
");
	if(!$conn)
	{
		die("Could not connect to database");
    }

	
/*	
$conn = pg_connect("host=localhost port=5432 dbname=ATNshop user=postgres password=20102001");
if (!$conn) {
	die("Connection failed");
}*/
?>