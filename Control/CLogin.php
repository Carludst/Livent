<?php

class CLogin
{
    static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (static::isLogged()) {
                header("Location: ");
            } else {
                $view = new VUtente();
                $view->showLogin();
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            static::verifica();
        }
    }


    static function verifica()
    {
        $view = new VUtente();
        $DBHelper = new FDbH();
        $utente = $DBHelper->loadLogin($_POST['email'], hash("sha3-256", $_POST['password']));

        //Se l'utente esiste
        if ($utente != null) {
            $SHelper = new SessionHelper();
            $SHelper->Login($utente);

            header("Location: ");

        } else {
            //Errore
        }
    }


    static function logout()
    {
        $SHelper = new SessionHelper();
        $SHelper->logout();
    }

    static function isLogged(): bool
    {
        $SHelper = new SessionHelper();
        return $SHelper->isLogged();
    }


    static function signin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (CUtente::isLogged()) {
                header('Location: ');
            } else {
                $view = new VUtente();
                $view->registrazione();
            }
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            CUtente::verificaRegistrazione();
        }
    }


    function modificaProfilo()
    {
        $DBHelper = new FDbH();
        $view = new VUtente();

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (CUtente::isLogged()) {
                $utente = self::getUtente();
                $view->modificaDati($utente, false, false, false);
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (CUtente::isLogged()) {
                $utente = self::getUtente();

                if ($utente->getPassword() == hash('sha3-256', $_POST['oldPassword'])) {
                    if ($utente->getEmail() != $_POST['email'] && $DBHelper->exist("email", $_POST['email'], "FUser")) {
                        $view->modificaDati($utente, true, false, false);

                    } elseif ($utente->getUsername() != $_POST['username'] && $DBHelper->exist("username", $_POST['username'], "FUser")) {
                        $view->modificaDati($utente, false, true, false);

                    } else {
                        CUtente::updateCampi($utente);
                        $newUtente = $DBHelper->loadbyField("email", $_POST['email'], "FUser");
                        $_SESSION['utente'] = serialize($newUtente);
                        header('Location: ');
                    }
                } else {
                    $view->modificaDati($utente, false, false, true);
                }
            } else {
                header('Location: ');
            }
        }
    }


    public static function update(EUser $utente)
    {
        $DBHelper = new FDbH;
        if ($utente->getNome() != $_POST['nome']) {
            $DBHelper->update("nome", $_POST['nome'], "email", $utente->getEmail(), 'FUser');
        }
        if ($utente->getCognome() != $_POST['cognome']) {
            $DBHelper->update("cognome", $_POST['cognome'], "email", $utente->getEmail(), 'FUser');
        }
        if ($_POST['newPassword'] != "") {
            $DBHelper->update("password", hash('sha3-256', $_POST['newPassword']), "email", $utente->getEmail(), 'FUser');
        }
        if ($utente->getEmail() != $_POST['email']) {
            $DBHelper->update("email", $_POST['email'], "email", $utente->getEmail(), 'FUser');
        }
        if ($utente->getUsername() != $_POST['username']) {
            $DBHelper->update("username", $_POST['username'], "email", $utente->getEmail(), 'FUser');
        }
    }


    static function delate()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (CUtente::isLogged()) {
                $view = new VUtente();
                $view->cancellaProfilo(false);
            } else {
                header('Location: ');
            }

        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (CUtente::isLogged()) {
                $utente = (new CUtente)->getUtente();
                if ($utente->getPassword() == hash('sha3-256', $_POST['password'])) {
                    CUtente::logout();
                    $DBHelper = new FDbH();
                    $DBHelper::delete('email', $utente->getEmail(), 'FUser');
                    header('Location: ');
                } else {
                    $view = new VUtente();
                    $view->cancellaProfilo(true);
                }
            } else {
                header('Location: ');
            }
        }
    }


    function getUtente()
    {
        return SessionHelper::getUtente();
    }

}