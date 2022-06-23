<?php
 
 namespace App\Http\Middleware;
 use Closure;
 use Auth;
 use App\Roles;
 use Illuminate\Support\Facades\DB;
  
 class patikrinti
 {
     /**
      * Handle an incoming request.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \Closure  $next
      * @return mixed
      */
  
     public function handle($request, $next, ...$roles)
 {
     //dd($roles);
     //print_r($roles);
     if(Auth::user() != NULL)
     {
         $userRoles = Auth::user()->roles()->pluck('pavadinimas');
  
     foreach ($roles as $role) {
         if ($userRoles->contains($role)) {
             // they have the current iterated role
             // let them pass through
             return $next($request);
         }
     }
     }
  
     //exit;
     // they don't have any of these roles
     // redirect away
      echo"Netinkamos teises";abort(404);
 }
  
 }
  