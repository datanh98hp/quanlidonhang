<?php

namespace Database\Factories;

use App\Models\Thiepcuoi;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThiepcuoiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thiepcuoi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

        'id_user'=>rand(1,3),
        'KH'=>$this->faker->name,
        'o_nhatrai',
        'b_nhatrai',
        'o_nhatgai',
        'b_nhagai',
        'of',
        'chure',
        'codau',
        'bac_chure',
        'bac_codau',
        'time_an_trai',
        'time_tochuc_trai',
        'time_an_gai',
        'time_tochuc_gai',
        'diachi_nhatrai',
        'diachi_nhagai',
        'sdt_trai',
        'sdt_gai',
        'soluong_trai',
        'soluong_gai',
        'Tong_tien',
        'Dat_coc',
        'code_thiep',
        'ngay_tra',
            //
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
