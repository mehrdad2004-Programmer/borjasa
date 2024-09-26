<?php
namespace database;

class TicketManager extends Database {
    public function insert_ticket(array $data) {
        try {
            $ticketId = $this->generate_unique_id();
            $data['ticket_id'] = $ticketId;
            $data['status'] = 0;

            return $this->create('tickets', $data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function cancel_ticket(int $ticketId) {
        try {
            return $this->delete('tickets', ['ticket_id' => $ticketId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fetch_ticket() {
        try {
            return $this->read('tickets');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function generate_unique_id() {
        return rand(100000, 999999);
    }
}
