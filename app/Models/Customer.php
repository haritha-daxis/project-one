<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sale;

class Customer extends Model
{
    use HasFactory;
    protected $table="customer";
    protected $primaryKey="id";
  protected  $fillable = ['customer_name','customer_dob','customer_email'];

  public function sale(){
    return $this->hasMany(sale::class);
}
}
