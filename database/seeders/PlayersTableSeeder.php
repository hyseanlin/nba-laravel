<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function generateRandomName() {
        $first_name = $this->generateRandomString(rand(2, 15));
        $first_name = strtolower($first_name);
        $first_name = ucfirst($first_name);
        $last_name = $this->generateRandomString(rand(2, 15));
        $last_name = strtolower($last_name);
        $last_name = ucfirst($last_name);
        $name = $first_name . " ". $last_name;
        return $name;
    }
    public function generateRandomPosition() {
        $positions = array();
        $positions[] = 'Point Guard (PG)';
        $positions[] = 'Shooting Guard (SG)';  
        $positions[] = 'Small Forward (SF)';
        $positions[] = 'Power Forward (PF)';
        $positions[] = 'Center (C)';
        return $positions[rand(0, count($positions)-1)];
    }

    public function generateRandomNationality() {
        $nationalities = array();

        $nationalities[] = 'United States';
        $nationalities[] = 'Canada';
        $nationalities[] = 'France';
        $nationalities[] = 'Germany';
        $nationalities[] = 'Australia';
        $nationalities[] = 'Serbia';  
        $nationalities[] = 'Nigeria';
        $nationalities[] = 'Greece';
        $nationalities[] = 'Slovenia';
        $nationalities[] = 'Spain';
        $nationalities[] = 'Argentina';
        $nationalities[] = 'Brazil';
        $nationalities[] = 'Dominican Republic';
        $nationalities[] = 'Croatia';
        $nationalities[] = 'Turkey';
        $nationalities[] = 'Latvia';

        return $nationalities[rand(0, count($nationalities)-1)];

    }

    public function run()
    {
        $firstNames = array('John', 'Mary', 'James', 'Elizabeth', 'Robert', 'Jennifer', 'Michael', 'Linda', 'William', 'Barbara', 'David', 'Patricia', 'Richard', 'Jessica', 'Joseph', 'Susan', 'Thomas', 'Margaret', 'Charles', 'Sarah', 'Christopher', 'Karen', 'Daniel', 'Nancy', 'Matthew', 'Lisa', 'Anthony', 'Betty', 'Mark', 'Dorothy', 'Donald', 'Sandra', 'Steven', 'Ashley', 'Paul', 'Kimberly', 'Andrew', 'Emily', 'Joshua', 'Donna', 'Kenneth', 'Michelle', 'Kevin', 'Carol', 'Brian', 'Amanda', 'George', 'Melissa', 'Edward', 'Deborah', 'Ronald', 'Stephanie', 'Timothy', 'Rebecca', 'Jason', 'Laura', 'Jeffrey', 'Helen', 'Ryan', 'Sharon', 'Jacob', 'Cynthia', 'Gary', 'Kathleen', 'Nicholas', 'Amy', 'Eric', 'Shirley', 'Jonathan', 'Angela', 'Stephen', 'Anna', 'Larry', 'Brenda', 'Justin', 'Pamela', 'Scott', 'Nicole', 'Brandon', 'Emma', 'Benjamin', 'Samantha', 'Samuel', 'Katherine', 'Gregory', 'Christine', 'Frank', 'Debra', 'Alexander', 'Rachel', 'Raymond', 'Catherine', 'Patrick', 'Carolyn', 'Jack', 'Janet', 'Dennis', 'Ruth', 'Jerry', 'Maria', 'Tyler', 'Heather', 'Aaron', 'Diane', 'Jose', 'Virginia', 'Adam', 'Julie', 'Henry', 'Joyce', 'Nathan', 'Victoria', 'Douglas', 'Olivia', 'Zachary', 'Kelly', 'Peter', 'Christina', 'Kyle', 'Lauren', 'Walter', 'Joan', 'Ethan', 'Evelyn', 'Jeremy', 'Judith', 'Harold', 'Megan', 'Christian', 'Cheryl', 'Noah', 'Andrea', 'Gerald', 'Hannah', 'Keith', 'Martha', 'Roger', 'Jacqueline', 'Arthur', 'Frances', 'Lawrence', 'Gloria', 'Dylan', 'Teresa', 'Austin', 'Kathryn', 'Joe', 'Sara', 'Jesse', 'Janice', 'Albert', 'Jean', 'Bryan', 'Alice', 'Billy', 'Doris', 'Bruce', 'Abigail', 'Willie', 'Julia', 'Jordan', 'Judy', 'Alan', 'Rose', 'Ralph', 'Ann', 'Roy', 'Beverly', 'Juan', 'Denise', 'Wayne', 'Amber');
        $lastNames = array('Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor', 'Anderson', 'Thomas', 'Jackson', 'White', 'Harris', 'Martin', 'Thompson', 'Garcia', 'Martinez', 'Robinson', 'Clark', 'Rodriguez', 'Lewis', 'Lee', 'Walker', 'Hall', 'Allen', 'Young', 'Hernandez', 'King', 'Wright', 'Lopez', 'Hill', 'Scott', 'Green', 'Adams', 'Baker', 'Gonzalez', 'Nelson', 'Carter', 'Mitchell', 'Perez', 'Roberts', 'Turner', 'Phillips', 'Campbell', 'Parker', 'Evans', 'Edwards', 'Collins', 'Stewart', 'Sanchez', 'Morris', 'Rogers', 'Reed', 'Cook', 'Morgan', 'Bell', 'Murphy', 'Bailey', 'Rivera', 'Cooper', 'Richardson', 'Cox', 'Howard', 'Ward', 'Torres', 'Peterson', 'Gray', 'Ramirez', 'James', 'Watson', 'Brooks', 'Kelly', 'Sanders', 'Price', 'Bennett', 'Wood', 'Barnes', 'Ross', 'Henderson', 'Coleman', 'Jenkins', 'Perry', 'Powell', 'Long', 'Patterson', 'Hughes', 'Flores', 'Washington', 'Butler', 'Simmons', 'Foster', 'Gonzales', 'Bryant', 'Alexander', 'Russell', 'Griffin', 'Diaz', 'Hayes');  
        for ($i=0; $i<500; $i++)
        {
            $name = $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
            $position = $this->generateRandomPosition();
            $nationality = $this->generateRandomNationality();
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));
            $birthdate = Carbon::now()->subYears(rand(48, 60))->subMonths(rand(0, 12))->subRealDays(rand(0,31));
            $onboarddate = Carbon::now()->subYears(rand(18, 30))->subMonths(rand(0, 12))->subRealDays(rand(0,31));
            DB::table('players')->insert([
                'name' => $name,
                'tid' => rand(1, 25),
                'birthdate' => $birthdate,
                'onboarddate' => $onboarddate,
                'position' => $position,
                'height' => rand(165, 220),
                'weight' => rand(80, 120),
                'year' => rand(1, 15),
                'nationality' => $nationality,
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }
    }
}
