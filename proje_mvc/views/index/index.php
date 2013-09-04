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
					$("body").prepend("<div id='login-error' class='login-error'><p>L�tfen kullan�c� ad�n�z� veya �ifrenizi bo� ge�meyiniz!!!</p></div>");
					$("#login-error").hide().slideDown("slow");
				
	
			}else{
				if(slct == 1){ // y�netici giri�i yap�l�yor buradan ...
				$("#ajax-loader").show();
					$.ajax({
						type: 'POST',
						data: "kadi=" + kadi + "&sifre=" + sifre,
						url : "<?php echo URL;?>ajax/manager_login.php",
						success : function(ekle){
									if(ekle == "hata"){
											$("#login-error").hide();
											$("body").prepend("<div id='login-error' class='login-error'><p>Kullan�c� ad�n�z veya �ifreniz yanl��!!!</p></div>");
											$("#login-error").hide().slideDown("slow");
											$("#ajax-loader").hide();
									}else if(ekle == 'giris'){
										window.location='manager';
									}	
								  }
					});
				}else if(slct == 0){
					alert("Bu sayfa hen�z yap�m a�amas�nda...");
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
				<li><a id="giris-yap" href="#">Giri� Yap</a>
					<div class="giris-panel">
							<table cellpadding="3" cellspacing="3">
								<tr>
									<td>Kullan�c� Ad�:</td>
									<td><input class="inpt" type="text" name="kadi" /></td>
								</tr>
								<tr>
									<td>�ifre:</td>
									<td><input class="inpt" type="password" name="sifre" /></td>
								</tr>
								<tr>
									<td>Giri� Tipi</td>
									<td><select class="slct" name="giris-tipi">
										<option value="0">Apartman Sakini</option>
										<option value="1">Y�netici</option>
									</select></td>
								</tr>
								<tr>
									<td></td>
									<td style="position:relative"><input id="login-button" onclick="login()" class="btn" type="submit" value="Giri� Yap" /><img id="ajax-loader" src="<?php echo URL;?>public/images/ajax-loader.gif" /></td>
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
							<li><a class="myriad_pro_semibold" href="#">�R�N�M�Z</a></li>
							<li><a class="myriad_pro_semibold" href="#">HAKKIMIZDA</a></li>
							<li><a class="myriad_pro_semibold" href="#">�LET���M</a></li>
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
						<p>Site, rezidans, apartman y�netimi i�in tasarlanm�� bir y�netim uygulamas�d�r. Bu uygulamada site sakinlerini bilgilendirme, duyuru yapma, aidat takibi gibi apartman y�netimiyle alakal� bir�ok hizmetten �CRETS�Z! yararlanabilirsiniz.</p>
					</div>
				</div>
				<div class="blok2">
					<div class="blok-baslik"><p class="myriad_pro_semibold">Sitenizi Y�netin!</p></div>
					<div class="blok-icerik">
					<p>Sizin i�in tasarlanm�� aray�zler ve sosyal i�eri�iyle art�k sitenizi y�netmek ve takip etmek �ok daha kolay.<br /> <br /> Hemen sizde e-kentim ile sitenizin ayr�cal�klar�n� kullan�n. </p></div>
				</div>
				<div class="blok3">
					<div class="blok-baslik"><p class="myriad_pro_semibold">Biz kimiz ?</p></div>
					<div class="blok-icerik">
					<p>Sitemiz, ya�am y�netimi i�in e-kentim NOVA Bili�im taraf�ndan S�perOnline ad�na tasarlanm�� bir uygulamad�r. </p></div>
				</div>
			</div>
		<div style="clear:both;"></div>
			<div id="ikili-blok">
					<div class="sol">
						<div class="baslik"><p class="myriad_pro_semibold">Bu uygulamadan nas�l yararlan�r�m ?</p></div>
						<div class="icerik"><p class="myriad_pro_regular">�cretsiz olarak hizmet veren e-kentim'i kullanmaya ba�lay�n.<strong> BA�VUR!		</strong> linkine t�klayarak y�neticilik i�in hemen ba�vurabilirsiniz!
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
							<li><a href="#">�r�n�m�z</a></li>
							<li><a href="#">Hakk�m�zda</a></li>
							<li><a href="#">�leti�im</a></li>
						</ul>
					</p>
				</div>
					<div class="sol2">
						<p>
							<ul>
								<li><strong>�zellikleri</strong></li>
								<li><a href="#">�cretsiz!</a></li>
								<li><a href="#">Muhasebe Takibi</a></li>
								<li><a href="#">Toplant� Takibi</a></li>
								<li><a href="#">SMS Hizmetleri</a></li>
								<li><a href="#">Kolay Kullan�m</a></li>
							</ul>
						</p>
					</div>
					<div class="sol3">
						<p>
							<ul>
							<li><strong>S�k�a Sorulanlar</strong></li>
								<li><a href="#">e-kentim nedir</a></li>
								<li><a href="#">�cretsiz mi</a></li>
								<li><a href="#">Kimler Kullan�r</a></li>
								<li><a href="#">G�venli midir</a></li>
								</ul>
						</p>
					</div>
				<div class="sol4">
					<p>
						<ul>
							<li><strong>Di�er</strong></li>
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