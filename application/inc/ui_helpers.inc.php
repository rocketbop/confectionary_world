<?php
function uihelperSelect($selectID, $arrayItems, $selectedItem = "") {
	

	$htmlString = "<select id='$selectID' name='$selectID'>";
	foreach($arrayItems as $option) {
		
		$optionLabel = $option["label"];
		$optionID = $option["id"];
		
		$selected = $optionID == $selectedItem ? " selected " : "";
		
		
		$htmlString .= "<option value='$optionID' $selected>$optionLabel</option>";
	
	}
	
	$htmlString .= "</select>";
	
	return $htmlString;
}