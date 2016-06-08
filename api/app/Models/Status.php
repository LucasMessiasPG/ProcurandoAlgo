<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int id_usuario
 * @property string descricao
 * @package App
 */
class Status extends Model
{
    protected $table = 'status';
 
    protected $primaryKey = 'id_status';
    
    public $timestamps = false;
    
    protected $fillable = [
        'id_status',
        'descricao'
    ];
}
