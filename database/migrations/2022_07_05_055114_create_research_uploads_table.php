<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();
            $table->integer('sector_id')->nullable();
            $table->smallInteger('is_company')->nullable();
            $table->smallInteger('is_sector')->nullable();
            $table->string('title');
            $table->integer('rpt_category_id')->nullable();
            $table->integer('rpt_analyst_id')->nullable();
            $table->integer('rpt_type_id')->nullable();
            $table->text('description')->nullable();
            $table->string('doc_org_name')->nullable();
            $table->string('doc_new_name');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_uploads');
    }
}
