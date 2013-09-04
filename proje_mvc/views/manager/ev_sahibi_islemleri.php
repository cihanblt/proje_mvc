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
        		<select id="bloka1" onchange="daire_sec('a1')" name="h_blokid"><option value="">..Seçiniz..</option>
                	<?php  for($i = 0 ; $i < count($this->blok_list); $i++){
                		  echo '<option value='.$this->blok_list[$i]["id"].'>'.$this->blok_list[$i]["b_name"].'</option>';
                	}?>
                </select></td>
                <td><select id="daire-a1" name="h_houseid">
                	<option value="">..Seçiniz..</option>
                	</select></td>
                <td><input type="text" name="h_namesurname" /></td>
        		<td><input type="text" name="h_email" /></td>
                <td><input class="btn" type="submit" value="Ara" /></td>
           </tr>
           </table>
           </form>
		   <?php echo @$this->sql;?>	
           <a href="#" class="btn btn-success" onclick="yeni_ekle('ev_sahibi')">Yeni Ekle</a>
                	<div class="modal hide fade" id="yeni_ekle_ev_sahibi">
					  <div class="modal-body">
					  <form id="ev_sahibi_form_yeni_y" action="?do=ev_sahibi_kaydet" method="post">
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
								<td>T.C Kimlik No : *</td>
								<td><input type="text" name="h_tcnumber" /></td>
							</tr>
					    	<tr>
					    		<td>Adý Soyadý : *</td>
					    		<td><input type="text" name="h_namesurname"/></td>
					    	</tr>
							<tr>
					    		<td>Telefon : *</td>
					    		<td><input type="text" name="h_phone"  /></td>
					    	</tr>
					    	<tr>
					    		<td>Telefon (GSM) :</td>
					    		<td><input type="text" name="h_gsmphone"  /></td>
					    	</tr>
							<tr>
					    		<td>E-Mail :</td>
					    		<td><input type="text" name="h_email" /></td>
					    	</tr>
							<tr>
								<td>Doðum Yeri :</td>
								<td><select name="h_birthplace">
									<?php
										for($j = 0; $j< count($this->il_list); $j++){
											echo "<option value='".$this->il_list[$j]["id"]."'>".$this->il_list[$j]["city_name"]."</option>";
										}
									?>
								</select></td>
							</tr>
							<tr>
								<td>Doðum Tarihi :</td>
								<td><select name="h_birthday" style="width:65px;">
									<option value="">Gün</option>
									<?php
										for($j = 1; $j < 32 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								<select name="h_birthmonth" style="width:60px;">
									<option value="">Ay</option>
									<?php
										for($j = 1; $j < 13 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								<select name="r_birthyear" style="width:70px;">
									<option value="">Yýl</option>
									<?php
										for($j = 1930; $j < 2012 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								</td>
							</tr>
					    	<tr>
					    		<td>Blok Seçin : *</td>
								<td><input type="hidden" id="site" value="<?php echo $this->siteid;?>"/>
								<select id="bloky1" onchange="daire_sec('y1')" name="h_blokid"><option>..Seçiniz..</option>
					                	<?php  for($i = 0 ; $i < count($this->blok_list); $i++){
					                		  echo '<option value='.$this->blok_list[$i]["id"].'>'.$this->blok_list[$i]["b_name"].'</option>';
					                	}?>
					                </select></td>
					              
				               
					    	</tr>
					    	<tr>
					    		  <td>Daire Seçin : *</td>
					    		  <td><select id="daire-y1" name="h_houseid">
				                	  <option>..Seçiniz..</option>
				                	  </select> </td>
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
					    <input type="button" onclick="ev_sahibi_form('yeni','_y')" class="btn btn-primary" value="Kaydet"/>
					  </div> 
					  <div id="target"></div>
					</div>
	
    <table class="table table-condensed">
        <thead>
        <tr class="bas">
        	<th>Blok Adý</th>
        	<th>Daire Numarasý</th>
        	<th>T.C Kimlik No</th>
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
        	<td><?php echo $this->liste[$i]["h_tcnumber"];?></td>
            <td><?php echo $this->liste[$i]["h_namesurname"];?></td>
            <td><?php echo $this->liste[$i]["h_phone"];?></td>
            <td><?php echo $this->liste[$i]["h_gsmphone"];?></td>
            <td><?php echo $this->liste[$i]["h_email"];?></td>
            <td><?php echo $this->liste[$i]["h_adress"];?></td>
            <td><?php echo $this->liste[$i]['house_status'];?></td>
            <td class="td_en"><a href="#" onclick="ev_sahibi(<?php echo $this->liste[$i]["id"];?>,'_duzenle')"><img class="icons" title="Düzenle" src="<?php echo URL;?>public/images/edit.png" /></a>
            	<div class="modal hide fade" id="ev_sahibi_duzenle-<?php echo $this->liste[$i]["id"];?>" >
            	  <div class="modal-body">
				    <form id="ev_sahibi_form_duzenle<?php echo $this->liste[$i]["id"];?>" action="?do=ev_sahibi_guncelle&id=<?php echo $this->liste[$i]["id"];?>" method="post">
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
								<td>T.C Kimlik No : *</td>
								<td><input type="text" name="h_tcnumber" value="<?php echo $this->liste[$i]["h_tcnumber"];?>"/></td>
							</tr>
					    	<tr>
					    		<td>Adý Soyadý : *</td>
					    		<td><input type="text" name="h_namesurname" value="<?php echo $this->liste[$i]['h_namesurname'];?>"/></td>
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
								<td>Doðum Yeri :</td>
								<td><select name="h_birthplace">
									<?php
										for($j = 0; $j< count($this->il_list); $j++){
											echo "<option value='".$this->il_list[$j]["id"]."'>".$this->il_list[$j]["city_name"]."</option>";
										}
									?>
								</select></td>
							</tr>
							<tr>
								<td>Doðum Tarihi :</td>
								<td><select name="h_birthday" style="width:65px;">
									<option value="">Gün</option>
									<?php
										for($j = 1; $j < 32 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								<select name="h_birthmonth" style="width:60px;">
									<option value="">Ay</option>
									<?php
										for($j = 1; $j < 13 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								<select name="h_birthyear" style="width:70px;">
									<option value="">Yýl</option>
									<?php
										for($j = 1930; $j < 2012 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								</td>
							</tr>
							
					    	<tr>
					    		<td>Blok Seçin : *</td>
								<td><input type="hidden" id="site" value="<?php echo $this->siteid;?>"/>
								<select id="blok<?php echo $this->liste[$i]["id"];?>" onchange="daire_sec('<?php echo $this->liste[$i]["id"];?>')" name="h_blokid"><option>..Seçiniz..</option>
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
					    		  <td><select id="daire-<?php echo $this->liste[$i]["id"];?>" name="h_houseid">
				                	  <option>..Seçiniz..</option>
				                	  </select> </td>
					    	</tr>
					    	
					    	
					    	<tr>
					    		<td>Adres :</td>
					    		<td><textarea rows="3" cols="35" name="h_adress"><?php echo $this->liste[$i]['h_adress'];?></textarea></td>
					    	</tr>
					    </table>
						</form>
				  	  	<div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Ýptal</a>
				 			  <input type="submit" onclick="ev_sahibi_form('duzenle',<?php echo $this->liste[$i]["id"];?>)" class="btn btn-success" value="Kaydet" />
				 		 </div>
				    
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
				    <a href="?do=ev_sahibi_sil&id=<?php echo $this->liste[$i]["id"];?>" class="btn btn-danger">Sil</a>
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
		<div style="float:right">
			<a href="#"><img src="<?php echo URL;?>public/images/export_excel.png" />Excel'e Aktar</a>
		</div>
	</div>
	
</div>