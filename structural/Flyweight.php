<?php

// Flyweight Design Pattern
// The Flyweight pattern is a structural design pattern that allows you to share objects to support a large number of similar objects efficiently.
// It is used to minimize memory usage by sharing common parts of state between multiple objects. 
// This pattern is particularly useful when dealing with a large number of similar objects that have some shared state, such as in graphical applications or text processing.    
// The Flyweight pattern separates the intrinsic state (shared state) from the extrinsic state (unique state) of an object.

// Use Cases:
// - Text rendering systems where multiple characters share the same font and style
// - Game development where multiple game objects share the same properties (e.g., sprites, textures)
// - GUI frameworks where multiple UI components share the same appearance and behavior
// - Database connection pooling where multiple database connections share the same configuration
// - Caching systems where multiple objects share the same data or state
// - Web applications where multiple users share the same resources (e.g., images, stylesheets)
// - Network protocols where multiple packets share the same header information
// - Document processing systems where multiple documents share the same formatting and styles
// - Image processing systems where multiple images share the same color palette or compression settings

/**
 * Advantages of Flyweight Design Pattern:
 * 
 * 1. Memory Optimization:
 *    - Reduces memory consumption by sharing common data among multiple objects.
 *    - Avoids duplication of similar objects, leading to efficient resource utilization.
 * 
 * 2. Improved Performance:
 *    - Reduces the overhead of creating and managing a large number of similar objects.
 *    - Enhances application performance by minimizing memory usage.
 * 
 * 3. Scalability:
 *    - Makes it easier to handle a large number of objects in memory-intensive applications.
 *    - Suitable for scenarios where objects share a significant amount of common data.
 * 
 * Disadvantages of Flyweight Design Pattern:
 * 
 * 1. Increased Complexity:
 *    - Introduces additional complexity in the code by separating intrinsic and extrinsic states.
 *    - Requires careful management of shared and unshared states.
 * 
 * 2. Limited Applicability:
 *    - Not suitable for scenarios where objects do not share common data or have unique states.
 *    - May not be beneficial if the overhead of managing shared objects outweighs the memory savings.
 * 
 * 3. Maintenance Challenges:
 *    - Can make the code harder to understand and maintain due to the separation of states.
 *    - Requires developers to ensure proper handling of shared and unshared states.
 */


// Flyweight Interface
interface Icon {
    public function render($x, $y);
}

// Concrete Flyweight
class ConcreteIcon implements Icon {
    private $type; // Intrinsic state

    public function __construct($type) {
        $this->type = $type;
    }

    public function render($x, $y) {
        return "Rendering icon of type '{$this->type}' at position ({$x}, {$y}).\n";
    }
}

// Flyweight Factory
class IconFactory {
    private $icons = [];

    public function getIcon($type) {
        if (!isset($this->icons[$type])) {
            $this->icons[$type] = new ConcreteIcon($type);
        }
        return $this->icons[$type];
    }
}

// Client Code
class IconManager {
    private $iconFactory;

    public function __construct(IconFactory $iconFactory) {
        $this->iconFactory = $iconFactory;
    }

    public function displayIcon($type, $x, $y) {
        $icon = $this->iconFactory->getIcon($type);
        return $icon->render($x, $y);
    }
}
