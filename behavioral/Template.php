<?php

// Template Design Pattern
// The Template Design Pattern defines the skeleton of an algorithm in a method, deferring some steps to subclasses.
// It allows subclasses to redefine certain steps of an algorithm without changing the algorithm's structure. 
// This pattern is useful when you have a common algorithm with some variations in its steps.
// The pattern consists of two main components: the Template Method and Concrete Classes.
// The Template Method is the method that defines the skeleton of the algorithm, and it calls abstract methods that subclasses must implement. 
// The Concrete Classes implement the abstract methods to provide specific behavior for each step of the algorithm.
// The Template Method is typically defined in an abstract class, and the Concrete Classes inherit from this abstract class to provide their specific implementations.

// Use cases:
// - Coffee and Tea preparation where the steps are similar but the brewing and condiments differ.
// - Game development where the game loop has common steps but different game logic for each level or character.
// - Report generation where the report structure is the same but the data source and formatting differ.
// - Data processing pipelines where the steps are similar but the data transformation logic differs.
// - Web application request handling where the request processing steps are similar but the business logic differs for each endpoint.
// - Document generation where the document structure is the same but the content and formatting differ.
// - Workflow management systems where the workflow steps are similar but the actions taken at each step differ.
// - User authentication where the authentication steps are similar but the validation logic differs for each user type.
// - File processing where the file processing steps are similar but the file format and processing logic differ.

/**
 * Advantages of Template Design Pattern:
 * 1. Code Reusability: Promotes code reuse by allowing common behavior to be defined in a base class 
 *    and letting subclasses implement specific details.
 * 2. Consistency: Ensures a consistent algorithm structure across different implementations.
 * 3. Flexibility: Allows subclasses to override specific steps of the algorithm without changing its structure.
 * 4. Simplifies Maintenance: Centralizes the algorithm's structure in the base class, making it easier to maintain.

 * Disadvantages of Template Design Pattern:
 * 1. Increased Complexity: Can lead to a more complex class hierarchy due to the need for multiple subclasses.
 * 2. Limited by Base Class: Subclasses are constrained by the structure and behavior defined in the base class.
 * 3. Dependency on Inheritance: Relies heavily on inheritance, which can reduce flexibility in some scenarios.
 * 4. Harder to Understand: For new developers, understanding the flow of control between the base class and subclasses 
 *    can be challenging.
 */


abstract class BeverageMaker
{
    public function prepareBeverage()
    {
        $this->boilWater();
        $this->brew();
        $this->pourInCup();
        $this->addCondiments();
    }

    private function boilWater()
    {
        echo "Boiling water  <br>";
    }

    private function pourInCup()
    {
        echo "Pouring into cup <br>";
    }

    abstract protected function brew();
    abstract protected function addCondiments();
}

class TeaMaker extends BeverageMaker
{
    public function __construct()
    {
        echo "Request - TeaMaker <br>";
    }

    protected function brew()
    {
        echo "Steeping the tea <br>";
    }

    protected function addCondiments()
    {
        echo "Adding lemon <br>";
    }
}

class CoffeeMaker extends BeverageMaker
{
    public function __construct()
    {
        echo "Request - CoffeeMaker <br>";
    }

    protected function brew()
    {
        echo "Dripping coffee through filter <br>";
    }

    protected function addCondiments()
    {
        echo "Adding sugar and milk <br>";
    }
}
