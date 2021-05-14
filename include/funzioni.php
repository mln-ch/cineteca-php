<?php
/**
 * Rielabora l'url per SEO
 *
 * @param $string la stringa da strasformare in url
 * @return string l'url trasformato
 */
function seoUrl($string)
{
	$string = preg_replace("`\[.*\]`U","",$string);
	$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
	$string = htmlentities($string, ENT_COMPAT, 'utf-8');
	$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","", $string );
	$string = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $string);

	return strtolower(trim($string, '-'));
}


/**
 * Prevenire SQL Injection sul parametro passato
 *
 * @param $val il valore da ripulire
 * @param bool $clean_space (opzionale) se bisogna eliminare gli spazi
 * @return string il valore ripulito
 */
function makeSafe($val, $clean_space = false)
{
	//applico addslashes se non è già stato fatto da magic_quotes_gpc
	if(!get_magic_quotes_gpc())
	{
		$val = addslashes($val);
	}

	//elimino parole riservate a mysql
	$val = str_replace(array('UNION', 'union', 'SELECT', 'select', 'WHERE', 'where', 'FROM', 'from', 'DROP', 'drop', 'TRUNCATE', 'truncate'), '', $val);

	//se richiesto, elimino gli spazi dal parametro
	if($clean_space == true)
	{
		$val = str_replace(' ', '', $val);
	}

	return $val;
}


/**
 * Prende la query string della url, escludendo il parametro "lang"
 *
 * @return string, la query string senza il parametro "lang"
 */
function takeGET()
{
	$count = count($_GET);
	$stringa = "";

	foreach($_GET as $key => $val)
	{
		if($key != 'lang')
		{
			$val = stripslashes(trim($val));
			$stringa .= $key . '=' . $val . '&';
		}
	}

	return $stringa;
}


/**
 * Genera una password casuale
 *
 * @param int $lunghezza (opzionale), la lunghezza della password da generare
 * @return string la password generata
 */
function generaPassword($lunghezza = 8)
{
	$set = 'abcdefghilmnopqrstuvz0123456789$%_!&';
	$password = '';

	for($i = 0; $i < $lunghezza; $i++)
	{
		$char = substr($set, mt_rand(0, strlen($set)-1), 1);
		$password .= $char;
	}

	return $password;
}


/**
 * Traduzione lingua
 * 
 */

//  function trad($param1, $param2, $param3, $param4) {

// 	if(isset):

// 	else:

// 	endif;

// 	return

//  }
