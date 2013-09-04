<div class="hero-unit">
	    <form action="?do=daire_kaydet" method="post">
			<h4>Yeni Daire Oluþtur</h4>
            <div class="table-list">
                <div class="satir"><div>Daire Adý :</div><div><input type="text" name="h_name" /></div></div>
                
                <div class="satir"><div>Daire Numarasý :</div><div><input style="width:100px;" type="text" name="h_number" /></div></div>
                <div class="satir"><div>Daire Özelliði Türü Seçin :</div><div><select name="h_properttype" >
					<?php
						for($i = 0; $i < count($this->d_ozellik); $i++){
							echo "<option value='".$this->d_ozellik[$i]['id']."'>".$this->d_ozellik[$i]['ozellik_adi']."</option>";
						}
					?>
				</select></div></div>
				<div class="satir"><div>Daire Özellik :</div><div><input style="width:100px;" type="text" name="h_property" /></div></div>
                <div class="satir"><div>Blok :</div><div><select id="blok" style="width:100px;" name="h_blokid"><option>..Seçiniz..</option>
                	<?php  for($i = 0 ; $i < count($this->blok_list); $i++){
                		  echo '<option value='.$this->blok_list[$i]["id"].'>'.$this->blok_list[$i]["b_name"].'</option>';
                	}?>
                </select></div></div>
                
                <div class="satir"><div>Daire Durumu :</div><div><select style="width:100px;" name="h_status"><?php  for($i = 0 ; $i < count($this->status); $i++){
                		  echo '<option value='.$this->status[$i]["id"].'>'.$this->status[$i]["house_status"].'</option>';
                	}?></select></div></div>
                <div class="satir"><div style="margin-top:17px;"><input class="btn" type="submit" value="Kaydet" /></div></div>
            </div>
        </form>
        <div style="clear:both"></div>
		<h4>Daire Ara</h4>
        <div class="ara">
        		
		        <div class="table-list">
		        <form action="?do=daire_islemleri&mdl=ara" method="post">
		        	<div class="satir">
		        		<div>Blok :</div>
		        		<div><select id="blok" name="h_blokid"><option value="">..Seçiniz..</option>
		                	<?php  for($i = 0 ; $i < count($this->blok_list); $i++){
		                		  echo '<option value='.$this->blok_list[$i]["id"].'>'.$this->blok_list[$i]["b_name"].'</option>';
		                	}?>
		                </select></div>
		        	</div>
		        	<div class="satir">
		        		<div>Daire Numarasý :</div>
		        		<div><input type="text" name="h_number" /></div>
		        	</div>
		        	<div class="satir"><div style="margin-top:17px;"><input class="btn" type="submit" value="Ara" /></div></div>
		        </form>
		        </div>
		      
        </div>
    	<div class="tablo-list">
    		<table class="table table-condensed" style="td{width:40px;}">
        <thead>
        <tr class="bas">
            <th>Daire Adý</th>
            <th>Daire Numarasý</th>
            <th>Daire Özellik Türü</th>
            <th>Daire Özelliði</th>
            <th>Blok Adý</th>
            <th>Daire Durumu</th>
            <th></th>
        </tr>
        </thead>
        <?php for($i = 0; $i < count($this->liste); $i++){?>
        <tr>
            <td><?php echo $this->liste[$i]["h_name"];?></td>
            <td><?php echo $this->liste[$i]["h_number"];?></td>
            <td><?php echo $this->liste[$i]["ozellik_adi"];?></td>
            <td><?php echo $this->liste[$i]["h_property"];?></td>
            <td><?php echo $this->liste[$i]["b_name"];?></td>
            <td><?php echo $this->liste[$i]['house_status'];?></td>
            <td class="td_en"><a href="#" onclick="daire(<?php echo $this->liste[$i]["id"];?>,'_duzenle')"><img class="icons" title="Düzenle" src="<?php echo URL;?>public/images/edit.png" /></a>
            	<div class="modal hide fade" id="daire_duzenle-<?php echo $this->liste[$i]["id"];?>">
            	  <div class="modal-body">
				    <form action="?do=daire_guncelle&id=<?php echo $this->liste[$i]["id"];?>" method="post">
				    	<table cellpadding="3" cellspacing="3">
				    		<tr>
					    		<td>Daire Adý :</td>
					    		<td><input type="text" name="h_name" value="<?php echo $this->liste[$i]["h_name"];?>" /></td>
					    	</tr>
					    	<tr>
			            	  	 <td>Daire Numarasý :</td>
			                	 <td><input type="text" name="h_number"  value="<?php echo $this->liste[$i]["h_number"];?>"/></td>
			                </tr>
							 <tr>
								<td>Daire Özelliði Türü Seçin :</td>
								<td><select name="h_propertytype" >
								<?php
									for($j = 0; $j < count($this->d_ozellik); $j++){
										if($this->liste[$i]["h_propertytype"] == $this->d_ozellik[$j]["id"]){
											echo "<option value='".$this->d_ozellik[$j]['id']."' selected='selected'>".$this->d_ozellik[$j]['ozellik_adi']."</option>";
										}else{
											echo "<option value='".$this->d_ozellik[$j]['id']."'>".$this->d_ozellik[$j]['ozellik_adi']."</option>";
										}
									}
								?>
								</select></td>
							</tr>
							<tr>
								<td>Daire Özellik :</td>
								<td><input style="width:100px;" type="text" name="h_property" value="<?=$this->liste[$i]["h_property"];?>"/></td>
							</tr>
			                <tr>
			                	 <td>Blok :</td>
			                	 <td><select id="blok" name="h_blokid"><option>..Seçiniz..</option>
			                    		<?php  for($j = 0 ; $j < count($this->blok_list); $j++){
			                		    	if($this->blok_list[$j]['id'] == $this->liste[$i]["bid"]){
			                		    		echo '<option value='.$this->blok_list[$j]["id"].' selected="selected">'.$this->blok_list[$j]["b_name"].'</option>';
			                		    	}else{
			                		    		echo '<option value='.$this->blok_list[$j]["id"].'>'.$this->blok_list[$j]["b_name"].'</option>';
			                		    	}
			                    	    }?>
			                        </select>
			                        
			                        </td>
			                </tr>
			                <tr>
			                	<td>Daire Durumu :</td>
				    			<td><select name="h_status">
				    			<?php  for($j = 0 ; $j < count($this->status); $j++){
					    											if($this->status[$j]["id"] == $this->liste[$i]["h_status"]){
					    												echo '<option value='.$this->status[$j]["id"].' selected="selected">'.$this->status[$j]["house_status"].'</option>';
					    											}else{
					    												echo '<option value='.$this->status[$j]["id"].'>'.$this->status[$j]["house_status"].'</option>';
					    											}
                												  
                					}?>
				    			</select></td>
				    		</tr>
				    	</table>
				  	  	<div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Ýptal</a>
				 			  <input type="submit" class="btn btn-success" value="Güncelle" />
				 		 </div>
				    </form>
				  </div>
				</div>
            </td>
            <td class="td_en"><a href="#" onclick="daire(<?php echo $this->liste[$i]["id"];?>,'_sil')"><img class="icons" title="Sil" src="<?php echo URL;?>public/images/delete.png" /></a>
            <div class="modal hide fade" id="daire_sil-<?php echo $this->liste[$i]["id"];?>">
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
				echo "<li><a href='?do=daire_islemleri&s=".$i."'>".$i."</a></li>";
			}
			?>
			</ul>
			<div style="float:right">
				<a href="#"><img src="<?php echo URL;?>public/images/export_excel.png" />Excel'e Aktar</a>
			</div>
		</div>
    	</div>
  
</div>