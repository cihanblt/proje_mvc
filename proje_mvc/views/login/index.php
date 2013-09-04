<html>
<head>
    <title>Test Header</title>
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/default.css" />
    <script type="text/javascript" src="<?php echo URL;?>public/js/jquery.js" ></script>
    <script type="text/javascript" src="<?php echo URL;?>public/js/custom.js" ></script>
</head>
<body>
<div id="header">
    <a href="<?php echo URL;?>index" >Anasayfa</a>
    <?php
    
        if(Session::get('oturum') == TRUE){
    ?>
    <a href="<?php echo URL;?>logout/quit">Logout</a>
    <?php
    }else{
    ?>
    <a href="<?php echo URL;?>login">Login</a>
    <?php }?>
</div>
<div id="content">
<form action="login/run" method="post" >
<table cellpadding="4" cellspacing="4">
    <tr>
        <td>Kullanýcý Adý:</td>
        <td><input type="text" name="kadi" /></td>
    </tr>
    <tr>
        <td>Þifre:</td>
        <td><input type="password" name="sifre" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Giriþ" /></td>
    </tr>
</table>
</form>

</div>

<div id="footer">
    &copy; 2012
</div>
</body>
</html>