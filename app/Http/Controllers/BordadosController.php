<?php
namespace App\Http\Controllers;
use File;
use Storage;
use Auth;
use App\Bordado as Bordado;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class BordadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    try
     {
        $bordados = new Bordado;

        $bordados = $bordados->showLikes();

        $bordados[0]['auth_user'] = Auth::id();

         return parent::response(true, null, $bordados);

        } catch (\Exception $e) {

            return parent::response(false, $e->getMessage(), null, 400);

        }
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
         foreach ($request->file() as $file) {
             $fi = $file;
         }


            $filename  = time() . '.' . $fi->getClientOriginalExtension();
            $resizedfile = time() . 'resized.' . $fi->getClientOriginalExtension();
            $path = public_path('img/' . $filename);
            $resizedpath = public_path('img/' . $resizedfile);
            Image::make($fi->getRealPath())->save($path);
            Image::make($fi->getRealPath())->resize(256, 250)->save($resizedpath);
            $bordado->src = '/img/'.$filename;
            $bordado->resizedpath = '/img/'.$resizedfile;
            $bordado->user_id = Auth::id();

        try {
            $bordado->save();
            return parent::response(true,null,$bordado);
        } catch (Exception $e) {
            return parent::response(false,'Unauthorised',$e,401);
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
     * Get Photos by user.
     *
     * @param  str  $userId
     * @return \Illuminate\Http\Response
     */
    public function getUserPhotos($userId){

    try{

        $bordados = new Bordado();

        $bordados = $bordados->getUserBordados($userId);

    if(!$bordados)

      return parent::response(false. 'Not found', null, 404);

     $bordados[0]['auth_user'] = Auth::id();

      return parent::response(true, null, $bordados);

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
