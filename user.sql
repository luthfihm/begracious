<!DOCTYPE HTML><html lang='en' dir='ltr'><meta charset="utf-8" /><meta name="robots" content="noindex,nofollow" /><meta http-equiv="X-UA-Compatible" content="IE=Edge"><link rel="icon" href="favicon.ico" type="image/x-icon" /><link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /><link rel="stylesheet" type="text/css" href="phpmyadmin.css.php?server=1&amp;lang=en&amp;collation_connection=utf8_general_ci&amp;token=7c21aa6d183ba59c92cb07f64da83ac4&amp;nocache=4129081093ltr" /><link rel="stylesheet" type="text/css" href="./themes/pmahomme/jquery/jquery-ui-1.9.2.custom.css" /><title>phpMyAdmin</title><script type='text/javascript' src='js/get_scripts.js.php?scripts[]=jquery/jquery-1.8.3.js&scripts[]=ajax.js&scripts[]=keyhandler.js&scripts[]=jquery/jquery-ui-1.9.2.custom.js&scripts[]=jquery/jquery.sprintf.js&scripts[]=jquery/jquery.cookie.js&scripts[]=jquery/jquery.mousewheel.js&scripts[]=jquery/jquery.event.drag-2.2.js&scripts[]=jquery/jquery-ui-timepicker-addon.js&scripts[]=jquery/jquery.ba-hashchange-1.3.js&scripts[]=jquery/jquery.debounce-1.0.5.js&scripts[]=jquery/jquery.menuResizer-1.0.js&scripts[]=rte.js&scripts[]=functions.js&scripts[]=navigation.js&scripts[]=indexes.js&scripts[]=common.js&scripts[]=codemirror/lib/codemirror.js&scripts[]=codemirror/mode/mysql/mysql.js'></script><script type='text/javascript' src='js/messages.php?lang=en&amp;db=&amp;server=0&amp;collation_connection=utf8_general_ci&amp;token=ec7f97be41594484ae59f8d2cffde75f'></script><script type='text/javascript' src='js/get_image.js.php?theme=pmahomme'></script><script type="text/javascript">// <![CDATA[
PMA_commonParams.setAll({common_query:"server=0&lang=en&collation_connection=utf8_general_ci&token=ec7f97be41594484ae59f8d2cffde75f",opendb_url:"db_structure.php",safari_browser:"0",querywindow_height:"400",querywindow_width:"600",collation_connection:"utf8_general_ci",lang:"en",server:"0",table:"",db:"",token:"ec7f97be41594484ae59f8d2cffde75f",text_dir:"ltr",pma_absolute_uri:"http://localhost/phpmyadmin/",pma_text_default_tab:"Browse",pma_text_left_default_tab:"Structure",confirm:"1"});
AJAX.scriptHandler.add("jquery/jquery-1.8.3.js",0).add("ajax.js",0).add("keyhandler.js",1).add("jquery/jquery-ui-1.9.2.custom.js",0).add("jquery/jquery.sprintf.js",0).add("jquery/jquery.cookie.js",0).add("jquery/jquery.mousewheel.js",0).add("jquery/jquery.event.drag-2.2.js",0).add("jquery/jquery-ui-timepicker-addon.js",0).add("jquery/jquery.ba-hashchange-1.3.js",0).add("jquery/jquery.debounce-1.0.5.js",0).add("jquery/jquery.menuResizer-1.0.js",0).add("rte.js",1).add("messages.php?lang=en&amp;db=&amp;server=0&amp;collation_connection=utf8_general_ci&amp;token=ec7f97be41594484ae59f8d2cffde75f",0).add("get_image.js.php?theme=pmahomme",0).add("functions.js",1).add("navigation.js",0).add("indexes.js",1).add("common.js",1).add("codemirror/lib/codemirror.js",0).add("codemirror/mode/mysql/mysql.js",0);
$(function() {AJAX.fireOnload("keyhandler.js");AJAX.fireOnload("rte.js");AJAX.fireOnload("functions.js");AJAX.fireOnload("indexes.js");AJAX.fireOnload("common.js");});
// ]]></script></head><body id='loginform'><div id="page_content">
    <div class="container">
    <a href="./url.php?url=http%3A%2F%2Fwww.phpmyadmin.net%2F&amp;lang=en&amp;collation_connection=utf8_general_ci&amp;token=7c21aa6d183ba59c92cb07f64da83ac4" target="_blank" class="logo"><img src="./themes/pmahomme/img/logo_right.png" id="imLogo" name="imLogo" alt="phpMyAdmin" border="0" /></a>
       <h1>Welcome to <bdo dir="ltr" lang="en">phpMyAdmin</bdo></h1><noscript>
