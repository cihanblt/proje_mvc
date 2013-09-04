<div class="hero-unit">
    <h3>Site Ekleme Paneli</h3>
    <p>
    <form action="?go=site_kaydet" method="post">
        <table cellpadding="4" cellspacing="4">
            <tr>
                <td>Site Adý :</td>
                <td><input type="text" name="s_name" /></td>
            </tr>
            <tr>
                <td>Ýl :</td>
                <td><select onchange="ilce_sec()" id="il" name="s_cityid"><option>..Seçiniz..</option>
                    <?php
                       for($i = 0; $i < count($this->il) ; $i++){
                        echo "<option value='".$this->il[$i]['id']."'>".$this->il[$i]['city_name']."</option>";
                       }
                       
                    ?>
                    </select></td>
            </tr>
            <tr>
                <td>Ýlçe :</td>
                <td><select id="ilce" name="s_districtid"><option>..Seçiniz</option></select></td>
            </tr>
            <tr>
                <td>Tam Adres :</td>
                <td><textarea name="s_adress" row="4" cols="20"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn" type="submit" value="Kaydet" /></td>
            </tr>
        </table>
    </form>
    </p>
</div>