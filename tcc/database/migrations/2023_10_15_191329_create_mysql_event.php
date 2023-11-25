<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateMysqlEvent extends Migration
{
    public function up()
    {
        // Verifica se o evento já existe antes de criá-lo
        $eventExists = DB::select("SELECT * FROM information_schema.events WHERE event_name = 'CopiaDados'");
        if (empty($eventExists)) {
            $eventSql = "
                CREATE EVENT `CopiaDados` 
                ON SCHEDULE EVERY 1 MONTH 
                STARTS CURRENT_TIMESTAMP
                DO 
                BEGIN 
                    SET @data_atual = NOW(); 
                    SET @mes = MONTH(@data_atual); 
                    SET @ano = YEAR(@data_atual); 
                    INSERT INTO `relatorio_mensal`(`mes`, `ano`, `saldo`, `entrada`, `saida`, `user_id`, `conta_id`) 
                    SELECT @mes, @ano, saldo, entrada, saida, user_id, id FROM conta_bancaria;
                    UPDATE `centrocusto` SET `valatual` = 0; 
                    UPDATE `conta_bancaria`
                    SET `entrada` = 0, `saida` = 0;
                END
            ";
            DB::unprepared($eventSql);
        }
    }

    public function down()
    {
        DB::unprepared("DROP EVENT IF EXISTS `CopiaDados`");
    }
}

