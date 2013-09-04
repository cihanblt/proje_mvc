$(document).ready(function(){
    $('.nav-header ~ li').click(function(){
    	url = $(".nav-header ~ li a").attr("href");
    	$(".nav-header ~ li a[href$='" + url + "']").addClass("active");
    });
   ////////////////////////////////////////////////////////
   $('.bas').hover(function(){
       $(this).css({"background-color":"#fff","color":" #333333"});
       
   });
   $(".datepicker").datepicker({
		format : 'dd.mm.yyyy'
   });
   ////////////////////////////////////////////////////////
  /* $("a[rel]").overlay({
	      mask: {
	        color: '#131313',
	        loadSpeed: 200,
	        opacity: 0.8
	      },
	 
	      closeOnClick: false
	  });*/
	$("#kiraci").hide();
	$("#ev_sahibi").hide();
   
});
function daire_olustur(){
	var b_name = $("input[name='b_name']").val();
	var h_count = $("input[name='h_count']").val();
	var siteid = $("input[name='siteid']").val();
	var d_ozellik = $("select[name='d_ozellik']").val();
	if(b_name == "" || h_count == ""){
		alert("Lütfen kutularý boþ geçmeyiniz..");
	}else{
		$.ajax({
			type : "POST",
			url  : "ajax/daire_olustur.php",
			data : "b_name="+ b_name + "&h_count=" + h_count + "&siteid=" + siteid + "&d_ozellik=" + d_ozellik,
			success : function(ekle){
				$("#daire_listele").html(ekle);
			}
		});
	}
}

