<?php

namespace App\Http\Controllers;
use App\Like as Like;
use Illuminate\Http\Request;
use Auth;
class LikeController extends Controller
{

    public function like($id , Request $request){
         try{
                     $like = new Like();

                     $like->bordado_id = $id;

                     $like->user_id = $request['userId'];

                     $like->save();

                    return parent::response(true,null,$like);
         }catch(\Exception $e) {

            return parent::response(false, $e->getMessage(), null, 400);

        }
    }
    public function unlike($bordadoId, Request $request){
          try{
                   $like = Like::where('bordado_id',$bordadoId)
                                 ->where('user_id',$request['userId'])
                                 ->delete();
                if(!$like)
                      return parent::response(false. 'Not found', null, 404);

                      return parent::response(true,null,$like);
          }catch(\Exception $e) {

            return parent::response(false, $e->getMessage(), null, 400);

        }
    }

    public function getUserLiked (){

          $userId = Auth::id();

          $like = new Like();

          $like = $like->userLikes($userId);

          $i = -1;

          $likes = [];

          foreach ($like as $key ) {
                $i++;

                $likes[$i] = $key->bordado;

                $likes[$i]['user'] = $key->bordado->user;
          }
          if ($likes) {

              $likes[0]['auth_user'] = $userId;

          }

           return parent::response(true,null,$likes);
    }

}
