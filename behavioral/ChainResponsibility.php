<?php

// Chain of Responsibility Design Pattern
// This pattern allows multiple handlers to process a request without the sender needing to know which handler will handle it.
// It decouples the sender and receiver of the request, allowing for more flexible and maintainable code.
// In this example, we have a chain of handlers that can process different types of requests: authentication, logging, and validation.
// Each handler can either process the request or pass it to the next handler in the chain.

// Use Cases:
// - Event handling systems where multiple listeners can respond to an event without the event source needing to know about them.
// - Middleware in web applications where each middleware can process a request or pass it to the next one.
// - GUI frameworks where multiple components can handle user input events without the source needing to know which component will handle it.
// - Logging systems where different loggers can handle log messages based on their severity or type.
// - Workflow systems where different steps in a process can be handled by different handlers without the workflow engine needing to know about them.
// - Error handling systems where different error handlers can process exceptions based on their type or context.

/**
 * Advantages of Chain of Responsibility Design Pattern:
 * 
 * 1. Decoupling: It decouples the sender of a request from its receivers by allowing multiple objects 
 *    to handle the request without the sender needing to know which object will handle it.
 * 
 * 2. Flexibility: New handlers can be added to the chain without modifying existing code, making the 
 *    system more flexible and easier to extend.
 * 
 * 3. Simplified Object Responsibilities: Each handler in the chain has a single responsibility, 
 *    making the code easier to understand and maintain.
 * 
 * 4. Dynamic Behavior: The chain can be dynamically assembled at runtime, allowing for more 
 *    adaptable and configurable behavior.
 * 
 * Disadvantages of Chain of Responsibility Design Pattern:
 * 
 * 1. Debugging Complexity: Debugging can be challenging because the request may pass through 
 *    multiple handlers, making it harder to trace the flow of execution.
 * 
 * 2. No Guarantee of Handling: There is no guarantee that a request will be handled if no handler 
 *    in the chain is capable of processing it.
 * 
 * 3. Performance Overhead: If the chain is long, the request may pass through many handlers, 
 *    leading to potential performance overhead.
 * 
 * 4. Increased Complexity: The pattern can introduce additional complexity to the system, especially 
 *    if the chain is not well-structured or becomes too lengthy.
 */


// Abstract Handler
abstract class Handler
{
    protected ?Handler $nextHandler = null;

    public function handle(string $request): ?string
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return "No handler could process the request: $request";
    }

    public function setNext(Handler $handler): Handler
    {
        $this->nextHandler = $handler;
        return $this->nextHandler;
    }
}

// Concrete Handlers
class AuthHandler extends Handler
{
    public function handle(string $request): ?string
    {
        if ($request === "auth") {
            return "AuthHandler: Handling authentication.";
        }
        return parent::handle($request);
    }
}

class LoggingHandler extends Handler
{
    public function handle(string $request): ?string
    {
        if ($request === "log") {
            return "LoggingHandler: Handling logging.";
        }
        return parent::handle($request);
    }
}

class ValidationHandler extends Handler
{
    public function handle(string $request): ?string
    {
        if ($request === "validate") {
            return "ValidationHandler: Handling validation.";
        }
        return parent::handle($request);
    }
}
