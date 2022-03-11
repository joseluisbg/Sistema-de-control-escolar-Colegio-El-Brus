<?php

use App\Models\Ce_grades;
use App\Models\Ce_average;
use App\Models\Ce_course;

$periodo1 = Ce_average::select('*')
    ->where('ce_average.id_student', '=', $infoA[0]->idEst)
    ->where('ce_average.id_period', '=', 1)
    ->get();
$periodo2 = Ce_average::select('*')
    ->where('ce_average.id_student', '=', $infoA[0]->idEst)
    ->where('ce_average.id_period', '=', 2)
    ->get();
$periodo3 = Ce_average::select('*')
    ->where('ce_average.id_student', '=', $infoA[0]->idEst)
    ->where('ce_average.id_period', '=', 3)
    ->get();
?>
<table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">

    <tbody>
        <tr class="row0">
            <td colspan="2" rowspan="4">

            </td>
            <td class="column0 style1 s style9" colspan="7" rowspan="4">
                <span style="color:#000000; font-family:'Times New Roman'; font-size:24.5pt">COLEGIO ELBRUS<br />
                </span><span style="color:#000000; font-family:'Arial MT'; font-size:8.5pt">Doraceli No. 604, Col.
                    Amplación Sta. Julia, Pachuca Hgo. C.P. 42080<br />
                </span><span style="color:#000000; font-family:'Arial MT'; font-size:8.5pt">Tels.: (01-771) 7 14 79
                    69 y
                    1 53 17 50</span>
            </td>
            <td class="column7 style11 null style10" rowspan="4"></td>
            <td class="column8 style13 s style18" colspan="3" rowspan="2"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt;">BOLETA DE
                    EVALUACIÓN</span></td>
            <td class="column11 style20 s style22" colspan="8"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">ALUMNO (A)</span>
            </td>
            <td class="column19 style23 s style25" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">MATRÍCULA</span>
            </td>
            <td class="column22 style27 s style29" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">GRUPO</span></td>
            <td class="column25 style26 s"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">SECCIÓN</span></td>
        </tr>

        <tr class="row1">

            <td class="column11 style30 s style32" colspan="8"><span
                    style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Nombre }}</span>
            </td>
            <td class="column19 style34 n style36" colspan="3">{{ $infoA[0]->Matricula }}</td>
            <td class="column22 style37 s style39" colspan="3"><span
                    style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Grupo }}</span>
            </td>
            <td class="column25 style40 s"><span
                    style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Area }}</span></td>

        </tr>
        <tr class="row2">
            <td class="column8 style20 s style22" colspan="5"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">GRADO</span></td>
            <td class="column13 style20 s style22" colspan="4"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">GRUPO</span></td>
            <td class="column17 style41 s style43" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">EVALUACIÓN</span>
            </td>
            <td class="column20 style20 s style22" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">FECHA</span></td>
            <td class="column23 style27 s style29" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">CURSO ESCOLAR</span>
            </td>
        </tr>
        <tr class="row3">
            <td class="column8 style44 s style46" colspan="5"><span
                    style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Grado }}</span>
            </td>
            <td class="column13 style37 s style39" colspan="4"><span
                    style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Grupo }}</span>
            </td>
            <?php
            if (isset($periodo1) and isset($periodo2) and isset($periodo3)) {
            ?>
            <td class="column17 style37 s style39" colspan="3"><span
                    style="color:#000000; font-family:'Arial MT'; font-size:8pt">Periodo 3</span></td>
            <?php
            } elseif (isset($periodo1) and isset($periodo2)) {
            ?>
            <td class="column17 style37 s style39" colspan="3"><span
                    style="color:#000000; font-family:'Arial MT'; font-size:8pt">Periodo 2</span></td>
            <?php
            } elseif (isset($periodo1)) {
            ?>
            <td class="column17 style37 s style39" colspan="3"><span
                    style="color:#000000; font-family:'Arial MT'; font-size:8pt">Periodo 1</span></td>
            <?php
            }
            ?>
            <td class="column20 style47 n style49" colspan="3">{{ date('d-m-y') }}</td>
            <td class="column23 style44 s style46" colspan="3"><span
                    style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Ciclo }}</span>
            </td>
        </tr>
        <tr class="row4">
            <td class="column0 style26 s"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">RESULTADOS
                    EVALUACIÓN</span></td>
            <td class="column1 style50 s style52" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO 1</span>
            </td>
            <td class="column4 style50 s style52" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO 2</span>
            </td>
            <td class="column9 style50 s style52" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO 3</span>
            </td>
            <td class="column14 style53 s style54" rowspan="2"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:7.5pt">Promedio
                    FINAL</span>
            </td>
            <td class="column15 style55 null style56" rowspan="20"></td>
            <td class="column16 style57 s style59" colspan="8"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO DE
                    EVALUACIÓN
                    SEP</span></td>
            <td class="column24 style60 s style63" colspan="2" rowspan="2"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:7.5pt">PROMEDIO
                    FINAL</span>
            </td>
        </tr>
        <tr class="row5">
            <td class="column0 style19 s"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">MATERIAS</span></td>
            @foreach ($infoA as $rubros)
                <td class="column6 style67 s style69"><span
                        style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">{{ $rubros->Rubro }}</span>
                </td>
            @endforeach
            <td class="column6 style67 s style69"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Calificación</span>
            </td>
            @foreach ($infoA as $rubros)
                <td class="column6 style67 s style69"><span
                        style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">{{ $rubros->Rubro }}</span>
                </td>
            @endforeach
            <td class="column6 style67 s style69"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Calificación</span>
            </td>
            @foreach ($infoA as $rubros)
                <td class="column6 style67 s style69"><span
                        style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">{{ $rubros->Rubro }}</span>
                </td>
            @endforeach
            <td class="column6 style67 s style69"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Calificación</span>
            </td>

            <td class="column16 style20 s style22" colspan="2"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">1er</span></td>
            <td class="column18 style20 s style22" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">2do</span></td>
            <td class="column21 style20 s style22" colspan="3"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">3er</span></td>
        </tr>

        @foreach ($infoC as $in2)
            <?php
        $cursosection = Ce_course::select('*')->where("name", "=", $in2->Curso)->get();
        $ultimo = Ce_course::select('id_course')->where("id_section", "=", 2)->get();
        //$ultimo=count($infoC)-1;
        if ($cursosection[0]->id_section == 1 and $cursosection[0]->name == $infoC[0]->Curso) {
        ?>
            <tr class="row6">
                <td class="column0 style12 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">FORMACIÓN
                        ACADÉMICA</span></td>
                <td class="column1 style73 null style75" colspan="14"></td>
                <!--<td class="column16 style76 null style84" colspan="10" rowspan="6"></td>-->
            </tr>
            <?php } elseif ($cursosection[0]->id_section == 2 and $cursosection[0]->id_course == $ultimo[0]->id_course) {
        ?>
            <tr class="row6">
                <td class="column0 style12 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">DESARROLLO
                        PERSONAL
                        Y SOCIAL</span></td>
                <td class="column1 style73 null style75" colspan="14"></td>
                <!--<td class="column16 style76 null style84" colspan="10" rowspan="6"></td>-->
            </tr>
            <?php } ?>
            <tr class="row8">
                <td class="column0 style12 s"><span
                        style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">{{ $in2->Curso }}</span>
                </td>
                <!-- Periodo 1-->
                <?php
                $infoCal = Ce_grades::join('ce_course AS C', 'ce_grades.id_course', '=', 'C.id_course')
                    ->select('ce_grades.value as Cal', 'C.name as Curs', 'ce_grades.id_rc as Rubro')
                    ->where('ce_grades.id_student', '=', $infoA[0]->idEst)
                    ->where('C.name', '=', $in2->Curso)
                    ->where('ce_grades.id_period', '=', 1)
                    ->get();
                ?>
                @if (count($infoCal) > 1)
                    @foreach ($infoCal as $Cali)
                        <td class="column1 style92 n">{{ $Cali->Cal }}</td>
                    @endforeach
                @else
                    @foreach ($infoCal as $Cali)
                        <td class="column1 style92 n"></td>
                        <td class="column1 style92 n">{{ $Cali->Cal }}</td>
                    @endforeach
                @endif
                <?php
                $prom = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                    ->select('*')
                    ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                    ->where('C.name', '=', $in2->Curso)
                    ->where('ce_average.id_period', '=', 1)
                    ->get();
                ?>
                @if (isset($prom[0]))
                    <td class="column3 style88 n">{{ $prom[0]->value }}</td>
                    <!-- Periodo 1-->
                    <!-- Periodo 2-->
                @endif
                <?php
                $infoCal2 = Ce_grades::join('ce_course AS C', 'ce_grades.id_course', '=', 'C.id_course')
                    ->select('ce_grades.value as Cal', 'C.name as Curs')
                    ->where('ce_grades.id_student', '=', $infoA[0]->idEst)
                    ->where('C.name', '=', $in2->Curso)
                    ->where('ce_grades.id_period', '=', 2)
                    ->get();
                ?>
                @if ($infoCal2 != null)
                    @foreach ($infoCal2 as $Cali2)
                        <td class="column1 style92 n">{{ $Cali2->Cal }}</td>
                    @endforeach
                    <?php
                    $prom2 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                        ->select('*')
                        ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                        ->where('C.name', '=', $in2->Curso)
                        ->where('ce_average.id_period', '=', 2)
                        ->get();
                    ?>
                    @if (isset($prom2[0]))
                        <td class="column3 style88 n">{{ $prom2[0]->value }}</td>
                    @endif
                @endif
                <!-- Periodo 2-->
                <!-- Periodo 3-->
                <?php
                $infoCal3 = Ce_grades::join('ce_course AS C', 'ce_grades.id_course', '=', 'C.id_course')
                    ->select('ce_grades.value as Cal', 'C.name as Curs')
                    ->where('ce_grades.id_student', '=', $infoA[0]->idEst)
                    ->where('C.name', '=', $in2->Curso)
                    ->where('ce_grades.id_period', '=', 3)
                    ->get();
                ?>
                @if ($infoCal2 != null)
                    @foreach ($infoCal3 as $Cali3)
                        <td class="column1 style92 n">{{ $Cali3->Cal }}</td>
                    @endforeach
                    <?php
                    $prom3 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                        ->select('*')
                        ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                        ->where('C.name', '=', $in2->Curso)
                        ->where('ce_average.id_period', '=', 3)
                        ->get();
                    ?>
                    @if (isset($prom3[0]))
                        <td class="column3 style88 n">{{ $prom3[0]->value }}</td>
                    @endif
                @endif
                <!-- Periodo 3-->

                <?php
            if (isset($prom[0]) and isset($prom2[0]) and isset($prom3[0])) {
                $promedio = ($prom[0]->value + $prom2[0]->value + $prom3[0]->value) / 3;
                $promedio = round($promedio, 1);
            ?>
                <!-- <td class="column3 style88 n">{{ $prom[0]->value }}</td> -->
                <td class="column3 style88 n">{{ $promedio }}</td>
                <?php } elseif (isset($prom[0]) and isset($prom2[0])) {
                $promedio = ($prom[0]->value + $prom2[0]->value) / 2;
                $promedio = round($promedio, 1);
            ?>
                <!-- <td class="column3 style88 n">{{ $prom[0]->value }}</td> -->
                <td class="column4 style86 null style87" colspan="3"></td>
                <td class="column3 style88 n">{{ $promedio }}</td>
                <?php } elseif (isset($prom[0])) {
                $promedio = $prom[0]->value;
                $promedio = round($promedio, 1);
            ?>
                <!-- <td class="column3 style88 n">{{ $prom[0]->value }}</td> -->
                <td class="column4 style86 null style87" colspan="6"></td>
                <td class="column3 style88 n">{{ $promedio }}</td>
                <?php }

            ?>

                <!-- Cierra la seccion (1) -->

                <?php
                $promedio1 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                    ->select('*')
                    ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                    ->where('C.name', '=', $in2->Curso)
                    ->where('ce_average.id_period', '=', 1)
                    ->get();
                ?>
                @if (isset($promedio1[0]) and $promedio1[0]->rep_sep == 1)
                    <td class="column3 style88 n" colspan="2">{{ $valor = round($promedio1[0]->value) }}</td>
                @else
                    <td class="column3 style88 n" colspan="2"></td>
                @endif

                <!-- Cierra la seccion -->

                <!-- Seccion para generar los promedios (2) -->

                <?php
                $promedio2 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                    ->select('*')
                    ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                    ->where('C.name', '=', $in2->Curso)
                    ->where('ce_average.id_period', '=', 2)
                    ->get();
                ?>
                @if (isset($promedio2[0]) and $promedio2[0]->rep_sep == 1)
                    <td class="column3 style88 n" colspan="3">{{ $valor = round($promedio2[0]->value) }}</td>
                @else
                    <td class="column3 style88 n" colspan="3"></td>
                @endif

                <!-- Seccion para generar los promedios -->

                <!-- Seccion para generar los promedios (3) -->

                <?php
                $promedio3 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                    ->select('*')
                    ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                    ->where('C.name', '=', $in2->Curso)
                    ->where('ce_average.id_period', '=', 3)
                    ->get();
                ?>
                @if (isset($promedio3[0]) and $promedio3[0]->rep_sep == 1)
                    <td class="column3 style88 n" colspan="3">{{ $valor = round($promedio3[0]->value) }}
                    </td>
                @else
                    <td class="column3 style88 n" colspan="3"></td>
                @endif

                <!-- Cierra la seccion -->


                <?php
            if (isset($promedio1[0]) and isset($promedio2[0]) and isset($promedio3[0]) and $promedio1[0]->rep_sep == 1 and $promedio2[0]->rep_sep == 1 and $promedio3[0]->rep_sep == 1) {
                $promedio = ($promedio1[0]->value + $promedio2[0]->value + $promedio3[0]->value) / 3;
                $promedio = round($promedio, 1);
            ?>
                <!-- <td class="column3 style88 n">{{ $promedio1[0]->value }}</td> -->
                <!-- <td class="column4 style86 null style87" colspan="3"></td> -->
                <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
                <?php } elseif (isset($promedio1[0]) and isset($promedio2[0]) and $promedio1[0]->rep_sep == 1 and $promedio2[0]->rep_sep == 1) {
                $promedio = ($promedio1[0]->value + $promedio2[0]->value) / 2;
                $promedio = round($promedio, 1);
            ?>
                <!-- <td class="column3 style88 n">{{ $promedio1[0]->value }}</td> -->
                <!-- <td class="column4 style86 null style87" colspan="3"></td> -->
                <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
                <?php } elseif (isset($promedio1[0]) and $promedio1[0]->rep_sep == 1) {
                $promedio = $promedio1[0]->value;
                $promedio = round($promedio, 1);
            ?>
                <!-- <td class="column3 style88 n">{{ $promedio1[0]->value }}</td> -->
                <!-- <td class="column4 style86 null style87" colspan="6"></td> -->
                <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
                <?php }

            ?>

            </tr>
        @endforeach
        <tr class="row21">
            <td class="column0 style12 s"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio Académico
                    Inglés</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promIngles = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 1)
                ->where('AC.id_academy', '=', 1)
                ->get();
            $numeros = $promIngles;
            $suma = 0;
            foreach ($numeros as $numero) {
                $suma = $suma + $numero->value;
            }
            $cantidadDeElementos = count($numeros);
            $promedioI = $suma / $cantidadDeElementos;
            ?>
            <td class="column3 style100 n">{{ $promedioI }}</td>


            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promIngles = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 2)
                ->where('AC.id_academy', '=', 1)
                ->get();
            if (isset($promIngles)) {
            ?>
            <td class="column3 style100 n"></td>
            <?php
            } else {
                $numeros = $promIngles;
                $suma = 0;
                foreach ($numeros as $numero) {
                    $suma = $suma + $numero->value;
                }
                $cantidadDeElementos = count($numeros);
                $promedioI = $suma / $cantidadDeElementos;
            ?>
            <td class="column3 style100 n">{{ $promedioI }}</td>

            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            }
            $promIngles0 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 3)
                ->where('AC.id_academy', '=', 1)
                ->get();
            if (isset($promIngles0)) {
            ?>
            <td class="column3 style100 n"></td>
            <?php
            } else {
                $numeros = $promIngles0;
                $suma = 0;
                foreach ($numeros as $numero) {
                    $suma = $suma + $numero->value;
                }
                $cantidadDeElementos = count($numeros);
                $promedioI = $suma / $cantidadDeElementos;
            ?>
            <td class="column3 style100 n">{{ $promedioI }}</td>

            <!-- Seccion de promedio sep para ingles -->

            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            }
            $promIngles1 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 1)
                ->where('AC.id_academy', '=', 1)
                ->get();
            $numeros = $promIngles1;
            $suma = 0;
            foreach ($numeros as $numero) {
                $suma = $suma + $numero->value;
            }
            $cantidadDeElementos = count($numeros);
            $promedioI1 = $suma / $cantidadDeElementos;
            ?>
            <td class="column3 style100 n" colspan="2">{{ round($promedioI1) }}</td>


            <?php
            $promIngles2 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 2)
                ->where('AC.id_academy', '=', 1)
                ->get();
                if(isset($promIngles2)){
                    ?>
            <td class="column3 style100 n"></td>
            <?php
                }else{
            $numeros = $promIngles2;
            $suma = 0;
            foreach ($numeros as $numero) {
                $suma = $suma + $numero->value;
            }
            $cantidadDeElementos = count($numeros);
            $promedioI2 = $suma / $cantidadDeElementos;
            $promedioI2 = round($promedioI2, 1);
            ?>
            <td class="column3 style100 n" colspan="3">{{ round($promedioI2) }}</td>

            <?php
                }
            $promIngles3 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 3)
                ->where('AC.id_academy', '=', 1)
                ->get();
                if(isset($promIngles2)){
                    ?>
            <td class="column3 style100 n"></td>
            <?php
                }else{
            $numeros = $promIngles3;
            $suma = 0;
            foreach ($numeros as $numero) {
                $suma = $suma + $numero->value;
            }
            $cantidadDeElementos = count($numeros);
            $promedioI3 = $suma / $cantidadDeElementos;
            $promedioI3 = round($promedioI3, 1);
            ?>
            <td class="column3 style100 n" colspan="3">{{ round($promedioI3) }}</td>


            <?php
                }
            if (isset($promedioI1) and isset($promedioI2) and isset($promedioI3)) {
                $promedio = ($promedioI1 + $promedioI2 + $promedioI3) / 3;
                $promedio = round($promedio, 1);
            ?>
            <!-- <td class="column3 style88 n">{{ $promedioI1 }}</td> -->
            <!-- <td class="column4 style86 null style87" colspan="3"></td> -->
            <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
            <?php } elseif (isset($promedioI1) and isset($promedioI2)) {
                $promedio = ($promedioI1 + $promedioI2) / 2;
                $promedio = round($promedio, 1);
            ?>
            <!-- <td class="column3 style88 n">{{ $promedioI1 }}</td> -->
            <!-- <td class="column4 style86 null style87" colspan="3"></td> -->
            <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
            <?php } elseif (isset($promedioI1)) {
                $promedio = $promedioI1;
                $promedio = round($promedio, 1);
            ?>
            <!-- <td class="column3 style88 n">{{ $promedioI1 }}</td> -->
            <!-- <td class="column4 style86 null style87" colspan="6"></td> -->
            <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
            <?php }

            ?>


            <!-- <td class="column4 style73 null style75" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style73 null style75" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style101 n">9.72</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style94 n style95" colspan="2">10</td>
            <td class="column18 style73 null style75" colspan="3"></td>
            <td class="column21 style73 null style75" colspan="3"></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td> -->
        </tr>
        <tr class="row22">
            <td class="column0 style12 s"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio Académico
                    Español</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promEspa = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 1)
                ->where('AC.id_academy', '=', 2)
                ->get();
            $numerosE = $promEspa;
            $sumaE = 0;
            foreach ($numerosE as $numeroE) {
                $sumaE = $sumaE + $numeroE->value;
            }
            $cantidadDeElementosE = count($numerosE);
            $promedioE = $sumaE / $cantidadDeElementosE;
            ?>
            <td class="column3 style100 n">{{ $promedioE }}</td>

            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promEspa = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 2)
                ->where('AC.id_academy', '=', 2)
                ->get();
            if (isset($promEspa)) {
            ?>
            <td class="column3 style100 n"></td>
            <?php
            } else {
                $numerosE = $promEspa;
                $sumaE = 0;
                foreach ($numerosE as $numeroE) {
                    $sumaE = $sumaE + $numeroE->value;
                }
                $cantidadDeElementosE = count($numerosE);
                $promedioE = $sumaE / $cantidadDeElementosE;
            ?>
            <td class="column3 style100 n">{{ $promedioE }}</td>

            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            }
            $promEspa = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 3)
                ->where('AC.id_academy', '=', 2)
                ->get();
            if (isset($promEspa)) {
            ?>
            <td class="column3 style100 n"></td>
            <?php
            } else {
                $numerosE = $promEspa;
                $sumaE = 0;
                foreach ($numerosE as $numeroE) {
                    $sumaE = $sumaE + $numeroE->value;
                }
                $cantidadDeElementosE = count($numerosE);
                $promedioE = $sumaE / $cantidadDeElementosE;
            ?>
            <td class="column3 style100 n">{{ $promedioE }}</td>
            <?php } ?>
            <!-- <td class="column1 style73 null style75" colspan="2"></td>
            <td class="column3 style100 n">9.92</td>
            <td class="column4 style73 null style75" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style73 null style75" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style101 n">9.92</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style73 null style75" colspan="10"></td> -->
        </tr>
        <tr class="row23">
            <td class="column0 style12 s"><span
                    style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio
                    Académico</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promAc = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 1)
                ->where('AC.id_academy', '=', 3)
                ->get();
            
            $numerosA = $promAc;
            $sumaA = 0;
            foreach ($numerosA as $numeroA) {
                $sumaA = $sumaA + $numeroA->value;
            }
            $cantidadDeElementosA = count($numerosA);
            $promedioA = $sumaA / $cantidadDeElementosA;
            ?>
            <td class="column3 style100 n">{{ $promedioA }}</td>

            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            
            $promAc = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 2)
                ->where('AC.id_academy', '=', 3)
                ->get();
            if (isset($promAc)) {
            ?>
            <td class="column3 style100 n"></td>
            <?php
            } else {
                $numerosA = $promAc;
                $sumaA = 0;
                foreach ($numerosA as $numeroA) {
                    $sumaA = $sumaA + $numeroA->value;
                }
                $cantidadDeElementosA = count($numerosA);
                $promedioA = $sumaA / $cantidadDeElementosA;
            ?>
            <td class="column3 style100 n">{{ $promedioE }}</td>

            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            }
            $promAc = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 3)
                ->where('AC.id_academy', '=', 3)
                ->get();
            if (isset($promAc)) {
            ?>
            <td class="column3 style100 n"></td>
            <?php
            } else {
                $numerosA = $promAc;
                $sumaA = 0;
                foreach ($numerosA as $numeroA) {
                    $sumaA = $sumaA + $numeroA->value;
                }
                $cantidadDeElementosA = count($numerosA);
                $promedioA = $sumaA / $cantidadDeElementosA;
            ?>
            <td class="column3 style100 n">{{ $promedioE }}</td>
            <?php } ?>
            <!-- <td class="column1 style73 null style75" colspan="2"></td>
            <td class="column3 style100 n">9.82</td>
            <td class="column4 style73 null style75" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style73 null style75" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style101 n">9.82</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style57 s style59" colspan="8"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PROMEDIO FINAL DE GRADO SEP</span></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td> -->
        </tr>
    </tbody>
</table>
