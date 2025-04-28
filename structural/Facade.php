<?php

// Faceade Design Pattern
// The Facade pattern is a structural design pattern that provides a simplified interface to a complex subsystem.
// It defines a higher-level interface that makes the subsystem easier to use. 
// The Facade pattern is useful when you want to provide a simple interface to a complex system, making it easier for clients to 
// interact with the system without needing to understand its complexities.

// Use Cases:
// - Simplifying the interface of a complex library or framework
// - Providing a unified interface for multiple subsystems or components
// - Hiding the complexities of a system from the client code
// - Creating a simplified API for a complex system to improve usability and reduce the learning curve for developers
// - Implementing a facade for a legacy system to provide a modern interface for new clients
// - Creating a facade for a multi-layered architecture to provide a simplified interface for clients to interact with the system
// - Providing a facade for a third-party service or API to simplify integration with your application
// - Creating a facade for a complex configuration system to simplify the process of configuring components in your application

/**
 * Facade Design Pattern
 * 
 * The Facade design pattern provides a simplified interface to a larger body of code, 
 * such as a complex subsystem. It acts as a single entry point to the subsystem, 
 * making it easier to use and reducing the dependency of external code on the subsystem's details.
 * 
 * Advantages:
 * 1. Simplifies the usage of a complex subsystem by providing a unified interface.
 * 2. Reduces coupling between the client code and the subsystem, improving maintainability.
 * 3. Shields clients from the complexity of the subsystem, making the code easier to understand.
 * 4. Promotes loose coupling, as changes in the subsystem do not directly affect the client code.
 * 
 * Disadvantages:
 * 1. Can introduce an additional layer of abstraction, which might lead to performance overhead.
 * 2. If the Facade is not designed carefully, it may become a "god object" that knows too much 
 *    about the subsystem, violating the Single Responsibility Principle.
 * 3. Overuse of the pattern may lead to hiding too much functionality, making it harder to access 
 *    specific features of the subsystem when needed.
 */



// Subsystem 1
class SubsystemA {
    public function operationA(): string {
        return "SubsystemA: Ready!\n";
    }

    public function operationB(): string {
        return "SubsystemA: Go!\n";
    }
}

// Subsystem 2
class SubsystemB {
    public function operationC(): string {
        return "SubsystemB: Get ready!\n";
    }

    public function operationD(): string {
        return "SubsystemB: Fire!\n";
    }
}

// Facade
class Facade {
    protected SubsystemA $subsystemA;
    protected SubsystemB $subsystemB;

    public function __construct(SubsystemA $subsystemA, SubsystemB $subsystemB) {
        $this->subsystemA = $subsystemA;
        $this->subsystemB = $subsystemB;
    }

    public function operationA(): string {
        return $this->subsystemA->operationA();
    }

    public function operationB(): string {
        return $this->subsystemA->operationB();
    }

    public function operationC(): string {
        return $this->subsystemB->operationC();
    }

    public function operationD(): string {
        return $this->subsystemB->operationD();
    }
}

