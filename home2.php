<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Patterns in PHP - Modern View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .pattern-section {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        h3 {
            color: #34495e;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        .output {
            background: #f8f9fa;
            padding: 15px;
            border-left: 4px solid #3498db;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Design Patterns in PHP - Modern Implementation</h1>

    <div class="pattern-section">
        <h3>Singleton Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/creational/Singleton.php';
                echo "Singleton: " . Singleton::getInstance()->operationTwo();
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Prototype Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/creational/Prototype.php';
                $originalJobPost = new JobPost("Senior PHP Developer");
                $duplicateJobPost = clone $originalJobPost;
                
                echo "Original Job Title: " . $originalJobPost->getTitle() . '<br>';
                echo "Original Job Status: " . $originalJobPost->getStatus() . '<br>';
                echo "Duplicate Job Title: " . $duplicateJobPost->getTitle() . '<br>';            
                echo "Duplicate Job Status: " . $duplicateJobPost->getStatus() . '<br>';
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Bridge Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/structural/Bridge.php';
                      
                $redCircle = new Circle(new RedColor());
                echo $redCircle->draw() . '<br>';

                $blueSquare = new Square(new BlueColor());
                echo $blueSquare->draw() . '<br>';
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Observer Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/behavioral/Observer.php';

                $weatherStation = new WeatherStation();
                $phoneDisplay = new PhoneDisplay();
                $tvDisplay = new TVDisplay();

                $weatherStation->addObserver($phoneDisplay);
                $weatherStation->addObserver($tvDisplay);

                $weatherStation->setTemperature(25.5);
                $weatherStation->setTemperature(30.0);
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Strategy Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/behavioral/Strategy.php';
                
                $data = [34, 7, 23, 32, 5, 62];

                $context = new SearchContext(new BubbleSortStrategy());
                echo "Bubble Sort: " . implode(", ", $context->executeStrategy($data)) . '<br>';
                
                $context->setStrategy(new QuickSortStrategy());
                echo "Quick Sort: " . implode(", ", $context->executeStrategy($data)) . '<br>';
            ?>
        </div>
    </div>
</body>
</html>
