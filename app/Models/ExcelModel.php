<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelModel extends Model
{
    use HasFactory;
    
    protected $table = 'excel';

    protected $fillable = [
        'id',
        'scheme_code',
        'scheme_name',
        'central_state_scheme',
        'fin_year',
        'state_disbursement',
        'central_disbursement',
        'total_disbursement'      
    ];
}