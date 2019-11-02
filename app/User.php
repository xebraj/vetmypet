<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'last_name', 'ci', 'email','address', 'phone_number', 'password','role'
    ];

  
    protected $hidden = [
        'password', 'remember_token', 'pivot',
        'email_verified_at', 'created_at', 'updated_at'
    ];

    public static $rules = [
     'name' => 'required', 'string', 'max:255',
    'last_name' => 'required', 'string','max:255',
    'ci' => 'required','numeric','unique:users','digits_between:6,8',
    'email' => 'required', 'string', 'email', 'max:255', 'unique:users',    
    'address' => 'required', 'string','max:255',
    'phone_number' => 'required', 'string', 'max:50',
    'password' => 'required', 'string', 'min:6', 'confirmed',
    ];

    public static function createPatient(array $data)
    {
        return self::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'ci' => $data['ci'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'role' => 'patient'
        ]);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // $user->specialties
    //Relacion mucho a mucho con tabla users
    public function specialties()
    {
        return $this->belongsToMany(Specialty::class)->withTimestamps();
    }
    public function scopePatients($query)
    {
        return $query->where('role', 'patient');
    }

    public function scopeDoctors($query)
    {
        return $query->where('role', 'doctor');
    }

    // $user->asPatientappointments ->requestedAppointments
    // $user->asDoctorappointments  ->attendedAppointments
    public function asDoctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function attendedAppointments()
    {
        return $this->asDoctorAppointments()->where('status', 'Atendida');
    }

    public function cancelledAppointments()
    {
        return $this->asDoctorAppointments()->where('status', 'Cancelada');
    }

    public function asPatientAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function sendFCM($message)
    {
        return fcm()->to([
            $this->device_token
        ])->notification([
            'title' => config('app.name'),
            'body' => $message
        ])->send();
    }
}
