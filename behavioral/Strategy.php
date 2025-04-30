<?php

// Strategy Design Pattern
// The Strategy Design Pattern defines a family of algorithms, encapsulates each one, and makes them interchangeable.
// The Strategy Pattern lets the algorithm vary independently from clients that use it.
// It is particularly useful when you have multiple algorithms for a specific task and want to choose one at runtime without modifying the client code.
// The pattern consists of three main components: the Context, the Strategy interface, and Concrete Strategy classes.
// The Context is the class that uses the Strategy interface to call the algorithm defined by a Concrete Strategy class.
// The Strategy interface defines a common interface for all Concrete Strategy classes, allowing the Context to use any of them interchangeably.
// The Concrete Strategy classes implement the Strategy interface and provide specific implementations of the algorithm.
//
// Use cases:
// - Sorting algorithms where different sorting strategies (e.g., bubble sort, quick sort) can be used interchangeably based on the data size or type.
// - Payment processing systems where different payment methods (e.g., credit card, PayPal) can be used interchangeably based on user preference.
// - Compression algorithms where different compression strategies (e.g., ZIP, GZIP) can be used interchangeably based on the file type or size.
// - Logging systems where different logging strategies (e.g., file logging, database logging) can be used interchangeably based on the environment or configuration.
// - Data storage systems where different storage strategies (e.g., local storage, cloud storage) can be used interchangeably based on the data size or access frequency.
// - Image processing systems where different image processing strategies (e.g., resizing, filtering) can be used interchangeably based on the image type or size.


/**
 * Advantages of Strategy Design Pattern:
 * 
 * 1. Open/Closed Principle: The pattern allows you to introduce new strategies 
 *    without modifying the existing code, making the system more extensible.
 * 
 * 2. Single Responsibility Principle: Each strategy encapsulates a specific 
 *    behavior, promoting separation of concerns and cleaner code.
 * 
 * 3. Flexibility: The pattern enables dynamic selection of algorithms or 
 *    behaviors at runtime, providing greater flexibility in application design.
 * 
 * 4. Reusability: Strategies can be reused across different contexts or 
 *    applications, reducing code duplication.
 * 
 * 5. Simplifies Testing: Each strategy can be tested independently, making 
 *    unit testing easier and more effective.
 * 
 * 
 * Disadvantages of Strategy Design Pattern:
 * 
 * 1. Increased Complexity: Introducing multiple strategy classes can increase 
 *    the number of classes in the system, making it more complex to manage.
 * 
 * 2. Overhead: Switching between strategies at runtime may introduce 
 *    performance overhead, especially if the selection logic is complex.
 * 
 * 3. Client Awareness: The client must be aware of the available strategies 
 *    and choose the appropriate one, which can lead to tighter coupling.
 * 
 * 4. Maintenance: Managing and maintaining multiple strategy classes can 
 *    become challenging as the number of strategies grows.
 */

 
// Strategy Interface
interface SortStrategy {
    public function sort(array $data): array;
}

// Concrete Strategy: Bubble Sort
class BubbleSortStrategy implements SortStrategy {
    public function sort(array $data): array {
        $n = count($data);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    $temp = $data[$j];
                    $data[$j] = $data[$j + 1];
                    $data[$j + 1] = $temp;
                }
            }
        }
        return $data;
    }
}

// Concrete Strategy: Quick Sort
class QuickSortStrategy implements SortStrategy {
    public function sort(array $data): array {
        if (count($data) <= 1) {
            return $data;
        }

        $pivot = $data[0];
        $left = [];
        $right = [];

        for ($i = 1; $i < count($data); $i++) {
            if ($data[$i] < $pivot) {
                $left[] = $data[$i];
            } else {
                $right[] = $data[$i];
            }
        }

        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }
}

// Context
class SearchContext {
    private SortStrategy $strategy;

    public function __construct(SortStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SortStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function executeStrategy(array $data): array {
        return $this->strategy->sort($data);
    }
}
