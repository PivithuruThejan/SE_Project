<?php






namespace App\Http\Controllers\QuestionBankAuth;

use App\Http\Controllers\BackStopController;
use App\questionbank;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;


class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/questionbank';
    protected $guard = 'questionbank';

    public function showLoginForm()
    {//show login form for question bank
        if (Auth::guard('questionbank')->check())
        {
            return redirect('/questionbank');
        }

        return view('questionbanklogin');
    }

    public function showRegistrationForm()
    {//show registration form for question bank
        if($this->getqblogin()=='log'){

        return redirect('/questionbank');
        }
        return view('questionbankregister');
    }

    public function questionbank(){
        if($this->getqblogin()=='log'){
        return view('questionbankhome');
        }
        return redirect('/questionbanklogin');

    }

    public function setqblogin(){
        session(['qblogin' => 'log']);
    }
    public function getqblogin(){
        return session()->get('qblogin');
    }

    public function setqblogout(){
        session()->put('qblogin', 'logout');
    }

    public function resetPassword()
    {
        return view('questionbank.email');
    }





    public function logout(){//function for question bank logout
        $this->setqblogout();
        Auth::guard('questionbank')->logout();
        return redirect('/');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:questionbanks',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return questionbank::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


}
