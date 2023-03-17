<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeesFixture
 */
class EmployeesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nazwisko' => 'Lorem ipsum d',
                'imie' => 'Lorem ipsum d',
                'etat' => 'Lorem ip',
                'id_szefa' => 1.5,
                'zatrudniony' => '2023-03-16',
                'placa_pod' => 1.5,
                'placa_dod' => 1.5,
                'id_zesp' => 1.5,
            ],
        ];
        parent::init();
    }
}
