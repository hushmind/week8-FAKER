<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

echo "<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";
echo "<div class='container mt-5'>";
echo "<table class='table table-bordered'>";
echo "<thead style='background-color: #f8d7da;'>";
echo "<tr><th>User ID</th><th>Full Name</th><th>Email Address</th><th>Username</th><th>Password</th><th>Account Created</th></tr>";
echo "</thead>";
echo "<tbody>";

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

echo "</tbody>";
echo "</table>";
echo "</div>";
?>
