<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class registroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo="home";
        
        $datos= Usuario::all();
        return view('index', array('datos'=>$datos, 'titulo'=>$titulo));
     
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
    /*     $username = $request->input('username');
        $usuario= new Usuario(['nombre' => $username]);
        $usuario->save();
        return redirect('inicio'); */


        $username = $request->input('username'); 
        $getNombre = Usuario::where('nombre', $username)->first();
        
        if($getNombre){            
           $arreglo=array(
               "response" => array(
                   "mensaje" => "Error el registro con el dato" . $username ." ya existe",
                   "estado" => false,
                   "redirect" => '',
               )
           );
           return response()->json($arreglo);
        }else{       
         $usuario= new Usuario(['nombre' => $username]);
         $usuario->save();
         $arreglo=array(
            "response" => array(
                "mensaje" => "Se ha registrado con exito el usuario " . $username,
                "estado" => true,
                "redirect" => '/inicio',
            )
        );
         return response()->json($arreglo);
         //return redirect('inicio'); 
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $rq)
    {
        $datos= Usuario::all();
        return view('index', array('datos'=>$datos));
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
    public function update(Request $request)
    {
        $nombre=$request->input('username');
        $id=$request->input('id');
        $usuarios = Usuario::find($id);
        $usuarios->nombre = $nombre;

        $usuarios->save();
        if($usuarios){            
            $arreglo=array(
                "response" => array(
                    "mensaje" => "Se ha actualizado el registro con el dato" . $nombre ."",
                    "estado" => true,
                    "redirect" => '/inicio',
                )
            );
            return response()->json($arreglo);
         }else{       
            $arreglo=array(
             "response" => array(
                 "mensaje" => "No se pudo actualizar el usuario " . $nombre,
                 "estado" => false,
                 "redirect" => '',
             )
         );
          return response()->json($arreglo);
      }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id=null)
    {  
        if ($id=="") {
            $id= $request->input('id');
        }
       
       $delete =   Usuario::find($id);
       $delete->delete();
       return redirect('inicio');
    }
}
