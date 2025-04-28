<?php

// Bridge Design Pattern
// The Bridge pattern is a structural design pattern that separates an abstraction from its implementation, allowing them to vary independently. 
// This pattern is useful when you want to decouple an abstraction from its implementation, enabling you to change or extend either side without affecting the other. 
// It provides a way to create a flexible and extensible system by using composition instead of inheritance.
 
// Use Cases:
// - GUI frameworks where different UI components (e.g., buttons, text fields) need to be rendered differently based on the platform (e.g., Windows, Mac, Linux)
// - Database access layers where different database engines (e.g., MySQL, PostgreSQL, SQLite) need to be supported with a common interface
// - Logging frameworks where different loggers (e.g., file, console, database) need to be implemented with a common interface

/**
 * Advantages of the Bridge Design Pattern:
 * 
 * 1. Decouples Abstraction and Implementation:
 *    - Allows abstraction and implementation to evolve independently without affecting each other.
 *    - Promotes flexibility and scalability in the codebase.
 * 
 * 2. Improves Code Maintainability:
 *    - Reduces code duplication by sharing implementation logic across multiple abstractions.
 *    - Simplifies the addition of new abstractions or implementations.
 * 
 * 3. Enhances Extensibility:
 *    - Makes it easier to introduce new abstraction layers or implementation details without modifying existing code.
 * 
 * 4. Supports Open/Closed Principle:
 *    - Encourages designing components that are open for extension but closed for modification.
 * 
 * 5. Promotes Reusability:
 *    - Reuses implementation logic across different abstraction layers, reducing redundancy.
 * 
 * 6. Simplifies Complex Systems:
 *    - Helps manage complexity by separating high-level logic (abstraction) from low-level details (implementation).
 */

/**
 * Disadvantage of the Bridge Design Pattern:
 * 
 * 1. Increased Complexity:
 *    - The Bridge pattern introduces additional layers of abstraction, which can make the code more complex and harder to understand for developers unfamiliar with the pattern.
 * 
 * 2. Overhead:
 *    - The separation of abstraction and implementation may lead to a slight performance overhead due to the need for delegation between the abstraction and the implementation.
 * 
 * 3. Not Always Necessary:
 *    - In simpler systems where the abstraction and implementation are unlikely to change independently, the use of the Bridge pattern may be over-engineering.
 * 
 * 4. Requires Careful Design:
 *    - Properly designing the abstraction and implementation hierarchies can be challenging and may require significant upfront planning.
 */


// Abstraction
abstract class Shape {
    protected $color;

    public function __construct(Color $color) {
        $this->color = $color;
    }

    abstract public function draw();
}

// Refined Abstraction
class Circle extends Shape {
    public function draw() {
        return "Drawing Circle in " . $this->color->applyColor();
    }
}

class Square extends Shape {
    public function draw() {
        return "Drawing Square in " . $this->color->applyColor();
    }
}

// Implementor
interface Color {
    public function applyColor();
}

// Concrete Implementors
class RedColor implements Color {
    public function applyColor() {
        return "Red";
    }
}

class BlueColor implements Color {
    public function applyColor() {
        return "Blue";
    }
}
