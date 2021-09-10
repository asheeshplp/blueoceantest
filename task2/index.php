<?php
require "soaplib.php";

$soapObject 	= 	Soaplib::getInstance();
$result			=	$soapObject->listPeople();
if(!empty($result)) {
	echo '<table border="2">';
	echo '<tr>';
	echo '<th>S. No</th>';
	echo '<th>Name</th>';
	echo '</tr>';
	foreach($result as $key => $value) {		
		echo '<tr>';
		echo '<td>'.$key.'</td>';		
		echo '<td>'.$value.'</td>';
		echo '</tr>';
	}
	echo '</table>';	
} else {
	echo '<table border="2">';
	echo '<tr>';
	echo '<th>S. No</th>';
	echo '<th>Name</th>';
	echo '</tr>';		
	echo '<tr>';
	echo '<td colspan="2"> No Record Found</td>';
	echo '</tr>';
	echo '</table>';
}
?>