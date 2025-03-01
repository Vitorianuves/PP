<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE TABLE eventos (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            nome VARCHAR(150) NOT NULL,
            tipo VARCHAR(50) NOT NULL,
            descricao VARCHAR(100) NOT NULL,
            endereco VARCHAR(100) NOT NULL,
            link VARCHAR(500) NULL,
            preco DECIMAL(10, 2) NOT NULL,
            data DATE NOT NULL,
            hora TIME NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
        );
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS eventos");
    }
};
