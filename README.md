# Design-Patterns

This repository contains practical examples of various design patterns implemented in PHP. The project is organized into three main categories of design patterns: Creational, Structural, and Behavioral.

## Project Structure

The examples are organized in separate directories based on their categories:

### Creational Patterns

These patterns deal with object creation mechanisms:

- **Singleton** (`creational/Singleton.php`): Ensures a class has only one instance and provides a global point of access to it.
- **Factory Method** (`creational/FactoryMethod.php`): Defines an interface for creating objects but lets subclasses decide which class to instantiate.
- **Prototype** (`creational/Prototype.php`): Creates new objects by cloning an existing object, known as the prototype.

### Structural Patterns

These patterns deal with object composition and relationships between objects:

- **Adapter** (`structural/Adapter.php`): Allows incompatible interfaces to work together by wrapping an object in an adapter to make it compatible with another class.
- **Bridge** (`structural/Bridge.php`): Separates an abstraction from its implementation so that both can vary independently.
- **Composite** (`structural/Composite.php`): Composes objects into tree structures to represent part-whole hierarchies.
- **Facade** (`structural/Facade.php`): Provides a unified interface to a set of interfaces in a subsystem.
- **Flyweight** (`structural/Flyweight.php`): Minimizes memory usage by sharing as much data as possible with similar objects.
- **Proxy** (`structural/Proxy.php`): Provides a surrogate or placeholder for another object to control access to it.

### Behavioral Patterns

These patterns deal with communication between objects:

- **Chain of Responsibility** (`behavioral/ChainResponsibility.php`): Passes requests along a chain of handlers until one of them handles the request.
- **Memento** (`behavioral/Momento.php`): Captures and restores an object's internal state.
- **Observer** (`behavioral/Observer.php`): Defines a one-to-many dependency between objects where a state change in one object results in all its dependents being notified and updated automatically.
- **State** (`behavioral/State.php`): Allows an object to alter its behavior when its internal state changes.
- **Strategy** (`behavioral/Strategy.php`): Defines a family of algorithms, encapsulates each one, and makes them interchangeable.
- **Template** (`behavioral/Template.php`): Defines the skeleton of an algorithm in a method, deferring some steps to subclasses.

## Usage

The project includes two demonstration files:
- `home.php`: Basic implementation examples
- `home2.php`: Modern UI implementation with visual examples of the design patterns

To run the examples, simply serve these files through a PHP server and navigate to them in your web browser.

## Requirements

- PHP 7.4 or higher
- Web server (Apache/Nginx) with PHP support