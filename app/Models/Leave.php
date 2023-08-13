<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'LeaveType',
        'ToDate',
        'FromDate',
        'Description',
        'PostingDate',
        'AdminRemark',
        'AdminRemarkDate',
        'Status',
        'IsRead',
        'empid',
    ];
    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leavetype_id');
    }

protected $attributes = [
    'Status' => 'Pending', // Set default status to Approved
];
public function employee()
{
    return $this->belongsTo(Employee::class, 'empid');
}


}
