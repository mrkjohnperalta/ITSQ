<?php
$final = array();
foreach($num as $b)
{
	if($b!="")
	{
		array_push($final,$b);
	}
}
		


$c = array_combine ( $checked , $final );
// print_r($c);

foreach ($c as $key => $value) 
{
	echo $key." ".$value;
	echo "<br>";
}

?>