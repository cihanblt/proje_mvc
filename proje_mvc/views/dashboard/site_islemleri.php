<div class="hero-unit">
    <h2></h2>
    <table class="table" style="width:800px;">
        <thead>
        <tr class="bas">
            <th>Site Adý</th>
            <th>Ýl</th>
            <th>Ýlçe</th>
            <th>Tam Adres</th>
            <th></th>
        </tr>
        </thead>
        <?php for($i = 0; $i < count($this->liste); $i++){?>
        <tr>
            <td><?php echo $this->liste[$i]["s_name"];?></td>
            <td><?php echo $this->liste[$i]["city_name"];?></td>
            <td><?php echo $this->liste[$i]["district_name"];?></td>
            <td><?php echo $this->liste[$i]["s_adress"];?></td>
            <td class="td_en"><a href="?go=site_detay&id=<?php echo $this->liste[$i]['id'];?>"><img title="Detay Görüntüle" class="icons" src="<?php echo URL;?>public/images/info.png" /></a></td>
            <td class="td_en"><a href="?go=site_duzenle&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="Düzenle" src="<?php echo URL;?>public/images/edit.png" /></a></td>
            <td class="td_en"><a href="?go=site_sil&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="Sil" src="<?php echo URL;?>public/images/delete.png" /></a></td>
        </tr>
        <?php }?>
    </table>
    <div class="pagination">
      <ul>
        <?php for($i = 1; $i <= $this->sayfa_sayisi ; $i++){
        	echo "<li><a href='?go=site_islemleri&s=".$i."'>".$i."</a></li>";
        }
        ?>
      </ul>
    </div>
    <a href="?go=site_ekle" class="btn">Ekle</a>
    
</div>