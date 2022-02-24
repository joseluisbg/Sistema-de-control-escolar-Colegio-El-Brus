<?php

namespace App\Http\Controllers\Admin\Evaluations;

use App\Http\Controllers\Controller;
use App\Models\Ce_course;
use App\Models\Ce_cycle;
use App\Models\Ce_grades;
use App\Models\Ce_group;
use App\Models\Ce_level;
use App\Models\Ce_lg_ct;
use App\Models\Ce_permissions;
use App\Models\Ce_student;
use App\Models\Ce_user_enrolment;
use App\Models\ce_rubro_course;
use Illuminate\Http\Request;

class EvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $grupos = Ce_lg_ct::join('ce_level_groups as LG', 'ce_lg_ct.id_lg', '=', 'LG.id_lg')
            ->join('ce_course_teacher as CT', 'ce_lg_ct.id_ct', '=', 'CT.id_ct')
            ->join('ce_group as G', 'LG.id_group', '=', 'G.id_group')
            ->join('ce_level as LV', 'LG.id_level', '=', 'LV.id_level')
            ->join('ce_course as C', 'CT.id_course', '=', 'C.id_course')
            ->select('ce_lg_ct.id_lgct as idlgct', 'LG.id_lg as idlg', 'CT.id_ct as idct', 'G.name as nameGroup',
                'LV.name as nameLevel', 'C.name as nameCourse')->where('CT.id_user', '=', $user)->get();
        return view('system/admin/evaluations/index', compact(['grupos']));
        //return $grupos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
         if ($request) {
            //$id_students = $request->input('id_student');
            //$values = $request->input('value');
            $user = auth()->user()->id;
            $valor=$request->input('id_student');
            $conteo=count($valor);
            for($i=0;$i<$conteo;$i++){
                $res = new Ce_grades();
                    //$id=$request->input('id_student');
                    //$cal=$request->input('value');
                $res->id_student=$request->input('id_student')[$i];
                $res->value=$request->input('value')[$i];
                $res->id_teacher=$request->input('id_teacher');
                $res->id_course=$request->input('id_course');
                $res->id_cycle=$request->input('id_cycle');
                $res->id_period=$request->input('id_period');
                $res->id_rc=$request->input('id_rc')[$i];
                $res->status= "Activo";
                $res->user_modification= $user;
                    //$res="Calificación: ".$cal." Id del estudiante: ".$id;
                    $res->save();
    //return array($res);
            };
            return redirect()->route('admin.evaluations.index')->with('Registrar', 'ok');
           // return redirect()->route('admin.evaluations.index')->with('Registrar', 'ok');
           // return array($res);
            }
        //$res="Calificación: ".$request['value'][2]." Id del estudiante: ".$request['id_student'][2];
        //return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_lg)
    {
        $studentEval = Ce_user_enrolment::join('ce_student as S', 'ce_user_enrolment.id_user', '=', 'S.id_student')
        ->join('ce_level_groups as LG', 'ce_user_enrolment.id_lg', '=', 'LG.id_lg')
        ->join('ce_grades as G', 'ce_user_enrolment.id_user', '=', 'G.id_student')
        ->where('LG.id_lg', $id_lg)->get();
        $conteo = ce_rubro_course::where('id_course', '=', $id_lg)->count();
        $permission1 = Ce_permissions::where('id_permission', '=', 1)->first();
        $permission2 = Ce_permissions::where('id_permission', '=', 2)->first();
        $permission3 = Ce_permissions::where('id_permission', '=', 3)->first();
        $periodo1 = Ce_grades::where('id_period', '=', 1)->get();
        $periodo2 = Ce_grades::where('id_period', '=', 2)->get();
        $periodo3 = Ce_grades::where('id_period', '=', 3)->get();
        $rubros = ce_rubro_course::where('id_course', '=', $id_lg)->get();
        $grupoinfo = Ce_group::where('id_group', '=', $id_lg)->first();
        $levelinfo = Ce_level::where('id_level', '=', $id_lg)->first();
        $teacher = auth()->user()->id;
        $course = Ce_course::where('id_course', '=', $id_lg)->first();
        $nameCycle = $course->cycle;
        $cycle = Ce_cycle::where('name', '=', $nameCycle)->first();
        $alumnos = Ce_user_enrolment::join('ce_student as S', 'ce_user_enrolment.id_user', '=', 'S.id_student')
        ->join('ce_level_groups as LG', 'ce_user_enrolment.id_lg', '=', 'LG.id_lg')
        ->select('S.name AS nombre', 'S.id_student as idEstudent')
        ->where('LG.id_lg', $id_lg)->get();
        return view('system/admin/evaluations/create', compact(['alumnos', 'grupoinfo', 'levelinfo','teacher', 'course', 'cycle', 'permission1', 'permission2', 'permission3','periodo1', 'periodo2', 'periodo3', 'rubros', 'studentEval', 'conteo']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function actualizarRegistros(Request $request){
        return $request;
    }
}
