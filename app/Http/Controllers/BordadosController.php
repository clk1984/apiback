<?php

namespace App\Http\Controllers;
use App\Bordados as Bordado;
use Illuminate\Http\Request;

class BordadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $bordados = Bordado::all();
       return $bordados;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bordado = new Bordado();
        $bordado->name = $request['name'];
        $bordado->description = $request['description'];
        $bordado->path=  $request->file('path')->store('bordados');
        $bordado->user_id = 13;

        try {
            $bordado->save();
            return parent::response(true,null,$bordado);
        } catch (Exception $e) {
            dd($e);
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
         try{

      $element = Bordado::find($id);

      if(!$element)
        return parent::response(false. 'Not found', null, 404);

      return parent::response(true, null, $element);

    }catch(Exception $e){

      return parent::response(false, $e->getMessage(), null, 500);

    }
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