function gelir_dagilimi_olustur(id){
	$("#gelir_dagilimi_olustur-" + id).modal();
}
function yeni_kalem_olustur_kaydet(){
	var gelir_turu = $("#yeni_kalem_olustur input[name='gelir_turu']").val();
	if(gelir_turu == ""){
		alert("Lütfen bir gelir türü adý giriniz !");
	}else{
		$("#gelir_turu_ekle").ajaxForm({
			success : function(){
				alert("Gelir kalemi oluþturuldu..");
				window.location = "?do=muhasebe_islemleri&mdl=gelir_islemleri";
			}
		}).submit();
	}
}
function yeni_kalem_olustur(){
	$('#yeni_kalem_olustur').modal();
}
function sakin_cikis(id){
	var output_date = $("#sakin_cikis-" + id + " input[name='output_date']").val();
	if(output_date == ""){
		alert("Lütfen çýkýþ tarihini giriniz..");
	}else{
		$("#sakin_cikis-" + id).ajaxForm({
			success : function(data){
				alert("Çýkýþ yapýlmýþtýr..");
				window.location = "?do=sakin_islemleri";
			}
		}).submit();
	}
}
function sakin_degisim(id){
	$("#sakin_degisim-" + id).modal();
}
function sakin_guncelle(id){
	    var input_date = $("#guncelle" + id + " input[name='input_date']").val();
		var r_username = $("#guncelle" + id + " input[name='r_username']").val();
		var r_pass     = $("#guncelle" + id + " input[name='r_pass']").val();
		var r_pass2    = $("#guncelle" + id + " input[name='r_pass2']").val();
		var r_tcnumber = $("#guncelle" + id + " input[name='r_tcnumber']").val();
		var r_namesurname = $("#guncelle" + id + " input[name='r_namesurname']").val();
		var r_phone = $("#guncelle" + id + " input[name='r_phone']").val();
		var r_gsmphone = $("#guncelle" + id + " input[name='r_gsmphone']").val();
		var r_email = $("#guncelle" + id + " input[name='r_email']").val();
		var r_birthplace = $("#guncelle" + id + " select[name='r_birthplace']").val();
		var r_birthdate = $("#guncelle" + id + " select[name='r_birthday']").val() + "." + $("#sakin_ekle_form_yeni #kiraci select[name='r_birthmonth']").val() + "." + $("#sakin_ekle_form_yeni #kiraci select[name='r_birthyear']").val();
		var site = $("#guncelle" + id + " input[id='site']").val();
		var h_blokid = $("#guncelle" + id + " select[name='h_blokid']").val();
		var h_houseid = $("#guncelle" + id + " select[name='h_houseid']").val();
		if(input_date == "" || r_username == "" || r_pass == "" || r_pass2 == "" || r_tcnumber == "" || r_namesurname == "" || r_phone == "" || h_blokid == "" || h_houseid == ""){
			alert("Lütfen zorunlu alanlarý boþ býrakmayýnýz!!");
		}else if(r_pass != r_pass2){
			alert("Þifreleriniz birbiriyle uyuþmuyor!!");
		}else{
			$("#guncelle" + id).ajaxForm({
				success: function(da){
				alert("Kayýt güncellenmiþtir..");
					window.location = "?do=sakin_islemleri";
				}
			}).submit();
		}
}
function sakin_duzenle(id){
	$("#sakin_duzenle-" + id).modal();
}
function sakin_sil(id){
	$("#sakin_sil-" + id).modal();
}
function sakin_ekle_form_kontrol(){
	var sakin_tipi = $("#sakin_tipi").val();
	if(sakin_tipi == 0){
		var input_date = $("#sakin_ekle_form_yeni #kiraci input[name='input_date']").val();
		var r_username = $("#sakin_ekle_form_yeni #kiraci input[name='r_username']").val();
		var r_pass     = $("#sakin_ekle_form_yeni #kiraci input[name='r_pass']").val();
		var r_pass2    = $("#sakin_ekle_form_yeni #kiraci input[name='r_pass2']").val();
		var r_tcnumber = $("#sakin_ekle_form_yeni #kiraci input[name='r_tcnumber']").val();
		var r_namesurname = $("#sakin_ekle_form_yeni #kiraci input[name='r_namesurname']").val();
		var r_phone = $("#sakin_ekle_form_yeni #kiraci input[name='r_phone']").val();
		var r_gsmphone = $("#sakin_ekle_form_yeni #kiraci input[name='r_gsmphone']").val();
		var r_email = $("#sakin_ekle_form_yeni #kiraci input[name='r_email']").val();
		var r_birthplace = $("#sakin_ekle_form_yeni #kiraci select[name='r_birthplace']").val();
		var r_birthdate = $("#sakin_ekle_form_yeni #kiraci select[name='r_birthday']").val() + "." + $("#sakin_ekle_form_yeni #kiraci select[name='r_birthmonth']").val() + "." + $("#sakin_ekle_form_yeni #kiraci select[name='r_birthyear']").val();
		var site = $("#sakin_ekle_form_yeni #kiraci input[id='site']").val();
		var h_blokid = $("#sakin_ekle_form_yeni #kiraci select[name='h_blokid']").val();
		var h_houseid = $("#sakin_ekle_form_yeni #kiraci select[name='h_houseid']").val();
		if(input_date == "" || r_username == "" || r_pass == "" || r_pass2 == "" || r_tcnumber == "" || r_namesurname == "" || r_phone == "" || h_blokid == "" || h_houseid == ""){
			alert("Lütfen zorunlu alanlarý boþ býrakmayýnýz!!");
		}else if(r_pass != r_pass2){
			alert("Þifreleriniz birbiriyle uyuþmuyor!!");
		}else{
			$.ajax({
				type : "post",
				url  : "ajax/sakin_sorgula.php",
				data : "r_username=" + r_username + "&r_tcnumber=" + r_tcnumber + "&r_email=" + r_email +"&h_blokid=" + h_blokid + "&h_houseid=" + h_houseid,
				success : function(data){
					if(data == "hata"){
						alert("Lütfen farklý bir kulllanýcý adý,email veya T.C. Kimlik numarasý giriniz!");
					}else if(data == "hata2"){
						alert("Seçtiðiniz daire boþ deðil!!");
					}else if(data == "ok"){
						$("#sakin_ekle_form_yeni #kiraci").ajaxForm({
							success: function(da){
								alert("Kayýt oluþturulmuþtur..");
								window.location = "?do=sakin_islemleri";
							}
						}).submit();
					}
				}
			});
			
		}
		
	}else if(sakin_tipi == 1){
		var input_date = $("#sakin_ekle_form_yeni #ev_sahibi input[name='input_date']").val();
		var h_blokid   = $("#sakin_ekle_form_yeni #ev_sahibi select[name='h_blokid']").val();
		var h_houseid  = $("#sakin_ekle_form_yeni #ev_sahibi select[name='h_houseid']").val();
		var h_hostid   = $("#sakin_ekle_form_yeni #ev_sahibi select[name='h_hostid']").val();
		
		if(input_date == "" || h_blokid == "" || h_houseid == "" || h_hostid == ""){
			alert("Lütfen zorunlu alanlarý boþ býrakmayýnýz!!");
		}else{
			$.ajax({
				type: "post",
				url : "ajax/sakin_sorgula2.php",
				data: "h_blokid=" + h_blokid + "&h_houseid=" + h_houseid + "&h_hostid=" + h_hostid,
				success : function(data){
					if(data == "hata"){
						alert("Bu daire boþ deðil!!");
					}else if(data == "ok"){
						$("#sakin_ekle_form_yeni #ev_sahibi").ajaxForm({
							success : function(){
								alert("Kayýt oluþturulmuþtur..");
								window.location = "?do=sakin_islemleri";
							}
						}).submit();
					}
				}
			});
		}
	}else if(sakin_tipi == " "){
		alert("Lütfen Sakin Tipini seçin..");
	}
}
function sakin_tipi_sec(){
	var sakin_tipi = $("#sakin_tipi").val();
	if(sakin_tipi == 0){
		$("#ev_sahibi").hide();
		$("#kiraci").slideDown();
		
	}else if(sakin_tipi == 1){
		$("#kiraci").hide();
		$("#ev_sahibi").slideDown();
		
	}else if(sakin_tipi == ""){
		$("#kiraci").hide();
		$("#ev_sahibi").hide();
	}
	
}
function sakin_ekle_form(tip){
	$('#sakin_ekle_form' + tip).modal();
}

