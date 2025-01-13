<h2>Módosított órarend</h2>

<?php
$esemenyek = $db->getEsemenyek();
$osztalyok = $db->getOsztalyok();
$tanarok = $db->getTanarok();
$tantargyak = $db->getTantargyak();
$tantermek = $db->getTantermek();
$napok = array("Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek");
$orak = array("1. óra", "2. óra", "3. óra", "4. óra", "5. óra", "6. óra", "7. óra", "8. óra", "9. óra", "10. óra");
$orarend = array();
foreach ($osztalyok as $osztaly) {
    $orarend[$osztaly["osztalyId"]] = array();
    foreach ($napok as $nap) {
        $orarend[$osztaly["osztalyId"]][$nap] = array();
        foreach ($orak as $ora) {
            $orarend[$osztaly["osztalyId"]][$nap][$ora] = array();
        }
    }
}