<div class="hero-unit">
    <h2></h2>
    <table class="table" style="width:400px;">
        <thead>
        <tr class="bas">
            <th>Blok Adý</th>
            <th>Site Adý</th>
            <th></th>
        </tr>
        </thead>
         <?php for($i = 0; $i < count($this->liste); $i++){?>
        <tr>
            <td><?php echo $this->liste[$i]["b_name"];?></td>
            <td><?php echo $this->liste[$i]["s_name"];?></td>
            <td class="td_en"><a href="?go=blok_detay&id=<?php echo $this->liste[$i]['id'];?>"><img title="Detay Görüntüle" class="icons" src="<?php echo URL;?>public/images/info.png" /></a></td>
            <td class="td_en" ><a href="?go=blok_duzenle&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="Düzenle" src="<?php echo URL;?>public/images/edit.png" /></a></td>
            <td class="td_en"><a href="?go=blok_sil&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="Sil" src="<?php echo URL;?>public/images/delete.png" /></a></td>
        </tr>
        <?php }?>
    </table>
      <div class="pagination">
        <ul>
          <?php for($i = 1; $i <= $this->sayfa_sayisi ; $i++){
        	echo "<li><a href='?go=blok_islemleri&s=".$i."'>".$i."</a></li>";
        }
        ?>
        </ul>
      </div>
    <a href="?go=blok_ekle" class="btn">Ekle</a>
</div>