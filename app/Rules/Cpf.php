<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cpf implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        function calc_digitos_posicoes( $digitos, $posicoes = 10, $soma_digitos = 0 ) {
            for ( $i = 0; $i < strlen( $digitos ); $i++  ) {
                $soma_digitos = $soma_digitos + ( $digitos[$i] * $posicoes );
                $posicoes--;
            }
     
            $soma_digitos = $soma_digitos % 11;
     
            if ( $soma_digitos < 2 ) {
                $soma_digitos = 0;
            } else {
                $soma_digitos = 11 - $soma_digitos;
            }
     
            $cpf = $digitos . $soma_digitos;
            
            return $cpf;
        }

        if ( ! $value ) {
            return false;
        }
     
        $value = preg_replace( '/[^0-9]/is', '', $value );
     
        if ( strlen( $value ) != 11 ) {
            return false;
        }   
     
        $digitos = substr($value, 0, 9);
        
        $novo_cpf = calc_digitos_posicoes( $digitos );
        
        $novo_cpf = calc_digitos_posicoes( $novo_cpf, 11 );

        if ( $novo_cpf === $value ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O CPF não é válido.';
    }
}
