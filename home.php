<html>
    <title>
        Design Patterns in PHP
    </title>

    <body>


        <h1>Design Patterns in PHP</h1>
        <br>
        <h3>Singleton Design Pattern</h3>
        <?php
            require_once __DIR__ . '/creational/Singleton.php';
            echo "Singleton: " . Singleton::getInstance()->operationTwo().'<br>';
        ?>

        <h3>Prototype Design Pattern</h3>
        <?php

            require_once __DIR__ . '/creational/Prototype.php';
            $originalJobPost = new JobPost("Web Developer");
            $duplicateJobPost = clone $originalJobPost;
            
            echo "Original Job Title: " . $originalJobPost->getTitle() . '<br>';
            echo "Original Job Status: " . $originalJobPost->getStatus() . '<br>';
            echo "Duplicate Job Title: " . $duplicateJobPost->getTitle() . '<br>';            
            echo "Duplicate Job Status: " . $duplicateJobPost->getStatus() . '<br>';
            
        ?>


        <h3>Adapter Design Pattern</h3>
        <?php

            require_once __DIR__ . '/structural/Adapter.php';
            
            $aggregatedTask = new AggregatedTask();
            $taskAdapter = new TaskAdapter($aggregatedTask);
            echo $taskAdapter->execute() . '<br>';

        ?>



        <h3>Bridge Design Pattern</h3>
        <?php

            require_once __DIR__ . '/structural/Bridge.php';
                  
            $redCircle = new Circle(new RedColor());
            echo $redCircle->draw() . '<br>';

            $blueSquare = new Square(new BlueColor());
            echo $blueSquare->draw() .  '<br>';

        ?>


        <h3>Composite Design Pattern</h3>
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

            echo $nestedComposite->operation().  '<br>';

        ?>

        <h3>Facade Design Pattern</h3>
        <?php

            require_once __DIR__ . '/structural/Facade.php';

            $subsystemA = new SubsystemA();
            $subsystemB = new SubsystemB();
            $facade = new Facade($subsystemA, $subsystemB);

            echo $facade->operationA().  '<br>';
            echo $facade->operationC().  '<br>';
        ?>

        <h3>Flyweight Design Pattern</h3>
        <?php

            require_once __DIR__ . '/structural/Flyweight.php';

            // Usage
            $iconFactory = new IconFactory();
            $iconManager = new IconManager($iconFactory);

            echo $iconManager->displayIcon('folder', 10, 20).  '<br>';
            echo $iconManager->displayIcon('file', 30, 40).  '<br>';
            echo $iconManager->displayIcon('folder', 50, 60).  '<br>';
            echo $iconManager->displayIcon('file', 70, 80).  '<br>';
        ?>



        <h3>Proxy Design Pattern</h3>
        <?php

            require_once __DIR__ . '/structural/Proxy.php';

            $image1 = new ProxyImage("photo1.jpg", true);
            $image2 = new ProxyImage("photo2.jpg", false);
            
            $image1->display();
            $image1->display(); 
            $image2->display(); 
        ?>



        <h3>Chain of Responsibility Design Pattern</h3>
        <?php

            require_once __DIR__ . '/behavioral/ChainResponsibility.php';

            $authHandler = new AuthHandler();
            $loggingHandler = new LoggingHandler();
            $validationHandler = new ValidationHandler();

            $authHandler->setNext($loggingHandler)->setNext($validationHandler);


            $requests = ["auth", "log", "validate", "unknown"];
            foreach ($requests as $request) {
                $result = $authHandler->handle($request);
                echo $result.  '<br>';
            }
        ?>


        <h3> Momento Design Pattern</h3>
        <?php

            require_once __DIR__ . '/behavioral/Momento.php';

            $document = new Document();
            $history = new History();

            $document->write("Hello, ");
            $history->push($document->save());

            $document->write("World!");
            $history->push($document->save());

            $document->write(" This is a test.");
            echo "Current Content: " . $document->getContent().  '<br>';

            $document->restore($history->pop());
            echo "After Undo: " . $document->getContent().  '<br>';

            $document->restore($history->pop());
            echo "After Second Undo: " . $document->getContent().  '<br>';

        ?>
        

        <h3> Observer Design Pattern</h3>
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



        <h3> State Design Pattern</h3>
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

        
        <h3> Strategy Design Pattern</h3>
        <?php
            
            require_once __DIR__ . '/behavioral/Strategy.php';

            $data = [34, 7, 23, 32, 5, 62];

            $context = new SearchContext(new BubbleSortStrategy());
            echo "Bubble Sort: " . implode(", ", $context->executeStrategy($data)).  '<br>';
            
            $context->setStrategy(new QuickSortStrategy());
            echo "Quick Sort: " . implode(", ", $context->executeStrategy($data)).  '<br>';
            
        ?>
        
        <h3> Template Design Pattern</h3>
        <?php
            
            require_once __DIR__ . '/behavioral/Template.php';
            $teaMaker = new TeaMaker();
            $teaMaker->prepareBeverage();
            
            $coffeeMaker = new CoffeeMaker();
            $coffeeMaker->prepareBeverage();

        ?>


    </body>
</html>