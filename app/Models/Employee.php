<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'empcode', 'FirstName', 'LastName', 'EmailId', 'Password', 'Gender', 'Dob', 'Department',
        'Address', 'City', 'Country', 'PhoneNumber', 'Status', 'RegDate'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function leaves()
{
    return $this->hasMany(Leave::class, 'empid');
}

}
