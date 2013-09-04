<div class="row-fluid">
<div id="target"></div>
	<div class="hero-unit">
		<div class="gelir_islemleri_ekleme">
			<a href="#" class="btn btn-success" onclick="yeni_kalem_olustur()">Yeni Kalem Oluþtur</a>
			<div class="modal hide fade" id="yeni_kalem_olustur">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>Gelir Türü Ekleyin</h3>
			  </div>
			  <div class="modal-body">
				<form id="gelir_turu_ekle" action="manager?do=muhasebe_islemleri&mdl=gelir_turu_kaydet" method="post">
					<table class="table" cellpadding="3" cellspacing="3">
						<tr>
							<td>Gelir Türü Adý :</td>
							<td><input type="text" name="gelir_turu" /></td>
						</tr>
						<tr>
							<td>Gelir Tipi Seç :</td>
							<td><select name="gelir_tipi">
								<?php 
									for($j = 0 ; $j < count($this->daire_oz); $j++){
										echo "<option value='".$this->daire_oz[$j]["id"]."'>".$this->daire_oz[$j]["ozellik_adi"]."</option>";
									}
								?>
							</select>
						</tr>
					</table>
				</form>
			  </div>
			  <div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Ýptal</a>
				<a href="#" class="btn btn-primary" onclick="yeni_kalem_olustur_kaydet()">Kaydet</a>
			  </div>
			</div>
		</div>
		<div id="gelir_islemleri_tablosu">
			<table class="table" cellpadding="3" cellspacing="3">
				<thead>
					<tr>
						<td>Gelir Türü</td>
						<td>Gelir Tipi</td>
						<td></td>
					</tr>
				</thead>
				<?php 
					for($i = 0; $i < count($this->liste); $i++){
				?>
					<tr>
						<td><a href="#"><?=$this->liste[$i]["gelir_turu"];?></a></td>
						<td><?=$this->liste[$i]["ozellik_adi"];?></td>
						<td><a href="#" onclick="gelir_dagilimi_olustur(<?=$this->liste[$i]["id"]?>)" class="btn btn-success" >Gelir Daðýlýmý Ekle</a>
							<div class="modal hide fade" id="gelir_dagilimi_olustur-<?=$this->liste[$i]["id"];?>"> 
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3>Gelir Daðýlýmý Ekle</h3>
								
							  </div>
							  <div class="modal-body">
								<form id="gelir_dagilimi_ekle-<?=$this->liste[$i]["id"];?>" action="" method="post">
									<table cellpadding="3" cellspacing="3">
										<tr>
											<td>Daire Tipi Seçin :</td>
											<td><select name="daire_tipi">
												<?php 
													for($j = 0; $j < count($this->daire_tipi); $j++){
														echo "<option valur='".$this->daire_tipi[$j]["h_property"]."'>".$this->daire_tipi[$j]["h_property"]."</option>";
													}
												?>
											</select></td>
										</tr>
										<tr>
											<td>Gelir Ücreti :</td>
											<td><input type="text" name="gelir_ucreti" /></td>
										</tr>
									</table>
								</form>
							  </div>
							  <div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Ýptal</a>
								<a href="#" class="btn btn-primary">Kaydet</a>
							  </div>
							</div>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>