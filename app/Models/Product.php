<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 *Usado como modelo para interagir com a tabela products no banco de dados, com esse modelo se pode realizar operações CRUD nos registros usando o método eloquent
*/

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';//aqui está definida a tabela de banco de dados assiciada ao model

    protected $fillable = [
        'name',
        'quanty',
        'description',
        'category',
        'value'

    ];
    //aqui estão especificados os atributos do model que são atribuidos em massa

}
