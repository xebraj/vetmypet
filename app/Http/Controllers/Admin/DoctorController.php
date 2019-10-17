<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Specialty;

use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::doctors()->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|min:3',
            'last_name' => 'nullable|min:3',
            'email' => 'required|email',
            'ci' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone_number' => 'nullable|min:6'
        ];
        $this->validate($request, $rules);

        // Asignación masiva
        $user = User::create(
            $request->only('name','last_name','email','ci','address','phone_number')
            +[
                'role' =>'doctor',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $user->specialties()->attach($request->input('specialties'));

        $notification = "El médico se ha guardado correctamente.";
        return redirect('/doctors')->with(compact('notification'));
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
        $doctor = User::doctors()->findOrFail($id);
        $specialties = Specialty::all();

        $specialty_ids = $doctor->specialties()->pluck('specialties.id');
        return view('doctors.edit', compact('doctor','specialties', 'specialty_ids'));
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
            $rules = [
                'name' => 'required|min:3',
                'last_name' => 'nullable|min:3',
                'email' => 'required|email',
                'ci' => 'nullable|digits:8',
                'address' => 'nullable|min:5',
                'phone_number' => 'nullable|min:6'
            ];
            $this->validate($request, $rules);
    
            // Asignación masiva
            $user = User::doctors()->findOrFail($id);

            $data = $request->only('name','last_name','email','ci','address','phone_number');
            $password = $request->input('password');
            if ($password)
                $data['password'] = bcrypt($password);

            $user->fill($data);
            $user->save();

            $user->specialties()->sync($request->input('specialties'));

            $notification = "La informacion del médico se ha actualizado correctamente.";
            return redirect('/doctors')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $doctorName = $doctor->name;
        $doctorLastName = $doctor->last_name;
        $doctor->delete();

        $notification = "El médico $doctorName $doctorLastName se ha eliminado correctamente.";
        return redirect('doctors/')->with(compact('notification'));
    }
}
