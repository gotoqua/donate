<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    use HasFactory;
    protected $fillable = ['donor_id', 'donate_interval', 'value_donate', 'form_pay'];
}
