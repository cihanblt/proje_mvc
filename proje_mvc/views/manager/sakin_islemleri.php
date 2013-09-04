<div class="hero-unit">
<div id="target"></div>
	<!-- #Ara Formu -->
	<form action="?do=sakin_islemleri&mdl=ara" method="post">
	<div class="table-list">
		<div class="satir">
			<div>T.C Kimlik No :</div>
			<div><input type="text" name="r_tcnumber" /></div>
		</div>
		<div class="satir">
			<div>Blok Se� :</div>
			<div><input type="hidden" id="site" value="<?php echo $this->siteid;?>"/>
        		<select id="bloks1" onchange="daire_sec('s1')" name="h_blokid"><option value="">..Se�iniz..</option>
                	<?php  for($i = 0 ; $i < count($this->blok_list); $i++){
                		  echo '<option value='.$this->blok_list[$i]["id"].'>'.$this->blok_list[$i]["b_name"].'</option>';
                	}?>
                </select></div>
		</div>
		<div class="satir">
			<div>Daire Se� :</div>
                <div><select id="daire-s1" name="h_houseid">
                	<option value="">..Se�iniz..</option>
					</select></div>
		</div>
		<div class="satir">
			<div>Ad� Soyad� :</div>
			<div><input type="text" name="r_namesurname" /></div>
		</div>
		<div class="satir">
			<div>E-Mail :</div>
			<div><input type="text" name="r_email" /></div>
		</div>
		<div class="satir"><div style="margin-top:17px;"><input type="submit" class="btn" value="Ara" /></div></div>
	</div>
	</form>
	<!-- #Ara Formu -->
	
	<!-- Yeni Sakin Ekle Formu-->
	<a href="#" class="btn btn-success" style="margin-top:4px;" onclick="sakin_ekle_form('_modalyeni')">Yeni Ekle</a>
	<div id="kontrol"></div>
	<div class="table-list">
		<div class="satir">
		<div>
		<div class="modal hide fade" id="sakin_ekle_form_modalyeni">
		
			<div class="modal-body">
				<div id="sakin_ekle_form_yeni" >
					<table cellpadding="3" cellspacing="3" style="margin: 0 auto;td:{padding:3px;}">
						<tr>
							<td>Sakin Tipini Se�in :</td>
							<td><select id="sakin_tipi" name="r_type" onchange="sakin_tipi_sec()">
								<option value=" ">..Se�iniz..</option>
								<option value="0">Kirac�</option>
								<option value="1">Ev Sahibi</option>
							</select></td>
						</tr>
					</table>
					<form id="kiraci" action="?do=sakin_kaydet" method="post">
					<hr/>
						<table cellpadding="3" cellspacing="3" style="margin: 0 auto;td:{padding:3px;}">
							<input type="hidden" name="r_type" value="0" />
							<tr>
								<td>Giri� Tarihi : *</td>
								<td><input name="input_date" type="text" class="datepicker" value="<?php echo date("d.m.Y");?>" data-date-format="dd.mm.yyyy"/></td>
							</tr>
							<tr>
								<td>Kullan�c� Ad� : *</td>
								<td><input type="text" name="r_username" /></td>
							</tr>
							<tr>
								<td>�ifre : *</td>
								<td><input type="password" name="r_pass" /></td>
							</tr>
							<tr>
								<td>�ifre(Tekrar) : *</td>
								<td><input type="password" name="r_pass2" /></td>
							</tr>
							<tr>
								<td>T.C Kimlik No : *</td>
								<td><input type="text" name="r_tcnumber" /></td>
							</tr>
							<tr>
								<td>Ad� Soyad� : *</td>
								<td><input type="text" name="r_namesurname" /></td>
							</tr>
							<tr>
								<td>Telefon : *</td>
								<td><input type="text" name="r_phone" /></td>
							</tr>
							<tr>
								<td>Telefon(GSM) :</td>
								<td><input type="text" name="r_gsmphone" /></td>
							</tr>
							<tr>
								<td>E-Mail :</td>
								<td><input type="text" name="r_email" /></td>
							</tr>
							<tr>
								<td>Do�um Yeri :</td>
								<td><select name="r_birthplace">
									<?php
										for($j = 0; $j< count($this->il_list); $j++){
											echo "<option value='".$this->il_list[$j]["id"]."'>".$this->il_list[$j]["city_name"]."</option>";
										}
									?>
								</select></td>
							</tr>
							<tr>
								<td>Do�um Tarihi :</td>
								<td><select name="r_birthday" style="width:65px;">
									<option value="">G�n</option>
									<?php
										for($j = 1; $j < 32 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								<select name="r_birthmonth" style="width:60px;">
									<option value="">Ay</option>
									<?php
										for($j = 1; $j < 12 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								<select name="r_birthyear" style="width:70px;">
									<option value="">Y�l</option>
									<?php
										for($j = 1930; $j < 2012 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								</td>
							</tr>
							
							<tr>
								<td>Blok Se�in : *</td>
								<td><input type="hidden" id="site" value="<?php echo $this->siteid;?>"/>
									<select id="blokk1" onchange="daire_sec('k1')" name="h_blokid"><option value="">..Se�iniz..</option>
										<?php  for($j = 0 ; $j < count($this->blok_list); $j++){
											  echo '<option value='.$this->blok_list[$j]["id"].'>'.$this->blok_list[$j]["b_name"].'</option>';
										}?>
														</select></td>
							</tr>
							<tr>
								<td>Daire Se�in : *</td>
								<td><select id="daire-k1" onchange="ev_sahibi_sec('k1')" name="h_houseid">
										<option value="">..Se�iniz..</option>
										</select></td></td>
							</tr>
							<tr>
								<td>Ev Sahibi Se�in :</td>
								<td><select id="ev_sahibi-k1" name="h_hostid"> 
									<option value="">..Se�iniz..</option>
									</select>
								</td>
							</tr>
						</table>
					</form>
					<form id="ev_sahibi" action="?do=sakin_kaydet" method="post">
					<hr />
						<table cellpadding="3" cellspacing="3" style="margin: 0 auto;td:{padding:3px;}">
							<input type="hidden" name="r_type" value="1" />
							<tr>
								<td>Giri� Tarihi :</td>
								<td><input name="input_date" type="text" class="datepicker" value="<?php echo date("d.m.Y");?>" data-date-format="dd.mm.yyyy"/></td></td>
							</tr>
							<tr>
								<td>Blok Se�in :</td>
								<td><input type="hidden" id="site" value="<?php echo $this->siteid;?>"/>
									<select id="bloke1" onchange="daire_sec('e1')" name="h_blokid"><option value="">..Se�iniz..</option>
										<?php  for($j = 0 ; $j < count($this->blok_list); $j++){
											  echo '<option value='.$this->blok_list[$j]["id"].'>'.$this->blok_list[$j]["b_name"].'</option>';
										}?>
														</select></td>
							</tr>
							<tr>
								<td>Daire Se�in :</td>
								<td><select id="daire-e1" onchange="ev_sahibi_sec('e1')" name="h_houseid">
										<option value="">..Se�iniz..</option>
										</select></td></td>
							</tr>
							<tr>
								<td>Ev Sahibi Se�in :</td>
								<td><select id="ev_sahibi-e1" name="h_hostid"> 
									<option value="">..Se�iniz..</option>
									</select>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
				
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">�ptal</a>
				<input type="submit" onclick="sakin_ekle_form_kontrol()" class="btn btn-primary" value="Kaydet" />
			</div>
		</div>
		</div>
		</div>
	</div>
	<!-- #Yeni Sakin Ekle Formu-->
	
	<!-- Apartman Sakini Listesi -->		
	<table class="table table-condensed">
		<thead>
			<tr class="bas">
				<th>Blok Ad� :</th>
				<th>Daire Numaras� :</th>
				<th>T.C Kimlik No:</th>
				<th>Ad� Soyad� :</th>
				<th>Telefon :</th>
				<th>Telefon(GSM):</th>
				<th>E-Mail :</th>
				<th>Sakin Tipi :</th>
			</tr>
		</thead>
		<?php 
			for($i = 0; $i < count($this->liste); $i++){
		?>
		
		<tr>
			<td><?php echo $this->liste[$i]["b_name"];?></td>
			<td><?php echo $this->liste[$i]["h_number"];?></td>
			<td><?php echo $this->liste[$i]["r_tcnumber"];?></td>
			<td><a href="?do=sakin_islemleri&mdl=detay&id=<?php echo $this->liste[$i]["id"]?>"><?php echo $this->liste[$i]["r_namesurname"];?></a></td>
			<td><?php echo $this->liste[$i]["r_phone"];?></td>
			<td><?php echo $this->liste[$i]["r_gsmphone"];?></td>
			<td><?php echo $this->liste[$i]["r_email"];?></td>
			<td><?php if($this->liste[$i]["r_status"] == 0){ echo "Kirac�"; }else{ echo "Ev Sahibi";}?></td>
			<td><a href="#" onclick="sakin_degisim(<?php echo $this->liste[$i]["id"];?>)"><img title="Apartman Sakini De�i�imi" src="<?php echo URL;?>public/images/degisim.png" /></a>
				<div class="modal hide fade" id="sakin_degisim-<?php echo $this->liste[$i]["id"];?>">
				 <div class="modal-body">
				 <form id="sakin_cikis-<?php echo $this->liste[$i]["id"];?>" action="?do=sakin_cikis&id=<?php echo $this->liste[$i]["id"];?>" method="post">
					<table class="table" cellpadding="3" cellspacing="3">
							<tr>	
								<td>��k�� Tarihi : *</td>
								<td><input name="output_date" type="text" class="datepicker" value="<?php echo date("d.m.Y");?>" data-date-format="dd.mm.yyyy"/></td>
							</tr>
					</table>
				 </form>
				 </div>
				 <div class="modal-footer">
				    <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">�ptal</a>
				    <input type="submit" class="btn btn-danger" value="��k�� Yap" onclick="sakin_cikis(<?php echo $this->liste[$i]["id"];?>)" />
				  </div>
				 </div>
				 
			</td>
			<td><a href="#" onclick="sakin_duzenle(<?php echo $this->liste[$i]["id"];?>)"><img title="Apartman Sakini D�zenle" src="<?php echo URL;?>public/images/edit.png" /></a>
				<div class="modal hide fade" id="sakin_duzenle-<?php echo $this->liste[$i]["id"];?>">
					
				 <div class="modal-body">
						<form id="guncelle<?php echo $this->liste[$i]["id"];?>" action="?do=sakin_guncelle&id=<?php echo $this->liste[$i]["id"];?>" method="post">
							
						<table cellpadding="3" cellspacing="3" style="margin: 0 auto;td:{padding:3px;}">
							<tr>
								<td>Kullan�c� Ad� : *</td>
								<td><input type="text" name="r_username" value="<?php echo $this->liste[$i]["r_username"];?>"/></td>
							</tr>
							<tr>
								<td>�ifre : *</td>
								<td><input type="password" name="r_pass" /></td>
							</tr>
							<tr>
								<td>�ifre(Tekrar) : *</td>
								<td><input type="password" name="r_pass2" /></td>
							</tr>
							<tr>
								<td>T.C Kimlik No : *</td>
								<td><input type="text" name="r_tcnumber" value="<?php echo $this->liste[$i]["r_tcnumber"];?>"/></td>
							</tr>
							<tr>
								<td>Ad� Soyad� : *</td>
								<td><input type="text" name="r_namesurname" value="<?php echo $this->liste[$i]["r_namesurname"];?>" /></td>
							</tr>
							<tr>
								<td>Telefon : *</td>
								<td><input type="text" name="r_phone" value="<?php echo $this->liste[$i]["r_phone"];?>"/></td>
							</tr>
							<tr>
								<td>Telefon(GSM) :</td>
								<td><input type="text" name="r_gsmphone" value="<?php echo $this->liste[$i]["r_gsmphone"];?>"/></td>
							</tr>
							<tr>
								<td>E-Mail :</td>
								<td><input type="text" name="r_email" value="<?php echo $this->liste[$i]["r_email"];?>" /></td>
							</tr>
							<tr>
								<td>Do�um Yeri :</td>
								<td><select name="r_birthplace">
									<?php
										for($j = 0; $j< count($this->il_list); $j++){
											echo "<option value='".$this->il_list[$j]["id"]."'>".$this->il_list[$j]["city_name"]."</option>";
										}
									?>
								</select></td>
							</tr>
							<tr>
								<td>Do�um Tarihi :</td>
								<td><select name="r_birthday" style="width:65px;">
									<option value="">G�n</option>
									<?php
										for($j = 1; $j < 32 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								<select name="r_birthmonth" style="width:60px;">
									<option value="">Ay</option>
									<?php
										for($j = 1; $j < 12 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								<select name="r_birthyear" style="width:70px;">
									<option value="">Y�l</option>
									<?php
										for($j = 1930; $j < 2012 ; $j++){
											echo "<option value='".$j."'>".$j."</option>";
										}
									?>
								</select>
								</td>
							</tr>
							
							<tr>
								<td>Blok Se�in : *</td>
								<td><input type="hidden" id="site" value="<?php echo $this->siteid;?>"/>
									<select id="blokkg1<?php echo $this->liste[$i]["id"];?>" onchange="daire_sec('kg1<?php echo $this->liste[$i]["id"];?>')" name="h_blokid"><option value="">..Se�iniz..</option>
										<?php  for($j = 0 ; $j < count($this->blok_list); $j++){
											  echo '<option value='.$this->blok_list[$j]["id"].'>'.$this->blok_list[$j]["b_name"].'</option>';
										}?>
														</select></td>
							</tr>
							<tr>
								<td>Daire Se�in : *</td>
								<td><select id="daire-kg1<?php echo $this->liste[$i]["id"];?>" onchange="ev_sahibi_sec('kg1<?php echo $this->liste[$i]["id"];?>')" name="h_houseid">
										<option value="">..Se�iniz..</option>
										</select></td></td>
							</tr>
							
							<tr>
								<td>Ev Sahibi Se�in :</td>
								<td><select id="ev_sahibi-kg1<?php echo $this->liste[$i]["id"];?>" name="h_hostid"> 
									<option value="">..Se�iniz..</option>
									</select>
								</td>
							</tr>
						</table>
					</form>
				  </div>
				  
				   <div class="modal-footer">
				    <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">�ptal</a>
				    <a href="#" class="btn btn-success" onclick="sakin_guncelle(<?php echo $this->liste[$i]["id"];?>)">G�ncelle</a>
				  </div>
				</div>
			
			<td>
				<a href="#" onclick="sakin_sil(<?php echo $this->liste[$i]["id"];?>)"><img title="Apartman Sakini Sil" src="<?php echo URL;?>public/images/delete.png" /></a>
				<div class="modal hide fade" id="sakin_sil-<?php echo $this->liste[$i]["id"];?>">
				  <div class="modal-body">
				    Bu daireyi silmek istedi�inizden emin misiniz ?
				  </div>
				  <div class="modal-footer">
				    <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">�ptal</a>
				    <a href="?do=sakin_sil&id=<?php echo $this->liste[$i]["id"];?>" class="btn btn-danger">Sil</a>
				  </div>
				</div>
			</td>
		</tr>
		<?php }?>
		
	</table>
	<div class="pagination">
			<ul>
			  <?php for($i = 1; $i <= $this->sayfa_sayisi ; $i++){
				echo "<li><a href='?do=sakin_islemleri&s=".$i."'>".$i."</a></li>";
				}
			?>
			</ul>
			<div style="float:right">
				<a href="#"><img src="<?php echo URL;?>public/images/export_excel.png" />Excel'e Aktar</a>
			</div>
		</div>
</div>