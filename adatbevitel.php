<?php

$tanarok = $db->getTanarok();
//$osztalyok = $db->getOsztalyok();
//$tantargyak = $db->getTantargyak();
$tantermek = $db->getTantermek();
//$esemenyek = $db->getEsemenyek();

?>
<h2>Esemény rögzítése</h2>
<form action="#" method="post">
    <select id="tanarId" name="tanarId">
        <?php foreach ($tanarok as $tanar) : ?>
            <option value="<?php echo $tanar["tanarId"]; ?>"><?php echo $tanar["tanarnev"]; ?></option>
        <?php endforeach; ?>
    </select>
    <select id="tantereId" name="tantereId">
        <?php foreach ($tantermek as $tanterem) : ?>
            <option value="<?php echo $tanterem["teremId"]; ?>"><?php echo $tanterem["teremkod"]; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="datetime-local" name="kezdet" id="kezdet" placeholder="Változás kezdete" value="<?php echo date("Y-m-d\TH:i"); ?>">
    <input type="datetime-local" name="veg" id="veg" placeholder="Változás vége" value="<?php echo date("Y-m-d\TH:i"); ?>">
    <textarea name="leiras" id="leiras" cols="30" rows="5"></textarea>
    <br>
    <input type="submit" value="Rögzít">
</form>
<?php
if (isset($_POST["tanarId"]) && isset($_POST["tantereId"]) && isset($_POST["kezdet"]) && isset($_POST["veg"]) && isset($_POST["leiras"])) {
    $tanarId = filter_input(INPUT_POST, "tanarId", FILTER_VALIDATE_INT);
    $tantereId = filter_input(INPUT_POST, "tantereId", FILTER_VALIDATE_INT);
    $kezdet = date("Y-m-d H:i:s", strtotime($_POST["kezdet"]));
    $veg = date("Y-m-d H:i:s", strtotime($_POST["veg"]));
    $leiras = htmlspecialchars($_POST["leiras"]);
    echo $tanarId . " " . $tantereId . " " . $kezdet . " " . $veg . " " . $leiras;
    if ($db->setEsemeny($tanarId, $tantereId, $kezdet, $veg, $leiras)) {
        echo "Sikeres rögzítés!";
    } else {
        echo "Sikertelen rögzítés!";
    }
}
