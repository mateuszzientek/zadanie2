<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<title>Kalkulator kredytowy</title>
</head>

<body>

<table align="center">
<tr> 
   <td colspan="3" style="padding: 30px; margin-bottom: 20px; width:700px; font-size:40px; text-align: center;">Kalkulator kredytowy</td>
</tr>
   <td style="font-size:30px; padding:10px;" >
      <form action="<?php print(_APP_URL);?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
       <label >Podaj kwote: <input type="text" name="kwota" value="<?php out($kwota) ?>"/></label >
       <label >Podaj lata: <input type="text" name="lata" value="<?php out($lata) ?>"/></label >
       <label >Podaj oprocentowanie: <input type="text" name="opr" value="<?php out($opr) ?>"/></label >
       <label ><input type="submit" value="Przelicz" class="pure-button pure-button-primary" style="font-size:80%;"/></label >
       </form>
    </td>
</tr>

<tr>
	<td colspan="2" style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">
      <?php
	   if (isset($messages)) 
	{
		if (count ( $messages ) > 0) 
		{
		echo '<ul>';
		foreach($messages as $msg )
		  {
            echo '<li style="font-size:30px;" >'.$msg.'</li>';
		  }
		echo '</ul>';
	   }
	}
	   
if (isset($wynik))
{ 
 echo '<p style="font-size:30px;"> Rata miesieczna: '. $wynik;
}
?>

    </td>
</tr>
<tr>
  <td >
    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" style="margin: 20px; font-size:150%;" class="pure-button pure-button-active">Wyloguj</a>
  </td>
</tr>
</table>

</body>
</html>