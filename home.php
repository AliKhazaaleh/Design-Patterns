<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Patterns in PHP</title>
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
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-top: 40px;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
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
    <h1>Design Patterns in PHP</h1>

    <!-- Creational Patterns Section -->
    <h2>Creational Patterns</h2>

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
                $originalJobPost = new JobPost("Web Developer");
                $duplicateJobPost = clone $originalJobPost;
                
                echo "Original Job Title: " . $originalJobPost->getTitle() . '<br>';
                echo "Original Job Status: " . $originalJobPost->getStatus() . '<br>';
                echo "Duplicate Job Title: " . $duplicateJobPost->getTitle() . '<br>';            
                echo "Duplicate Job Status: " . $duplicateJobPost->getStatus() . '<br>';
            ?>
        </div>
    </div>

    <!-- Structural Patterns Section -->
    <h2>Structural Patterns</h2>

    <div class="pattern-section">
        <h3>Adapter Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/structural/Adapter.php';
                $aggregatedTask = new AggregatedTask();
                $taskAdapter = new TaskAdapter($aggregatedTask);
                echo $taskAdapter->execute();
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
                echo $blueSquare->draw();
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Composite Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/structural/Composite.php';
                $leaf1 = new Leaf("Leaf 1");
                $leaf2 = new Leaf("Leaf 2");
                $composite = new Composite();
                $composite->add($leaf1);
                $composite->add($leaf2);
                $nestedComposite = new Composite();
                $nestedComposite->add(new Leaf("Leaf 3"));
                $nestedComposite->add($composite);
                echo $nestedComposite->operation();
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Facade Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/structural/Facade.php';
                $subsystemA = new SubsystemA();
                $subsystemB = new SubsystemB();
                $facade = new Facade($subsystemA, $subsystemB);
                echo $facade->operationA() . '<br>';
                echo $facade->operationC();
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Flyweight Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/structural/Flyweight.php';
                $iconFactory = new IconFactory();
                $iconManager = new IconManager($iconFactory);
                echo $iconManager->displayIcon('folder', 10, 20) . '<br>';
                echo $iconManager->displayIcon('file', 30, 40) . '<br>';
                echo $iconManager->displayIcon('folder', 50, 60) . '<br>';
                echo $iconManager->displayIcon('file', 70, 80);
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Proxy Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/structural/Proxy.php';
                $image1 = new ProxyImage("photo1.jpg", true);
                $image2 = new ProxyImage("photo2.jpg", false);
                $image1->display();
                $image1->display(); 
                $image2->display(); 
            ?>
        </div>
    </div>

    <!-- Behavioral Patterns Section -->
    <h2>Behavioral Patterns</h2>

    <div class="pattern-section">
        <h3>Chain of Responsibility Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/behavioral/ChainResponsibility.php';
                $authHandler = new AuthHandler();
                $loggingHandler = new LoggingHandler();
                $validationHandler = new ValidationHandler();
                $authHandler->setNext($loggingHandler)->setNext($validationHandler);
                $requests = ["auth", "log", "validate", "unknown"];
                foreach ($requests as $request) {
                    $result = $authHandler->handle($request);
                    echo $result . '<br>';
                }
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Memento Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/behavioral/Momento.php';
                $document = new Document();
                $history = new History();
                $document->write("Hello, ");
                $history->push($document->save());
                $document->write("World!");
                $history->push($document->save());
                $document->write(" This is a test.");
                echo "Current Content: " . $document->getContent() . '<br>';
                $document->restore($history->pop());
                echo "After Undo: " . $document->getContent() . '<br>';
                $document->restore($history->pop());
                echo "After Second Undo: " . $document->getContent() . '<br>';
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
        <h3>State Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/behavioral/State.php';
                $vendingMachine = new VendingMachineContext();
                $vendingMachine->setState(new ReadyState());
                $vendingMachine->request();
                $vendingMachine->setState(new ProductSelectedState());
                $vendingMachine->request();
                $vendingMachine->setState(new PaymentPendingState());
                $vendingMachine->request();
                $vendingMachine->setState(new OutOfStockState());
                $vendingMachine->request();
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
                echo "Quick Sort: " . implode(", ", $context->executeStrategy($data));
            ?>
        </div>
    </div>

    <div class="pattern-section">
        <h3>Template Design Pattern</h3>
        <div class="output">
            <?php
                require_once __DIR__ . '/behavioral/Template.php';
                $teaMaker = new TeaMaker();
                $teaMaker->prepareBeverage();
                $coffeeMaker = new CoffeeMaker();
                $coffeeMaker->prepareBeverage();
            ?>
        </div>
    </div>

</body>
</html>