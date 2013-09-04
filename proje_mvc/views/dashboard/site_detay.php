<div class="hero-unit">
    <h2>Site Bilgileri</h2>
    
    <table class="detay_tablo" cellpadding="3" cellspacing="3" style="width:50%">
        <tr>
            <td>
                <table cellpadding="3" cellspacing="3">
                    <tr>
                        <td>Site Adý:</td>
                        <td><strong><?php echo $this->d_liste[0]['s_name'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Ýl:</td>
                        <td><strong><?php echo $this->d_liste[0]['city_name'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Ýlçe:</td>
                        <td><strong><?php echo $this->d_liste[0]['district_name'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Adres:</td>
                        <td><strong><?php echo $this->d_liste[0]['s_adress'];?></strong></td>
                    </tr>
                    
                </table>
            </td>
            
        </tr>
    </table>
</div>