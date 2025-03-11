<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

echo "<table border='1'>";
echo "<tr><th>User ID</th><th>Full Name</th><th>Email Address</th><th>Username</th><th>Password</th><th>Account Created</th></tr>";

for ($i = 0; $i < 10; $i++) {
    $password = $faker->password;
    $encryptedPassword = hash('sha256', $password);

    echo "<tr>";
    echo "<td>" . $faker->uuid . "</td>";
    echo "<td>" . $faker->name . "</td>";
    echo "<td>" . $faker->email . "</td>";
    echo "<td>" . strtolower(explode('@', $faker->email)[0]) . "</td>";
    echo "<td>" . $encryptedPassword . "</td>";
    echo "<td>" . $faker->dateTimeBetween('-2 years')->format('Y-m-d H:i:s') . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
