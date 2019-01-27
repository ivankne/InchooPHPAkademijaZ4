<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 26.01.19.
 * Time: 13:22
 */

class Employee
{
    public $id;
    public $ime;
    public $prezime;
    public $datum;
    public $spol;
    public $primanja;


    function __construct($id,$ime,$prezime, $datum, $spol, $primanja)
    {
        $this->setId($id);
        $this->setIme($ime);
        $this->setPrezime($prezime);
        $this->setDatum($datum);
        $this->setSpol($spol);
        $this->setPrimanja($primanja);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * @param mixed $ime
     */
    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    /**
     * @return mixed
     */
    public function getPrezime()
    {
        return $this->prezime;
    }

    /**
     * @param mixed $prezime
     */
    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    /**
     * @return mixed
     */
    public function getSpol()
    {
        return $this->spol;
    }

    /**
     * @param mixed $spol
     */
    public function setSpol($spol)
    {
        $this->spol = $spol;
    }

    /**
     * @return mixed
     */
    public function getPrimanja()
    {
        return $this->primanja;
    }

    /**
     * @param mixed $primanja
     */
    public function setPrimanja($primanja)
    {
        $this->primanja = $primanja;
    }


}

$workers = [];



while( true ) {

		// Print the menu on console
		printMenu();

		// Read user choice
		$choice = trim( fgets(STDIN) );

		// Exit application
		if( $choice == 6 ) {

			break;
		}


	//choice
    switch ( $choice ) {

        case 1:
            {
                readEmployee($workers);
                break;
            }
        case 2:
            {
                $workers[] = insertEmployee();
//                echo "Hello Test\n";
                break;
            }
        case 3:
            {
                editEmployee();
                break;
            }
        case 4:
            {
                deleteEmployee();
                break;
            }
        case 5:
            {
                stats();
                break;
            }
    }

}

	function printMenu()
    {
		echo "************ Zaposlenici ******************\n";
		echo "1 - Pregled Zaposlenika\n";
		echo "2 - Unos novog Zaposlenika\n";
		echo "3 - Promjena podataka postojećem zaposleniku\n";
		echo "4 - Brisanje Zaposlenika\n";
		echo "5 - Statistika\n";
		echo "6 - Izlaz\n";
		echo "************ Zaposlenici ******************\n";
		echo "Odaberi 1 do 6 ::";
	}


/**
 * //Pregled Zaposelnika
 *
 */

	function readEmployee($array)
    {
        echo "\n";
        for ($i = 0; $i < count($array); $i++) {
            echo "ID: " . $array[$i]->id . " ";
            echo "IME: " . $array[$i]->ime . " ";
            echo "PREZIME: " . $array[$i]->prezime . " ";
            echo "DATUM ROĐENJA: " . $array[$i]->datum . " ";
            echo "SPOL: " . $array[$i]->spol . " ";
            echo "MJESEČNA PRIMANJA: " . $array[$i]->primanja . " ";
        }
        echo "\n";
    }

/**
 * //Unos novog Zaposlenika
 *
 */
    function insertEmployee()
    {
        echo "ID: ";
        $id = readline();
        echo "Ime: ";
        $ime = readline();
        echo "Prezime: ";
        $prezime = readline();
        echo "Datum rođenja: ";
        $datum = readline();
        echo "Spol: ";
        $spol = readline();
        echo "Mjesečna primanja: ";
        $primanja = readline();
        return new Employee($id, $ime, $prezime, $datum, $spol, $primanja);

    }

/**
 * //Promjena podataka postojećem zaposleniku
 *
 */
    function editEmployee()
    {

    }

/**
 * //Brisanje Zaposlenika
 *
 */
    function deleteEmployee()
    {

    }

/**
 * //Statistika
 *
 */
    function stats()
    {

    }

