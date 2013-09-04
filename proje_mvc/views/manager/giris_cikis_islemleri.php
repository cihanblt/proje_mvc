<div class="hero-unit">
	<div class="table-list">
		<div class="satir">
			<div>Giriþ Yapýlan Tarih Aralýðý :</div>
			<div><input type="text" name="input_date_a" style="width:75px;" class="datepicker" value="<?php echo date("d.m.Y");?>" /> ~ <input type="text" name="input_date_b" style="width:75px;" class="datepicker" value="" /></div>
		</div>
		<div class="satir">
			<div>Çýkýþ Yapýlan Tarih Aralýðý :</div>
			<div><input type="text" name="output_date_a" style="width:75px;" class="datepicker" value="<?php echo date("d.m.Y");?>" /> ~ <input type="text" name="output_date_b" style="width:75px;" class="datepicker" value="" /></div>
		</div>
	</div>
	<div style="clear:both;"></div>
	<table class="table table-condensed" style="margin-top:15px;" cellpadding="3" cellspacing="3">
		<thead>
			<tr class="bas">
				<th>Giriþ Tarihi </th>
				<th>Çýkýþ Tarihi </th>
				<th>T.C Kimlik No</th>
				<th>Adý Soyadý </th>
				<th>Telefon </th>
				<th>Telefon(GSM)</th>
				<th>E-Mail </th>
				<th>Doðum Yeri </th>
				<th>Doðum Tarihi </th>
				<th>Blok Adý </th>
				<th>Daire Adý </th>
				<th>Ev Sahibi Adý </th>
			</tr>
		</thead>
		<?php
			for($i = 0; $i < count($this->liste); $i++){
		?>
		<tr>
			<td><?php echo $this->liste[$i]["in_date"];?></td>
			<td><?php echo $this->liste[$i]["out_date"];?></td>
			<td><?php echo $this->liste[$i]["tcnumber"];?></td>
			<td><?php echo $this->liste[$i]["namesurname"];?></td>
			<td><?php echo $this->liste[$i]["phone"];?></td>
			<td><?php echo $this->liste[$i]["gsmphone"];?></td>
			<td><?php echo $this->liste[$i]["email"];?></td>
			<td><?php echo $this->liste[$i]["city_name"];?></td>
			<td><?php echo $this->liste[$i]["birthdate"];?></td>
			<td><?php echo $this->liste[$i]["b_name"];?></td>
			<td><?php echo $this->liste[$i]["h_number"];?></td>
			<td><?php echo $this->liste[$i]["h_namesurname"];?></td>
		</tr>
		<?php }?>
	</table>
	<div class="pagination">
			<ul>
			  <?php for($i = 1; $i <= $this->sayfa_sayisi ; $i++){
				echo "<li><a href='?do=sakin_islemleri&s=".$i."'>".$i."</a></li>";
				}
			?>
			</ul>
			<div style="float:right">
				<a href="#"><img src="<?php echo URL;?>public/images/export_excel.png" />Excel'e Aktar</a>
			</div>
	</div>
</div>