<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigoPedido
 * @property float $valorTotal
 * @property string $formaPagamento
 * @property string $observacoes
 * @property string $situacao
 * @property string $criacao
 * @property string $atualizacao
 * @property int $codigoCliente
 * @property Cliente $cliente
 * @property Entrega[] $entregas
 * @property Pagamento[] $pagamentos
 * @property PedidoProduto[] $pedidoProdutos
 */
class Pedido extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pedido';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigoPedido';

    /**
     * @var array
     */
    protected $fillable = ['valorTotal', 'formaPagamento', 'observacoes', 'situacao', 'criacao', 'atualizacao', 'codigoCliente'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'codigoCliente', 'codigoCliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entregas()
    {
        return $this->hasMany('App\Entrega', 'codigoPedido', 'codigoPedido');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagamentos()
    {
        return $this->hasMany('App\Pagamento', 'codigoPedido', 'codigoPedido');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidoProdutos()
    {
        return $this->hasMany('App\PedidoProduto', 'codigoPedido', 'codigoPedido');
    }
}
