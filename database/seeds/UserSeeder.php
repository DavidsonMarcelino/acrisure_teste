<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'id' => 1,
                'name' => 'Luan de Camargo',
                'email' => 'luan@it4d.com.br',
                'password' => 'password',
                'cpf_cnpj' => '785.916.310-13',
                'rg' => '123456789-9',
                'photo' => '',
                'cellphone' => '(11) 95049-1045',
                'access_nivel' => '6',
                'status' => '1'
            ],   
            [
                'id' => 2,
                'name' => 'Rodrigo Danza',
                'email' => 'rodrigo@it4d.com.br',
                'password' => 'password',
                'cpf_cnpj' => '785.916.310-13',
                'rg' => '123456789-9',
                'photo' => '',
                'cellphone' => '(11) 95049-1045',
                'access_nivel' => '6',
                'status' => '1'
            ],    
            [
                'id' => 3,
                'name' => 'Newton Naoki Ahagon',
                'email' => 'newton@it4d.com.br',
                'password' => 'password',
                'cpf_cnpj' => '785.916.310-13',
                'rg' => '123456789-9',
                'photo' => '',
                'cellphone' => '(11) 95049-1045',
                'access_nivel' => '6',
                'status' => '1'
            ],              
                
        ];

        foreach ($rows as $key => $row) {
            $exists = User::where('id', $row['id'])->first();
            if ($exists) {
                $exists->update($row);
                continue;
            }
            $user = User::create($row);
        }

    }
}
