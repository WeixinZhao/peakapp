<?php


class UserTableSeeder extends Seeder {


	public function run()
	{
		
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++)
        {
            $user = User::create(array(
                
                'username' => $faker->unique()->userName,
               // 'password' => $faker->word,
                'password' => Hash::make($faker->word);
                'remember_token' => str_random(50)
            ));
        }


	}

}




?>


