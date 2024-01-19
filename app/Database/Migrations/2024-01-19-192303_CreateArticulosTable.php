<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticulosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'keyword' => [
                'type' => 'TEXT',
            ],
            'minage' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'maxage' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'portrait' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'thumbnail' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'synthesis' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('articulos');
    }

    public function down()
    {
        $this->forge->dropTable('articulos');
    }
}