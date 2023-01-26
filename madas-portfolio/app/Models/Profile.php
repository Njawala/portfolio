<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'firstname',
        'lastname',
        'date_of_birth',
        'gender',
        'country',
        'city',
        'phone',
        'email',
        'webisite',
        'freelance',

    ];

    protected $table = "profiles";
    protected $primaryKey = "id";

    protected $keyType = "bigIncrements";

    public function skill(){
        return $this->hasOne(Skills::class);
    }

    public function resume(){
        return $this->hasOne(Resume::class);
    }

    

}
