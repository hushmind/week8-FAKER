<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');

echo "<table border='1'>";
echo "<tr><th>Full Name</th><th>Email Address</th><th>Phone Number</th><th>Complete Address</th><th>Birthdate</th><th>Job Title</th></tr>";

for ($i = 0; $i < 5; $i++) {
    $surname = $faker->lastName;
    $firstName = $faker->firstName;
    $fullName = $surname . ', ' . $firstName;

    echo "<tr>";
    echo "<td>" . $fullName . "</td>";
    echo "<td>" . $faker->email . "</td>";
    echo "<td>" . $faker->numerify('+63 9## ### ####') . "</td>"; // Custom format for Philippine phone numbers
    echo "<td>" . $faker->address . "</td>";
    echo "<td>" . $faker->date($format = 'Y-m-d', $max = 'now') . "</td>";
    echo "<td>" . $faker->jobTitle . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
