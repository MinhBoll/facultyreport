<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faculty_id');
            $table->integer('department');
            $table->integer('total_prefered_papers');
            $table->integer('total_prefered_papers_wstudents');
            $table->integer('total_nonprefered_papers');
            $table->integer('books');
            $table->integer('book_chapters');
            $table->integer('manuscripts');
            $table->integer('conferences');
            $table->integer('conferences_wspeaker');
            $table->integer('student_conferences');
            $table->integer('external_proposals');
            $table->integer('cuny_proposals');
            $table->integer('external_grant_awarded');
            $table->integer('cuny_grant_awarded');
            $table->integer('extotal_amount_awarded');
            $table->integer('cunytotal_amount_awarded');
            $table->integer('nbr_faculty_nominated');
            $table->integer('honors_awards');
            $table->integer('phd_students_mentored');
            $table->integer('ms_students_mentored');
            $table->integer('undergrad_students_mentored');
            $table->integer('postdocs_supervised');
            $table->integer('defense');
            $table->string('student_awards');
            $table->string('awards');
            $table->integer('bs_awarded');
            $table->integer('ms_awarded');
            $table->integer('phd_awarded');
            $table->integer('year');
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
        Schema::dropIfExists('reports');
    }
}
