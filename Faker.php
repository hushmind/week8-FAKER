<?php

require_once 'vendor/autoload.php';

$host = '127.0.0.1';
$db = 'your_database';
$user = 'your_username';
$pass = 'your_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


$faker = Faker\Factory::create('en_PH');


for ($i = 0; $i < 50; $i++) {
    $stmt = $pdo->prepare('INSERT INTO office (name, contactnum, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([
        $faker->company,
        $faker->phoneNumber,
        $faker->companyEmail,
        $faker->address,
        $faker->city,
        'Philippines',
        $faker->postcode
    ]);
}

for ($i = 0; $i < 200; $i++) {
    $office_id = $faker->numberBetween(1, 50);
    $stmt = $pdo->prepare('INSERT INTO employee (lastname, firstname, office_id, address) VALUES (?, ?, ?, ?)');
    $stmt->execute([
        $faker->lastName,
        $faker->firstName,
        $office_id,
        $faker->address
    ]);
}

for ($i = 0; $i < 500; $i++) {
    $employee_id = $faker->numberBetween(1, 200);
    $office_id = $faker->numberBetween(1, 50);
    $stmt = $pdo->prepare('INSERT INTO transaction (employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([
        $employee_id,
        $office_id,
        $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
        $faker->word,
        $faker->sentence,
        $faker->uuid
    ]);
}

echo "Data generation and insertion complete.";

?>