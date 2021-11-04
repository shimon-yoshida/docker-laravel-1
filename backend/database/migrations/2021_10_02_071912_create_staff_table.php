<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->unsignedBigInteger('id',true );
            $table->string('区分内容')->nullable()->default('NULL');
            $table->string('統計番号')->nullable()->default('NULL');
            $table->string('教職員番号')->nullable()->default('NULL');
            $table->string('担当者コード')->nullable()->default('NULL');
            $table->string('共済番号')->nullable()->default('NULL');
            $table->string('職名1')->nullable()->default('NULL');
            $table->string('職名2')->nullable()->default('NULL');
            $table->string('常勤非常勤')->nullable()->default('NULL');
            $table->string('地域')->nullable()->default('NULL');
            $table->string('キャンパス名')->nullable()->default('NULL');
            $table->string('職員氏名');
            $table->string('ふりがな');
            $table->string('ﾌﾘｶﾞﾅ')->nullable()->default('NULL');
            $table->string('性別')->nullable()->default('NULL');
            $table->string('高校教科免許1')->nullable()->default('NULL');
            $table->string('高校教科免許2')->nullable()->default('NULL');
            $table->string('高校教科免許3')->nullable()->default('NULL');
            $table->string('高校教科免許4')->nullable()->default('NULL');
            $table->string('高校教科免許5')->nullable()->default('NULL');
            $table->string('中学教科免許1')->nullable()->default('NULL');
            $table->string('中学教科免許2')->nullable()->default('NULL');
            $table->string('中学教科免許3')->nullable()->default('NULL');
            $table->string('中学教科免許4')->nullable()->default('NULL');
            $table->string('その他免許1')->nullable()->default('NULL');
            $table->string('その他免許2')->nullable()->default('NULL');
            $table->string('その他免許3')->nullable()->default('NULL');
            $table->string('その他免許4')->nullable()->default('NULL');
            $table->string('更新確認')->nullable()->default('NULL');
            $table->string('教免更新グループ')->nullable()->default('NULL');
            $table->date('修了確認期限')->nullable();
            $table->date('生年月日')->nullable();
            $table->date('雇用年月日')->nullable();
            $table->string('履歴')->nullable()->default('NULL');
            $table->string('郵便番号')->nullable()->default('NULL');
            $table->string('住所１')->nullable()->default('NULL');
            $table->string('住所２')->nullable()->default('NULL');
            $table->string('電話番号')->nullable()->default('NULL');
            $table->string('携帯番号')->nullable()->default('NULL');
            $table->string('在籍状況')->nullable()->default('NULL');
            $table->date('退職・休職年月日')->nullable();
            $table->string('退職理由')->nullable()->default('NULL');
            $table->string('退職願')->nullable()->default('NULL');
            $table->string('メールアドレス')->nullable()->default('NULL');
            $table->string('メールアドレス学内')->nullable()->default('NULL');
            $table->text('備考1')->nullable();
            $table->text('備考2')->nullable();
            $table->text('備考3')->nullable();
            $table->text('備考4')->nullable();
            $table->string('経路区分')->nullable()->default('NULL');
            $table->Integer('距離')->nullable();
            $table->Integer('通勤手当')->nullable();
            $table->Integer('適用交通費')->nullable();
            $table->string('自転車使用')->nullable()->default('NULL');
            $table->Integer('給与号俸')->nullable();
            $table->Integer('給与金額')->nullable();
            $table->Integer('調整手当')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
