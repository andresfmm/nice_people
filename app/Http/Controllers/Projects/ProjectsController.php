<?php

namespace App\Http\Controllers\Projects;

use App\User;
use App\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{   

    public function getproyectos(){
        
        
        if (Auth::user()->User == 'administrador') {
            $model = Projects::leftJoin('users', 'users.id', '=', 'projects.leader_user')->select('projects.*', 'users.name as leader_name')->get();
            return Datatables::collection($model)->addColumn('action', function ($user) {
                  
                return '<button type="submit" class="btn btn-xs btn-success mouse-pointer" style="margin-top:4px " data-toggle="modal" data-target="#editarProyecto" onclick="modalupdate('.$user->id.')"><i class="fas fa-edit"></i></button>'
                ." ".
                '<button type="submit" class="btn btn-xs btn-danger" style="margin-top:4px " onclick="eliminarUsuario('.$user->id.')"><i class="fas fa-trash-alt"></i></button>';
                // ." ".
                // '<button type="submit" class="btn btn-xs btn-primary mouse-pointer" data-toggle="modal" data-target="#verempleado" style="margin-top:4px " onclick="verEmpleado('.$user->id.')"><i class="fas fa-eye"></i></button>';

            })
            
            ->make(true);
        }
    }


    public function getupdateproyectos(){
        if (Auth::user()->User == 'administrador') {
            
            $model = Projects::leftJoin('users', 'users.id', '=', 'projects.leader_user')->select('projects.*', 'users.name as leader_name')->get();
            return response()->json($model);
        }else{
            $msg = 'unauthorized';
            return response()->json($msg);
        }
    }


    public function updateProyecto(Request $data){
        if (Auth::user()->User == 'administrador') {
            return $data->all();
            $validator = Validator::make($data->all(),[
                   'name' =>'required',
                   'description' =>'required',
                   'alias' =>'required',
                   'status' =>'required',
                   'initial_date' =>'required',
                   'final_date' =>'required',
                   'leader_name' =>'required',
                ]);
            if ($validator->fails()) {
                $msg = $validator->errors();
                return response()->json($msg);
            }else{
                if ($data->hasFile('avatar')) {
                    $pid = $data->pid;
                    $uid = $data->uid;
                    Projects::where('id', $pid)
                      ->update([

                        ]);
                    $msg = 'ok';
                    return response()->json($msg);
                }else{

                }
            }
            
        }else{
            $msg = 'unauthorized';
            return response()->json($msg);
        }  
    }

    
            
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function edit($id)
    {
        //
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
        //
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
}
