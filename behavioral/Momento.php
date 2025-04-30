<?php

// Memento Design Pattern
// The Memento Design Pattern is used to capture and externalize an object's internal state so that the object can be restored to this state later without violating encapsulation.
// It is particularly useful for implementing undo/redo functionality in applications.
// The pattern consists of three main components: the Originator, the Memento, and the Caretaker.
// The Originator is the object whose state needs to be saved and restored. 
// The Memento is a snapshot of the Originator's state, and the Caretaker is responsible for managing the Memento objects.

// Use cases:
// - Text editors that need to implement undo/redo functionality.
// - Game applications where the game state needs to be saved and restored at different points in time.
// - Any application where the state of an object needs to be saved and restored without exposing its internal structure.
// - Version control systems where the state of a file or project needs to be saved at different points in time.
// - Workflow systems where the state of a process needs to be saved and restored at different stages of execution.
// - Configuration management systems where the state of a configuration object needs to be saved and restored at different points in time.

/**
 * Advantages of Memento Design Pattern:
 * 1. Preserves encapsulation: The internal state of the object is not exposed to the outside world.
 * 2. Simplifies rollback: Allows restoring an object to a previous state without violating encapsulation.
 * 3. Easy to implement: The pattern is straightforward and does not require complex logic.
 * 4. Useful for undo/redo functionality: Commonly used in applications like text editors, where undo/redo is essential.

 * Disadvantages of Memento Design Pattern:
 * 1. Memory overhead: Storing multiple mementos can consume significant memory, especially for large objects.
 * 2. Increased complexity: Managing mementos and ensuring proper state restoration can add complexity to the code.
 * 3. Limited scope: The pattern is not suitable for all scenarios and is best used when state restoration is a key requirement.
 */


// The Memento class to store the state of the Document
class DocumentMemento {
    private string $content;

    public function __construct(string $content) {
        $this->content = $content;
    }

    public function getContent(): string {
        return $this->content;
    }
}

// The Originator class
class Document {
    private string $content = '';

    public function write(string $text): void {
        $this->content .= $text;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function save(): DocumentMemento {
        return new DocumentMemento($this->content);
    }

    public function restore(DocumentMemento $memento): void {
        $this->content = $memento->getContent();
    }
}

// The Caretaker class
class History {
    private array $mementos = [];

    public function push(DocumentMemento $memento): void {
        $this->mementos[] = $memento;
    }

    public function pop(): ?DocumentMemento {
        return array_pop($this->mementos);
    }
}