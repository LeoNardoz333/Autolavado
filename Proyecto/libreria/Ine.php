<?php
    class Ine
    {
        function Validar($edad)
        {
            if($edad >=18)
                return "Eres mayor de edad";
            else
                return "Eres menor de edad";
        }
    }
?>