<div class="hero-unit">
    <h2>Yönetici Bilgileri</h2>
    
    <table class="detay_tablo" cellpadding="3" cellspacing="3" style="width:100%">
        <tr>
            <td>
                <table cellpadding="3" cellspacing="3">
                    <tr>
                        <td>Kullanýcý Adý:</td>
                        <td><strong><?php echo $this->d_liste[0]['m_username'];?></strong></td>
                    </tr>
                    <tr>
                        <td>T.C Kimlik No:</td>
                        <td><strong><?php echo $this->d_liste[0]['m_tcnumber'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Adý Soyadý:</td>
                        <td><strong><?php echo $this->d_liste[0]['m_namesurname'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Doðum Yeri:</td>
                        <td><strong><?php echo $this->d_liste[0]['m_birthplace'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Doðum Tarihi:</td>
                        <td><strong><?php echo $this->d_liste[0]['m_birthdate'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Cinsiyet:</td>
                        <td><strong><?php echo $this->d_liste[0]['m_gender'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Telefon:</td>
                        <td><strong><?php echo $this->d_liste[0]['m_phone'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Telefon(GSM):</td>
                        <td><strong><?php echo $this->d_liste[0]['m_gsmphone'];?></strong></td>
                    </tr>
                </table>
            </td>
            <td>
                <table cellpadding="3" cellspancing="3">
                    <tr>
                        <td>Ýl:</td>
                        <td><strong><?php echo $this->d_liste[0]['city_name'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Ýlçe:</td>
                        <td><strong><?php echo $this->d_liste[0]['district_name'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Site:</td>
                        <td><strong><?php echo $this->d_liste[0]['s_name'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Blok:</td>
                        <td><strong><?php echo $this->d_liste[0]['b_name'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Daire:</td>
                        <td><strong><?php echo $this->d_liste[0]['h_number'];?></strong></td>
                    </tr>
                    <tr>
                        <td>Adres:</td>
                        <td><strong><?php echo $this->d_liste[0]['m_adress'];?></strong></td>
                    </tr>
                    <tr>
                        <td>E-Mail:</td>
                        <td><strong><?php echo $this->d_liste[0]['m_email'];?></strong></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>