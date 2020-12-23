<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationMailController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Form
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['email', 'unique:users', 'required'],
            'password' => ['required', 'min:8', 'confirmed']
        ], [
            'email.unique' => 'Email already taken'
        ]);

        // If Validation True; Create new User Model
        $user = User::create(array_merge($data, [
            'password' => Hash::make($data['password'])
        ]));

        // Send Email To $user
        Mail::to($data['email'])->send(new RegistrationMailController($user->id));

        return redirect(route('login.index'))->with(['mySuccess' => [
            "User successfully registered."
        ]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function verify(Request $request)
    {
        $user = User::find($request['id']);

        if ($user->exists()) {
            $user->update([
                'email_verified' => true
            ]);

            return redirect(route('login.index'))->with([
                'mySuccess' => ['You have successfully verified your Email.']
            ]);
        }

        abort(403, 'Somethin went wrong, please try again.');
    }
}
