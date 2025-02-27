<?php

require_once 'vendor/autoload.php';

$host = '127.0.0.1';
$db = 'northwind'; 
$user = 'root';
$pass = 'admin'; 
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
    die("Connection failed: " . $e->getMessage());
}


$faker = Faker\Factory::create('en_PH');


$minEmpId = $pdo->query("SELECT MIN(id) FROM employees")->fetchColumn();
$maxEmpId = $pdo->query("SELECT MAX(id) FROM employees")->fetchColumn();

$minCustId = $pdo->query("SELECT MIN(id) FROM customers")->fetchColumn();
$maxCustId = $pdo->query("SELECT MAX(id) FROM customers")->fetchColumn();

$minShipperId = $pdo->query("SELECT MIN(id) FROM shippers")->fetchColumn();
$maxShipperId = $pdo->query("SELECT MAX(id) FROM shippers")->fetchColumn();

$minTaxStatusId = $pdo->query("SELECT MIN(id) FROM orders_tax_status")->fetchColumn();
$maxTaxStatusId = $pdo->query("SELECT MAX(id) FROM orders_tax_status")->fetchColumn();

$minStatusId = $pdo->query("SELECT MIN(id) FROM orders_status")->fetchColumn();
$maxStatusId = $pdo->query("SELECT MAX(id) FROM orders_status")->fetchColumn();

for ($i = 0; $i < 500; $i++) {

    $employee_id = $faker->numberBetween($minEmpId, $maxEmpId);
    $customer_id = $faker->numberBetween($minCustId, $maxCustId);
    $shipper_id = $faker->numberBetween($minShipperId, $maxShipperId);
    $status_id = $faker->numberBetween($minStatusId, $maxStatusId);


    $tax_status_id = $faker->boolean(70) ? $faker->numberBetween($minTaxStatusId, $maxTaxStatusId) : NULL;


    $order_date = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');
    $shipped_date = $faker->dateTimeBetween($order_date, 'now')->format('Y-m-d H:i:s');


    $paid_date = $faker->boolean(80) ? $faker->dateTimeBetween($order_date, 'now')->format('Y-m-d H:i:s') : NULL;

    $stmt = $pdo->prepare('INSERT INTO orders (employee_id, customer_id, order_date, shipped_date, shipper_id, ship_name, ship_address, ship_city, ship_state_province, ship_zip_postal_code, ship_country_region, shipping_fee, taxes, payment_type, paid_date, notes, tax_rate, tax_status_id, status_id) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

    $stmt->execute([
        $employee_id,
        $customer_id,
        $order_date,
        $shipped_date,
        $shipper_id,
        $faker->company,
        $faker->address,
        $faker->city,
        $faker->state,
        $faker->postcode,
        'Philippines',
        $faker->randomFloat(2, 50, 5000),
        $faker->randomFloat(2, 10, 1000),
        $faker->randomElement(['Credit Card', 'Bank Transfer', 'Cash On Delivery']),
        $paid_date,
        $faker->sentence,
        $faker->randomFloat(2, 5, 15),
        $tax_status_id,
        $status_id
    ]);
}

echo "Successfull Insertion/s of Orders";

?>
