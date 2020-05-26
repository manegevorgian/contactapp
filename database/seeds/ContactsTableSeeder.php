<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactsTableSeeder extends Seeder
{

    public function run()
    {
        factory(Contact::class,50)->create();
    }
}
