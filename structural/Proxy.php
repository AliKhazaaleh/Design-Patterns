<?php

// Proxy Design Pattern
// The Proxy pattern is a structural design pattern that provides an object representing another object. 
// It acts as an intermediary, controlling access to the original object and adding additional functionality, such as lazy loading, access control, or logging.
// The Proxy pattern is useful when you want to control access to an object, manage its lifecycle, or add additional behavior without modifying the original object.
// It can be used in various scenarios, such as implementing security checks, caching, or lazy loading of resources.

// Use Cases:
// - Lazy loading: Load an object only when it is needed, improving performance and resource management.
// - Image proxy: Load and display images efficiently by loading them only when needed, reducing memory usage and improving performance.
// - UI proxy: Represent a user interface component, allowing for lazy loading and access control based on user permissions.
// - Access control: Restrict access to an object based on certain conditions, such as user permissions or authentication.
// - Logging: Add logging functionality to an object without modifying its code, allowing for better monitoring and debugging.
// - Caching: Store the result of expensive operations and return the cached result when the same operation is requested again.
// - Protection proxy: Control access to an object based on user permissions or roles, ensuring that only authorized users can access certain functionality.
// - Security proxy: Control access to a resource based on security policies, ensuring that only authorized users can access certain functionality.
// - Remote proxy: Represent an object that is located on a different server or network, allowing for communication between distributed systems.
// - Virtual proxy: Create a lightweight placeholder for a resource-intensive object, loading the actual object only when needed.
// - Smart proxy: Add additional functionality, such as reference counting or memory management, to an object without modifying its code.
// - Database proxy: Control access to a database connection, allowing for connection pooling or lazy loading of database resources.
// - File proxy: Represent a file resource, allowing for lazy loading and access control based on user permissions.
// - API proxy: Control access to an external API, allowing for caching, rate limiting, or authentication.
// - Network resource proxy: Control access to a network resource, such as a web service or API, allowing for caching, rate limiting, or authentication.
// - Service proxy: Represent a service or component in a microservices architecture, allowing for communication between services and managing service discovery.

// Advantages of Proxy Design Pattern:
// 1. Control access: The Proxy pattern allows you to control access to an object, providing a layer of security or access control.
// 2. Lazy loading: It enables lazy loading of resources, which can improve performance and reduce memory usage by loading objects only when needed.
// 3. Additional functionality: The Proxy pattern allows you to add additional functionality, such as logging, caching, or access control, without modifying the original object.
// 4. Separation of concerns: It separates the responsibilities of the original object and the proxy, making the code more modular and easier to maintain.
// 5. Flexibility: The Proxy pattern provides flexibility in managing the lifecycle of an object, allowing you to create different types of proxies for various use cases.
// 6. Improved performance: By controlling access to an object, the Proxy pattern can help improve performance by reducing the overhead of creating and managing multiple instances of the same object.
// 7. Simplified interface: The Proxy pattern can provide a simplified interface for complex objects, making it easier for clients to interact with them.


// Disadvantages of Proxy Design Pattern:
// 1. Increased complexity: The Proxy pattern can introduce additional complexity to the codebase, as it requires creating additional classes and interfaces for the proxy and the original object.
// 2. Performance overhead: The Proxy pattern can introduce performance overhead due to the additional layer of indirection, which may slow down the system in some cases.
// 3. Tight coupling: The Proxy pattern can lead to tight coupling between the proxy and the original object, making it harder to change or extend the system in the future.
// 4. Limited functionality: The Proxy pattern may not be suitable for all use cases, as it may not provide the same level of functionality or flexibility as other design patterns, such as the Adapter or Decorator patterns.
// 5. Potential for misuse: The Proxy pattern can be misused or overused, leading to code that is harder to maintain and understand. Developers may be tempted to use proxies for situations where they are not appropriate, leading to poor design choices and increased complexity.
// 6. Debugging challenges: The additional layer of indirection introduced by the Proxy pattern can make debugging more difficult, as it may be harder to trace the flow of execution through the proxy and the original object.


interface Image {
    public function display(): void;
}

class RealImage implements Image {
    private string $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
        $this->loadFromDisk();
    }

    private function loadFromDisk(): void {
        echo "Loading image from disk: {$this->filename} <br>";
    }

    public function display(): void {
        echo "Displaying image: {$this->filename} <br>";
    }
}

// Proxy
class ProxyImage implements Image {
    private ?RealImage $realImage = null;
    private string $filename;
    private bool $accessGranted;

    public function __construct(string $filename, bool $accessGranted = true) {
        $this->filename = $filename;
        $this->accessGranted = $accessGranted;
    }

    public function display(): void {
        if (!$this->accessGranted) {
            echo "Access denied to display the image: {$this->filename}\n";
            return;
        }

        if ($this->realImage === null) {
            $this->realImage = new RealImage($this->filename); // Lazy Loading
        }
        $this->realImage->display();
    }
}