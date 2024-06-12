<?php

namespace Bookstore;

class History {

    private $logs = [];

    public function logCommand($command) {
        $this->logs[] = $command;
    }

    public function displayHistory() {
        foreach ($this->logs as $log) {
            echo $log."\n";
        }
    }
}