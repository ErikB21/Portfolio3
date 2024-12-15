<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            ['name' => 'HTML', 'type' => 'Front-end', 'category' => 'Linguaggio di markup', 'skill_image' => '', 'url' => 'https://developer.mozilla.org/en-US/docs/Web/HTML', 'user_id' => 1],
            ['name' => 'CSS', 'type' => 'Front-end', 'category' => 'Linguaggio di styling', 'skill_image' => '', 'url' => 'https://developer.mozilla.org/en-US/docs/Web/CSS', 'user_id' => 1],
            ['name' => 'JavaScript', 'type' => 'Full-stack', 'category' => 'Linguaggio di programmazione', 'skill_image' => '', 'url' => 'https://developer.mozilla.org/en-US/docs/Web/JavaScript', 'user_id' => 1],
            ['name' => 'PHP', 'type' => 'Back-end', 'category' => 'Linguaggio di programmazione', 'skill_image' => '', 'url' => 'https://www.php.net/manual/it/index.php', 'user_id' => 1],
            ['name' => 'Apex', 'type' => 'Back-end', 'category' => 'Linguaggio di programmazione', 'skill_image' => '', 'url' => 'https://developer.salesforce.com/docs/atlas.en.apexcode.meta/apexcode/', 'user_id' => 1],
            ['name' => 'Laravel', 'type' => 'Back-end', 'category' => 'Framework PHP', 'skill_image' => '', 'url' => 'https://laravel.com/docs', 'user_id' => 1],
            ['name' => 'Vue.js', 'type' => 'Front-end', 'category' => 'Framework JS', 'skill_image' => '', 'url' => 'https://vuejs.org/v2/guide/', 'user_id' => 1],
            ['name' => 'Bootstrap', 'type' => 'Front-end', 'category' => 'Framework CSS', 'skill_image' => '', 'url' => 'https://getbootstrap.com/docs/5.3/getting-started/introduction/', 'user_id' => 1],
            ['name' => 'Tailwind CSS', 'type' => 'Front-end', 'category' => 'Framework CSS', 'skill_image' => '', 'url' => 'https://tailwindcss.com/docs', 'user_id' => 1],
            ['name' => 'Salesforce', 'type' => 'Back-end', 'category' => 'Strumento Salesforce', 'skill_image' => '', 'url' => 'https://www.salesforce.com/products/platform/overview/', 'user_id' => 1],
            ['name' => 'MySQL', 'type' => 'Back-end', 'category' => 'Database', 'skill_image' => '', 'url' => 'https://dev.mysql.com/doc/', 'user_id' => 1],
            ['name' => 'MAMP', 'type' => 'Back-end', 'category' => 'Server Web', 'skill_image' => '', 'url' => 'https://www.mamp.info/en/documentation/', 'user_id' => 1],
            ['name' => 'Laragon', 'type' => 'Back-end', 'category' => 'Ambiente di sviluppo', 'skill_image' => '', 'url' => 'https://laragon.org/docs/', 'user_id' => 1],
        ]);
    }
}
