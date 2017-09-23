<?php

namespace App\Http\Controllers;
use App\Like as Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function like($id , Request $request){
            $like = new Like();
            $like->bordado_id = $id;
            $like->user_id = $request['userId'];
            $like->save();

            return parent::response(true,null,$like);
    }
    public function unlike($bordadoId, Request $request){

            $like = Like::where('bordado_id',$bordadoId)
                        ->where('user_id',$request['userId'])
                        ->delete();
            return parent::response(true,null,$like);

        }
}
