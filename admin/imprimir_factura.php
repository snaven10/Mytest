        <link href='../css/bootstrap.min.css' rel='stylesheet'>
        <div style='margin-top:5mm; display:none' class='container' id='imprimir_f'>
            <div id='cabesera' style='width:178mm; height:128mm; float:left;'>
                <div id='cabesera' style='width:178mm; height:24mm; float:left;'>
                    <div style='width:132mm; height:120px; float:left;'>
                        <div style='width:22mm; height:24mm; float:left;'></div>
                        <div style='width:72mm; height:24mm; float:left;'></div>
                        <div style='width:38mm; height:24mm; float:right;'>
                            <br><br>
                            <center></center>
                        </div>
                    </div>
                    <div style='width:40mm; height:20mm; border-radius: 15px; float:right;'>
                        <center>FACTURA <br> G 004900 </center>
                    </div>
                </div>
                <div  id='cuerpo' style='width:178mm; height:104mm; float:left;'>
                    <div id='D_cliente' style='width:178mm; height:17mm; border-radius: 15px; float:left;'>
                        <?php date_default_timezone_set('UTC');
                              $espacios = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                        ?>
                        <div style='width:59.33mm; height:17mm; float:left;'>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                                <?php echo $espacios.$_POST['Nombre_cl']; ?>
                            </div>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                            </div>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                            </div>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                            </div>
                        </div>
                        <div style='width:59.33mm; height:17mm; float:left;'>
                            <div style='width:59.33mm; height:4.25mm; float:left;'></div>
                            <div style='width:59.33mm; height:4.25mm; float:left;'></div>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                            </div>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                            </div>
                        </div>
                        <div style='width:59.33mm; height:17mm; float:right;'>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                                <?php echo $espacios.date('d-m-Y'); ?>
                            </div>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                                <?php echo $espacios.$_POST['nrc_cliente']; ?>
                            </div>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                            </div>
                            <div style='width:59.33mm; height:4.25mm; float:left;'>
                            </div>
                        </div>
                    </div>
                    <div style='width:178mm; height:13mm; float:left;'>
                        <div style='width:178mm; height:5mm; float:left;'>
                            <div style='width:23mm; height:5mm; background-color: blue; border-radius: 15px 0px 0px 0px; float:left;'></div>
                            <div style='width:30mm; height:5mm; background-color: blue;  float:left;'></div>
                            <div style='width:52mm; height:5mm; background-color: blue;  float:left;'></div>
                            <div style='width:48mm; height:5mm; background-color: blue;  float:left;'></div>
                            <div style='width:25mm; height:5mm; background-color: blue; border-radius: 0px 15px 0px 0px; float:right;'></div>
                        </div>
                        <div id='n°' style='width:178mm; height:8mm; float:left;'>
                            <div style='width:23mm; height:8mm; border-radius: 0px 0px 0px 15px; float:left;'></div>
                            <div style='width:30mm; height:8mm;  float:left;'></div>
                            <div style='width:52mm; height:8mm;  float:left;'></div>
                            <div style='width:48mm; height:8mm;  float:left;'></div>
                            <div style='width:25mm; height:8mm; border-radius: 0px 0px 15px 0px; float:right;'></div>
                        </div>
                    </div>
                    <div style='width:178mm; height:46mm; float:left;'>
                        <div style='width:112mm; height:46mm; border-radius: 15px 0px 0px 0px; float:left;'>
                            <div style='width:112mm; height:5mm; float:left;'>
                                <div style='width:8.9mm; height:5mm; background-color: blue; border-radius: 15px 0px 0px 0px;  float:left;'></div>
                                <div style='width:18mm; height:5mm; background-color: blue;  float:left;'></div>
                                <div style='width:85mm; height:5mm; background-color: blue;  float:right;'></div>
                            </div>
                            <!-- datos de productos-->
                            <div style='width:112mm; height:41mm; float:left;'>
                                <!--cantidad-->
                                <div style='width:8.9mm; height:41mm; text-align: center;  float:left;'>
                                    <?php
                                        for ($i=0; $i < $_SESSION['n']; $i++) {
                                            if($_SESSION['p'][$i][$i][0] != null){
                                                echo number_format($_SESSION['p'][$i][$i][1],2,'.',',').'<br>';
                                            }
                                        }
                                     ?>
                                </div>
                                <!--cod-->
                                <div style='width:18mm; height:41mm; text-align: center;  float:left;'>
                                     <?php
                                        for ($i=0; $i < $_SESSION['n']; $i++) {
                                            if($_SESSION['p'][$i][$i][0] != null){
                                                echo $_SESSION['p'][$i][$i][3].'<br>';
                                            }
                                        }
                                     ?>
                                </div>
                                <!-- nombre-->
                                <div style='width:85mm; height:41mm;  float:right;'>
                                    <div style='width:1.2mm; height:41mm; float:left;'></div>
                                     <?php
                                        for ($i=0; $i < $_SESSION['n']; $i++) {
                                            if($_SESSION['p'][$i][$i][0] != null){
                                                echo $_SESSION['p'][$i][$i][4].'<br>';
                                            }
                                        }
                                     ?>
                                </div>
                            </div>
                        </div>
                        <div style='width:66mm; height:46mm; border-radius: 0px 15px 0px 0px;  float:right;'>
                            <div style='width:66mm; height:5mm; float:left;'>
                                <div style='width:17mm; height:5mm; background-color: blue;  float:left;'></div>
                                <div style='width:12mm; height:5mm; background-color: blue;  float:left;'></div>
                                <div style='width:12mm; height:5mm; background-color: blue;  float:left;'></div>
                                <div style='width:25mm; height:5mm; background-color: blue; border-radius: 0px 15px 0px 0px;  float:right;'></div>
                            </div>
                            <div style='width:66mm; height:41mm; float:left;'>
                                <!--Precio unitario-->
                                <div style='width:17mm; height:41mm; text-align: center;  float:left;'>
                                    <?php
                                        for ($i=0; $i < $_SESSION['n']; $i++) {
                                            if($_SESSION['p'][$i][$i][0] != null){
                                                echo number_format(res_iva($_SESSION['p'][$i][$i][2],$_POST['Tipo_fac']),2,'.',',').'<br>';
                                            }
                                        }
                                     ?>
                                </div>
                                <div style='width:12mm; height:41mm;  float:left;'></div>
                                <div style='width:12mm; height:41mm;  float:left;'></div>
                                <!--Precio total-->
                                <div style='width:25mm; height:41mm; text-align: center;  float:right;'>
                                    <?php
                                        $total = 0;
                                        $ivas = 0;
                                        $t_v = 0;
                                        for ($i=0; $i < $_SESSION['n']; $i++) {
                                            if($_SESSION['p'][$i][$i][0] != null){
                                                $total += (res_iva(($_SESSION['p'][$i][$i][2]*$_SESSION['p'][$i][$i][1]),$_POST['Tipo_fac']));
                                                $t_v = res_iva(($_SESSION['p'][$i][$i][2]*$_SESSION['p'][$i][$i][1]),$_POST['Tipo_fac']);
                                                $ivas += iva($t_v,$_POST['Tipo_fac']);
                                                echo number_format(res_iva(($_SESSION['p'][$i][$i][2]*$_SESSION['p'][$i][$i][1]),$_POST['Tipo_fac']),2,'.',',').'<br>';
                                            }
                                        }
                                     ?>
                                </div>
                            </div>
                        </div>
                        <div style='width:112mm; height:27mm; border-radius: 0px 0px 15px 15px;  float:left;'>
                                <div style='width:111.6mm; height:8mm;  float:left;'>
                                    <?php echo numtoletras($total); ?>
                                </div>
                                <div style='width:111.6mm; height:12mm; float:left;'>
                                    <div style='width:55.8mm; height:12mm;  float:left;'></div>
                                    <div style='width:55.7mm; height:12mm;  float:right;'></div>
                                </div>
                        </div>
                        <div style='width:66mm; height:27mm; float:right;'>
                            <div style='width:41mm; height:27mm; border-radius: 0px 0px 0px 15px;  float:left;'>
                                <div style='width:41mm; height:3.85mm;'></div>
                                <div style='width:41mm; height:3.85mm;'></div>
                                <div style='width:41mm; height:3.85mm;'></div>
                                <div style='width:41mm; height:3.85mm;'></div>
                                <div style='width:41mm; height:3.85mm;'></div>
                                <div style='width:41mm; height:3.85mm;'></div>
                                <div style='width:41mm; height:3.85mm;'></div>
                            </div>
                            <div style='width:25mm; height:27mm; text-align: center; border-radius: 0px 0px 15px 0px;  float:right;'>
                                <div style='width:25mm; height:3.85mm;'><?php echo number_format($total,2,'.',','); ?></div>
                                <div style='width:25mm; height:3.85mm;'><?php echo number_format($ivas,2,'.',','); ?></div>
                                <div style='width:25mm; height:3.85mm;'></div>
                                <div style='width:25mm; height:3.85mm;'></div>
                                <div style='width:25mm; height:3.85mm;'></div>
                                <div style='width:25mm; height:3.85mm;'></div>
                                <div style='width:25mm; height:3.85mm;'><?php echo ($total+$ivas); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
