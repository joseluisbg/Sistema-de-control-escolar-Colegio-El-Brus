<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class TeacherController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = User::role('Docente')->where('status', 'Activo')->count();
        $suspendidos = User::role('Docente')->where('status', 'Suspendido')->count();
        return view('system/admin/teacher/index', compact(['activos', 'suspendidos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system/admin/teacher/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {
            $user = auth()->user()->id;
            $teacher = new User();
            $teacher->name = $request->input('name');
            $teacher->last_name = $request->input('last_name');
            $teacher->curp = $request->input('curp');
            $teacher->rfc = $request->input('rfc');
            $teacher->tel_1 = $request->input('tel_1');
            $teacher->tel_2 = $request->input('tel_2');
            $teacher->email = $request->input('email');
            $teacher->password = Hash::make($request['password']);
            $teacher->user_modification = $user;
            $teacher->status = 'Activo';
            $teacher->assignRole('Docente');
            $teacher->save();
            return redirect()->route('admin.teacher.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        $student = User::findOrFail($student);
        return view('system/admin/teacher/edit', compact('student'));
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
        if ($request and $id) {
            $user = auth()->user()->id;
            $teacher = User::findOrFail($id);
            $teacher->name = $request->input('name');
            $teacher->last_name = $request->input('last_name');
            $teacher->curp = $request->input('curp');
            $teacher->rfc = $request->input('rfc');
            $teacher->tel_1 = $request->input('tel_1');
            $teacher->tel_2 = $request->input('tel_2');
            $teacher->email = $request->input('email');
            $teacher->password = Hash::make($request['password']);
            $teacher->user_modification = $user;
            $teacher->status = 'Activo';
            $teacher->assignRole('Docente');
            $teacher->save();
            return redirect()->route('admin.teacher.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('admin.teacher.index');
    }
}