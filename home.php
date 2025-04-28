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



    </body>
</html>