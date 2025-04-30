<?php

// State Design Pattern
// The State Design Pattern allows an object to alter its behavior when its internal state changes.
// It is particularly useful when an object needs to exhibit different behaviors based on its state, without using a large number of conditional statements.
// The pattern consists of three main components: the Context, the State interface, and Concrete State classes.


// Use cases:
// - Vending machines where the machine's behavior changes based on the selected product and payment status.
// - Traffic lights where the light's behavior changes based on the current state (red, yellow, green).
// - Game characters where the character's behavior changes based on its state (idle, running, jumping).
// - Document editors where the document's behavior changes based on its state (editing, read-only, locked).
// - Network connections where the connection's behavior changes based on its state (connected, disconnected, connecting).
// - User authentication where the user's behavior changes based on its state (logged in, logged out, locked).
// - Workflow systems where the workflow's behavior changes based on its state (pending, in progress, completed).
// - Order processing systems where the order's behavior changes based on its state (pending, shipped, delivered).
// - Payment processing systems where the payment's behavior changes based on its state (pending, completed, failed).
// - File upload systems where the upload's behavior changes based on its state (pending, uploading, completed).

/**
 * Advantages of State Design Pattern:
 * 1. Simplifies the code by organizing behaviors into separate state classes.
 * 2. Makes it easier to add new states without modifying existing code, adhering to the Open/Closed Principle.
 * 3. Promotes better maintainability and readability by encapsulating state-specific behavior.
 * 4. Reduces the complexity of conditional statements by delegating behavior to state objects.
 * 5. Encourages the use of composition over inheritance, leading to more flexible designs.

 * Disadvantages of State Design Pattern:
 * 1. Increases the number of classes in the system, which can make it harder to manage.
 * 2. Can introduce additional complexity if there are too many states or transitions.
 * 3. Requires careful design to ensure proper state transitions and avoid unexpected behavior.
 * 4. May lead to tight coupling between the context and state classes.
 */


interface VendingMachineState {
    public function handleRequest();
}

class ReadyState implements VendingMachineState {
    public function handleRequest() {
        echo "Ready state: Please select a product.<br>";
    }
}

class ProductSelectedState implements VendingMachineState {
    public function handleRequest() {
        echo "Product selected state: Processing payment.<br>";
    }
}

class PaymentPendingState implements VendingMachineState {
    public function handleRequest() {
        echo "Payment pending state: Dispensing product.<br>";
    }
}

class OutOfStockState implements VendingMachineState {
    public function handleRequest() {
        echo "Out of stock state: Product unavailable. Please select another product.<br>";
    }
}

class VendingMachineContext {
    private VendingMachineState $state;

    public function setState(VendingMachineState $state) {
        $this->state = $state;
    }

    public function request() {
        $this->state->handleRequest();
    }
}