function numtoletras($xcifra)
{
    $xarray = array(0 => "Cero",
        1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE",
        "DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
        "VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA",
        100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
    );
//
    $xcifra = trim($xcifra);
    $xlength = strlen($xcifra);
    $xpos_punto = strpos($xcifra, ".");
    $xaux_int = $xcifra;
    $xdecimales = "00";
    if (!($xpos_punto === false)) {
        if ($xpos_punto == 0) {
            $xcifra = "0" . $xcifra;
            $xpos_punto = strpos($xcifra, ".");
        }
        $xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
        $xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
    }

    $XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
    $xcadena = "";
    for ($xz = 0; $xz < 3; $xz++) {
        $xaux = substr($XAUX, $xz * 6, 6);
        $xi = 0;
        $xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
        $xexit = true; // bandera para controlar el ciclo del While
        while ($xexit) {
            if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros
                break; // termina el ciclo
            }

            $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
            $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
            for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
                switch ($xy) {
                    case 1: // checa las centenas
                        if (substr($xaux, 0, 3) < 100) { // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas

                        } else {
                            $key = (int) substr($xaux, 0, 3);
                            if (TRUE === array_key_exists($key, $xarray)){  // busco si la centena es número redondo (100, 200, 300, 400, etc..)
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
                                if (substr($xaux, 0, 3) == 100)
                                    $xcadena = " " . $xcadena . " CIEN " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                            }
                            else { // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                $key = (int) substr($xaux, 0, 1) * 100;
                                $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                $xcadena = " " . $xcadena . " " . $xseek;
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 0, 3) < 100)
                        break;
                    case 2: // checa las decenas (con la misma lógica que las centenas)
                        if (substr($xaux, 1, 2) < 10) {

                        } else {
                            $key = (int) substr($xaux, 1, 2);
                            if (TRUE === array_key_exists($key, $xarray)) {
                                $xseek = $xarray[$key];
                                $xsub = subfijo($xaux);
                                if (substr($xaux, 1, 2) == 20)
                                    $xcadena = " " . $xcadena . " VEINTE " . $xsub;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                                $xy = 3;
                            }
                            else {
                                $key = (int) substr($xaux, 1, 1) * 10;
                                $xseek = $xarray[$key];
                                if (20 == substr($xaux, 1, 1) * 10)
                                    $xcadena = " " . $xcadena . " " . $xseek;
                                else
                                    $xcadena = " " . $xcadena . " " . $xseek . " Y ";
                            } // ENDIF ($xseek)
                        } // ENDIF (substr($xaux, 1, 2) < 10)
                        break;
                    case 3: // checa las unidades
                        if (substr($xaux, 2, 1) < 1) { // si la unidad es cero, ya no hace nada

                        } else {
                            $key = (int) substr($xaux, 2, 1);
                            $xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
                            $xsub = subfijo($xaux);
                            $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
                        } // ENDIF (substr($xaux, 2, 1) < 1)
                        break;
                } // END SWITCH
            } // END FOR
            $xi = $xi + 3;
        } // ENDDO

        if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
            $xcadena.= " DE";

        if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
            $xcadena.= " DE";

        // ----------- esta línea la puedes cambiar de acuerdo a tus necesidades o a tu país -------
        if (trim($xaux) != "") {
            switch ($xz) {
                case 0:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena.= "UN BILLON ";
                    else
                        $xcadena.= " BILLONES ";
                    break;
                case 1:
                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                        $xcadena.= "UN MILLON ";
                    else
                        $xcadena.= " MILLONES ";
                    break;
                case 2:
                    if ($xcifra < 1) {
                        $xcadena = " CERO CON $xdecimales/100. USD DOLARES";
                    }
                    if ($xcifra >= 1 && $xcifra < 2) {
                        $xcadena = " UNO CON $xdecimales/100. USD DOLARES";
                    }
                    if ($xcifra >= 2) {
                        $xcadena.= " CON $xdecimales/100. USD DOLARES"; //
                    }
                    break;
            } // endswitch ($xz)
        } // ENDIF (trim($xaux) != "")
        // ------------------      en este caso, para México se usa esta leyenda     ----------------
        $xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
        $xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
        $xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
        $xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
        $xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
    } // ENDFOR ($xz)
    return trim($xcadena);
}

// END FUNCTION

function subfijo($xx)
{ // esta función regresa un subfijo para la cifra
    $xx = trim($xx);
    $xstrlen = strlen($xx);
    if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
        $xsub = "";
    //
    if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
        $xsub = "MIL";
    //
    return $xsub;
}

// END FUNCTION
?>