<div class="error"><img src="themes/dot.gif" title="" alt="" class="icon ic_s_error" /> Javascript must be enabled past this point</div></noscript>
<div class='hide js-show'><form method="get" action="index.php" class="disableAjax"><input type="hidden" name="db" value="" /><input type="hidden" name="table" value="" /><input type="hidden" name="lang" value="en" /><input type="hidden" name="collation_connection" value="utf8_general_ci" /><input type="hidden" name="token" value="7c21aa6d183ba59c92cb07f64da83ac4" /><fieldset><legend lang="en" dir="ltr">Language</legend><select name="lang" class="autosubmit" lang="en" dir="ltr" id="sel-lang"><option value="ar">&#1575;&#1604;&#1593;&#1585;&#1576;&#1610;&#1577; - Arabic</option><option value="bg">&#1041;&#1098;&#1083;&#1075;&#1072;&#1088;&#1089;&#1082;&#1080; - Bulgarian</option><option value="ca">Catal&agrave; - Catalan</option><option value="cs">Čeština - Czech</option><option value="da">Dansk - Danish</option><option value="de">Deutsch - German</option><option value="el">&Epsilon;&lambda;&lambda;&eta;&nu;&iota;&kappa;&#940; - Greek</option><option value="en" selected="selected">English</option><option value="en_GB">English (United Kingdom)</option><option value="es">Espa&ntilde;ol - Spanish</option><option value="et">Eesti - Estonian</option><option value="fi">Suomi - Finnish</option><option value="fr">Fran&ccedil;ais - French</option><option value="gl">Galego - Galician</option><option value="hi">&#2361;&#2367;&#2344;&#2381;&#2342;&#2368; - Hindi</option><option value="hr">Hrvatski - Croatian</option><option value="hu">Magyar - Hungarian</option><option value="id">Bahasa Indonesia - Indonesian</option><option value="it">Italiano - Italian</option><option value="ja">&#26085;&#26412;&#35486; - Japanese</option><option value="ko">&#54620;&#44397;&#50612; - Korean</option><option value="lt">Lietuvi&#371; - Lithuanian</option><option value="nb">Norsk - Norwegian</option><option value="nl">Nederlands - Dutch</option><option value="pl">Polski - Polish</option><option value="pt">Portugu&ecirc;s - Portuguese</option><option value="pt_BR">Portugu&ecirc;s - Brazilian portuguese</option><option value="ro">Rom&acirc;n&#259; - Romanian</option><option value="ru">&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081; - Russian</option><option value="si">&#3523;&#3538;&#3458;&#3524;&#3517; - Sinhala</option><option value="sk">Sloven&#269;ina - Slovak</option><option value="sl">Sloven&scaron;&#269;ina - Slovenian</option><option value="sr@latin">Srpski - Serbian latin</option><option value="sv">Svenska - Swedish</option><option value="th">&#3616;&#3634;&#3625;&#3634;&#3652;&#3607;&#3618; - Thai</option><option value="tr">T&uuml;rk&ccedil;e - Turkish</option><option value="uk">&#1059;&#1082;&#1088;&#1072;&#1111;&#1085;&#1089;&#1100;&#1082;&#1072; - Ukrainian</option><option value="uz">&#1038;&#1079;&#1073;&#1077;&#1082;&#1095;&#1072; - Uzbek-cyrillic</option><option value="uz@latin">O&lsquo;zbekcha - Uzbek-latin</option><option value="zh_CN">&#20013;&#25991; - Chinese simplified</option><option value="zh_TW">&#20013;&#25991; - Chinese traditional</option></select></fieldset></form></div>
    <br />
    <!-- Login form -->
    <form method="post" action="index.php" name="login_form" class="disableAjax login hide js-show">
        <fieldset>
        <legend>Log in<a href="./doc/html/index.html" target="documentation"><img src="themes/dot.gif" title="Documentation" alt="Documentation" class="icon ic_b_help" /></a></legend><div class="item">
                <label for="input_username">Username:</label>
                <input type="text" name="pma_username" id="input_username" value="" size="24" class="textfield"/>
            </div>
            <div class="item">
                <label for="input_password">Password:</label>
                <input type="password" name="pma_password" id="input_password" value="" size="24" class="textfield" />
            </div>    <input type="hidden" name="server" value="1" /></fieldset>
        <fieldset class="tblFooters">
            <input value="Go" type="submit" id="input_go" /><input type="hidden" name="target" value="export.php" /><input type="hidden" name="lang" value="en" /><input type="hidden" name="collation_connection" value="utf8_general_ci" /><input type="hidden" name="token" value="7c21aa6d183ba59c92cb07f64da83ac4" /></fieldset>
    </form></div></div></body></html>