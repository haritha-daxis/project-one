<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer;
use App\Models\product;

class sale extends Model
{
    use HasFactory;
    protected $table='sales';
    protected $primaryKey='sales_id';
    protected $foreignKey='product_name';
    protected $foreignKey2='customer_id';
    protected $fillable=['product_name','sales_qty','customer_id'];

    public function customer(){
        return $this->belongsTo(customer::class,'customer_id','customer_id');
    }

    public function product(){
        return $this->belongsTo(product::class,'product_name','product_name');
    }
}
