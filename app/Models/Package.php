<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'price' , 'persons' , 'advantages'
    ];

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function delete()
    {
        $this->invitations()->delete();

        return parent::delete();
    }
}
