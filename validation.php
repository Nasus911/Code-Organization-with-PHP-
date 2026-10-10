<?php
function clean_input(string $value): string
{
    return trim($value);
}

function escape_output(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function valid_name(string $name): bool
{
    return preg_match("/^[A-Za-z][A-Za-z .'-]{1,99}$/", $name) === 1;
}

function valid_email(string $email): bool
{
    return preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/", $email) === 1;
}

function valid_password(string $password): bool
{
    return preg_match("/^(?=.*[A-Za-z])(?=.*\d)\S{8,}$/", $password) === 1;
}
