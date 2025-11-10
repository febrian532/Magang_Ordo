<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // Sudah benar

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'order_date', // pastikan kolom ini benar-benar ada di migrasi
    ];

    /**
     * Relasi ke User (setiap order dimiliki oleh satu user)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // tambahkan foreign key agar eksplisit
    }

    /**
     * Relasi ke detail order (jika punya tabel order_items)
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
