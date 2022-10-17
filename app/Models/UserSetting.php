<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;
    protected $table= "user_settings";
    protected $fillable = [
        'receive_sms_alerts',
        'receive_email_alerts',
        'phone',
        'email'
     ];
}
