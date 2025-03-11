<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Profiles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffe6e6;
        }
        .table-custom {
            background-color: #fff0f5;
        }
        .table-custom thead {
            background-color: #ffcccb;
        }
        .table-custom th, .table-custom td {
            border-color: #ffb6c1;
        }
        h2 {
            text-align: center;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">FAKE USER PROFILES</h2>
        <table class="table table-bordered table-striped table-custom">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>City, Province</th>
                    <th>Birthdate</th>
                    <th>Job Title</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < 5; $i++) {
                    $surname = $faker->lastName;
                    $firstName = $faker->firstName;
                    $fullName = $surname . ', ' . $firstName;

                    echo "<tr>";
                    echo "<td>" . $fullName . "</td>";
                    echo "<td>" . $faker->email . "</td>";
                    echo "<td>" . $faker->numerify('+63 9## ### ####') . "</td>";
                    echo "<td>" . $faker->city . ', ' . $faker->province . "</td>";
                    echo "<td>" . $faker->date($format = 'Y-m-d', $max = 'now') . "</td>";
                    echo "<td>" . $faker->jobTitle . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
