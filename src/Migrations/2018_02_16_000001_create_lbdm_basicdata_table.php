<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLbdmBasicdataTable extends Migration
{

    private $table = 'lbdm_basicdata';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('parent_id')->nullable()->default(null)->unsigned();
            $table->string('title',255)->nullable()->default(null);
            $table->string('dev_title',255)->nullable()->default(null);
            $table->string('comment',255)->nullable()->default(null);
            $table->string('dev_comment',255)->nullable()->default(null);
            $table->enum('undeletable', array('0','1'))->nullable()->default('0');
            $table->enum('fixed', array('0','1'))->nullable()->default('0');
            $table->integer('order')->nullable()->default(null);
            $table->string('extra_field',255)->nullable()->default(null);
            $table->integer('created_by')->nullable()->default(null)->unsigned();
            $table->enum('is_active', array('0','1'))->nullable()->default('1');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE lbdm_basicdata ADD unique_md5_dev_title CHAR (32) AS (MD5(CONCAT_WS('X',dev_title,deleted_at))) PERSISTENT UNIQUE");
        //\DB::unprepared(file_get_contents(__DIR__.'/sql/customer_tokens.sql') );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }

}
