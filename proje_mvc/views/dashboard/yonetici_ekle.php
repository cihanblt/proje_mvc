<div class="hero-unit">
    <h3>Y�netici Ekleme Paneli</h3>
    <p>
    <form action="?go=yonetici_kaydet" method="post">
        <table cellpadding="4" cellspacing="4" >
            <tr>
                <td>Kullan�c� Ad� :</td>
                <td><input type="text" name="m_username" /></td>
            </tr>
            <tr>
                <td>�ifre :</td>
                <td><input type="text" name="m_pass" /></td>
            </tr>
            <tr>
                <td>�ifre (Tekrar) :</td>
                <td><input type="text" name="m_pass2" /></td>
            </tr>
            <tr>
                <td>T.C Kimlik No :</td>
                <td><input type="text" name="m_tcnumber" /></td>
            </tr>
            <tr>
                <td>Ad� Soyad� :</td>
                <td><input type="text" name="m_namesurname" /></td>
            </tr>
            <tr>
                <td>Do�um Yeri :</td>
                <td><select name="m_birthplace">
                        <option>..Se�iniz..</option>
                    <?php
                       for($i = 0; $i < count($this->il) ; $i++){
                        echo "<option value='".$this->il[$i]['id']."'>".$this->il[$i]['city_name']."</option>";
                       }
                       
                    ?>
                    </select></td>
            </tr>
            <tr>
                <td>Do�um Tarihi :</td>
                <td><select name="m_day"><option value="0">G�n</option>
                	<option value="1">1</option>
                	<option value="2">2</option>
                	<option value="3">3</option>
                	<option value="4">4</option>
                	<option value="5">5</option>
                	<option value="6">6</option>
                	<option value="7">7</option>
                	<option value="8">8</option>
                	<option value="9">9</option>
                	<option value="10">10</option>
                	<option value="11">11</option>
                	<option value="12">12</option>
                	<option value="13">13</option>
                	<option value="14">14</option>
                	<option value="15">15</option>
                	<option value="16">16</option>
                	<option value="17">17</option>
                	<option value="18">18</option>
                	<option value="19">19</option>
                	<option value="20">20</option>
                	<option value="21">21</option>
                	<option value="22">22</option>
                	<option value="23">23</option>
                	<option value="24">24</option>
                	<option value="25">25</option>
                	<option value="26">26</option>
                	<option value="27">27</option>
                	<option value="28">28</option>
                	<option value="29">29</option>
                	<option value="30">30</option>
                	<option value="31">31</option></select>
                    <select name="m_month"><option value="0">Ay</option>
                	<option value="1">1</option>
                	<option value="2">2</option>
                	<option value="3">3</option>
                	<option value="4">4</option>
                	<option value="5">5</option>
                	<option value="6">6</option>
                	<option value="7">7</option>
                	<option value="8">8</option>
                	<option value="9">9</option>
                	<option value="10">10</option>
                	<option value="11">11</option>
                	<option value="12">12</option></select>
                    <select name="m_year"><option value="0">Y�l</option>
                	<option value="1930">1930</option>
                	<option value="1931">1931</option>
                	<option value="1932">1932</option>
                	<option value="1933">1933</option>
                	<option value="1934">1934</option>
                	<option value="1935">1935</option>
                	<option value="1936">1936</option>
                	<option value="1937">1937</option>
                	<option value="1938">1938</option>
                	<option value="1939">1939</option>
                	<option value="1940">1940</option>
                	<option value="1941">1941</option>
                	<option value="1942">1942</option>
                	<option value="1943">1943</option>
                	<option value="1944">1944</option>
                	<option value="1945">1945</option>
                	<option value="1946">1946</option>
                	<option value="1947">1947</option>
                	<option value="1948">1948</option>
                	<option value="1949">1949</option>
                	<option value="1950">1950</option>
                	<option value="1951">1951</option>
                	<option value="1952">1952</option>
                	<option value="1953">1953</option>
                	<option value="1954">1954</option>
                	<option value="1955">1955</option>
                	<option value="1956">1956</option>
                	<option value="1957">1957</option>
                	<option value="1958">1958</option>
                	<option value="1959">1959</option>
                	<option value="1960">1960</option>
                	<option value="1961">1961</option>
                	<option value="1962">1962</option>
                	<option value="1963">1963</option>
                	<option value="1964">1964</option>
                	<option value="1965">1965</option>
                	<option value="1966">1966</option>
                	<option value="1967">1967</option>
                	<option value="1968">1968</option>
                	<option value="1969">1969</option>
                	<option value="1970">1970</option>
                	<option value="1971">1971</option>
                	<option value="1972">1972</option>
                	<option value="1973">1973</option>
                	<option value="1974">1974</option>
                	<option value="1975">1975</option>
                	<option value="1976">1976</option>
                	<option value="1977">1977</option>
                	<option value="1978">1978</option>
                	<option value="1979">1979</option>
                	<option value="1980">1980</option>
                	<option value="1981">1981</option>
                	<option value="1982">1982</option>
                	<option value="1983">1983</option>
                	<option value="1984">1984</option>
                	<option value="1985">1985</option>
                	<option value="1986">1986</option>
                	<option value="1987">1987</option>
                	<option value="1988">1988</option>
                	<option value="1989">1989</option>
                	<option value="1990">1990</option>
                	<option value="1991">1991</option>
                	<option value="1992">1992</option>
                	<option value="1993">1993</option>
                	<option value="1994">1994</option>
                	<option value="1995">1995</option>
                	<option value="1996">1996</option>
                	<option value="1997">1997</option>
                	<option value="1998">1998</option>
                	<option value="1999">1999</option>
                	<option value="2000">2000</option>
                	<option value="2001">2001</option>
                	<option value="2002">2002</option>
                	<option value="2003">2003</option>
                	<option value="2004">2004</option>
                	<option value="2005">2005</option>
                	<option value="2006">2006</option>
                	<option value="2007">2007</option>
                	<option value="2008">2008</option>
                	<option value="2009">2009</option>
                	<option value="2010">2010</option>
                	<option value="2011">2011</option>
                	<option value="2012">2012</option></select></td>
            </tr>
            <tr>
                <td>Cinsiyet :</td>
                <td><select name="m_gender"><option>..Se�iniz..</option><option value="Bay">Bay</option><option value="Bayan">Bayan</option></select></td>
            </tr>
            <tr>
                <td>E-Mail :</td>
                <td><input type="text" name="m_email" /></td>
            </tr>
            <tr>
                <td>Telefon :</td>
                <td><input type="text" name="m_phone" /></td>
            </tr>
            <tr>
                <td>Telefon (GSM) :</td>
                <td><input type="text" name="m_gsmphone" /></td>
            </tr>
            <tr>
                <td>Oturdu�u �l :</td>
                <td><select onchange="ilce_sec()" id="il"  name="fk_cityid"><option>..Se�iniz..</option>
                    <?php
                       for($i = 0; $i < count($this->il) ; $i++){
                        echo "<option value='".$this->il[$i]['id']."'>".$this->il[$i]['city_name']."</option>";
                       }
                       
                    ?>
                    </select></td>
            </tr>
            <tr>
                <td>Oturdu�u �l�e :</td>
                <td><select id="ilce" onchange="site_sec()" name="fk_districtid"><option>..Se�iniz..</option></select></td>
            </tr>
            <tr>
                <td>Oturdu�u Site :</td>
                <td><select id="site" onchange="blok_sec()" name="fk_siteid"><option>..Se�iniz..</option></select></td>
            </tr>
            <tr>
                <td>Oturdu�u Blok :</td>
                <td><select id="blok" onchange="daire_sec()" name="fk_blokid"><option>..Se�iniz..</option></select></td>
            </tr>
            <tr>
                <td>Oturdu�u Daire :</td>
                <td><select id="daire" name="fk_houseid"><option>..Se�iniz..</option></select></td>
            </tr>
            <tr>
                <td>Tam Adres :</td>
                <td><textarea name="m_address"></textarea></td>
            </tr>
            <tr>
                <td>Y�netici Tipi :</td>
                <td><select name="m_type"><option value="Site">Site</option><option value="Blok">Blok</option></select></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn" type="submit" value="Kaydet" /></td>
            </tr>
        </table>
    </form>
    </p>

</div>