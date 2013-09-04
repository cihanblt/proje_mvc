<?php
class Daire_Olustur extends PDO{
	function __construct(){
		 parent::__construct('mysql:host=localhost;dbname=site_management', 'root','');
		 header("Content-type:text/html; Charset=iso-8859-9");
		 if($_POST){
			$b_name = $_POST["b_name"];
			$h_count = $_POST["h_count"];
			$siteid = $_POST["siteid"];
			$d_ozellik = $_POST["d_ozellik"];
			$kaydet = $this->prepare("INSERT INTO tbl_blok VALUES (NULL,$d_ozellik,$h_count,'$b_name',$siteid)");
			$kaydet->execute();
			$hs = $this->prepare("SELECT * FROM tbl_HouseStatus");
			$hs->execute();
			$this->status = $hs->fetchAll(PDO::FETCH_ASSOC);
			$blokid = $this->lastInsertId();
			echo "<form action='' method='method'>
				<table class='table' cellpadding=1 cellspacing=1>
				<thead>
					<th>Daire No </th>
					<th>Daire Adý</th>
					<th>Daire Özelliði</th>
					<th>Kullanýcý Adý</th>
					<th>Þifre</th>
					<th>Þifre(Tekrar)</th>
					<th>T.C Kimlik No</th>
					<th>Telefon</th>
					<th>Telefon(GSM)</th>
					<th>E-Mail</th>
					<th>Doðum Tarihi</th>
					<th>Tam Adres</th>
				</thead>
			";
				for($i = 1; $i <= $h_count; $i++){
					echo "<tr>
						<td>$i</td>
						<td><input style='width:80px' type='text' name='h_name' /></td>
						<td><input style='width:60px' type='text' name='h_property' /></td>
						<td><select style='width:80px' name='h_status'>";
						for($j = 0; $j < count($this->status); $j++){
							echo "<option value='".$this->status[$j]["id"]."'>".$this->status[$j]["house_status"]."</option>";
						}	
					echo	"</select></td>
						<td><input style='width:80px' type='text' name='' </td>
						<td><input style='width:80px' type='text' name='' </td>
						<td><input style='width:80px' type='text' name='' </td>
						<td><input style='width:80px' type='text' name='' </td>
						<td><input style='width:80px' type='text' name='' </td>
						<td><input style='width:80px' type='text' name='' </td>
						<td><input style='width:80px' type='text' name='' </td>
						<td><input style='width:80px' type='text' name='' </td>
					</tr>";
				}
			echo "</table><input type='submit' class='btn btn-success' value='Kaydet' />";
		 }
	}
}
new Daire_Olustur();
?>