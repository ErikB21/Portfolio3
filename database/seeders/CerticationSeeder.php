<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CerticationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('certifications')->insert([
            [
                'user_id' => 1,
                'title_certifications' => 'CRM & Digital Project Specialist',
                'company_certifications' => 'Experis Italia',
                'date_relase_certifications' => '2023-07-01',
                'url_certifications' => '',
                'id_certifications' => '002PROTD23328570ID',
                'image_certifications'  => 'https://www.kilometrorosso.com/wp-content/uploads/2017/10/Experis_Accademy.png',
            ],
            [
                'user_id' => 1,
                'title_certifications' => 'Laravel 10',
                'company_certifications' => 'Udemy',
                'date_relase_certifications' => '2023-05-12',
                'url_certifications' => 'https://www.udemy.com/certificate/UC-a287edab-9f6b-45d6-9ef8-2a277bd98bbe/',
                'id_certifications' => '',
                'image_certifications'  => 'https://www.skillfinder.com.au/media/wysiwyg/udemylogo.png',
            ],
            [
                'user_id' => 1,
                'title_certifications' => 'Sviluppo Web PHP 8 e MySQL',
                'company_certifications' => 'Udemy',
                'date_relase_certifications' => '2023-02-13',
                'url_certifications' => 'https://www.udemy.com/certificate/UC-34894281-e647-4087-be77-e48908c66ea3/',
                'id_certifications' => '',
                'image_certifications'  => 'https://www.skillfinder.com.au/media/wysiwyg/udemylogo.png',
            ],
            [
                'user_id' => 1,
                'title_certifications' => 'Full Stack Web Developer',
                'company_certifications' => 'Boolean Careers',
                'date_relase_certifications' => '2022-11-25',
                'url_certifications' => 'https://www.credential.net/c96a66dc-8275-4e92-b1a8-a7995817869e',
                'id_certifications' => '',
                'image_certifications'  => 'https://www.comparacorsi.it/wp-content/uploads/2023/07/boolean.png',
            ],

        ]);
    }
}
