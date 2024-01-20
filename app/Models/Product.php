<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Model;
   
class Product extends Model
{
    protected $fillable = [
        'foto', 'namabarang', 'hargabeli','hargajual','stock','created_at'
    ];
    //  protected $primaryKey = 'created_at';
}