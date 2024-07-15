<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    public $table = "layanan";
    protected $fillable = [
        'id_user',
        'title',
        'description',
        'status',
        'tanggapan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
