<div class="hero-unit">
    <h2></h2>
    <table class="table">
        <thead>
        <tr class="bas">
            <th>Daire Adý</th>
            <th>Daire Numarasý</th>
            <th>Site Adý</th>
            <th>Blok Adý</th>
            <th>Daire Durumu</th>
            <th></th>
        </tr>
        </thead>
        <?php for($i = 0; $i < count($this->liste); $i++){?>
        <tr>
            <td><?php echo $this->liste[$i]["h_name"];?></td>
            <td><?php echo $this->liste[$i]["h_number"];?></td>
            <td><?php echo $this->liste[$i]["s_name"];?></td>
            <td><?php echo $this->liste[$i]["b_name"];?></td>
            <td><?php $durum = $this->liste[$i]['h_status'];
                            if($durum == 0){
                                echo 'Boþ';
                            }  elseif($durum == 1) {
                                echo 'Ýkamet Ediliyor';                             
                            }elseif ($durum == 2) {
                                echo 'Satýlýk';
                            }elseif ($durum == 3) {
                                echo 'Kiralýk'; 
                            };?></td>
            <td class="td_en"><a href="?go=daire_detay&id=<?php echo $this->liste[$i]['id'];?>"><img title="Detay Görüntüle" class="icons" src="<?php echo URL;?>public/images/info.png" /></a></td>
            <td class="td_en"><a href="?go=daire_duzenle&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="Düzenle" src="<?php echo URL;?>public/images/edit.png" /></a></td>
            <td class="td_en"><a href="?go=daire_sil&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="Sil" src="<?php echo URL;?>public/images/delete.png" /></a></td>
        </tr>
        <?php }?>
    </table>
    <div class="pagination">
        <ul>
          <?php for($i = 1; $i <= $this->sayfa_sayisi ; $i++){
        	echo "<li><a href='?go=daire_islemleri&s=".$i."'>".$i."</a></li>";
        }
        ?>
        </ul>
      </div>
    <a href="?go=daire_ekle" class="btn">Ekle</a>
</div>