
<?php
    foreach ($datos as $dato) {
    
        echo "Fecha: ".$dato["Bet"]["fecha"]."</br>";
        echo "Cantidad de ventas: ".$dato["Bet"]["cantidad"]."</br>";
        echo "Cantidad de ingresos: ".$dato["Bet"]["ingresos"]."</br>";
}
?>