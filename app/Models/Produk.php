<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'satuan',
        'kategori',
        'brand',
        'deskripsi',
        'harga',
        'stok',
    ];

    public function team(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }
}
