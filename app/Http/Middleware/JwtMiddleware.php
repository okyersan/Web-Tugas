<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use App\Libraries\SendResponse;

class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try{
            $user = JWTAuth::parseToken()->authenticate();
        }catch (Exception $e){
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                $msg = 'token_is_invalid';
                return SendResponse::error($msg);
            }elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                $msg = 'Token is Expired';
                return SendResponse::error($msg);
            }else{
                $msg = 'Authorization Token Not Found';
                return SendResponse::error($msg);
            }
        }
        return $next($request);
    }
}
