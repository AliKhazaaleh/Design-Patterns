<?php

// Prototype Design Pattern
// The Prototype pattern is a creational design pattern that allows you to create new objects by copying an existing object, known as the prototype. 
// This pattern is useful when the cost of creating a new instance of an object is more expensive than copying an existing one. 
// It provides a way to create objects without specifying the exact class of the object that will be created.

// [Use Cases] This pattern is useful when you want to create objects that are similar but not identical, such as:
// - Cloning complex objects with many properties or dependencies
// - Creating objects with default values that can be customized later
// - Implementing undo/redo functionality in applications (e.g., text editors, graphic design software)
// - Creating objects with a specific state or configuration based on an existing object

// Advantages of the Prototype Design Pattern
// - Object creation without specifying the class: The Prototype pattern allows you to create new objects without specifying the exact class of the object that will be created. This can be useful when you want to create objects dynamically or when the class hierarchy is complex.
// - Reduced memory usage: The Prototype pattern can help reduce memory usage by allowing you to create new objects by copying existing ones instead of creating new instances from scratch. This can be particularly useful when dealing with large or complex objects.
// - Simplified object creation: The Prototype pattern can simplify object creation by providing a clear and consistent way to create new objects based on existing ones. This can help reduce code duplication and improve maintainability.

// Disadvantages of the Prototype Design Pattern
// - Complexity: The Prototype pattern can introduce additional complexity to the codebase, as it requires implementing a cloning mechanism for each class that uses the pattern. This can lead to increased maintenance overhead and potential bugs if not implemented correctly.
// - Performance overhead: Cloning objects can introduce performance overhead, especially if the objects being cloned are large or complex. This can lead to increased memory usage and slower performance in some cases.
// - Limited to classes that support cloning: The Prototype pattern relies on the ability to clone objects, which may not be supported by all classes or programming languages. This can limit the applicability of the pattern in certain situations.
// - Potential for shallow copies: Depending on the implementation, the Prototype pattern may create shallow copies of objects, which can lead to unintended side effects if the cloned object shares references to mutable objects with the original. This can result in bugs and unexpected behavior if not handled carefully.
// - Tight coupling: The Prototype pattern can lead to tight coupling between the prototype and the classes that use it, making it harder to change or extend the system in the future. This can limit flexibility and make it more difficult to adapt to changing requirements.


class JobPost
{

    private string $title;
    private string $status;

    const  STATUS_NEW = 'New';
    const  STATUS_DRAFT = 'Draft';

    public function __construct($title, $status = null)
    {
        $this->title = $title;
        $this->status = $status ?? static::STATUS_NEW;
    }
    
    public function __clone(): void
    {
        $this->title = "Copy of (" . $this->title.")";
        $this->status = static::STATUS_DRAFT;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function getStatus(): string
    {
        return $this->status;
    }

}


?>