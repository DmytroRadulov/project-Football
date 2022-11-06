<?php

function register(array $fields)
{
    try{
        validateRegisterFields($fields);

        $query = "INSERT INTO ". Tables::Users->value ." (name, surname, birthdate, email, password) VALUES (:name, :surname, :birthdate, :email, :password)";
        $query = DB::connect()->prepare($query);

        $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);
        unset($fields['password_confirmation']);

        if ($query->execute($fields)) {
            unset($_SESSION['register']);
            alert('success', 'Вы успешно зарегистрированы!');
            redirect('/login');
        }
    }catch (Exception $e){
        dd($e ->getMessage());
    }

}
function validateRegisterFields(array $fields)
{
    unset($_SESSION['register']);
    $_SESSION['register']['fields'] = $fields;
    if ( !emailValidation($fields['email']) || emptyFields($fields,'register') || !passwordValidation($fields['password'],$fields['password_confirmation'])){
        redirect('/register');
    }


}

function passwordValidation(string $password, string $passwordConfirmation, string $key = 'register'): bool
{
    $result = true;
    if (strlen($password) < 8) {
        $_SESSION[$key]['errors']['password'] = "Длина пароля должна быть больше чем 7 символов";
        $result = false;
    }

    if ($password !== $passwordConfirmation) {
        $_SESSION[$key]['errors']['password'] = "Пароли не совпадают";
        $result = false;
    }
    return $result;
}

function emailValidation(string $email): bool
{
    if (empty($email)){
        $_SESSION['register']['errors']['email'] = "Email не должен быть пустым";
       return false;
    }

    $sql  = "SELECT * FROM `users` WHERE `email` = :email";
    $query = DB::connect()->prepare($sql);
    $query->execute(['email' => $email]);
    $user = $query->fetch();
    if ($user) {
        $_SESSION['register']['errors']['email'] = "Email уже существует";
        return false;
    }

    return true;

}

