<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week2</title>
</head>
<body>

    <!-- Learning echo -->
    <?php
     echo "<h1>Hello World!</h1>";
     echo "<p> My name is Ragini Shirwalkar.</p>";
    ?>

    <hr>

    <!-- Learning Variables -->
    <?php
    $fname = "Ragini";
    $lname = "Shirwalkar";  // Fixed typo: changed 'lanme' to 'lname'
    
    echo "<h1>Hello " . $fname . " " . $lname . "</h1>"; 
    ?>

    <hr>

    <!-- Learning Arrays -->
    <?php
    $people = array(
        'Jane',
        'Bill',
        'Harminder'
    );
    
    // Display the array contents in the same echo style
    echo "<h2>People in the array:</h2>";
    echo "<p>" . $people[0] . "</p>";
    echo "<p>" . $people[1] . "</p>";
    echo "<p>" . $people[2] . "</p>";
    ?>

</body>
</html>