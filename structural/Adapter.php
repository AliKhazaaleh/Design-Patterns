<?php

// Adapter Design Pattern
// The Adapter pattern is a structural design pattern that allows incompatible interfaces to work together. 
// It acts as a bridge between two incompatible interfaces by converting the interface of one class into an interface expected by the clients. 
// This pattern is useful when you want to use an existing class, but its interface does not match the one you need.

// Use Cases:
// - Integrating third-party libraries or APIs with your application
// - Adapting legacy code to work with new code without modifying the original codebase
// - Creating a consistent interface for different classes that have similar functionality but different interfaces
// - Allowing classes with incompatible interfaces to work together in a system

// Advantages of the Adapter Design Pattern
// - Flexibility: The Adapter pattern allows you to adapt existing classes to work with new interfaces, making it easier to integrate different components in your application.
// - Reusability: By using adapters, you can reuse existing classes without modifying their code, which can help reduce code duplication and improve maintainability.
// - Improved code organization: The Adapter pattern can help improve code organization by separating the concerns of adapting interfaces from the core functionality of the classes, making it easier to understand and maintain the codebase.
// - Simplified integration: The Adapter pattern simplifies the process of integrating different components by providing a consistent interface for clients to work with, reducing the complexity of managing multiple interfaces.

// Disadvantages of the Adapter Design Pattern
// - Increased complexity: The Adapter pattern can introduce additional complexity to your codebase, as it requires creating additional classes and interfaces for the adapters. This can make your code harder to understand and maintain, especially for developers who are not familiar with the pattern.
// - Performance overhead: The Adapter pattern can introduce performance overhead due to the additional layers of abstraction and indirection involved in adapting interfaces. This can lead to slower performance in some cases, especially if the adapters are called frequently or if the objects being adapted are complex.
// - Tight coupling: The Adapter pattern can lead to tight coupling between the adapters and the classes that use them, making it harder to change or extend the system in the future. This can limit flexibility and make it more difficult to adapt to changing requirements.


// The Target interface
interface Task {
    public function execute(): string;
}

// The Adaptee class with a different interface
class AggregatedTask {

    public function runTask(): string {
        return "Executing aggregated task";
    }
}

// The Adapter class makes the Adaptee compatible with the Target interface
class TaskAdapter implements Task {
    private AggregatedTask $aggregatedTask;

    public function __construct(AggregatedTask $aggregatedTask) {
        $this->aggregatedTask = $aggregatedTask;
    }

    public function execute(): string {
        // Delegates the call to the Adaptee's methods
        return $this->aggregatedTask->runTask();
    }
}
