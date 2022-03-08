<table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">

    <tbody>
        <tr class="row0">
            <td class="column0 style1 s style9" colspan="7" rowspan="4">
                <span style="color:#000000; font-family:'Times New Roman'; font-size:24.5pt">COLEGIO ELBRUS<br />
                </span><span style="color:#000000; font-family:'Arial MT'; font-size:8.5pt">Doraceli No. 604, Col. Amplación Sta. Julia, Pachuca Hgo. C.P. 42080<br />
                </span><span style="color:#000000; font-family:'Arial MT'; font-size:8.5pt">Tels.: (01-771) 7 14 79 69 y 1 53 17 50</span>
            </td>
            <td class="column7 style11 null style10" rowspan="4"></td>
            <td class="column8 style13 s style18" colspan="3" rowspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">BOLETA DE EVALUACIÓN</span></td>
            <td class="column11 style20 s style22" colspan="8"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">ALUMNO (A)</span></td>
            <td class="column19 style23 s style25" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">MATRÍCULA</span></td>
            <td class="column22 style27 s style29" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">GRUPO</span></td>
            <td class="column25 style26 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">SECCIÓN</span></td>
        </tr>

        <tr class="row1">

            <td class="column11 style30 s style32" colspan="8"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{$info[0]->Nombre}}</span></td>
            <td class="column19 style34 n style36" colspan="3">{{$info[0]->Matricula}}</td>
            <td class="column22 style37 s style39" colspan="3"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{$info[0]->Grupo}}</span></td>
            <td class="column25 style40 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{$info[0]->Area}}</span></td>

        </tr>
        <tr class="row2">
            <td class="column8 style20 s style22" colspan="5"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">GRADO</span></td>
            <td class="column13 style20 s style22" colspan="4"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">GRUPO</span></td>
            <td class="column17 style41 s style43" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">EVALUACIÓN</span></td>
            <td class="column20 style20 s style22" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">FECHA</span></td>
            <td class="column23 style27 s style29" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">CURSO ESCOLAR</span></td>
        </tr>
        <tr class="row3">
            <td class="column8 style44 s style46" colspan="5"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{$info[0]->Grado}}</span></td>
            <td class="column13 style37 s style39" colspan="4"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{$info[0]->Grupo}}</span></td>
            <td class="column17 style37 s style39" colspan="3"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Periodo 1</span></td>
            <td class="column20 style47 n style49" colspan="3">{{date("d-m-y")}}</td>
            <td class="column23 style44 s style46" colspan="3"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">{{$info[0]->Ciclo}}</span></td>
        </tr>
        <tr class="row4">
            <td class="column0 style26 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">RESULTADOS EVALUACIÓN</span></td>
            <td class="column1 style50 s style52" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO 1</span></td>
            <td class="column4 style50 s style52" colspan="5"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO 2</span></td>
            <td class="column9 style50 s style52" colspan="5"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO 3</span></td>
            <td class="column14 style53 s style54" rowspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:7.5pt">Promedio FINAL</span></td>
            <td class="column15 style55 null style56" rowspan="3"></td>
            <td class="column16 style57 s style59" colspan="8"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PERIODO DE EVALUACIÓN SEP</span></td>
            <td class="column24 style60 s style63" colspan="2" rowspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:7.5pt">PROMEDIO FINAL</span></td>
        </tr>
        <tr class="row5">
            <td class="column0 style19 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">MATERIAS</span></td>
            <!-- @foreach($info as $inf)
            @if($inf->rcurso==1)
            <td class="column1 style64 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">{{$inf->Rubro}}</span></td>
            @endif
            @endforeach -->
            <td class="column4 style64 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Evidencias de Aprendizaje</span></td>
            <td class="column5 style66 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Proyecto</span></td>
            <td class="column6 style67 s style69" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Calificación</span></td>
            <td class="column4 style64 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Evidencias de Aprendizaje</span></td>
            <td class="column5 style66 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Proyecto</span></td>
            <td class="column6 style67 s style69" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Calificación</span></td>
            <td class="column9 style64 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Evidencias de Aprendizaje</span></td>
            <td class="column10 style70 s style71" colspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Proyecto</span></td>
            <td class="column12 style67 s style69" colspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:5.5pt">Calificación</span></td>
            <td class="column16 style20 s style22" colspan="2"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">1er</span></td>
            <td class="column18 style20 s style22" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">2do</span></td>
            <td class="column21 style20 s style22" colspan="3"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">3er</span></td>
        </tr>
        <tr class="row6">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">FORMACIÓN ACADÉMICA</span></td>
            <td class="column1 style73 null style75" colspan="14"></td>
            <td class="column16 style76 null style84" colspan="10" rowspan="6"></td>
        </tr>
        <tr class="row7">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Oral Language</span></td>
            <td class="column1 style86 null style87" colspan="2"></td>
            <td class="column3 style88 n">9.4</td>
            <td class="column4 style86 null style87" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style86 null style87" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style90 n">9.4</td>
            <td class="column15 style91 null"></td>
        </tr>
        <tr class="row8">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Word Work</span></td>
            <td class="column1 style92 n">9.6</td>
            <td class="column2 style88 n">10.0</td>
            <td class="column3 style88 n">9.7</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style90 n">9.7</td>
            <td class="column15 style91 null"></td>
        </tr>
        <tr class="row9">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Reading</span></td>
            <td class="column1 style92 n">10.0</td>
            <td class="column2 style88 n">10.0</td>
            <td class="column3 style88 n">10.0</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style93 n">10.0</td>
            <td class="column15 style91 null"></td>
        </tr>
        <tr class="row10">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Language Arts</span></td>
            <td class="column1 style92 n">9.8</td>
            <td class="column2 style88 n">10.0</td>
            <td class="column3 style88 n">9.8</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style90 n">9.8</td>
            <td class="column15 style91 null"></td>
        </tr>
        <tr class="row11">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Science</span></td>
            <td class="column1 style92 n">10.0</td>
            <td class="column2 style88 n">9.3</td>
            <td class="column3 style88 n">9.7</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style90 n">9.7</td>
            <td class="column15 style91 null"></td>
        </tr>
        <tr class="row12">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Español</span></td>
            <td class="column1 style92 n">9.9</td>
            <td class="column2 style88 n">9.8</td>
            <td class="column3 style88 n">9.8</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style90 n">9.8</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style94 n style95" colspan="2">10</td>
            <td class="column18 style73 null style75" colspan="3"></td>
            <td class="column21 style73 null style75" colspan="3"></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td>
        </tr>
        <tr class="row13">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Matemáticas</span></td>
            <td class="column1 style92 n">9.8</td>
            <td class="column2 style88 n">9.6</td>
            <td class="column3 style88 n">9.7</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style90 n">9.7</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style94 n style95" colspan="2">10</td>
            <td class="column18 style73 null style75" colspan="3"></td>
            <td class="column21 style73 null style75" colspan="3"></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td>
        </tr>
        <tr class="row14">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Conocimiento del Medio</span></td>
            <td class="column1 style92 n">10.0</td>
            <td class="column2 style88 n">10.0</td>
            <td class="column3 style88 n">10.0</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style93 n">10.0</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style94 n style95" colspan="2">10</td>
            <td class="column18 style73 null style75" colspan="3"></td>
            <td class="column21 style73 null style75" colspan="3"></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td>
        </tr>
        <tr class="row15">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Formación Cívica y Ética</span></td>
            <td class="column1 style92 n">10.0</td>
            <td class="column2 style88 n">10.0</td>
            <td class="column3 style88 n">10.0</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style93 n">10.0</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style94 n style95" colspan="2">10</td>
            <td class="column18 style73 null style75" colspan="3"></td>
            <td class="column21 style73 null style75" colspan="3"></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td>
        </tr>
        <tr class="row16">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Laboratorio de Tecnología</span></td>
            <td class="column1 style92 n">10.0</td>
            <td class="column2 style88 n">10.0</td>
            <td class="column3 style88 n">10.0</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style93 n">10.0</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style76 null style84" colspan="10" rowspan="3"></td>
        </tr>
        <tr class="row17">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">DESARROLLO PERSONAL Y SOCIAL</span></td>
            <td class="column1 style73 null style75" colspan="14"></td>
            <td class="column15 style91 null"></td>
        </tr>
        <tr class="row18">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Formación Católica</span></td>
            <td class="column1 style92 n">8.8</td>
            <td class="column2 style88 n">10.0</td>
            <td class="column3 style88 n">9.1</td>
            <td class="column4 style72 null"></td>
            <td class="column5 style72 null"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style72 null"></td>
            <td class="column10 style73 null style75" colspan="2"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style99 n">9.10</td>
            <td class="column15 style91 null"></td>
        </tr>
        <tr class="row19">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Artes</span></td>
            <td class="column1 style86 null style87" colspan="2"></td>
            <td class="column3 style88 n">10.0</td>
            <td class="column4 style86 null style87" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style86 null style87" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style93 n">10.0</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style94 n style95" colspan="2">10</td>
            <td class="column18 style73 null style75" colspan="3"></td>
            <td class="column21 style73 null style75" colspan="3"></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td>
        </tr>
        <tr class="row20">
            <td class="column0 style85 s"><span style="color:#000000; font-family:'Arial MT'; font-size:8pt">Educación Física</span></td>
            <td class="column1 style86 null style87" colspan="2"></td>
            <td class="column3 style88 n">10.0</td>
            <td class="column4 style86 null style87" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style86 null style87" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style93 n">10.0</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style94 n style95" colspan="2">10</td>
            <td class="column18 style73 null style75" colspan="3"></td>
            <td class="column21 style73 null style75" colspan="3"></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td>
        </tr>
        <tr class="row21">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio Académico Inglés</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <td class="column3 style100 n">9.72</td>
            <td class="column4 style73 null style75" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style73 null style75" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style101 n">9.72</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style94 n style95" colspan="2">10</td>
            <td class="column18 style73 null style75" colspan="3"></td>
            <td class="column21 style73 null style75" colspan="3"></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td>
        </tr>
        <tr class="row22">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio Académico Español</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <td class="column3 style100 n">9.92</td>
            <td class="column4 style73 null style75" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style73 null style75" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style101 n">9.92</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style73 null style75" colspan="10"></td>
        </tr>
        <tr class="row23">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio Académico</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <td class="column3 style100 n">9.82</td>
            <td class="column4 style73 null style75" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style73 null style75" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style101 n">9.82</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style57 s style59" colspan="8"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">PROMEDIO FINAL DE GRADO SEP</span></td>
            <td class="column24 style97 n style98" colspan="2">10.0</td>
        </tr>
        <tr class="row24">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Hábitos</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <td class="column3 style96 n">10.0</td>
            <td class="column4 style73 null style75" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style73 null style75" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style101 n">10.00</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style102 null style107" colspan="10" rowspan="2"></td>
        </tr>
        <tr class="row25">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Promedio General</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <td class="column3 style100 n">9.85</td>
            <td class="column4 style73 null style75" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style73 null style75" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style101 n">9.85</td>
            <td class="column15 style91 null"></td>
        </tr>
        <tr class="row26">
            <td class="column0 style12 s"><span style="font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt">Inasistencias</span></td>
            <td class="column1 style73 null style75" colspan="2"></td>
            <td class="column3 style33 n">7</td>
            <td class="column4 style73 null style75" colspan="2"></td>
            <td class="column6 style73 null style75" colspan="3"></td>
            <td class="column9 style73 null style75" colspan="3"></td>
            <td class="column12 style73 null style75" colspan="2"></td>
            <td class="column14 style33 n">7</td>
            <td class="column15 style91 null"></td>
            <td class="column16 style34 n style36" colspan="2">7</td>
            <td class="column18 style73 null style75" colspan="3"></td>
            <td class="column21 style73 null style75" colspan="3"></td>
            <td class="column24 style34 n style36" colspan="2">7</td>
        </tr>
        <tr class="row27">
            <td class="column0 style77 null style78" colspan="16"></td>
            <td class="column16 style108 s style110" colspan="10"><span style="color:#000000; font-family:'Arial MT'; font-size:6.5pt">NOMBRE, FECHA Y FIRMA DEL TUTOR:</span></td>
        </tr>
    </tbody>
</table>