<div class="hero-unit">

    <form action="?do=blok_kaydet" method="post"></form>
        <table cellpadding="4" cellspacing="4">
            <tr>
				<input type="hidden" name="siteid" value="<?php echo $this->siteid;?>" />
                <td><div>Blok Ad� :</div><div><input type="text" name="b_name" /></div></td>
				<td><div>Daire �zellik Tipi :</div><div><select name="d_ozellik">
					<option value="1">m'2 ye g�re</option>
					<option value="2">Oda say�s�na g�re</option>
				</select></div></td>
                <td><div>Daire Say�s� : </div><div><input type="text" name="h_count" /></div></td>
				<td></td>
                <td><div>&nbsp;</div><div><input class="btn btn-primary" onclick="daire_olustur()" type="submit" value="Ekle" /></div></td>
            </tr>
        </table>
	<div id="daire_listele">
		
	</div>
</div>