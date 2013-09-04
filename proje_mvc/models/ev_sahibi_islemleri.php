<div class="hero-unit">
        <form action="?do=ev_sahibi_islemleri&mdl=ara" method="post">
        <table cellpadding="3" cellspacing="3">
        	<tr>
        		<td>Blok :</td>
        		<td>Daire Numarasý :</td>
        		<td>Adý Soyadý :</td>
        		<td>E-Mail :</td>
        	</tr>
        	<tr>
        		<td><input type="hidden" id="site" value="<?php echo $this->siteid;?>"/>
        		<select id="blok1" onchange="daire_sec(1)" name="h_blokid"><option value="">..Seçiniz..</option>
                	<?php  for($i = 0 ; $i < count($this->blok_list); $i++){
                		  echo '<option value='.$this->blok_list[$i]["id"].'>'.$this->blok_list[$i]["b_name"].'</option>';
                	}?>
                </select></td>
                <td><select id="daire-1" name="h_houseid">
                	<option value="">..Seçiniz..</option>
                	</select></td>
                <td><input type="text" name="h_namesurname" /></td>
        		<td><input type="text" name="h_email" /></td>
                <td><input class="btn" type="submit" value="Ara" /></td>
           </tr>
           </table>
           </form>
           <a href="#" class="btn btn-success" onclick="yeni_ekle('ev_sahibi')">Yeni Ekle</a>
                	<div class="modal hide fade" id="yeni_ekle_ev_sahibi">
					  <div class="modal-header">
					  </div>
					  <div class="modal-body">
					  <form id="ev_sahibi_form" action="?do=ev_sahibi_kaydet" method="post">
					    <table cellpadding="3" cellspacing="3" style="margin: 0 auto;td:{padding:3px;}">
					    	<tr>
					    		<td>Kullanýcý Adý : *</td>
					    		<td><input type="text" name="h_username" /></td>
					    	</tr>
					    	<tr>
					    		<td>Þifre : *</td>
					    		<td><input type="password" name="h_pass" /></td>
					    	</tr>
					    	<tr>
					    		<td>Þifre (Tekrar) : *</td>
					    		<td><input type="password" name="h_pass2" /></td>
					    	</tr>
					    	<tr>
					    		<td>Adý Soyadý : *</td>
					    		<td><input type="text" name="h_nameusername" /></td>
					    	</tr>
					    	<tr>
					    		<td>Blok Seçin : *</td>
								<td><input type="hidden" id="site" value="<?php echo $this->siteid;?>"/>
								<select id="blok2" onchange="daire_sec(2)" name="h_blokid"><option>..Seçiniz..</option>
					                	<?php  for($i = 0 ; $i < count($this->blok_list); $i++){
					                		  echo '<option value='.$this->blok_list[$i]["id"].'>'.$this->blok_list[$i]["b_name"].'</option>';
					                	}?>
					                </select></td>
					              
				               
					    	</tr>
					    	<tr>
					    		  <td>Daire Seçin : *</td>
					    		  <td><select id="daire-2" name="h_houseid">
				                	  <option>..Seçiniz..</option>
				                	  </select> </td>
					    	</tr>
					    	<tr>
					    		<td>Telefon : *</td>
					    		<td><input type="text" name="h_phone" /></td>
					    	</tr>
					    	<tr>
					    		<td>Telefon (GSM) :</td>
					    		<td><input type="text" name="h_gsmphone" /></td>
					    	</tr>
					    	<tr>
					    		<td>E-Mail :</td>
					    		<td><input type="text" name="h_email" /></td>
					    	</tr>
					    	<tr>
					    		<td>Adres :</td>
					    		<td><textarea rows="3" cols="35" name="h_adress"></textarea></td>
					    	</tr>
					    </table>
					    </form>
					  </div>
					  <div class="modal-footer">
					    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Ýptal</a>
					    <input type="button" onclick="ev_sahibi_form()" class="btn btn-primary" value="Kaydet"/>
					  </div> 
					  <div id="target"></div>
					</div>
	
    <table class="table">
        <thead>
        <tr class="bas">
        	<th>Blok Adý</th>
        	<th>Daire Numarasý</th>
        	<th>Adý Soyadý</th>
        	<th>Telefon</th>
        	<th>Telefon(GSM)</th>
        	<th>E-Mail</th>
        	<th>Ýkamet Adresi</th>
            <th>Daire Durumu</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php for($i = 0; $i < count($this->liste); $i++){?>
        <tr>
        	<td><?php echo $this->liste[$i]["b_name"];?></td>
        	<td><?php echo $this->liste[$i]["h_number"];?></td>
            <td><?php echo $this->liste[$i]["h_namesurname"];?></td>
            <td><?php echo $this->liste[$i]["h_phone"];?></td>
            <td><?php echo $this->liste[$i]["h_gsmphone"];?></td>
            <td><?php echo $this->liste[$i]["h_email"];?></td>
            <td><?php echo $this->liste[$i]["h_adress"];?></td>
            <td><?php echo $this->liste[$i]['house_status'];?></td>
            <td><a href="" onclick="daire(<?php echo $this->liste[$i]["id"];?>,'_degisim')"><img title="Apartman Sakini Deðiþimi" src="<?php echo URL;?>public/images/degisim.png" /></a></td>
            <td class="td_en"><a href="#" onclick="ev_sahibi(<?php echo $this->liste[$i]["id"];?>,'_duzenle')"><img class="icons" title="Düzenle" src="<?php echo URL;?>public/images/edit.png" /></a>
            	<div class="modal hide fade" id="ev_sahibi_duzenle-<?php echo $this->liste[$i]["id"];?>" >
            	  <div class="modal-body">
				    <form action="?do=daire_guncelle&id=<?php echo $this->liste[$i]["id"];?>" method="post">
				    	 <table cellpadding="3" cellspacing="3" style="margin: 0 auto;td:{padding:3px;}">
					    	<tr>
					    		<td>Kullanýcý Adý : *</td>
					    		<td><input type="text" name="h_username" value="<?php echo $this->liste[$i]['h_username'];?>"/></td>
					    	</tr>
					    	<tr>
					    		<td>Þifre : *</td>
					    		<td><input type="password" name="h_pass" /></td>
					    	</tr>
					    	<tr>
					    		<td>Þifre (Tekrar) : *</td>
					    		<td><input type="password" name="h_pass2" /></td>
					    	</tr>
					    	<tr>
					    		<td>Adý Soyadý : *</td>
					    		<td><input type="text" name="h_namesurname" value="<?php echo $this->liste[$i]['h_namesurname'];?>"/></td>
					    	</tr>
					    	<tr>
					    		<td>Blok Seçin : *</td>
								<td><input type="hidden" id="site" value="<?php echo $this->siteid;?>"/>
								<select id="blok3" onchange="daire_sec(3)" name="h_blokid"><option>..Seçiniz..</option>
					                	<?php  for($j = 0 ; $j < count($this->blok_list); $j++){
					                		  if($this->blok_list[$j]['id'] == $this->liste[$i]["bid"]){
			                		    		echo '<option value='.$this->blok_list[$j]["id"].' selected="selected">'.$this->blok_list[$j]["b_name"].'</option>';
			                		    	}else{
			                		    		echo '<option value='.$this->blok_list[$j]["id"].'>'.$this->blok_list[$j]["b_name"].'</option>';
			                		    	}
					                	}?>
					                </select></td>
					              
				               
					    	</tr>
					    	<tr>
					    		  <td>Daire Seçin : *</td>
					    		  <td><select id="daire-3" name="h_houseid">
				                	  <option>..Seçiniz..</option>
				                	  </select> </td>
					    	</tr>
					    	<tr>
					    		<td>Telefon : *</td>
					    		<td><input type="text" name="h_phone" value="<?php echo $this->liste[$i]['h_phone'];?>" /></td>
					    	</tr>
					    	<tr>
					    		<td>Telefon (GSM) :</td>
					    		<td><input type="text" name="h_gsmphone" value="<?php echo $this->liste[$i]['h_gsmphone'];?>" /></td>
					    	</tr>
					    	<tr>
					    		<td>E-Mail :</td>
					    		<td><input type="text" name="h_email" value="<?php echo $this->liste[$i]['h_email'];?>"/></td>
					    	</tr>
					    	<tr>
					    		<td>Adres :</td>
					    		<td><textarea rows="3" cols="35" name="h_adress"><?php echo $this->liste[$i]['h_adress'];?></textarea></td>
					    	</tr>
					    </table>
				  	  	<div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Ýptal</a>
				 			  <input type="submit" class="btn btn-success" value="Kaydet" />
				 		 </div>
				    </form>
				  </div>
				</div>
            </td>
            <td class="td_en"><a href="#" onclick="ev_sahibi(<?php echo $this->liste[$i]["id"];?>,'_sil')"><img class="icons" title="Sil" src="<?php echo URL;?>public/images/delete.png" /></a>
            <div class="modal hide fade" id="ev_sahibi_sil-<?php echo $this->liste[$i]["id"];?>">
				  <div class="modal-body">
				    Bu daireyi silmek istediðinizden emin misiniz ?
				  </div>
				  <div class="modal-footer">
				    <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Ýptal</a>
				    <a href="?do=daire_sil&id=<?php echo $this->liste[$i]["id"];?>" class="btn btn-danger">Sil</a>
				  </div>
			</div>
            </td>
        </tr>
        <?php }?>
    </table>
    <div class="pagination">
        <ul>
          <?php for($i = 1; $i <= $this->sayfa_sayisi ; $i++){
        	echo "<li><a href='?do=ev_sahibi_islemleri&s=".$i."'>".$i."</a></li>";
        }
        ?>
        </ul>
		</div>
</div>