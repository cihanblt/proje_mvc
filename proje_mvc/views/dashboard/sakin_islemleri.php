<div class="hero-unit">
    <h2></h2>
    <table class="table">
        <thead>
        <tr class="bas">
            <th>Kullanýcý Adý</th>
            <th>Adý Soyadý</th>
            <th>Telefon</th>
            <th>Telefon (GSM)</th>
            <th>E-Mail</th>
            <th>Baðlý Olduðu Yönetici</th>
            <th>Site</th>
            <th>Blok</th>
            <th>Daire No</th>
            <th>Kiracý/Ev Sahibi</th>
            <th></th>
        </tr>
        </thead>
        <?php // echo var_dump($this->liste);
            //echo count($this->liste);
        for ($i = 0 ; $i < count($this->liste) ; $i++) {
            
        ?>
        <tr>
            <td><?php echo  $this->liste[$i]['r_username'];?></td>
            <td><?php echo  $this->liste[$i]['r_namesurname'];?></td>
            <td><?php echo  $this->liste[$i]['r_phone'];?></td>
            <td><?php echo  $this->liste[$i]['r_gsmphone'];?></td>
            <td><?php echo  $this->liste[$i]['r_email'];?></td>           
            <td><?php echo  $this->liste[$i]['m_namesurname'];?></td>           
            <td><?php echo  $this->liste[$i]['s_name'];?></td>           
            <td><?php echo  $this->liste[$i]['b_name'];?></td>           
            <td><?php echo  $this->liste[$i]['h_number'];?></td>           
            <td><?php echo  $this->liste[$i]['r_civilstatus'];?></td>   
            <td class="td_en"><a href="?go=sakin_detay&id=<?php echo $this->liste[$i]['id'];?>"><img title="Detay Görüntüle" class="icons" src="<?php echo URL;?>public/images/info.png" /></a></td>
            <td class="td_en"><a href="?go=sakin_duzenle&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="Düzenle" src="<?php echo URL;?>public/images/edit.png" /></a></td>
            <td class="td_en"><a href="?go=sakin_sil&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="Sil" src="<?php echo URL;?>public/images/delete.png" /></a></td>
        </tr>
        <?php }?>
    </table>
    <div class="pagination">
      <ul>
       <?php for($i = 1; $i <= $this->sayfa_sayisi ; $i++){
        	echo "<li><a href='?go=sakin_islemleri&s=".$i."'>".$i."</a></li>";
        }
        ?>
      </ul>
    </div>
    <a href="?go=sakin_ekle" class="btn">Ekle</a>
</div>