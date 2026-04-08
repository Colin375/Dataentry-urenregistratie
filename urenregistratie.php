<?php
// Ask for user input via the terminal
printf("Enter your work hours:\n");
$date    = readline("Date (DD-MM-YYYY): ");
$project = readline("Project name: ");
$hours   = readline("Number of hours: ");

// Format the data string for the CSV file
// We separate values with a semicolon and end by making a new line
$txt = $date . ";" . $project . ";" . $hours . "\n";

// Open the file
// If the file doesn't exist, PHP will create it for you
// If the file isn't available it will exit the program and print "Unable to open file!"
$myfile = fopen("urenregistratie.csv", "a") or die("Unable to open file!");

// Check if the file has any contents
// If the file doesn't exist or has no contents it will make the file with some text at the top
$filecontent = file_get_contents("urenregistratie.csv");
if($filecontent == "") {
    fwrite($myfile, "Date;Project;Hours\n");
}

// Write the final data into the file
fwrite($myfile, $txt);

// Close the file
fclose($myfile);

// If the code gets this far without a manual or automatic exit it will say it has been saved
printf("Hours have been saved successfully to urenregistratie.csv!\n");
?>
