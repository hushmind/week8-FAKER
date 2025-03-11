<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

$genres = ['Fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Romance', 'Thriller', 'Historical', 'Horror'];

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Generated Books</title>";
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "</head>";
echo "<body>";
echo "<div class='container mt-4'>";
echo "<table class='table table-bordered table-striped'>";
echo "<thead><tr><th>Title</th><th>Author</th><th>Genre</th><th>Publication Year</th><th>ISBN</th><th>Summary</th></tr></thead>";
echo "<tbody>";

for ($i = 0; $i < 15; $i++) {
    echo "<tr>";
    echo "<td>" . $faker->words(3, true) . "</td>";
    echo "<td>" . $faker->name . "</td>";
    echo "<td>" . $faker->randomElement($genres) . "</td>";
    echo "<td>" . $faker->year($min = 1900, $max = 2024) . "</td>";
    echo "<td>" . $faker->isbn13 . "</td>";
    echo "<td>" . $faker->paragraph . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</body>";
echo "</html>";
?>
