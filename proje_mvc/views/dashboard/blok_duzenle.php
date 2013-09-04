<div class="hero-unit">
    <h3>Blok Ekleme Paneli</h3>
    <p>
    <form action="?go=blok_guncelle" method="post">
        <table cellpadding="4" cellspacing="4">
            <tr>
                <td>Blok Adý :</td>
                <td><input value="<?php echo $this->d_liste[0]["b_name"];?>" type="text" name="b_name" /></td>
            </tr>
            <tr>
                <td>Site :</td>
                <td><select name="b_siteid"><option>..Seçiniz</option>
                    <?php
                       for($i = 0; $i < count($this->site) ; $i++){
                        echo "<option value='".$this->site[$i]['id']."'>".$this->site[$i]['s_name']."</option>";
                       }
                       
                    ?>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn" type="submit" value="Kaydet" /></td>
            </tr>
        </table>
    </form>
    </p>
</div>