<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTable extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'nombreIndicador' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => false,
        ],
        'codigoIndicador' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => false,
        ],
        'unidadMedidaIndicador' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => false,
        ],
        'valorIndicador' => [
            'type' => 'FLOAT',
            'null' => false,
        ],
        'fechaIndicador' => [
            'type' => 'DATE',
            'null' => false,
        ],
        'tiempoIndicador' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true,
        ],
        'origenIndicador' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => false,
        ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('indicadores');
    }

    public function down()
    {
      $this->forge->dropTable('indicadores');
    }
}
