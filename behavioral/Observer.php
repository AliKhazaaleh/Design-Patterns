<?php

// Observer Design Pattern
// The Observer Design Pattern is a behavioral design pattern that defines a one-to-many dependency between objects so that when one object changes state, all its dependents are notified and updated automatically.
// It is also useful in scenarios where a change in one object requires changes in others, and you want to avoid tight coupling between them.
// The pattern consists of two main components: the Subject and the Observer.
// The Subject is the object that maintains a list of observers and notifies them of any changes in its state.  
// The Observer is the object that wants to be notified of changes in the Subject's state.

// Use cases:
// - Real-time data feeds where multiple clients need to be updated with the latest data.
// - Publish/subscribe systems where multiple subscribers need to be notified of changes in a publisher's state.
// - Logging systems where multiple loggers need to be notified of events occurring in a system.
// - Notification systems where multiple subscribers need to be notified of changes in a subject's state.
// - Chat applications where multiple users need to be notified of new messages or events occurring in a chat room.
// - Stock market applications where multiple clients need to be notified of changes in stock prices.
// - Weather applications where multiple clients need to be notified of changes in weather data.

/**
 * The Observer Design Pattern
 *
 * Advantages:
 * - Promotes loose coupling between the subject (observable) and its observers.
 * - Supports dynamic relationships, allowing observers to be added or removed at runtime.
 * - Ensures consistency by automatically notifying all observers of state changes in the subject.
 * - Encourages a modular design by separating the subject's core functionality from the dependent behaviors.

 * Disadvantages:
 * - Can lead to memory leaks if observers are not properly removed or if there are circular references.
 * - May become complex to manage when there are many observers or when the notification logic is intricate.
 * - Observers may receive frequent updates, even when the changes are irrelevant to them, leading to inefficiency.
 * - Debugging can be challenging due to the indirect communication between the subject and its observers.
 */



// Subject Interface
interface Subject {
    public function addObserver(Observer $observer): void;
    public function removeObserver(Observer $observer): void;
    public function notify(): void;
}

// Observer Interface
interface Observer {
    public function update(float $temperature): void;
}

// Concrete Subject: WeatherStation
class WeatherStation implements Subject {
    private float $temperature;
    private array $observers = [];

    public function addObserver(Observer $observer): void {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer): void {
        $this->observers = array_filter($this->observers, fn($o) => $o !== $observer);
    }

    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature);
        }
    }

    public function setTemperature(float $temperature): void {
        $this->temperature = $temperature;
        $this->notify();
    }
}

// Concrete Observer: PhoneDisplay
class PhoneDisplay implements Observer {
    public function update(float $temperature): void {
        echo "PhoneDisplay: Temperature updated to {$temperature}°C <br>";
    }
}

// Concrete Observer: TVDisplay
class TVDisplay implements Observer {
    public function update(float $temperature): void {
        echo "TVDisplay: Temperature updated to {$temperature}°C <br>";
    }
}