function ev_sahibi_form(tip,id){
		var h_username     = $("#ev_sahibi_form_" + tip + id + " input[name='h_username']").val();
		var h_pass         = $("#ev_sahibi_form_" + tip + id + " input[name='h_pass']").val();
		var h_pass2        = $("#ev_sahibi_form_" + tip + id + " input[name='h_pass2']").val();
		var h_tcnumber     = $("#ev_sahibi_form_" + tip + id + " input[name='h_tcnumber']").val();
		var h_namesurname  = $("#ev_sahibi_form_" + tip + id + " input[name='h_namesurname']").val();
		var h_phone        = $("#ev_sahibi_form_" + tip + id + " input[name='h_phone']").val();
		var h_gsmphone     = $("#ev_sahibi_form_" + tip + id + " input[name='h_gsmphone']").val();
		var h_email        = $("#ev_sahibi_form_" + tip + id + " input[name='h_email']").val();
		var r_birthday     = $("#ev_sahibi_form_" + tip + id + " select[name='r_birthday']").val();
		var r_birthmonth   = $("#ev_sahibi_form_" + tip + id + " select[name='r_birthmonth']").val();
		var r_birthyear    = $("#ev_sahibi_form_" + tip + id + " select[name='r_birthyear']").val();
		var h_blokid       = $("#ev_sahibi_form_" + tip + id + " #blok"+id).val();
		var h_houseid      = $("#ev_sahibi_form_" + tip + id + " #daire-"+id).val();
		var h_adress       = $("#ev_sahibi_form_" + tip + id + " textarea[name='h_adress']").val();
		//var form = $("#ev_sahibi_form_" + tip + id).serialize();
		//alert(form);
		if(h_username == "" || h_pass == "" || h_pass2 == "" || h_tcnumber == "" || h_namesurname == "" || h_phone == "" ||  h_blokid == "" || h_houseid == "" ) {
			alert("Lütfen gerekli alanlarý doldurunuz!!");
		}else if(h_pass2 != h_pass){
			alert("Girdiðiniz þifreler birbiriyle uyuþmuyor!!");
		}else{
			if(tip == 'yeni'){
				$("#ev_sahibi_form_yeni_y").ajaxForm({
					success: function(data){
						window.location="?do=ev_sahibi_islemleri";
					}
			}).submit();
			}else if(tip == 'duzenle'){
				$("#ev_sahibi_form_duzenle" + id).ajaxForm({
					success: function(data){
						window.location="?do=ev_sahibi_islemleri";
					}
			}).submit();
			}
		}
}
function yeni_ekle(id){
	$("#yeni_ekle_" + id).modal();
}
function ev_sahibi(id,islem){
	var idek = "ev_sahibi"+ islem + "-" + id;
	$("#" + idek).modal();
}
function daire(id,islem){
	var idek = "daire"+ islem + "-" + id;
	$("#" + idek).modal();
}
function blok(id,islem){
	var idek = "blok"+ islem + "-" + id;
	$("#" + idek).modal();
}
function ilce_sec(){
       
       var il_id = $("#il").val();
       
       //alert(il_id);
        $.ajax({
            type    : "POST",
            url     : "views/dashboard/ilce_sec.php",
            data    : "il_id=" + il_id,
            success : function(ekle){
                $('#ilce').html(ekle);
                //alert(ilce);
               }    
        });
        
}
function site_sec(){
    var il_id = $("#il").val();
    var ilce_id = $("#ilce").val();
    $.ajax({
            type    : "POST",
            url     : "views/dashboard/site_sec.php",
            data    : "il_id=" + il_id +"&ilce_id=" + ilce_id,
            success : function(ekle){
                $('#site').html(ekle);
                //alert(ilce);
               }    
        });
}

