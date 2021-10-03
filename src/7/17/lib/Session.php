<?php

namespace lib;

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function isAuthorized()
    {

    }

    public static function authorize( \lib\entities\Author $user ) : void
    {
        
    }

    public static function deauthorize()
    {

    }
}