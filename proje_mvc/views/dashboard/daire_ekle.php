<div class="hero-unit">
    <h3>Daire Ekleme Paneli</h3>
    <p>
    <form action="?go=daire_kaydet" method="post">
        <table cellpadding="4" cellspacing="4">
            <tr>
                <td>Daire Ad� :</td>
                <td><input type="text" name="h_name" /></td>
            </tr>
            <tr>
                <td>Daire Numaras� :</td>
                <td><input type="text" name="h_number" /></td>
            </tr>
            <tr>
                <td>Site :</td>
                <td><select id="site" onchange="blok_sec()" name="h_siteid"><option>..Se�iniz..</option>
                    <?php
                       for($i = 0; $i < count($this->site) ; $i++){
                        echo "<option value='".$this->site[$i]['id']."'>".$this->site[$i]['s_name']."</option>";
                       }
                       
                    ?>
                    </select></td>
            </tr>
            <tr>
                <td>Blok :</td>
                <td><select id="blok" onchange="daire_sec()" name="h_blokid"><option>..Se�iniz..</option></select></td>
            </tr>
            <tr>
                <td>Daire Durumu :</td>
                <td><select name="h_status"><option value="0">Bo�</option><option value="1">�kamet ediliyor</option><option value="2">Sat�l�k</option><option value="3">Kirada</option></select></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn" type="submit" value="Kaydet" /></td>
            </tr>
        </table>
    </form>
    </p>
</div>