<?php

// Factory Method Design Pattern
// The Factory Method pattern is a creational design pattern that provides an interface for creating objects in a superclass but allows subclasses to alter the type of objects that will be created. 
// This pattern is useful when you want to delegate the responsibility of object creation to subclasses, allowing for greater flexibility and extensibility in your codebase.

// [Use Cases] This pattern is useful when you want to create objects that share a common interface or base class but have different implementations, such as:
// - GUI frameworks where different button types (e.g., Windows, Mac, Linux) need to be created based on the operating system
// - Document generation systems where different document types (e.g., PDF, Word, HTML) need to be created based on user input or configuration
// - Game development where different character types (e.g., warrior, mage, archer) need to be created based on user selection or game state
// - Database access layers where different database connections (e.g., MySQL, PostgreSQL, SQLite) need to be created based on configuration settings
// - Logging frameworks where different loggers (e.g., file, console, database) need to be created based on user preferences or application settings
// - Payment processing systems where different payment methods (e.g., credit card, PayPal, bank transfer) need to be created based on user selection or configuration
// - Notification systems where different notification types (e.g., email, SMS, push) need to be created based on user preferences or application settings

// Advantages of the Factory Method Design Pattern
// - Flexibility: The Factory Method pattern allows you to create objects without specifying the exact class of the object that will be created. This can make your code more flexible and easier to maintain, as you can change the implementation of the factory method without affecting the rest of your codebase.
// - Extensibility: The Factory Method pattern makes it easy to add new types of objects without modifying existing code. You can simply create a new subclass that implements the factory method and returns the desired object type.
// - Encapsulation: The Factory Method pattern encapsulates the object creation process, allowing you to hide the details of how objects are created from the rest of your code. This can help reduce complexity and improve maintainability.
// - Separation of concerns: The Factory Method pattern separates the responsibility of object creation from the rest of your code, making it easier to manage and understand. This can help improve code organization and reduce coupling between components.
// - Improved testability: The Factory Method pattern can improve testability by allowing you to create mock or stub objects for testing purposes. This can help isolate components and make it easier to write unit tests for your code.

// Disadvantages of the Factory Method Design Pattern
// - Complexity: The Factory Method pattern can introduce additional complexity to your codebase, as it requires creating additional classes and interfaces for the factory methods. This can make your code harder to understand and maintain, especially for developers who are not familiar with the pattern.
// - Overhead: The Factory Method pattern can introduce performance overhead due to the additional layers of abstraction and indirection involved in object creation. This can lead to slower performance in some cases, especially if the factory methods are called frequently or if the objects being created are complex.
// - Tight coupling: The Factory Method pattern can lead to tight coupling between the factory methods and the classes that use them, making it harder to change or extend the system in the future. This can limit flexibility and make it more difficult to adapt to changing requirements.
// - Limited to a single hierarchy: The Factory Method pattern is limited to a single class hierarchy, which can make it difficult to create objects that belong to different hierarchies or that share common interfaces. This can limit the applicability of the pattern in certain situations.



abstract class SearchIndex {
    public abstract search();
}

class PlainJobsSearchIndex extends SearchIndex {
    public function search() {
        return "Searching in plain text job index\n";
    }
}

Class AggregatedJobsSearchIndex extends SearchIndex {
    public function search() {
        return "Searching in aggregated job index\n";
    }
}


// Factory Interface
interface SearchIndexFactory {
    public function createSearchIndex(): SearchIndex;
}

// Concrete Factory for PlainJobsSearchIndex
class PlainJobsSearchIndexFactory implements SearchIndexFactory {
    public function createSearchIndex(): SearchIndex {
        return new PlainJobsSearchIndex();
    }
}

// Concrete Factory for AggregatedJobsSearchIndex
class AggregatedJobsSearchIndexFactory implements SearchIndexFactory {

    public function createSearchIndex(): SearchIndex {
        return new AggregatedJobsSearchIndex();
    }

}

// Client class job search
class JobSearch {
    private SearchIndex searchIndex;

    public function __construct(SearchIndexFactory factory) {
        $searchIndex = factory->createSearchIndex();
    }

    public function getSearchIndex() {
        return $searchIndex;
    }
}


?>