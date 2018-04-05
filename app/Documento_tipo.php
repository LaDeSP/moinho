<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Documento_tipo extends Model
{
	   protected $table = 'documento_tipo';

   /* public function documents()
    {
        return $this->hasMany(Document::class);
    }*/
    public $timestamps = false;
}