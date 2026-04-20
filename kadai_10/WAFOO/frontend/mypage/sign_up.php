<?php include("../common/headtag.html")?>
<?php include("../common/header.php")?>
<main>
    <section class="userRegi_form">
        <h2>Sign Up for free</h2>
        <form action="../../backend/insert_users.php" method="post" id="host_form" enctype="multipart/form-data">
            <p><input type="text" name="first_name" size="64" placeholder="First Name"></p>
            <p><input type="text" name="last_name" size="64" placeholder="Last Name"></p>
            <p class="userRegi_form_select cp_sl">
                <select name="nationality">
                    <option value='' disabled selected style='display:none;'>Nationality</option>
                    <option value="1">America</option>
                    <option value="2">Canada</option>
                    <option value="3">Australia</option>
                    <option value="4">Japan</option>
                </select>
            </p>
            <p class="userRegi_form_select cp_sl">
                <select name="gender">
                    <option value='' disabled selected style='display:none;'>Gender</option>
                    <option value="man">Man</option>
                    <option value="women">Woman</option>
                    <option value="other">Other</option>
                </select>
            </p>
            <div>
                <p class="birth_title">Birthday</p>
                <div class="birth_flex">
                    <p class="userRegi_form_select cp_sl birth_wi">
                        <select name="birth_month">
                            <option value='' disabled selected style='display:none;'>Month</option>
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
                        </select>
                    </p>
                    <p class="userRegi_form_select cp_sl birth_wi">
                        <select name="birth_day">
                            <option value='' disabled selected style='display:none;'>Day</option>
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
                            <option value="31">31</option>
                        </select>
                    </p>
                    <p class="userRegi_form_select cp_sl birth_wi">
                        <select name="birth_year">
                            <option value='' disabled selected style='display:none;'>Year</option>
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
                        </select>
                    </p>
                </di>
            </div>
            <p><input type="text" name="email" size="64" placeholder="Email"></p>
            <p><input type="password" name="password" size="64" placeholder="Password"></p>
            <p class="tac"><input type="submit" value="Sign Up" class="userRegi_btn"></p>
        </form>
        <div class="option_comment">
            <p>Do you already have an account ?</p>
            <a href="login.php">Log In</a>
        </div>
    </section>
</main>
<?php include("../common/footertag.html")?>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../js/script.js"></script>
</body>
</html>