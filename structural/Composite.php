<?php

// Composite Design Pattern
// The Composite pattern is a structural design pattern that allows you to compose objects into tree structures to represent part-whole hierarchies.
// It lets clients treat individual objects and compositions of objects uniformly. This pattern is particularly useful when you want to represent a hierarchy of objects, such as a file system or a graphical user interface (GUI) component tree.

// Use Cases:
// - File systems where files and directories can be treated uniformly
// - Organizational structures where employees and departments can be represented as a tree hierarchy
// - XML/HTML document parsing where elements can be nested and treated as a single entity
// - Data structures like trees and graphs where nodes can have children and be treated uniformly

/**
 * Composite Design Pattern
 *
 * Advantages:
 * 1. Simplifies client code: Treats individual objects and compositions of objects uniformly.
 * 2. Facilitates scalability: Makes it easy to add new types of components without altering existing code.
 * 3. Promotes tree structures: Ideal for representing part-whole hierarchies like file systems or UI components.
 * 4. Encourages reusability: Components can be reused in different compositions.
 *
 * Disadvantages:
 * 1. Complexity: Can introduce unnecessary complexity when the hierarchy is simple.
 * 2. Overhead: Managing the tree structure and ensuring consistency can add overhead.
 * 3. Type safety: May require type checks or casting when dealing with heterogeneous components.
 */


// Component Interface
interface Component
{
    public function operation(): string;
}

// Leaf Class
class Leaf implements Component
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function operation(): string
    {
        return "Leaf: " . $this->name;
    }
}

// Composite Class
class Composite implements Component
{
    private array $children = [];

    public function add(Component $component): void
    {
        $this->children[] = $component;
    }

    public function remove(Component $component): void
    {
        $this->children = array_filter($this->children, fn($child) => $child !== $component);
    }

    public function operation(): string
    {
        $results = [];
        foreach ($this->children as $child) {
            $results[] = $child->operation();
        }
        return "Composite: [" . implode(", ", $results) . "]";
    }
}
