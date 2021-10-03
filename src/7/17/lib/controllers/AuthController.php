<?php

namespace lib\controllers;

class AuthController
{
    protected const LOGIN_MIN_LENGTH = 2;
    protected const LOGIN_MAX_LENGTH = 32;
    protected const LOGIN_REGEXP = '';

    protected const PASSWORD_MIN_LENGTH = 6;
    protected const PASSWORD_MAX_LENGTH = 32;
    protected const PASSWORD_REGEXP = '';

    protected function _error_message() : string
    {
        return '';
    }

    protected function _validateLogin() : bool
    {
        return false;
    }

    protected function _validatePassword() : bool
    {
        return false;
    }

    public function getErrorMessage() : string
    {
        return '';
    }

    public function login() : void
    {

    }

    public function logout() : void
    {

    }
}