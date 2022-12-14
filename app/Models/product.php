<?php

namespace App\Models;

//use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sale;

class product extends Model
{
  //  use Uuids;
    //use HasFactory;
    use HasFactory;
    protected $table='product';
    protected $primaryKey ='id';
   //protected $foreignKey ='category_id';
    protected $fillable = ['product_name','price','category_id'];

    public function sale(){
      return $this->hasMany(sale::class);
  }
  public function category(){
      return $this->belongsTo(category::class,'category_id','category_id');
  }

}
