<div class="hero-unit">
    <h2></h2>
    <table class="table">
        <thead>
        <tr class="bas">
            <th>Daire Ad�</th>
            <th>Daire Numaras�</th>
            <th>Site Ad�</th>
            <th>Blok Ad�</th>
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
                                echo 'Bo�';
                            }  elseif($durum == 1) {
                                echo '�kamet Ediliyor';                             
                            }elseif ($durum == 2) {
                                echo 'Sat�l�k';
                            }elseif ($durum == 3) {
                                echo 'Kiral�k'; 
                            };?></td>
            <td class="td_en"><a href="?go=daire_detay&id=<?php echo $this->liste[$i]['id'];?>"><img title="Detay G�r�nt�le" class="icons" src="<?php echo URL;?>public/images/info.png" /></a></td>
            <td class="td_en"><a href="?go=daire_duzenle&id=<?php echo $this->liste[$i]['id'];?>"><img class="icons" title="D�zenle" src="<?php echo URL;?>public/images/edit.png" /></a></td>
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