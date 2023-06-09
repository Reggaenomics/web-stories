<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stylesheet.css">
    <title>Web Stories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="triangle"></div>
        <a class="nav-text" href="#">Web Stories</a>
        <div class="triangle flipped"></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1>Welcome to Web Stories</h1>

        <div class="text-box">
            <?php
            echo "I will post some of my extensive works in this PHP-built website to practice coding out PHP objects." . "<br>";
           
            // Read the contents of titles.json
            $titleJson = file_get_contents('title.json');
            $linesJson = file_get_contents('lines.json');

            // Decode the JSON data into a PHP array
            $title = json_decode($titleJson, true);
            $lines = json_decode($linesJson, true);
            
            // Access the titles
            echo "<br>" . "Title: " . $title . "<br>";

            foreach ($lines as $line) {
                echo $line . "<br>";
            }

            ?>
        </div>

        <br>
        
        <div class="row">
            <div class="col-sm-4">
                <button class="btn btn-primary btn-lg btn-block my-CTA">Click Me For New Story</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>