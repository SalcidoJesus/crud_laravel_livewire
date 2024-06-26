<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

		/*
			tengo duda con:
			rrios (ayudante del rector)
			grodriguez (ayudante de tutorías)
			jgarcía (psicólogo)
			jsalas (encargado de edificio 3)
			mgonzalez (yuri, pagos de alumnos)
			las coordinaciones de carreras son 2, cierto?
			amancinas donde anda?
			quitamos a los maestros?
		*/

		$csvData = [
			"2,mmolina@utescuinapa.edu.mx,2",
			"55,cbruno@utescuinapa.edu.mx,2",
			"3,kgarcia@utescuinapa.edu.mx,2",
			"54,nquevedo@utescuinapa.edu.mx,2",
			"23,osalazar@utescuinapa.edu.mx,2",
			"61,jdelapaz@utescuinapa.edu.mx,2",
			"53,rlopez@utescuinapa.edu.mx,2",
			"6,ajasso@utescuinapa.edu.mx,2",
			"4,pguzman@utescuinapa.edu.mx,3",
			"85,hguzman@utescuinapa.edu.mx,2",
			"67,ccrespo@utescuinapa.edu.mx,2",
			"11,ralcaraz@utescuinapa.edu.mx,2",
			"52,rrios@utescuinapa.edu.mx,3",
			"63,arendon@utescuinapa.edu.mx,3",
			"12,ljuarez@utescuinapa.edu.mx,3",
			"46,imoreno@utescuinapa.edu.mx,3",
			"40,cnavarro@utescuinapa.edu.mx,1",
			"64,sosuna@utescuinapa.edu.mx,3",
			"17,grodriguez@utescuinapa.edu.mx,3",
			"77,jsalas@utescuinapa.edu.mx,3",
			"62,jgarcia@utescuinapa.edu.mx,3",
			"90,amorales@utescuinapa.edu.mx,3",
			"99,rguzman@utescuinapa.edu.mx,3",
			"33,mgonzalez@utescuinapa.edu.mx,3",
			"14,lceja@utescuinapa.edu.mx,3",
			"1,jsalcido@utescuinapa.edu.mx,1",
			"89,ksida@utescuinapa.edu.mx,3",
			"34,jsaucedo@utescuinapa.edu.mx,3",
			"32,falmontes@utescuinapa.edu.mx,3",
			"74,dreyes@utescuinapa.edu.mx,3",
			"47,rgastelum@utescuinapa.edu.mx,3",
			"56,lcortes@utescuinapa.edu.mx,3",
			"39,josuna@utescuinapa.edu.mx,3",
			"104,hguerrero@utescuinapa.edu.mx,3",
			"25,tbeltran@utescuinapa.edu.mx,3",
			"84,jsantoyo@utescuinapa.edu.mx,3",
			"72,lreynaga@utescuinapa.edu.mx,3",
			"7,lbojorquez@utescuinapa.edu.mx,3",
			"45,mmartinez@utescuinapa.edu.mx,3",
			"16,bespinosa@utescuinapa.edu.mx,3",
			"51,jzamudio@utescuinapa.edu.mx,3",
			"8,rvidriales@utescuinapa.edu.mx,3",
			"97,eosuna@utescuinapa.edu.mx,3",
			"57,oaguilar@utescuinapa.edu.mx,3",
			"96,mpartida@utescuinapa.edu.mx,3",
			"28,ecarrillo@utescuinapa.edu.mx,3",
			"59,jestrada@utescuinapa.edu.mx,3",
			"37,jpadilla@utescuinapa.edu.mx,3",
			"80,jdiaz@utescuinapa.edu.mx,3",
			"71,erendon@utescuinapa.edu.mx,3",
			"5,nguzman@utescuinapa.edu.mx,3",
			"44,mcontreras@utescuinapa.edu.mx,3",
			"26,dramos@utescuinapa.edu.mx,3",
			"31,jmoreno@utescuinapa.edu.mx,3",
			"68,dbetancourt@utescuinapa.edu.mx,3",
			"35,jmelgoza@utescuinapa.edu.mx,3",
			"106,loliva@utescuinapa.edu.mx,3",
			"43,klerma@utescuinapa.edu.mx,3",
			"75,gcortez@utescuinapa.edu.mx,3",
			"86,avejar@utescuinapa.edu.mx,3",
			"70,ltrillo@utescuinapa.edu.mx,3",
			"94,mluevano@utescuinapa.edu.mx,3",
			"58,ecazarez@utescuinapa.edu.mx,3",
			"36,cbalmaceda@utescuinapa.edu.mx,3",
			"65,emaldonado@utescuinapa.edu.mx,3",
			"41,pluna@utescuinapa.edu.mx,3",
			"95,iramirez@utescuinapa.edu.mx,3",
			"69,auribe@utescuinapa.edu.mx,2",
			"21,aalvarado@utescuinapa.edu.mx,3",
			"30,lvirgen@utescuinapa.edu.mx,2",
			"9,omunoz@utescuinapa.edu.mx,2",
			"10,grendon@utescuinapa.edu.mx,3",
			"19,arodriguez@utescuinapa.edu.mx,2",
			"50,cmendoza@utescuinapa.edu.mx,3",
			"60,icontreras@utescuinapa.edu.mx,2",
			"66,bhernandez@utescuinapa.edu.mx,2",
			"108,blizarraga@utescuinapa.edu.mx,2",
			"110,fmorales@utescuinapa.edu.mx,3",
			"127,jguerrero@utescuinapa.edu.mx,2",
			"128,msandoval@utescuinapa.edu.mx,2"
		];

		// Proceso para convertir los datos y generar las consultas
		foreach ($csvData as $data) {

			list($fk_persona, $email, $tipo_usuario) = explode(',', $data);
			$name = strstr($email, '@', true);
			$password = Hash::make($name);

			DB::table('users')->insert([
				'name' => $name,
				'email' => $email,
				'password' => $password,
				'fk_persona' => $fk_persona,
				'tipo_usuario' => $tipo_usuario
			]);

		}

    }
}