function yonetim_sec(){
	var site_id = $("#site").val();
	//alert(1);
	 $.ajax({
        type    : "POST",
        url     : "views/dashboard/yonetici_tipi_sec.php",
        data    : "site_id=" + site_id ,
        success : function(ekle){
            $('#yonetici').html(ekle);
            
           }     
    });
}
function blok_sec(){
    var site_id = $("#site").val();
    $.ajax({
            type    : "POST",
            url     : "views/dashboard/blok_sec.php",
            data    : "site_id=" + site_id ,
            success : function(ekle){
                $('#blok').html(ekle);
                //alert(ilce);
               }    
        });
}


function daire_sec(id){
	
    var site_id = $("#site").val();
    var blok_id = $("#blok" + id).val() ;
    $.ajax({
            type    : "POST",
            url     : "ajax/daire_sec.php",
            data    : "blok_id="+ blok_id + "&site_id=" + site_id ,
            success : function(ekle){
                $('#daire-' + id).html(ekle);
                //alert(ilce);
               }    
        });
}
function ev_sahibi_sec(id){
	var site_id = $("#site").val();
    var blok_id = $("#blok" + id).val();
	var house_id = $("#daire-" + id).val();
	$.ajax({
		type : "post",
		url  : "ajax/ev_sahibi_sec.php",
		data : "site_id=" + site_id + "&blok_id=" + blok_id + "&house_id=" + house_id,
		success : function(ekle){
			$("#ev_sahibi-" + id).html(ekle);
		}
	});
	
}
/*function alertf(html){
    if (arguments[1]) closehref = arguments[1];
    else closehref = 'javascript:$.fancybox.close();';
    contentHTML = '<div style="z-index:5000; text-align:center; font-size: 13px; min-width: 200px; margin: 20px 40px;">'+ html +'</div>';
    contentHTML += '<div style="text-align:center;"><a href="' + closehref + '" class="button">Tamam</a></div>';
    $.fancybox({
        content: contentHTML
    });
}*/
