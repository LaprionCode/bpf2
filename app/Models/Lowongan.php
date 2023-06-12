<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Lowongan extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'id', 'gambar', 'judul','slug','perusahaan','posisi','persyaratan','batas_waktu','user_id','created_at','updated_at'
    ];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftars()
    {
        return $this->hasMany(Pendaftar::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
