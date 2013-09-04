<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-9" />
	<link rel="stylesheet" href="public/css/style.css" type="text/css" />
	<link rel="stylesheet" href="public/css/scrollable-horizontal.css" type="text/css" />
	<link rel="stylesheet" href="public/css/scrollable-buttons.css" type="text/css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	
	<script src="public/js/cufon-yui.js" type="text/javascript"></script>
	<script src="public/js/myriad-pro.cufonfonts.js" type="text/javascript"></script>
	<script type="text/javascript">
	Cufon.replace('.myriad_pro_semibold_italic', { fontFamily: 'Myriad Pro Semibold Italic', hover: true }); 
	Cufon.replace('.myriad_pro_semibold', { fontFamily: 'Myriad Pro Semibold', hover: true }); 
	Cufon.replace('.myriad_pro_regular', { fontFamily: 'Myriad Pro Regular', hover: true }); 
	Cufon.replace('.myriad_pro_condensed_italic', { fontFamily: 'Myriad Pro Condensed Italic', hover: true }); 
	Cufon.replace('.myriad_pro_condensed', { fontFamily: 'Myriad Pro Condensed', hover: true }); 
	Cufon.replace('.myriad_pro_bold_italic', { fontFamily: 'Myriad Pro Bold Italic', hover: true }); 
	Cufon.replace('.myriad_pro_bold_condensed_italic', { fontFamily: 'Myriad Pro Bold Condensed Italic', hover: true }); 
	Cufon.replace('.myriad_pro_bold_condensed', { fontFamily: 'Myriad Pro Bold Condensed', hover: true }); 
	Cufon.replace('.myriad_pro_bold', { fontFamily: 'Myriad Pro Bold', hover: true }); 
	</script>
	<script src="public/js/calibri.cufonfonts.js" type="text/javascript"></script>
	<script type="text/javascript">
	Cufon.replace('.calibri_bold_italic', { fontFamily: 'Calibri Bold Italic', hover: true }); 
	Cufon.replace('.calibri_italic', { fontFamily: 'Calibri Italic', hover: true }); 
	Cufon.replace('.calibri_bold', { fontFamily: 'Calibri Bold', hover: true }); 
	Cufon.replace('.calibri', { fontFamily: 'Calibri', hover: true }); 
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".giris-panel").hide();
		$("#giris-yap").click(function(){
			$(this).toggleClass("giris-aktif").slideDown();
		});
		$("#giris-yap").toggle(function(){
			$(".giris-panel").slideDown();
		},function(){
			$(".giris-panel").hide();
		});
	});
	function login(){
		
		var slct = $(".slct").val();
			var kadi = $('input[name="kadi"]').val();
			var sifre= $('input[name="sifre"]').val();
			if(kadi == "" || sifre == ""){
					$("#login-error").hide();
					$("body").prepend("<div id='login-error' class='login-error'><p>Lütfen kullanıcı adınızı veya şifrenizi boş geçmeyiniz!!!</p></div>");
					$("#login-error").hide().slideDown("slow");
				
	
			}else{
				if(slct == 1){ // yönetici girişi yapılıyor buradan ...
				$("#ajax-loader").show();
					$.ajax({
						type: 'POST',
						data: "kadi=" + kadi + "&sifre=" + sifre,
						url : "<?php echo URL;?>ajax/manager_login.php",
						success : function(ekle){
									if(ekle == "hata"){
											$("#login-error").hide();
											$("body").prepend("<div id='login-error' class='login-error'><p>Kullanıcı adınız veya şifreniz yanlış!!!</p></div>");
											$("#login-error").hide().slideDown("slow");
											$("#ajax-loader").hide();
									}else if(ekle == 'giris'){
										window.location='manager';
									}	
								  }
					});
				}else if(slct == 0){
					alert("Bu sayfa henüz yapım aşamasında...");
				}
			}
		
		
	}
	</script>
	<style type="text/css">
	#ajax-loader{position:absolute;top:6px; left:60px; display:none;}
	</style>
	<title>e-kentim</title>
