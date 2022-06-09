<?php
#if (!isset($_SESSION['language'])) {
#    include('../Language/vietnam.php'); //test
#} else {
#    $language = "../Language/" . $_SESSION['language'] . ".php";
#    include($language);
#}
?>
<!--<div>
            <h1><?php #echo $CHOOSE_LANGUAGE;   ?></h1>
            <form name="change" action="<?php #echo htmlspecialchars($_SERVER["PHP_SELF"]);   ?>">
                <select onchange="changeLanguage(this.value)">
                    <option value="vietnam" selected><?php #echo $VIETNAMESE;   ?></option>
                    <option value="english"><?php #echo $ENGLISH;   ?></option>
                </select>
            </form>
            <div id="showChange"></div>
        </div>-->
