# Design-Patterns

This repository contains practical examples of various design patterns implemented in PHP, featuring a modern and clean user interface. The project demonstrates the implementation of different design patterns organized into three main categories.

## Project Structure

The examples are organized in separate directories based on their categories:

### Creational Patterns

These patterns deal with object creation mechanisms:

- **Singleton** (`creational/Singleton.php`)
  - Ensures a class has only one instance
  - Provides a global point of access to it
  
- **Factory Method** (`creational/FactoryMethod.php`)
  - Defines an interface for creating objects
  - Lets subclasses decide which class to instantiate
  
- **Prototype** (`creational/Prototype.php`)
  - Creates new objects by cloning an existing object
  - Demonstrates prototype pattern with job posting example

### Structural Patterns

These patterns deal with object composition and relationships between objects:

- **Adapter** (`structural/Adapter.php`)
  - Allows incompatible interfaces to work together
  - Wraps an object in an adapter to make it compatible with another class

- **Bridge** (`structural/Bridge.php`)
  - Separates an abstraction from its implementation
  - Demonstrates with shapes and colors example

- **Composite** (`structural/Composite.php`)
  - Composes objects into tree structures
  - Represents part-whole hierarchies

- **Facade** (`structural/Facade.php`)
  - Provides a unified interface to a set of interfaces
  - Simplifies complex subsystem interactions

- **Flyweight** (`structural/Flyweight.php`)
  - Minimizes memory usage by sharing data
  - Demonstrates with icon management system

- **Proxy** (`structural/Proxy.php`)
  - Provides a surrogate for another object
  - Controls access to the original object

### Behavioral Patterns

These patterns deal with communication between objects:

- **Chain of Responsibility** (`behavioral/ChainResponsibility.php`)
  - Passes requests along a chain of handlers
  - Each handler decides to process or pass along

- **Memento** (`behavioral/Momento.php`)
  - Captures and restores an object's internal state
  - Implements undo functionality

- **Observer** (`behavioral/Observer.php`)
  - Defines a one-to-many dependency between objects
  - When one object changes state, all dependents are notified

- **State** (`behavioral/State.php`)
  - Allows an object to alter its behavior when its internal state changes
  - Implements vending machine state transitions

- **Strategy** (`behavioral/Strategy.php`)
  - Defines a family of algorithms
  - Makes them interchangeable within same family

- **Template** (`behavioral/Template.php`)
  - Defines the skeleton of an algorithm
  - Lets subclasses override specific steps

## Usage

The project includes a single demonstration file:

- `home.php`: Modern UI implementation showcasing all design patterns with clear categorization and examples

To run the examples:
1. Ensure you have PHP 7.4 or higher installed
2. Set up a web server (Apache/Nginx) with PHP support
3. Navigate to `home.php` in your web browser

## Development

Each pattern is implemented in its own file within the appropriate category directory (creational, structural, or behavioral). The implementations include detailed comments and practical examples to demonstrate the usage of each pattern.