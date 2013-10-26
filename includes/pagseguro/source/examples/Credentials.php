<?php

class Credentials
{
    public static function getCredentials()
    {
        $credentials = new PagSeguroAccountCredentials("sousa.justa@gmail.com", "FD3C7617D29F4FA7A2C126676F99B772");
        return $credentials;
    }
}
