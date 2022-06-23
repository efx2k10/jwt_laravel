<?php

namespace App\Http\Controllers\User;

use App\Models\User\Role;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /**
     * Register a new user
     */
    public function register(Request $request)
    {


        $v = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/'
            ]
        ],

            [
                'required' => 'Необходимо заполнить поле :attribute.',
                'min' => 'Поле :attribute содержать минимум :min символа',
                'password.confirmed' => 'Пароли должны совпадать',
                'password.regex' => 'Пароль должен содержать минимум 1 букву в верхнем регистре и одну цифру',


            ]
        );


        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $role = Role::inRandomOrder()->first();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $role->id;

        $user->save();
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Login user and return a token
     */
    public function login(Request $request)
    {


        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    /**
     * Logout User
     */
    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    /**
     * Get authenticated user
     */
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $role = Role::find($user->role_id);

        return response()->json([
            'status' => 'success',
            'data' => compact('user', 'role')
        ]);
    }

    /**
     * Refresh JWT token
     */
    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    /**
     * Return auth guard
     */
    private function guard()
    {
        return Auth::guard();
    }


}
