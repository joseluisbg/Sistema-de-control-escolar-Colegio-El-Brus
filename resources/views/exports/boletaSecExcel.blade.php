<style>
    table {
		
    margin: 0 auto;
		
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
    text-align: center;
}
</style>
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
<table border="1">

    <tbody>
        <tr class="row0">
            <td colspan="2" rowspan="4">
            @if(isset($imagen))
            <img src="img/logo-elbrus.png" width="70" alt="">
            @endif
            </td>
            <td class="column0 style1 s style9" colspan="7" rowspan="4" style="text-align: center;">
                <span style="color:#000000; font-family:'Times New Roman'; font-size:24.5pt">COLEGIO ELBRUS<br />
                </span><span style="color:#000000; font-family:'Arial MT'; font-size:8.5pt">Doraceli No. 604, Col.
                    Amplación Sta. Julia, Pachuca Hgo. C.P. 42080<br />
                </span><span style="color:#000000; font-family:'Arial MT'; font-size:8.5pt">Tels.: (01-771) 7 14 79
                    69 y
                    1 53 17 50</span>
            </td>
            <td class="column7 style11 null style10" rowspan="4"></td>
            <td class="column8 style13 s style18" colspan="3" rowspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt;">BOLETA DE
                    EVALUACIÓN</span></td>
            <td class="column11 style20 s style22" colspan="8"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">ALUMNO (A)</span>
            </td>
            <td class="column19 style23 s style25" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">MATRÍCULA</span>
            </td>
            <td class="column22 style27 s style29" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">GRUPO</span></td>
            <td class="column25 style26 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">SECCIÓN</span></td>
        </tr>

        <tr class="row1">

            <td class="column11 style30 s style32" colspan="8"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Nombre }}</span>
            </td>
            <td class="column19 style34 n style36" colspan="3">{{ $infoA[0]->Matricula }}</td>
            <td class="column22 style37 s style39" colspan="3"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Grupo }}</span>
            </td>
            <td class="column25 style40 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Area }}</span></td>

        </tr>
        <tr class="row2">
            <td class="column8 style20 s style22" colspan="5"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">GRADO</span></td>
            <td class="column13 style20 s style22" colspan="4"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">GRUPO</span></td>
            <td class="column17 style41 s style43" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">EVALUACIÓN</span>
            </td>
            <td class="column20 style20 s style22" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">FECHA</span></td>
            <td class="column23 style27 s style29" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">CURSO ESCOLAR</span>
            </td>
        </tr>
        <tr class="row3">
            <td class="column8 style44 s style46" colspan="5"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Grado }}</span>
            </td>
            <td class="column13 style37 s style39" colspan="4"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Grupo }}</span>
            </td>
            <?php
            if (count($periodo1) > 0 and count($periodo2) > 0 and count($periodo3) > 0) {
            ?>
                <td class="column17 style37 s style39" colspan="3"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Periodo 3</span></td>
            <?php
            } elseif (count($periodo1) > 0 and count($periodo2) > 0) {
            ?>
                <td class="column17 style37 s style39" colspan="3"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Periodo 2</span></td>
            <?php
            } elseif (count($periodo1) > 0) {
            ?>
                <td class="column17 style37 s style39" colspan="3"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Periodo 1</span></td>
            <?php
            }
            ?>
            <td class="column20 style47 n style49" colspan="3">{{ date('d-m-y') }}</td>
            <td class="column23 style44 s style46" colspan="3"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{ $infoA[0]->Ciclo }}</span>
            </td>
        </tr>
        <tr class="row4">
            <td class="column0 style26 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">RESULTADOS
                    EVALUACIÓN</span></td>
            <td class="column1 style50 s style52" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO 1</span>
            </td>
            <td class="column4 style50 s style52" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO 2</span>
            </td>
            <td class="column9 style50 s style52" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO 3</span>
            </td>
            <td class="column14 style53 s style54" rowspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:7.5pt">Promedio
                    FINAL</span>
            </td>
            <td class="column15 style55 null style56" rowspan="20"></td>
            <td class="column16 style57 s style59" colspan="8"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO DE
                    EVALUACIÓN
                    SEP</span></td>
            <td class="column24 style60 s style63" colspan="2" rowspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:7.5pt">PROMEDIO
                    FINAL</span>
            </td>
        </tr>
        <tr class="row5">
            <td class="column0 style19 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">MATERIAS</span></td>
            @foreach ($infoA as $rubros)
            <td class="column6 style67 s style69"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">{{ $rubros->Rubro }}</span>
            </td>
            @endforeach
            <td class="column6 style67 s style69"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Calificación</span>
            </td>
            @foreach ($infoA as $rubros)
            <td class="column6 style67 s style69"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">{{ $rubros->Rubro }}</span>
            </td>
            @endforeach
            <td class="column6 style67 s style69"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Calificación</span>
            </td>
            @foreach ($infoA as $rubros)
            <td class="column6 style67 s style69"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">{{ $rubros->Rubro }}</span>
            </td>
            @endforeach
            <td class="column6 style67 s style69"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Calificación</span>
            </td>

            <td class="column16 style20 s style22" colspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">1er</span></td>
            <td class="column18 style20 s style22" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">2do</span></td>
            <td class="column21 style20 s style22" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">3er</span></td>
        </tr>

        @foreach ($infoC as $in2)
        <?php
        $cursosection = Ce_course::select('*')->where("name", "=", $in2->Curso)->get();
        $ultimo = Ce_course::select('id_course')->where("id_section", "=", 2)->get();
        //$ultimo=count($infoC)-1;
        if ($cursosection[0]->id_section == 1 and $cursosection[0]->name == $infoC[0]->Curso) {
        ?>
            <tr class="row6">
                <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">FORMACIÓN
                        ACADÉMICA</span></td>
                <td class="column1 style73 null style75" colspan="14"></td>
                <!--<td class="column16 style76 null style84" colspan="10" rowspan="6"></td>-->
            </tr>
        <?php } elseif ($cursosection[0]->id_section == 2 and $cursosection[0]->id_course == $ultimo[0]->id_course) {
        ?>
            <tr class="row6">
                <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">DESARROLLO
                        PERSONAL
                        Y SOCIAL</span></td>
                <td class="column1 style73 null style75" colspan="14"></td>
                <!--<td class="column16 style76 null style84" colspan="10" rowspan="6"></td>-->
            </tr>
        <?php } ?>
        <tr class="row8">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">{{ $in2->Curso }}</span>
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
                $promedio = (round($promedio1[0]->value) + round($promedio2[0]->value) + round($promedio3[0]->value)) / 3;
                //$promedio = round($promedio, 1);
            ?>
                <!-- <td class="column3 style88 n">{{ $promedio1[0]->value }}</td> -->
                <!-- <td class="column4 style86 null style87" colspan="3"></td> -->
                <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
            <?php } elseif (isset($promedio1[0]) and isset($promedio2[0]) and $promedio1[0]->rep_sep == 1 and $promedio2[0]->rep_sep == 1) {
                $promedio = (round($promedio1[0]->value) + round($promedio2[0]->value)) / 2;
                //$promedio = round($promedio, 1);
            ?>
                <!-- <td class="column3 style88 n">{{ $promedio1[0]->value }}</td> -->
                <!-- <td class="column4 style86 null style87" colspan="3"></td> -->
                <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
            <?php } elseif (isset($promedio1[0]) and $promedio1[0]->rep_sep == 1) {
                $promedio = round($promedio1[0]->value);
                //$promedio = $promedio, 1);
            ?>
                <!-- <td class="column3 style88 n">{{ $promedio1[0]->value }}</td> -->
                <!-- <td class="column4 style86 null style87" colspan="6"></td> -->
                <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
            <?php }

            ?>

        </tr>
        @endforeach
        <tr class="row21">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio Inglés</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promInglesP1 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 1)
                ->where('AC.id_academy', '=', 4)
                ->get();
            $numerosP1 = $promInglesP1;
            $sumaP1 = 0;
            foreach ($numerosP1 as $numeroP1) {
                $sumaP1 = $sumaP1 + $numeroP1->value;
            }
            $cantidadDeElementosP1 = count($numerosP1);
            $promedioP1 = $sumaP1 / $cantidadDeElementosP1;
            ?>
            <td class="column3 style100 n">{{ $promedioP1 }}</td>


            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promInglesP2 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 2)
                ->where('AC.id_academy', '=', 4)
                ->get();
            if (isset($promInglesP2)) {
            ?>
                <td class="column3 style100 n"></td>
            <?php
            } else {
                $numerosP2 = $promInglesP2;
                $sumaP2 = 0;
                foreach ($numerosP2 as $numeroP2) {
                    $sumaP2 = $sumaP2 + $numeroP2->value;
                }
                $cantidadDeElementosP2 = count($numerosP2);
                $promedioP2 = $sumaP2 / $cantidadDeElementosP2;
            ?>
                <td class="column3 style100 n">{{ $promedioP2 }}</td>

                <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            }
            $promInglesP3 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 3)
                ->where('AC.id_academy', '=', 4)
                ->get();
            if (isset($promInglesP3)) {
            ?>
                <td class="column3 style100 n"></td>
            <?php
            } else {
                $numerosP3 = $promInglesP3;
                $sumaP3 = 0;
                foreach ($numerosP3 as $numeroP3) {
                    $sumaP3 = $sumaP3 + $numeroP3->value;
                }
                $cantidadDeElementosP3 = count($numerosP3);
                $promedioP3 = $sumaP3 / $cantidadDeElementosP3;
            ?>
                <td class="column3 style100 n">{{ $promedioP3 }}</td>
            <?php }
            if (!empty($promedioP1) and !empty($promedioP2) and !empty($promedioP3)) {
            ?>
                <!-- Seccion de promedio sep para ingles -->
                <td class="column3 style88 n" colspan="2"></td>
                <td class="column3 style100 n">{{$promedioP1}}</td>
                <td class="column3 style100 n">{{$promedioP2}}</td>
                <td class="column3 style100 n">{{$promedioP3}}</td>

            <?php
            } elseif (!empty($promedioP1) and !empty($promedioP2)) {
                //$sumaPI=($promedioP1+$promedioP2)/2;
            ?>
                <td class="column3 style88 n" colspan="2"></td>
                <td class="column3 style100 n">{{$promedioP1}}</td>
                <td class="column3 style100 n">{{$promedioP2}}</td>
            <?php
            } elseif (!empty($promedioP1)) {
            ?>
                <td class="column3 style88 n" colspan="2"></td>
                <td class="column3 style100 n">{{$promedioP1}}</td>
            <?php
            }
            if (isset($promedioP1) and isset($promedioP2) and isset($promedioP3)) {
                $promedio = (round($promedioP1) + round($promedioP2) + round($promedioP3)) / 3;
            ?>
                <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
            <?php } elseif (isset($promedioP1) and isset($promedioP2)) {
                $promedio = (round($promedioP1) + round($promedioP2)) / 2;
            ?>
                <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
            <?php } elseif (isset($promedioP1)) {
                $promedio = round($promedioP1);
            ?>
                <td class="column3 style88 n" colspan="2">{{ $promedio }}</td>
            <?php }

            ?>
        </tr>
        <tr class="row22">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio Aprovechamiento</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promEspa = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 1)
                ->where('AC.id_academy', '=', 5)
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
                ->where('AC.id_academy', '=', 5)
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
                ->where('AC.id_academy', '=', 5)
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
        </tr>
        <tr class="row23">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio Formación Humana</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promAc = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 1)
                ->where('AC.id_academy', '=', 6)
                ->get();

            $numerosA = $promAc;
            $sumaA = 0;
            foreach ($numerosA as $numeroA) {
                $sumaA = $sumaA + $numeroA->value;
            }
            $cantidadDeElementosA = count($numerosA);
            $promedioA = $sumaA / $cantidadDeElementosA;
            $promedioA = round($promedioA, 2);
            ?>
            <td class="column3 style100 n">{{ $promedioA }}</td>

            <td class="column1 style73 null style75" colspan="2"></td>
            <?php

            $promAc = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 2)
                ->where('AC.id_academy', '=', 6)
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
                <td class="column3 style100 n">{{ $promedioA }}</td>

                <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            }
            $promAc = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 3)
                ->where('AC.id_academy', '=', 6)
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
                <td class="column3 style100 n">{{ $promedioA }}</td>
            <?php } ?>
        </tr>
        <tr class="row23">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio Académico </span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            $promAcS = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 1)
                ->where('AC.id_academy', '=', 7)
                ->get();

            $numerosAS = $promAcS;
            $sumaAS = 0;
            foreach ($numerosAS as $numeroAS) {
                $sumaAS = $sumaAS + $numeroAS->value;
            }
            $cantidadDeElementosAS = count($numerosAS);
            $promedioAS = $sumaAS / $cantidadDeElementosAS;
            $promedioAS = round($promedioAS, 1);
            ?>
            <td class="column3 style100 n">{{ $promedioAS }}</td>

            <td class="column1 style73 null style75" colspan="2"></td>
            <?php

            $promAcSP2 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 2)
                ->where('AC.id_academy', '=', 7)
                ->get();
            if (isset($promAcSP2)) {
            ?>
                <td class="column3 style100 n"></td>
            <?php
            } else {
                $numerosAcSP2 = $promAcSP2;
                $sumaAcSP2 = 0;
                foreach ($numerosAcSP2 as $numeroAcSP2) {
                    $sumaAcSP2 = $sumaAcSP2 + $numeroAcSP2->value;
                }
                $cantidadDeElementosAcSP2 = count($numerosAcSP2);
                $promedioAcSP2 = $sumaAcSP2 / $cantidadDeElementosAcSP2;
            ?>
                <td class="column3 style100 n">{{ $AcSP2 }}</td>

                <td class="column1 style73 null style75" colspan="2"></td>
            <?php
            }
            $promAcSP3 = Ce_average::join('ce_course AS C', 'ce_average.id_course', '=', 'C.id_course')
                ->join('ce_academy_course AS AC', 'C.id_course', '=', 'AC.id_course')
                ->select('ce_average.value')
                ->where('ce_average.id_student', '=', $infoA[0]->idEst)
                ->where('ce_average.id_period', '=', 3)
                ->where('AC.id_academy', '=', 7)
                ->get();
            if (isset($promAcSP3)) {
            ?>
                <td class="column3 style100 n"></td>
            <?php
            } else {
                $numerosAcSP3 = $promAcSP3;
                $sumaAcSP3 = 0;
                foreach ($numerosAcSP3 as $numeroAcSP3) {
                    $sumaAcSP3 = $sumaAcSP3 + $numeroAcSP3->value;
                }
                $cantidadDeElementosAcSP3 = count($numerosAcSP3);
                $promedioAcSP3 = $sumaAcSP3 / $cantidadDeElementosAcSP3;
            ?>
                <td class="column3 style100 n">{{ $promedioAcSP3 }}</td>
            <?php } ?>
        </tr>
        <tr class="row27">
            <td class="column0 style77 null style78" colspan="16"></td>
            <td class="column16 style108 s style110" colspan="10"><span style="color:#000000; font-family:'Arial MT'; font-size:6.5pt">NOMBRE, FECHA Y FIRMA DEL TUTOR:</span></td>
        </tr>
    </tbody>
</table>