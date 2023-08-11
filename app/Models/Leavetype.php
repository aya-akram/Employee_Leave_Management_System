<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leavetype extends Model
{
    use HasFactory;
    protected $table = 'leavetypes';

    protected $fillable = [
        'LeaveType',
        'Description',

    ];
    public function leaves()
{
    return $this->hasMany(Leave::class, 'leavetype_id');
}

}
