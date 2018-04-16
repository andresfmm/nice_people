<?php

namespace App\Http\Controllers\User;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{   

    public function login(Request $data){
        if ($data->ajax()) {
           
           $credentials = $data->only('email', 'password');
             if (Auth::attempt($credentials)) {
              $msg = Auth::user()->User;
              return response()->json($msg);
           }else{
              $msg = 'somerror';
              return response()->json($msg);
           }
        }
    }


    public function getusuarios(Request $data){
         
             return Datatables::collection(User::all())->addColumn('action', function ($user) {
                  
                return '<button type="submit" class="btn btn-xs btn-success mouse-pointer" style="margin-top:4px " data-toggle="modal" data-target="#editarUsuario" onclick="getup('.$user->id.')"><i class="fas fa-edit"></i></button>'
                ." ".
                '<button type="submit" class="btn btn-xs btn-danger" style="margin-top:4px " onclick="eliminarUsuario('.$user->id.')"><i class="fas fa-trash-alt"></i></button>';
                // ." ".
                // '<button type="submit" class="btn btn-xs btn-primary mouse-pointer" data-toggle="modal" data-target="#verempleado" style="margin-top:4px " onclick="verEmpleado('.$user->id.')"><i class="fas fa-eye"></i></button>';

            })
            
            ->make(true);
         
    }


    public function getupdateusuarios(Request $data){
        if (Auth::user()->User == 'administrador') {
            $id = $data->id;
            $users = User::select('id','name', 'email', 'User')->get();
            return response()->json($users);
        }else{
            $msg = 'unauthorized';
            return response()->json($msg);
        }
    }


    public function updateUser(Request $data){
        if ($data->ajax()) {
            if (Auth::user()->User == 'administrador') {
               
                if($data->rol == '' || $data->rol == 'undefined' || $data->rol == null ){
                     $validator = Validator::make($data->all(),[
                         'email' => 'email|unique:users,email,'.$data->id
                      ]);
                     if ($validator->fails()) {
                         $msg = $validator->errors();
                         return response()->json($msg);
                     }else{

                      $id = $data->id;
                      User::where('id', $id)
                      ->update([
                      'name' => $data->name,
                      'email' => $data->email,
                       ]);
                        $msg = 'ok';
                      return response()->json($msg);
                     }

                      
                }else{
                    $id = $data->id;
                    User::where('id', $id)
                      ->update([
                      'name' => $data->name,
                      'email' => $data->email,
                      'User' => $data->rol,
                    ]);
                    $msg = 'ok';
                   return response()->json($msg);
                }
                
            }else{
            $msg = 'unauthorized';
            return response()->json($msg);
        }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        User::create([
              'name' => 'andres',
              'email' => 'andres@hotmail.com',
              'password' => bcrypt('aaa'),
            ]);
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
    public function store(Request $data)
    {
        if ($data->ajax()) {
            if (Auth::user()->User == 'administrador') {
                $validator = Validator::make($data->all(),[
                      'email' => 'required|email|unique:users',
                      'name' => 'required',
                      'password' => 'required',
                      'rol' => 'required',
                    ]);
                if ($validator->fails()) {
                    $msg = $validator->errors();
                    return response()->json($msg);
                }else{
                 User::create([
                      'name' => $data->name,
                      'email' => $data->email,
                      'User' => $data->rol,
                      'password' => bcrypt($data->password),
                    ]);
                 $msg = 'ok';
                 return response()->json($msg);
             }
           }else{
            $msg = 'unauthorized';
            return response()->json($msg);
           }
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
    public function destroy(Request $data)
    {   
        if($data->ajax()){
        $id = $data['id'];
        $empleado = User::find($id);
        $empleado->delete();
       }
        
    }
}
