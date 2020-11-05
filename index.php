<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST['inn'])) {
		echo "Вы не ввели значение";
	}
	else
		$inn = $_POST['inn'];
    	$innresult = trim($inn);
}
require_once __DIR__ . '/vendor/autoload.php';
$token = "8fb1113a0b2d2981792abc349ab27040fca56872";
$dadata = new \Dadata\DadataClient($token, null);
$response = $dadata->findById("party", $innresult);
$cout_array = count($response);
?>
<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>ИНН</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST">
		<label>Введите ИНН</label><br>
		<input type="text" name="inn">
		<input type='submit' value='Отправить'>
	</form>
		<table>
			<tr>
				<th>Название</th>
				<th>ИНН</th>
				<th>ОГРН</th>
				<th>ОКПО</th>
				<th>Тип</th>
				<th>Статус</th>
			</tr>
	<?php
		for ($number_el=0; $number_el < $cout_array; $number_el++) {?> 
			<tr>
				<td><? echo $response[$number_el]["value"];?></td>
				<td><? echo $response[$number_el]["data"]["inn"];?></td>
				<td><? echo $response[$number_el]["data"]["ogrn"];?></td>
				<td><? echo $response[$number_el]["data"]["okpo"];?></td>
				<td><? echo $response[$number_el]["data"]["type"];?></td>
				<td><? echo $response[$number_el]["data"]["state"]["status"];?></td>
			</tr>
		<?}?>
		</table>
	
</body>
</html>
