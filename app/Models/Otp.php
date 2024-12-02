<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * This is optional if your table name follows Laravel's naming convention
     * (e.g., plural form of the model name, `otps` in this case).
     */
    protected $table = 'otps';

    /**
     * The attributes that are mass assignable.
     *
     * This prevents mass assignment vulnerabilities.
     */
    protected $fillable = [
        'token',
        'user_id',
        'otp_code',
        'login_id',
        'type',
        'expires_at', // Optional: to track OTP expiry
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * Use this to cast attributes like dates or JSON fields automatically.
     */
    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * Set to `false` if the table does not have `created_at` and `updated_at`.
     */
    public $timestamps = true;

    /**
     * Define a relationship with the User model.
     *
     * Assuming your OTP is linked to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
