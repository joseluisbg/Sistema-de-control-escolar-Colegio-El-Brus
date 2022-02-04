<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use App\Imports\TutorImport;
use App\Models\Ce_student;
use App\Models\Ce_tutor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = Ce_student::where('status', 'Activo')->count();
        $suspendidos = Ce_student::where('status', 'Suspendido')->count();
        return view('system/admin/student/index', compact(['activos', 'suspendidos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system/admin/student/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;
        if ($request) {
            $student = new Ce_student();
            $student->matricula = $request->input('matricula');
            $student->name = $request->input('name');
            $student->curp = $request->input('curp');
            $student->street = $request->input('street');
            $student->suburb = $request->input('suburb');
            $student->city = $request->input('city');
            $student->state = $request->input('state');
            $student->cp = $request->input('cp');
            $student->date_ofbirth = $request->input('date_ofbirth');
            $student->status = "Activo";
            $student->user_modification = $user;
            $student->save();
            $principal = new Ce_tutor();
            $principal->name = $request->input('name_principal');
            $principal->tel_1 = $request->input('tel_1_principal');
            $principal->tel_2 = $request->input('tel_2_principal');
            $principal->email = $request->input('email_principal');
            $principal->rfc = $request->input('rfc_principal');
            $principal->curp_student = $request->input('curp');
            $principal->principal = "1";
            $principal->status = "Activo";
            $principal->user_modification = $user;
            $principal->save();
            $secundari = new Ce_tutor();
            $secundari->name = $request->input('name_secundari');
            $secundari->tel_1 = $request->input('tel_1_secundari');
            $secundari->tel_2 = $request->input('tel_2_secundari');
            $secundari->email = $request->input('email_secundari');
            $secundari->curp_student = $request->input('curp');
            $secundari->principal = "0";
            $secundari->status = 'Activo';
            $secundari->user_modification = $user;
            $secundari->save();
            return redirect()->route('admin.student.index')->with('Registrar', 'ok');
        }
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
    public function edit($student)
    {
        $student = Ce_student::on('mysql')
        ->join('ce_tutor as T', 'ce_student.curp', '=', 'T.curp_student')->select('Ce_student.*', 'T.name as nombreTutor', 'T.tel_1 as telefonoTutor', 'T.tel_2 as celularTutor', 'T.email as correoTutor', 'T.rfc as rfcTutor', 'T.principal as principalTutor', 'T.curp_student as curpTutor')->where('id_student', $student)->get();
        //return $student;
        return view('system/admin/student/edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_student)
    {
        if ($request and $id_student) {
            $curp_stu = $request->input('curp');
            $prin_principal = $request->input('prin_principal');
            $prin_secundari = $request->input('prin_secundari');
            $curp_principal = $request->input('curp_principal');
            $curp_secundari = $request->input('curp_secundari');
            $user = auth()->user()->id;
            $student = Ce_student::where('id_student', $id_student)->firstOrFail();
            $student->matricula = $request->input('matricula');
            $student->name = $request->input('name');
            $student->curp = $request->input('curp');
            $student->street = $request->input('street');
            $student->suburb = $request->input('suburb');
            $student->city = $request->input('city');
            $student->state = $request->input('state');
            $student->cp = $request->input('cp');
            $student->date_ofbirth = $request->input('date_ofbirth');
            $student->user_modification = $user;
            $student->update();
            $principal = Ce_tutor::where('curp_student', $curp_principal)->where('principal', $prin_principal)->firstorfail();
            $principal->name = $request->input('name_principal');
            $principal->tel_1 = $request->input('tel_1_principal');
            $principal->tel_2 = $request->input('tel_2_principal');
            $principal->email = $request->input('email_principal');
            $principal->rfc = $request->input('rfc_principal');
            $principal->curp_student = $request->input('curp');
            $principal->principal = "1";
            $principal->status = "Activo";
            $principal->user_modification = $user;
            $principal->update();
            $secundari = Ce_tutor::where('curp_student', $curp_secundari)->where('principal', $prin_secundari)->firstorfail();
            $secundari->name = $request->input('name_secundari');
            $secundari->tel_1 = $request->input('tel_1_secundari');
            $secundari->tel_2 = $request->input('tel_2_secundari');
            $secundari->email = $request->input('email_secundari');
            $secundari->rfc = $request->input('rfc_secundari');
            $secundari->curp_student = $request->input('curp');
            $secundari->principal = "0";
            $secundari->status = 'Activo';
            $secundari->user_modification = $user;
            $secundari->update();
            return redirect()->route('admin.student.index')->with('Actualizar', 'ok');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_student)
    {
        //
    }

    public function importStudentExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new StudentImport, $file);
        Excel::import(new TutorImport, $file);
        return back()->with('message','Importación de usuarios completa');
    }

    public function statusA(Request $request, $id_student)
    {
        $student = Ce_student::where('id_student', $id_student)->firstOrFail();
            $student->status = "Suspendido";
            $student->update();
            return redirect()->route('admin.student.index')->with('Suspendido', 'ok');
    }

    public function statusS(Request $request, $id_student)
    {
        $student = Ce_student::where('id_student', $id_student)->firstOrFail();
            $student->status = "Activo";
            $student->update();
            return redirect()->route('admin.student.index')->with('Activo', 'ok');
    }
}
