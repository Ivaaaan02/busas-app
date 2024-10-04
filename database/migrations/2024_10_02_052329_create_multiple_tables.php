<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleTables extends Migration
{
    public function up()
    {
        // Create the student table
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix', 10)->nullable();
            $table->string('sex', 1);
            $table->string('address');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the campus table
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();
            $table->string('campus_name');
            $table->string('campus+_address');
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the college table
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campus_id')->references('id')->on('campuses');
            $table->string('college_name');
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the program table
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->references('id')->on('colleges');
            $table->string('program_name');
            $table->string('program_abbreviation', 20);
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the program_major table
        Schema::create('program_majors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->references('id')->on('programs');
            $table->string('program_major_name');
            $table->string('program_major_abbreviation', 20);
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the course table
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->references('id')->on('programs');
            $table->foreignId('program_major_id')->references('id')->on('program_majors');
            $table->string('descriptive_title');
            $table->string('course_code', 20);
            $table->string('course_unit', 5);
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the acad_year table
        Schema::create('acad_years', function (Blueprint $table) {
            $table->id();
            $table->string('year', 20);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the acad_term table
        Schema::create('acad_terms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acad_year_id')->references('id')->on('acad_years');
            $table->string('acad_term', 100);
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the signatory table
        Schema::create('signatories', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('position', 100);
            $table->boolean('status');
            $table->string('suffix', 10);
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the curriculum table
        Schema::create('curricula', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acad_year_id')->references('id')->on('acad_years');
            $table->string('curriculum_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
        });

        // Create the curricula_acad_term table
        Schema::create('curricula_acad_term', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curricula_id')->references('id')->on('curricula');
            $table->foreignId('acad_term_id')->references('id')->on('acad_terms');
            $table->timestamps();
            $table->dateTime('deleted_at');
        });

        // Create the program_curriculum table
        Schema::create('program_curricula', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->references('id')->on('programs');
            $table->foreignId('curricula_id')->references('id')->on('curricula');
            $table->timestamps();
            $table->dateTime('deleted_at');
        });

        // Create the student_graduation_info table
        Schema::create('student_graduation_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students');
            $table->date('graduation_date');
            $table->string('board_approval');
            $table->string('latin_honor', 100);
            $table->float('gwa', 5,4);
            $table->string('nstp_no', 100);
            $table->timestamps();
            $table->dateTime('deleted_at');
        });

        // Create the student_registration_info table
        Schema::create('student_registration_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students');
            $table->foreignId('acad_term_id')->references('id')->on('acad_terms');
            $table->string('last_school_attended');
            $table->year('last_year_attended');
            $table->string('category', 100);
            $table->float('gwa', 5,4);
            $table->string('nstp_no', 100);
            $table->timestamps();
            $table->dateTime('deleted_at');
        });

        // Create the student_record table
        Schema::create('student_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students');
            $table->foreignId('course_id')->references('id')->on('courses');
            $table->foreignId('acad_term_id')->references('id')->on('acad_terms');
            $table->string('final_grade', 10);
            $table->string('removal_rating');
            $table->timestamps();
            $table->dateTime('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('campuses');
        Schema::dropIfExists('colleges');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('program_majors');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('acad_years');
        Schema::dropIfExists('acad_terms');
        Schema::dropIfExists('signatories');
        Schema::dropIfExists('curricula');
        Schema::dropIfExists('curricula_acad_terms');
        Schema::dropIfExists('program_curricula');
        Schema::dropIfExists('student_graduation_infos');
        Schema::dropIfExists('student_registration_infos');
        Schema::dropIfExists('student_records');

    }
}
