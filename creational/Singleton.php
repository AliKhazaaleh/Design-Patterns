
<?php

// Singleton Design Pattern
// The Singleton pattern ensures that a class has only one instance and provides a global point of access to it.
// It is often used when exactly one object is needed to coordinate actions across the system.  
// This is achieved by making the constructor private and providing a static method that returns the instance of the class.
// The instance is created only when it is needed, and subsequent calls to the static method return the same instance.

// [Use Cases] This pattern is useful when you want to control access to:
// - Database connection management
// - User session management
// - Logging services
// - Game engine managers (e.g., audio, graphics, input)
// - Framework components (e.g., routing, dependency injection containers)
// - Resource management (e.g., file handles, network connections)
// - Application settings and configurations
// - API clients (e.g., for third-party services)

// Advantages of the Singleton Design Pattern
// - Controlled access to a single instance: The Singleton pattern ensures that there is only one instance of a class, which can be useful for managing shared resources or coordinating actions across the system.
// - Global access point: The Singleton pattern provides a global point of access to the instance, making it easy to use throughout the application without needing to pass references around.
// - Lazy initialization: The Singleton pattern allows for lazy initialization, meaning that the instance is created only when it is needed. This can help improve performance and reduce resource usage in some cases.
// - Lower memory usage: Since only one instance of the class is created, memory usage can be lower compared to creating multiple instances of the same class.
// - Simplified code: The Singleton pattern can simplify code by reducing the need for complex object management and lifecycle handling, as the instance is created and managed by the class itself.
// - Thread safety: The Singleton pattern can be implemented in a thread-safe manner, ensuring that multiple threads do not create multiple instances of the class simultaneously. This is particularly important in multi-threaded applications where shared resources need to be managed carefully.
// - Easy to implement: The Singleton pattern is relatively easy to implement and understand, making it a popular choice for many developers. It can be implemented in various programming languages with minimal effort.

// Disadvantages of the Singleton Design Pattern
// - Global state: The Singleton pattern introduces global state into the application, which can make it harder to understand and maintain. Global state can lead to tight coupling between components and make it difficult to reason about the behavior of the system as a whole.
// - Testing challenges: Singletons can make unit testing more difficult, as they introduce hidden dependencies and global state. This can lead to issues with test isolation and make it harder to write tests that are independent of the Singleton instance.
// - Violation of the Single Responsibility Principle: The Singleton pattern can violate the Single Responsibility Principle (SRP) by combining the responsibilities of managing the instance and providing functionality. This can lead to classes that are harder to maintain and understand, as they take on multiple roles.
// - Inflexibility: The Singleton pattern can make it difficult to change the implementation or behavior of the class, as it is tightly coupled to the Singleton instance. This can limit the ability to extend or modify the class without affecting other parts of the application.
// - Potential for misuse: The Singleton pattern can be misused or overused, leading to code that is harder to maintain and understand. Developers may be tempted to use Singletons for situations where they are not appropriate, leading to poor design choices and increased complexity.


class Singleton {
    
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function operationOne() {
        return "Operation One\n";
    }

    public function operationTwo() {
        return "Operation Two\n";
    }

}

?>