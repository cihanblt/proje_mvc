<div class="hero-unit">
    <h3>Site D�zenleme Paneli</h3>
    <p>
    <form action="?go=site_guncelle" method="post">
        <table cellpadding="4" cellspacing="4">
            <tr>
                <td>Site Ad� :</td>
                <td><input value="<?php echo $this->d_liste[0]['s_name'];?>" type="text" name="s_name" /></td>
            </tr>
            <tr>
                <td>�l :</td>
                <td><select onchange="ilce_sec()" id="il" name="s_cityid"><option>..Se�iniz..</option>
                    <?php
                       for($i = 0; $i < count($this->il) ; $i++){
                        echo "<option value='".$this->il[$i]['id']."'>".$this->il[$i]['city_name']."</option>";
                       }
                       
                    ?>
                    </select></td>
            </tr>
            <tr>
                <td>�l�e :</td>
                <td><select id="ilce" name="s_districtid"><option>..Se�iniz</option></select></td>
            </tr>
            <tr>
                <td>Tam Adres :</td>
                <td><textarea name="s_adress" row="4" cols="20"><?php echo $this->d_liste[0]['s_adress'];?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn" type="submit" value="Kaydet" /></td>
            </tr>
        </table>
    </form>
    </p>
</div>