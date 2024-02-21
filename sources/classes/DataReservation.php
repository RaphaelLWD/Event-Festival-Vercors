<?php
final class DataReservation
{
    private $_DataR;
    public function __construct()
    {
        $this->_DataR = __DIR__ . "./csv/reservation.csv";
    }

    public function enregistrerTicketR(Reservation $reservation)
    {
        $fichier = fopen($this->_DataR, "ab");
        $retour = fputcsv($fichier, $reservation->getObjectToTicket());
        fclose($fichier);
        return $retour;
    }

    public function getTicketR(): array {
        $fichier = fopen($this->_DataR, "r");
        $ticket = [];
        while(($ligne = fgetcsv($fichier, 500)) !=false){
            $ticket[] = new Reservation($ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1], $ligne[1]);
        }
        fclose($fichier);
        return $ticket;
    }
}
