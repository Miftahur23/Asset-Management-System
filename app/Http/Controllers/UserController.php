<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ResetPassEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;


class UserController extends Controller
{
    //Facebook Login
    public function fbredirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function fblogin()
    {
        try{
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect()->route('admin.dashboard');
            }
            else
            {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => 'admin',
                    'facebook_id' => $user->id,
                    'password' => bcrypt('12345')
                    ]);

                Auth::login($createUser);
                return redirect()->route('admin.dashboard');
            }

        }catch(\Throwable $exception) {
            dd($exception->getMessage());
        }
    }



    //Github Login
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubLogin()
    {
        try{
            $user = Socialite::driver('github')->user();
            //dd($user);
            $isUser = User::where('github_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect()->route('admin.dashboard');
            }
            else
            {
                $createUser = User::create([
                    'name' => $user->nickname,
                    'email' => $user->email,
                    'role' => 'admin',
                    'github_id' => $user->id,
                    'password' => bcrypt('12345')
                    ]);

                Auth::login($createUser);
                return redirect()->route('admin.dashboard');
            }

        }catch(\Throwable $exception) {
            dd($exception->getMessage());
        }
    }


    public function sendEmail()
    {
        return view('admin.reset-password.forgot');
    }

    public function postEmail(Request $req)
    {
        //validate request has email and it exist or not
        $req->validate([
            'email'=>'required|exists:users'
        ]); 
           
       
            //generate link to send
            $token=Str::random(40);
            $user=User::where('email',$req->email)->first();
            $user->update([
                'reset_token'=>$token,
                'reset_token_expire_at'=>Carbon::now()->addMinute(2),
            ]);
            $link=route('reset.form',$token);

            //Mail
            //dd($link);
            Mail::to($req->email)->send(new ResetPassEmail($link));
            return redirect()->back();

    }

    public function resetForm($coupon)
    {
        return view('admin.reset-password.reset',compact('coupon'));
    }

    public function resetpass(Request $req)

    {
        $req->validate([
            'reset_token'=>'required',
            'password'=>'required|confirmed',
        ]);

      //check token exist or not
        $userHasToken=User::where('reset_token',$req->reset_token)->first();
        if($userHasToken){
            //check token expired or not
            if($userHasToken->reset_token_expire_at>=Carbon::now()){
               $userHasToken->update([
                  'password'=> bcrypt($req->password),
                   'reset_token'=>null
               ]);


               return redirect()->back()->with('msg','Password Reset Successful.');
            }else{
                return redirect()->back()->withErrors('Token Expired.');
            }

        }else
        {
            return redirect()->back()->withErrors('Token not found.');
        }


    }

    

    public function SignUpForm()
    {
        return view('admin.user.usersignup');
    }

    public function Store(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user=User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>bcrypt($req->password),
            'usertype_id'=>$req->usertype_id
         ]);

         Auth::login($user);

         return redirect()->route('Homepage');
    }

    public function Logout()
    {
        $user=Auth::user();
        Auth::logout($user);
        return redirect()->route('firstloginpage')->with('logoutmessage','Logged Out');
    }

    public function Login()
    {
        
        return view('admin.user.adminlogin');
        
    }

    public function LoggedIn(Request $req)
    {
        // @dd($req->all());


        if( Auth::attempt([ 'email'=>$req->email,'password'=>$req->password]))
        {

            //dd(Auth::user()->id);

            if(Auth::user()->role=='admin')
            {

                return redirect()->route('admin.dashboard')->with('loginmessage','Logged In');
                
            }

            return redirect()->route('EmpHomepage')->with('loginmessage','Logged In');
        }  
        else
        {
            return redirect()->back()->with('invalid','Invalid Username or Password');
        }
    }

    public function UserLoggedIn(Request $req)
    {
        // @dd($req->all());

        if( Auth::attempt([ 
            'email'=>$req->email,
            'password'=>$req->password
            ]))

        {
            return redirect()->route('EmployeeHomepage');
        }  
        else
        {
            return redirect()->back();
        }

        
    }
    
}    