</head>
<body>

	<div id="ust-cizgi">
		<div class="ust-cizgi-orta">
			<ul>
				<li><a id="giris-yap" href="#">Giriş Yap</a>
					<div class="giris-panel">
							<table cellpadding="3" cellspacing="3">
								<tr>
									<td>Kullanıcı Adı:</td>
									<td><input class="inpt" type="text" name="kadi" /></td>
								</tr>
								<tr>
									<td>Şifre:</td>
									<td><input class="inpt" type="password" name="sifre" /></td>
								</tr>
								<tr>
									<td>Giriş Tipi</td>
									<td><select class="slct" name="giris-tipi">
										<option value="0">Apartman Sakini</option>
										<option value="1">Yönetici</option>
									</select></td>
								</tr>
								<tr>
									<td></td>
									<td style="position:relative"><input id="login-button" onclick="login()" class="btn" type="submit" value="Giriş Yap" /><img id="ajax-loader" src="<?php echo URL;?>public/images/ajax-loader.gif" /></td>
								</tr>
							</table>

					</div>
				</li>
			</ul>
		</div>
	</div>
	<div id="genel">
			<div id="header">
				<div class="logo">
					<img src="public/images/logo.png" />
				</div>
				<div class="menubar">
					<div class="menu">
						<ul>
							<li><a class="myriad_pro_semibold" href="#">ANASAYFA</a></li>
							<li><a class="myriad_pro_semibold" href="#">ÜRÜNÜMÜZ</a></li>
							<li><a class="myriad_pro_semibold" href="#">HAKKIMIZDA</a></li>
							<li><a class="myriad_pro_semibold" href="#">İLETİŞİM</a></li>
						</ul>
					</div>
				</div>
			</div>
		<div style="clear:both;"></div>
		<div id="slider">
			<a class="prev browse left"></a>
				 <div class="scrollable" id="autoscroll">

					  <!-- root element for the items -->
					  <div class="items">

						<!-- 1-5 -->
						<div>
						  <img src="public/images/slider-1.png" />
						</div>

						<!-- 5-10 -->
						<div>
						
						  <img src="public/images/slider-1.png" />
						</div>

						<!-- 10-15 -->
						<div>
						  <img src="public/images/slider-1.png" />
						</div>

					  </div>

					</div>
				<a class="next browse right"></a>
				
			</div>
			<div id="slider-alt"></div>
			<div id="uclu-blok">
				<div class="blok1">
					<div class="blok-baslik"><p class="myriad_pro_semibold">e-kentim nedir?</p></div>
					<div class="blok-icerik">
						<p>Site, rezidans, apartman yönetimi için tasarlanmış bir yönetim uygulamasıdır. Bu uygulamada site sakinlerini bilgilendirme, duyuru yapma, aidat takibi gibi apartman yönetimiyle alakalı birçok hizmetten ÜCRETSİZ! yararlanabilirsiniz.</p>
					</div>
				</div>
				<div class="blok2">
					<div class="blok-baslik"><p class="myriad_pro_semibold">Sitenizi Yönetin!</p></div>
					<div class="blok-icerik">
					<p>Sizin için tasarlanmış arayüzler ve sosyal içeriğiyle artık sitenizi yönetmek ve takip etmek çok daha kolay.<br /> <br /> Hemen sizde e-kentim ile sitenizin ayrıcalıklarını kullanın. </p></div>
				</div>
				<div class="blok3">
					<div class="blok-baslik"><p class="myriad_pro_semibold">Biz kimiz ?</p></div>
					<div class="blok-icerik">
					<p>Sitemiz, yaşam yönetimi için e-kentim NOVA Bilişim tarafından SüperOnline adına tasarlanmış bir uygulamadır. </p></div>
				</div>
			</div>
		<div style="clear:both;"></div>
			<div id="ikili-blok">
					<div class="sol">
						<div class="baslik"><p class="myriad_pro_semibold">Bu uygulamadan nasıl yararlanırım ?</p></div>
						<div class="icerik"><p class="myriad_pro_regular">Ücretsiz olarak hizmet veren e-kentim'i kullanmaya başlayın.<strong> BAŞVUR!		</strong> linkine tıklayarak yöneticilik için hemen başvurabilirsiniz!
						</p></div>
					</div>
				<div class="sag"><p><img src="public/images/ekentimkucukresimkucultulmus.jpg" /></p>
				</div>
			</div>
			<div id="alt-menu">
				<div class="sol1">
					<p>
						<ul>
						<li><strong>Site Linkleri</strong></li>
							<li><a href="#">Ana Sayfa</a></li>
							<li><a href="#">Ürünümüz</a></li>
							<li><a href="#">Hakkımızda</a></li>
							<li><a href="#">İletişim</a></li>
						</ul>
					</p>
				</div>
					<div class="sol2">
						<p>
							<ul>
								<li><strong>Özellikleri</strong></li>
								<li><a href="#">Ücretsiz!</a></li>
								<li><a href="#">Muhasebe Takibi</a></li>
								<li><a href="#">Toplantı Takibi</a></li>
								<li><a href="#">SMS Hizmetleri</a></li>
								<li><a href="#">Kolay Kullanım</a></li>
							</ul>
						</p>
					</div>
					<div class="sol3">
						<p>
							<ul>
							<li><strong>Sıkça Sorulanlar</strong></li>
								<li><a href="#">e-kentim nedir</a></li>
								<li><a href="#">Ücretsiz mi</a></li>
								<li><a href="#">Kimler Kullanır</a></li>
								<li><a href="#">Güvenli midir</a></li>
								</ul>
						</p>
					</div>
				<div class="sol4">
					<p>
						<ul>
							<li><strong>Diğer</strong></li>
							<li><a href="#">Yorumlar</a></li>
							<li><a href="#">Nerelerdeyiz</a></li>
						</ul>
					</p>
				</div>
				<div class="sag">
					<ul>
						<li><a href="http://www.facebook.com"><img src="public/images/ofacebook.png" /></a></li>
						<li><a href="http://www.twitter.com"><img src="public/images/otwitter.png" /></a></li>
					</ul>
				</div>
			</div>
	</div>
		<div style="clear:both;"></div>
</div>
	<div id="foot">
		<div id="footer">
				<div class="sagnova"><a href="http://www.novabilisim.com.tr"><img src="public/images/novalogokucuk.png" /></a></div>				
				<div class="solekent"><p class="myriad_pro_regular">e-kentim.com &copy; 2012</p></div>
		</div>
	</div>
</div>
	<script type="text/javascript">
		$(document).ready(function(){
			// initialize scrollable together with the autoscroll plugin
			var root = $("#autoscroll").scrollable({circular: true}).autoscroll({ autoplay: false });

			// provide scrollable API for the action buttons
			window.api = root.data("scrollable");
		});
	</script>
</body>
</html>