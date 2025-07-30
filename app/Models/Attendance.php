<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['employee_id', 'entry_ip', 'entry_time', 'entry_location', 'time'];

    public function employee()
    {
        return $this->belongsTo(Employee::class); // ← lebih baik seperti ini
    }
}
