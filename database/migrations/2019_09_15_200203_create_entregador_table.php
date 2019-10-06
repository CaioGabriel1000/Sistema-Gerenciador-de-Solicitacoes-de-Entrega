<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntregadorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entregador', function(Blueprint $table)
		{
			$table->integer('codigoEntregador', true);
			$table->string('nome', 45)->nullable();
			$table->integer('inicioJornadaTrabalho')->nullable();
			$table->integer('fimJornadaTrabalho')->nullable();
			$table->integer('codigoEstabelecimento')->nullable()->index('FK_Entregador_1');
		});

		// Inserindo entregador padrão
		DB::table('entregador')->insert(
			array(
				'nome' => 'entregador',
				'inicioJornadaTrabalho' => 0,
				'fimJornadaTrabalho' => 1440,
				'codigoEstabelecimento' => 1
			)
		);
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entregador');
	}

}
