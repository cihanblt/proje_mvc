<div class="hero-unit">
    <h2>Daire Bilgileri</h2>
    
    <table class="detay_tablo" cellpadding="3" cellspacing="3" style="width:50%">
        <tr>
            <td>
                <table cellpadding="3" cellspacing="3">
                    <tr>
                        <td>Daire Adý:</td>
                        <td><strong><?php echo $this->d_liste[0]['h_name'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Daire Numarasý:</td>
                        <td><strong><?php echo $this->d_liste[0]['h_number'];?></strong></td>
                    </tr> 
                    <tr>
                        <td>Site Adý:</td>
                        <td><strong><?php echo $this->d_liste[0]['s_name'];?></strong></td>
                    </tr>   
                    <tr>
                        <td>Blok Adý:</td>
                        <td><strong><?php echo $this->d_liste[0]['b_name'];?></strong></td>
                    </tr>  
                    <tr>
                        <td>Daire Durumu:</td>
                        <td><strong><?php 
                        
                            $durum = $this->d_liste[0]['h_status'];
                            if($durum == 0){
                                echo 'Boþ';
                            }  elseif($durum == 1) {
                                echo 'Ýkamet Ediliyor';                             
                            }elseif ($durum == 2) {
                                echo 'Satýlýk';
                            }elseif ($durum == 3) {
                                echo 'Kiralýk'; 
                            }
                        ?></strong></td>
                    </tr>  
                </table>
            </td>
            
        </tr>
    </table>
</div>