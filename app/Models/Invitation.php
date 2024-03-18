<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id' , 'package_id' , 'invitation_type_template_id',
        'title' ,'header' , 'sponsor' ,'date' ,'time' ,'date_format' ,
        'city' , 'address' , 'sign' , 'send_method'
    ];

    protected $dates = ['date'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(InvitationTypeTemplate::class , 'invitation_type_template_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class , 'invitation_id');
    }
}
