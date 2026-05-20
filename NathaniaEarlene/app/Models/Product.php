<?php

namespace App\Models;

use App\Policies\ProductPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//cara 2: mendaftarkan policy
#[UsePolicy(ProductPolicy::class)]
class Product extends Model
{
    use HasFactory;
    //Jika nama tabel tidak sesuai dgn konvensi
    //maka kita bisa mendefinisikan nama tabel secara eksplisit
    protected $table = 'products';

    // $fillable wajib didefinisikan agar mass assignment (Product::create())
    // dapat berjalan. Tanpa ini, Laravel melempar MassAssignmentException.
    protected $fillable = [
    'name', 'price', 'description', 'status', 'is_active', 'release_date',
    ];
}
