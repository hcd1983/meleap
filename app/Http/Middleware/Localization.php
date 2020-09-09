<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $except = [
      "mobile","clear-cache","MailTest","recache-all","FormSubmit","contact2","contact-en","gsheet"
    ];
    public function handle($request, Closure $next)
    {

        if(in_array($request->path(), $this->except )){
            return $next($request);
        }

        $origin_local = \Route::current()->parameter('locale');

        if($origin_local == null){

            if(\Session::has('locale')){

                $locale = Session::get('locale');
            }else{
                $locale = "jp";
            }

            if(in_array($locale,["jp","en"])){
                return \Redirect::route("home", ["locale"=>$locale]);
            }

        }

        if(!in_array($origin_local,["jp","en"])){
            if( \Route::has($origin_local) ){
                $locale = Session::get('locale');
                return \Redirect::route($origin_local,["locale"=>$locale]);
            }else{
                abort("404");
            }
        }else{
            \Session::put('locale', $origin_local);
        }


        return $next($request);

//        $response = $next($request);
//        return $response;
    }
}
