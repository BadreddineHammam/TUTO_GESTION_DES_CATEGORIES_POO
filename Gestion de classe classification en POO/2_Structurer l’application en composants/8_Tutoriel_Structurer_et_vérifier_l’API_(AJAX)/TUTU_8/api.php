<?php
// ranssayfto data dyal json l app.js wajad rassak a server
header('Content-Type: application/json');

// database dyalna
$excuses = [
    "It worked perfectly on my machine 🤷‍♂️",
    "Must be a cache issue. Try clearing it and crying.",
    "That's not a bug, it's an undocumented feature 🐛✨",
    "I pushed code to production because I like living dangerously.",
    "The WiFi is acting up, blame the router.",
    "Mercury is in retrograde, code naturally fails today."
];

// Pick a random excuse from the array
$randomIndex = array_rand($excuses);
$selectedExcuse = $excuses[$randomIndex];

// Send it back as a JSON response (Matches Step 4 of your diagram!)
echo json_encode(["excuse" => $selectedExcuse]);
?>