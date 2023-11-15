<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

// /**
//  *Usado como modelo para interagir com a tabela products no banco de dados, com esse modelo se pode realizar operações CRUD nos registros usando o método eloquent
// */

// class Product extends Model
// {
//     use HasFactory;

//     protected $table = 'products';//aqui está definida a tabela de banco de dados associada ao model

//     protected $fillable = [
//         'name',
//         'quanty',
//         'description',
//         'category',
//         'value'

//     ];
//     //aqui estão especificados os atributos do model que são atribuidos em massa

// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Importe outras classes se necessário, como Category para relacionamentos

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'quanty',
        'description',
        'category',
        'value'
    ];

    // Relacionamento com a tabela Category (exemplo)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Acessor para formatar o valor do produto
    public function getFormattedValueAttribute()
    {
        return '$' . number_format($this->value, 2);
    }

    // Mutador para garantir que a quantidade seja um valor não negativo
    public function setQuantyAttribute($value)
    {
        $this->attributes['quanty'] = max(0, $value);
    }

    // Escopo de consulta para filtrar produtos por uma determinada categoria
    public function scopeOfCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }
}

