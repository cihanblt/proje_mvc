<div class="hero-unit">
    <h2></h2>
    <table class="table">
        <thead>
        <tr class="bas">
            <th>Kullan�c� Ad�</th>
            <th>T.C Kimlik No</th>
            <th>Ad� Soyad�</th>
            <th>Cinsiyet</th>
            <th>Telefon</th>
            <th>Telefon (GSM)</th>
            <th>�l</th>
            <th>�l�e</th>
            <th>Site</th>
            <th>E-Mail</th>
            <th></th>
        </tr>
        </thead>
        <?php // echo var_dump($this->liste);
            //echo count($this->liste);
        for ($i = 0 ; $i < count($this->liste) ; $i++) {
            
        ?>
        <tr>
            <td><?php echo  $this->liste[$i]['m_username'];?></td>
            <td><?php echo  $this->liste[$i]['m_tcnumber'];?></td>
            <td><?php echo  $this->liste[$i]['m_namesurname'];?></td>
            <td><?php echo  $this->liste[$i]['m_gender'];?></td>
            <td><?php echo  $this->liste[$i]['m_phone'];?></td>           
            <td><?php echo  $this->liste[$i]['m_gsmphone'];?></td>           
            <td><?php echo  $this->liste[$i]['city_name'];?></td>           
            <td><?php echo  $this->liste[$i]['district_name'];?></td>           
            <td><?php echo  $this->liste[$i]['s_name'];?></td>           
            <td><?php echo  $this->liste[$i]['m_email'];?></td>   
            <td class="td_en"><a href="?go=yonetici_detay&id=<?php echo $this->liste[$i]['id'];?>"><img title="Detay G�r�nt�le" class="icons" src="<?php echo URL;?>public/images/info.png" /></a></td>
            <td class="td_en"><a href="?go=yonetici_duzenle&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="D�zenle" src="<?php echo URL;?>public/images/edit.png" /></a></td>
            <td class="td_en"><a href="?go=yonetici_sil&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="Sil" src="<?php echo URL;?>public/images/delete.png" /></a></td>
        </tr>
        <?php }?>
    </table>
    <div class="pagination">
      <ul>
          <?php for($i = 1; $i <= $this->sayfa_sayisi ; $i++){
        	echo "<li><a href='?go=yonetici_islemleri&s=".$i."'>".$i."</a></li>";
        }
        ?>
      </ul>
    </div>
    <a href="?go=yonetici_ekle" class="btn">Ekle</a>
</div>