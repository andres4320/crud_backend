<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;

class ProfessionsTableSeeder extends Seeder
{
    public function run()
    {
        $professions = [
            'Ingeniero',
            'Médico',
            'Abogado',
            'Profesor',
            'Contador',
            'Arquitecto',
            'Enfermero/a',
            'Programador/a',
            'Diseñador/a',
            'Administrador/a',
            'Economista',
            'Psicólogo/a',
            'Investigador/a',
            'Analista',
            'Consultor/a',
            'Gerente',
            'Secretario/a',
            'Asistente',
            'Vendedor/a',
            'Electricista',
            'Ingeniero de Software',
            'Dentista',
            'Periodista',
            'Policía',
            'Chef',
            'Piloto',
            'Farmacéutico/a',
            'Ingeniero Civil',
            'Traductor/a',
            'Actor/Actriz',
        ];
        

        foreach ($professions as $profession) {
            Profession::create(['name' => $profession]);
        }
    }
}