<?php
/**
* 	
*/
class Validation
{
	
	function nettoyerString($elt) 
	{
		$elt = filter_var($elt, FILTER_SANITIZE_STRING);
		$elt = addslashes($elt);
		$elt = trim($elt);
		return $elt;
	}

	function estUnInt($elt)
	{
		return filter_var($elt, FILTER_VALIDATE_INT);
	}

	function estUnMail($elt)
	{
		return filter_var($elt, FILTER_VALIDATE_EMAIL);			
	}
}

