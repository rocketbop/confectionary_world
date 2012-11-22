<?php

$cinemas = array ('12'=>"Cinema 1",'13'=> "Cinema 2", '14'=>"Cinema 3" );
$movies = array ('22'=>"Movie 1", '23'=>"Movie 2", '24'=>"Movie 3" );
$cars = array ('32'=>"Car 1", '33'=>"Car 2", '34'=>"Car 3" );

function generateSelect($tagID, $arrayItems, $selectedID = 0) {
	$htmlString = "";
	$htmlString .= "<select id='$tagID' name='$tagID'>\n";
	
	foreach ( $arrayItems as $key => $value ) {
		
		$selected = $selectedID == $key ? " selected ": "";
		$htmlString .= "<option value='$key' $selected>" . $value . "</option>\n";
	}
	
	$htmlString .= "</select>\n";
	
	return $htmlString;
}

function uihelperText($arrayOfAttributes) {
	$attributes = "";
	foreach($arrayOfAttributes as $key => $value ) {

		$attributes .= " $key='$value' ";
	
	}

return "<input type='text' $attributes />";

}

$textItems = array();

$textItems['id']='mytb_id';
$textItems['name']='mytb_nm';
$textItems['class']='numeric';
$textItems['placeholder']='Enter your Age';
$textItems['value']='';
echo generateSelect ( 'cinema_id', $cinemas,13 );
echo generateSelect ( 'movie_id', $movies,23 );
echo generateSelect ( 'car_id', $cars , 33);

echo uihelperText($textItems);

$houseTypes = array ('12'=>"Detached",'13'=> "Semi-Detached", '14'=>"Terraced" );
$county = array ('22'=>"Dublin", '23'=>"cork", '24'=>"Limerick" );
$priceRange = array ('32'=>"< 100k", '33'=>"100-200k", '34'=>"200-300k" );


echo "<hr />";
echo "<form>";
echo generateSelect ( 'housetype_id', $houseTypes,13 );
echo generateSelect ( 'county_id', $county,23 );
echo generateSelect ( 'price_id', $priceRange , 33);

echo "<input type='button' value='search'/>";
echo "</form>";

