<?php

use App\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'manager';

    /**
     * Run the migrations.
     * @table manager
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('编号');
            $table->string('account', 100)->default('')->comment('帐号（唯一值，但不是唯一键）');
            $table->char('phone', 11)->default('')->comment('手机号');
            $table->string('password')->default('')->comment('密码');
            $table->integer('create_time')->default('0')->comment('创建时间');
            $table->tinyInteger('status')->default('1')->comment('状态（0 为禁用 , 1 正常）');
            $table->text('remark')->nullable()->default(null)->comment('备注');

            $table->index(["status"], 'status');

            $table->index(["phone"], 'phone');

            $table->index(["account"], 'account');

            $table->comment='管理员表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
