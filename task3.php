<?php

class Deque {
    private \SplDoublyLinkedList $list;
    private int $maxSize;

    public function __construct(int $maxSize) {
        $this->list = new \SplDoublyLinkedList();
        $this->maxSize = $maxSize;
    }

    public function pushBack(mixed $value): bool {
        if ($this->list->count() >= $this->maxSize) {
            return false;
        }
        $this->list->push($value);
        return true;
    }

    public function pushFront(mixed $value): bool {
        if ($this->list->count() >= $this->maxSize) {
            return false;
        }
        $this->list->unshift($value);
        return true;
    }

    public function popBack(): mixed {
        if ($this->list->isEmpty()) {
            return false;
        }
        return $this->list->pop();
    }

    public function popFront(): mixed {
        if ($this->list->isEmpty()) {
            return false;
        }
        return $this->list->shift();
    }
}