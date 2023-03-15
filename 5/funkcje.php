<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    

    class Osoba {
        public $login;
        public $haslo;
        public $imieNazwisko;
    }

    $osoba1 = new Osoba;
    $osoba1->login = "adam";
    $osoba1->haslo = "adam2020";
    $osoba1->imieNazwisko = "Adam Kowalski";

    $osoba2 = new Osoba;
    $osoba2->login = "agata";
    $osoba2->haslo = "2020agata";
    $osoba2->imieNazwisko = "Agata Nowak";

    function getUser($login, $haslo) {
        global $osoba1, $osoba2;

        switch ($login) {
            case $osoba1->login:
                if ($haslo === $osoba1->haslo) {
                    return [1, $osoba1->imieNazwisko];
                }
                break;

            case $osoba2->login:
                if ($haslo === $osoba2->haslo) {
                    return [1, $osoba2->imieNazwisko];
                }
                break;
                
            default:
                return [0, ""];
                break;
            }
        }
?>