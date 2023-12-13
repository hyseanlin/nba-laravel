<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
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
    
    public function generateRandomZone()
    {
        $zones = ['Eastern Conference', 'Western Conference'];
        return $zones[rand(0, count($zones) - 1)];
    }
    public function generateRandomCity()
    {
        $cities = array('New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia', 'San Antonio', 'San Diego', 'Dallas', 'San Jose', 'Austin', 'Jacksonville', 'Fort Worth', 'Columbus', 'Charlotte', 'Indianapolis', 'Seattle', 'Denver', 'Washington DC', 'Boston', 'El Paso', 'Nashville', 'Oklahoma City', 'Las Vegas', 'Detroit', 'Portland', 'Memphis', 'Louisville', 'Milwaukee', 'Baltimore', 'Albuquerque', 'Tucson', 'Fresno', 'Sacramento', 'Kansas City', 'Atlanta', 'Omaha', 'Colorado Springs', 'Raleigh', 'Miami', 'Cleveland', 'Virginia Beach', 'Oakland', 'Minneapolis', 'Tulsa', 'Wichita', 'Arlington', 'New Orleans', 'Bakersfield', 'Tampa', 'Anaheim', 'Honolulu', 'Aurora', 'Santa Ana', 'St. Louis', 'Riverside', 'Corpus Christi', 'Pittsburgh', 'Lexington', 'Anchorage', 'Stockton', 'Cincinnati', 'St. Paul', 'Toledo', 'Newark', 'Greensboro', 'Plano', 'Henderson', 'Lincoln', 'Buffalo', 'Jersey City', 'Chula Vista', 'Fort Wayne', 'Orlando', 'St. Petersburg', 'Chandler', 'Laredo', 'Norfolk', 'Durham', 'Madison', 'Lubbock', 'Irvine', 'Winston-Salem', 'Glendale', 'Garland', 'Hialeah', 'Reno', 'Chesapeake', 'Gilbert', 'Baton Rouge', 'Irving', 'Scottsdale', 'North Las Vegas', 'Fremont', 'Boise', 'Richmond', 'San Bernardino', 'Birmingham', 'Spokane', 'Rochester', 'Des Moines', 'Modesto', 'Fayetteville', 'Tacoma', 'Oxnard', 'Fontana', 'Columbus', 'Montgomery', 'Moreno Valley', 'Shreveport', 'Aurora', 'Yonkers', 'Akron', 'Huntington Beach', 'Little Rock', 'Augusta', 'Amarillo', 'Glendale', 'Mobile', 'Grand Rapids', 'Salt Lake City', 'Tallahassee', 'Huntsville', 'Grand Prairie', 'Knoxville', 'Worcester', 'Newport News', 'Brownsville', 'Overland Park', 'Santa Clarita', 'Providence', 'Garden Grove', 'Chattanooga', 'Oceanside', 'Jackson', 'Fort Lauderdale', 'Santa Rosa', 'Rancho Cucamonga', 'Port St. Lucie', 'Tempe', 'Ontario', 'Vancouver', 'Cape Coral', 'Sioux Falls', 'Springfield', 'Peoria', 'Pembroke Pines', 'Elk Grove', 'Salem', 'Lancaster', 'Corona', 'Eugene', 'Palmdale', 'Salinas', 'Springfield', 'Pasadena', 'Fort Collins', 'Hayward', 'Pomona', 'Cary', 'Rockford', 'Alexandria', 'Escondido', 'McKinney', 'Kansas City', 'Joliet', 'Sunnyvale', 'Torrance', 'Bridgeport', 'Lakewood', 'Hollywood', 'Paterson', 'Naperville', 'Syracuse', 'Mesquite', 'Dayton', 'Savannah', 'Clarksville', 'Orange', 'Pasadena', 'Fullerton', 'Killeen', 'Frisco', 'Hampton', 'McAllen', 'Warren', 'Bellevue', 'West Valley City', 'Columbia', 'Olathe', 'Sterling Heights', 'New Haven', 'Miramar', 'Waco', 'Thousand Oaks', 'Cedar Rapids', 'Charleston', 'Visalia', 'Topeka', 'Elizabeth', 'Gainesville', 'Thornton', 'Roseville', 'Carrollton', 'Coral Springs', 'Stamford', 'Simi Valley', 'Concord', 'Hartford', 'Kent', 'Lafayette', 'Midland', 'Surprise', 'Denton', 'Victorville', 'Evansville', 'Santa Clara', 'Abilene', 'Athens', 'Vallejo', 'Allentown', 'Norman', 'Beaumont', 'Independence', 'Murfreesboro', 'Ann Arbor', 'Springfield', 'Berkeley', 'Peoria', 'Provo', 'El Monte', 'Columbia', 'Lansing', 'Fargo', 'Downey', 'Costa Mesa', 'Wilmington', 'Arvada', 'Inglewood', 'Miami Gardens', 'Carlsbad', 'Westminster', 'Rochester', 'Odessa', 'Manchester', 'Elgin', 'West Jordan', 'Round Rock', 'Clearwater', 'Waterbury', 'Gresham', 'Fairfield', 'Billings', 'Lowell', 'Ventura', 'Pueblo', 'High Point', 'West Covina', 'Richmond', 'Murrieta', 'Cambridge', 'Antioch', 'Temecula', 'Norwalk', 'Centennial', 'Everett', 'Palm Bay', 'Wichita Falls', 'Green Bay', 'Daly City', 'Burbank', 'Richardson', 'Pompano Beach', 'North Charleston', 'Broken Arrow', 'Boulder', 'West Palm Beach', 'Santa Maria', 'El Cajon', 'Davenport', 'Rialto', 'Las Cruces', 'San Mateo', 'Lewisville', 'South Bend');

        return $cities[rand(0, count($cities) - 1)];
    }

    public function generateTeamName()
    {
        $colors = array('Red', 'Blue', 'Green', 'Yellow', 'Orange', 'Purple', 'Black', 'White', 'Gray', 'Brown', 'Gold', 'Silver');
        $animals = array('Tigers', 'Lions', 'Bears', 'Wolves', 'Eagles', 'Hawks', 'Panthers', 'Wildcats', 'Bulldogs', 'Giants', 'Titans', 'Warriors');
        $descriptors = array('Raging', 'Roaring', 'Charging', 'Blazing', 'Rushing', 'Scoring', 'Fighting', 'Soaring', 'Striking', 'Crashing', 'Smashing', 'Bashing');

        $color = $colors[array_rand($colors)];
        $animal = $animals[array_rand($animals)];
        $descriptor = $descriptors[array_rand($descriptors)];            

        return $descriptor . ' ' . $color . ' ' . $animal;
    }

    public function generateFieldName()
    {

        $adjectives = array('Green', 'Golden', 'Grand', 'Rolling', 'Silent', 'Windy', 'Red', 'Blue', 'Emerald', 'Crystal', 'Silver', 'Shining', 'New', 'Old', 'Ancient', 'Secret');

        $nouns = array('Fields', 'Valley', 'Hills', 'Meadows', 'Gardens', 'Forest', 'Courts', 'Oaks', 'Pines', 'Maples', 'Brook', 'River', 'Lake', 'Mill', 'Orchard', 'Park', 'Reserve');

        $adjective = $adjectives[array_rand($adjectives)];
        $noun = $nouns[array_rand($nouns)];
        
        return $adjective . ' ' . $noun;
    }

    public function run()
    {
    
        
        for ($i=0; $i<25; $i++) {
            $name = $this->generateTeamName();
            $city = $this->generateRandomCity();
            $zone = $this->generateRandomZone();
            $home = $this->generateFieldName();
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

            DB::table('teams')->insert([
                'name' => $name,
                'zone' => $zone,
                'city' => $city,
                'home' => $home,
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }
    }
}
