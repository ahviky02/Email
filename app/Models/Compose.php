<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compose extends Model
{
    use HasFactory;
    protected $table = 'composes';
    protected $primaryKey = 'cid';
}
