<?php
class Orarend {
    private $db;
    public function __construct($db){
        $this->db = $db;
    }

    /* adott tanár, adott heti órarendjét grafikusan megjelenítő függvény */
    public function orarendMegjelenit($het){
        $napok = array("Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek");
        $orak = array("1. óra", "2. óra", "3. óra", "4. óra", "5. óra", "6. óra", "7. óra", "8. óra", "9. óra");
        $orakSzama = count($orak);
        $napokSzama = count($napok);
        echo "<table class='orarendTable'>";
        echo "<tr><th></th>";
        for($i = 0; $i < $napokSzama; $i++){
            echo "<th>".$napok[$i]."</th>";
        }
        echo "</tr>";
        for($i = 0; $i < $orakSzama; $i++){
            echo "<tr>";
            echo "<td>".$orak[$i]."</td>";
            for($j = 0; $j < $napokSzama; $j++){
                echo "<td></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}