<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'about_first_text',
        'about_second_text',
        'about_first_image',
        'about_second_image',
        'about_our_vision',
        'about_our_mission',
        'about_services',
    ];

    

}
