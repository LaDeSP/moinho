<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Documento_tipo;
use App\Inscricao;
class Documento extends Model
{
	protected $table = 'documento';

    public function documento_tipo()
    {
        return $this->belongsTo(Documento_tipo::class);
    }
    public function inscricao()
    {
        return $this->belongsTo(Inscricao::class);
    }
    public $timestamps = false;
}