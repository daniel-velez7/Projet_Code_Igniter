<?php

// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
//C'est une class qui permet de mettre en place le CRUD (Create, Read, Update, Delete)
//Elle permet de faire tout le travails des requêtes SQL et l'appel à la base de donnée de manière simplifier
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
class API
{
    //Variable de connection à la base de donnée
    private $DATABASE_HOST;
    private $DATABASE_USER;
    private $DATABASE_PASS;
    private $DATABASE_NAME;
    //variable qui contient la liaison entre le serveur et la base de donnée
    private $connection;

    //Constructeur qui initialise les variables de connection à la base de donnée et lance la connection 
    function __construct($newHost = 'localhost', $newUser = 'root', $newPWD = '', $newName = 'infoweb')
    {
        $this->DATABASE_HOST = $newHost;
        $this->DATABASE_USER = $newUser;
        $this->DATABASE_PASS = $newPWD;
        $this->DATABASE_NAME = $newName;

        //Lancement de la connection à la base de donnée
        $this->connection = $this->GetNewConnexionToDatabase();
    }

    //Fonction qui créer une connection en PDO de la base de donnée en POO (Programmation Orientée Objet)
    function GetNewConnexionToDatabase()
    {
        try {
            return new PDO(
                'mysql:
                host=' . $this->DATABASE_HOST . ';
                dbname=' . $this->DATABASE_NAME . ';
                charset=utf8',
                $this->DATABASE_USER,
                $this->DATABASE_PASS
            );
        } catch (PDOException $exception) {
            exit('La connection à la base de donnée n\'a pas aboutie');
        }
    }

    //Fonction qui exécute dynamiquement la requête d'insertion de donnée sur la DB
    function InsertIntoDatabase($tableName, $arguments, $values)
    {
        //Requête SQL dynamique
        $request = "INSERT INTO " . $tableName . " " . $arguments . " VALUES " . $values . "";

        //Prepare la requête à être executée
        $status = $this->connection->prepare($request);
        try {
            //Execute la requête
            return $status->execute();
        } catch (PDOException $error) {
            //Gestion d'erreur
            echo 'Échec de la requete : ' . $error->getMessage();
            return null;
        }
    }

    //Fonction qui exécute dynamiquement la requête d'update de donnée sur la DB
    function UpdateObjectIntoDatabase($id, $tableName, $arguments, $values)
    {
        if (count($arguments) == count($values)) {
            $count = count($arguments);
            //Requête SQL dynamique
            $request = "update " . $tableName . " set ";
            for ($i = 0; $i < $count; $i++) {
                //Si l'index n'est pas le dernier element de la liste alors ...
                if (($i + 1) < $count) {
                    //Je rajoute une virgule à la fin
                    $request = $request . $arguments[$i] . "='" . $values[$i] . "', ";
                } else {
                    //Sinon je cloture l'ajout de valeur
                    $request = $request . $arguments[$i] . "='" . $values[$i] . "' ";
                }
            }
            //Je termine la requête
            $request = $request . " where id='" . $id . "'";

            //Prepare la requête à être executée
            $status = $this->connection->prepare($request);
            try {
                //Execute la requête
                return $status->execute();
            } catch (PDOException $e) {
                //Gestion d'erreur
                echo 'Échec de la requete : ' . $e->getMessage();
                exit();
            }
        } else {
            //Gestion d'erreur
            echo "Il faut le meme nombre d'argument que de valeur !";
            exit();
        }
    }

    //Fonction qui exécute dynamiquement la requête de suppresion de donnée sur la DB
    function DeleteIntoDatabase($id, $tableName)
    {
        //Requête SQL dynamique
        $request = "delete from " . $tableName . " where id='" . $id . "'";
        //Prepare la requête à être executée
        $status = $this->connection->prepare($request);

        try {
            //Execute la requête
            return $status->execute();
        } catch (PDOException $e) {
            //Gestion d'erreur
            echo 'Échec de la connexion : ' . $e->getMessage();
            exit();
        }
    }

    //Fonction qui exécute dynamiquement la requête de suppresion de donnée sur la DB
    function DeleteInterTableIntoDatabase($tableName, $arguments, $values)
    {
        if (count($arguments) == count($values)) {
            $count = count($arguments);
            //Requête SQL dynamique
            $request = "delete from " . $tableName . " where ";
            for ($i = 0; $i < $count; $i++) {
                //Si l'index n'est pas le dernier element de la liste alors ...
                if (($i + 1) < $count) {
                    //Je rajoute une virgule à la fin
                    $request = $request . $arguments[$i] . "='" . $values[$i] . "'&& ";
                } else {
                    //Sinon je cloture l'ajout de valeur
                    $request = $request . $arguments[$i] . "='" . $values[$i] . "' ";
                }
            }
        }
        //Requête SQL dynamique
        //Prepare la requête à être executée
        $status = $this->connection->prepare($request);

        try {
            //Execute la requête
            return $status->execute();
        } catch (PDOException $e) {
            //Gestion d'erreur
            echo 'Échec de la connexion : ' . $e->getMessage();
            exit();
        }
    }

    //Fonction qui exécute dynamiquement la requête de récupération de donnée sur la DB
    function GetObjectFromDatabase($id, $tableName)
    {
        //Requête SQL dynamique
        $request = "select * from " . $tableName . " where id='" . $id . "'";
        //Prepare la requête à être executée
        $status = $this->connection->prepare($request);
        try {
            //Execute la requête
            $result = $status->execute();
            if ($result == true) {
                //Recupère le résultat de la requête sous forme de tableau
                $result = $status->fetchAll(PDO::FETCH_ASSOC);
                if ($result == true) {
                    //Envoie du résultat de la requête
                    return $result;
                } else {
                    //Gestion d'erreur
                    return null;
                }
            }
        } catch (PDOException $e) {
            //Gestion d'erreur
            echo 'Échec de la requete : ' . $e->getMessage();
            return null;
        }
    }

    //Fonction qui exécute dynamiquement la requête de récupération de donnée sur la DB
    function GetConditionObjectFromDatabase($tableName, $arguments, $values)
    {
        if (count($arguments) == count($values)) {
            $count = count($arguments);
            //Requête SQL dynamique
            $request = "select * from " . $tableName . " where ";
            for ($i = 0; $i < $count; $i++) {
                //Si l'index n'est pas le dernier element de la liste alors ...
                if (($i + 1) < $count) {
                    //Je rajoute une virgule à la fin
                    $request = $request . $arguments[$i] . "='" . $values[$i] . "'&& ";
                } else {
                    //Sinon je cloture l'ajout de valeur
                    $request = $request . $arguments[$i] . "='" . $values[$i] . "' ";
                }
            }
            //Prepare la requête à être executée
            $status = $this->connection->prepare($request);
            try {
                //Execute la requête
                $result = $status->execute();
                if ($result == true) {
                    //Recupère le résultat de la requête sous forme de tableau
                    $result = $status->fetchAll(PDO::FETCH_ASSOC);
                    if ($result == true) {
                        //Envoie du résultat de la requête
                        return $result;
                    } else {
                        //Gestion d'erreur
                        return null;
                    }
                }
            } catch (PDOException $error) {
                //Gestion d'erreur
                echo 'Échec de la requete : ' . $error->getMessage();
                return null;
            }
        }
    }

    function GetLastObjectFromDatabase($tableName)
    {
        //Requête SQL dynamique
        $request = "select * from " . $tableName . " ORDER BY id desc limit 1";
        //Prepare la requête à être executée
        $status = $this->connection->prepare($request);
        try {
            //Execute la requête
            $result = $status->execute();
            if ($result == true) {
                //Recupère le résultat de la requête sous forme de tableau
                $result = $status->fetchAll(PDO::FETCH_ASSOC);
                if ($result == true) {
                    //Envoie du résultat de la requête
                    return $result;
                } else {
                    //Gestion d'erreur
                    return null;
                }
            }
        } catch (PDOException $e) {
            //Gestion d'erreur
            echo 'Échec de la requete : ' . $e->getMessage();
            return null;
        }
    }

    function GetAllAttributeFromDatabase($tableName, $attribute)
    {
        //Requête SQL dynamique
        $request = "select " . $attribute . " from " . $tableName;
        //Prepare la requête à être executée
        $status = $this->connection->prepare($request);
        try {
            //Execute la requête
            $result = $status->execute();
            if ($result == true) {
                //Recupère le résultat de la requête sous forme de tableau
                $result = $status->fetchAll(PDO::FETCH_ASSOC);
                if ($result == true) {
                    //Envoie du résultat de la requête
                    return $result;
                } else {
                    //Gestion d'erreur
                    return null;
                }
            }
        } catch (PDOException $e) {
            //Gestion d'erreur
            echo 'Échec de la requete : ' . $e->getMessage();
            return null;
        }
    }

    function GetAttributeFromDatabase($id, $tableName, $attribute)
    {
        //Requête SQL dynamique
        $request = "select " . $attribute . " from " . $tableName . " where id='" . $id . "'";
        //Prepare la requête à être executée
        $status = $this->connection->prepare($request);
        try {
            //Execute la requête
            $result = $status->execute();
            if ($result == true) {
                //Recupère le résultat de la requête sous forme de tableau
                $result = $status->fetchAll(PDO::FETCH_ASSOC);
                if ($result == true) {
                    //Envoie du résultat de la requête
                    return $result;
                } else {
                    //Gestion d'erreur
                    return null;
                }
            }
        } catch (PDOException $e) {
            //Gestion d'erreur
            echo 'Échec de la requete : ' . $e->getMessage();
            return null;
        }
    }

    function UploadFileIntoServer($tmp_name, $server_path)
    {
        return move_uploaded_file($tmp_name, $server_path);
    }

    function UpdateFileIntoServer()
    {
    }

    function DeleteFileIntoServer()
    {
    }

    function GetList($tableName)
    {
        //Requête SQL dynamique
        $request = "select * from " . $tableName;
        //Prepare la requête à être executée
        $status = $this->connection->prepare($request);
        try {
            //Execute la requête
            $result = $status->execute();
            if ($result == true) {
                //Recupère le résultat de la requête sous forme de tableau
                $result = $status->fetchAll(PDO::FETCH_ASSOC);
                if ($result == true) {
                    //Envoie du résultat de la requête
                    return $result;
                } else {
                    //Gestion d'erreur
                    return null;
                }
            }
        } catch (PDOException $e) {
            //Gestion d'erreur
            echo 'Échec de la requete : ' . $e->getMessage();
            return null;
        }
        //Gestion d'erreur
        return null;
    }

    //fonction de conversion dynamique d'un tableau vers une classe $classname
    function ConverteListIntoObjects($classname, $listData)
    {
        $list_class = [];

        //Boucle de convertion du tableau
        //Creer un objet par element dans le tableau
        for ($i = 0; $i < count($listData); $i++) {
            $data = $listData[$i];
            $list_class[$i] = new $classname();
            $list_class[$i]->Initialize($data);
        }
        //Retourne la liste des objets créée
        return $list_class;
    }
}

// -------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------
//---------------------------------------Création de l'objet API------------------------------------

$api = new API();

// -------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------
//------------------------------------------Zone de requête-----------------------------------------


//Si la requête contient bien un type
if (isset($_REQUEST['type'])) {
    $type = $_REQUEST['type'];

    //Alors on vérifie le type de requête voulu
    //Insert
    if ($type == 'insert') {
        //récupération des variables nécéssaire à la requête
        $tableName = $_REQUEST['tableName'];
        $arguments = $_REQUEST['arguments'];
        $values = $_REQUEST['values'];

        echo json_encode($api->InsertIntoDatabase($tableName, $arguments, $values));
        exit();
    }
    //Select All
    else if ($type == 'all_select') {
        //récupération des variables nécéssaire à la requête
        $tableName = $_REQUEST['tableName'];
        //appel de la fonction qui permet de récupérer l'entièreté de la table
        echo json_encode($api->GetList($tableName));
        exit();
    }
    //Select one
    else if ($type == 'one_select') {
        //récupération des variables nécéssaire à la requête
        $id = $_REQUEST['id'];
        $tableName = $_REQUEST['tableName'];

        //appel de la fonction qui permet de récupérer un objet de la table
        echo json_encode($api->GetObjectFromDatabase($id, $tableName));
        exit();
    }
    //Select one
    else if ($type == 'condition_select') {
        //récupération des variables nécéssaire à la requête
        $tableName = $_REQUEST['tableName'];
        $arguments = explode(",", $_REQUEST['arguments']);
        $values = explode(",", $_REQUEST['values']);

        //appel de la fonction qui permet de récupérer un objet de la table
        echo json_encode($api->GetConditionObjectFromDatabase($tableName, $arguments, $values));
        exit();
    } else if ($type == "last_select") {
        //récupération des variables nécéssaire à la requête
        $tableName = $_REQUEST['tableName'];

        //appel de la fonction qui permet de récupérer un objet de la table
        echo json_encode($api->GetLastObjectFromDatabase($tableName));
        exit();
    }
    //Update
    else if ($type == 'update') {
        //récupération des variables nécéssaire à la requête
        $id = $_REQUEST['id'];
        $tableName = $_REQUEST['tableName'];
        $arguments = explode(",", $_REQUEST['arguments']);
        $values = explode(",", $_REQUEST['values']);

        //appel de la fonction qui permet de mettre à jour un objet de la table
        echo json_encode($api->UpdateObjectIntoDatabase($id, $tableName, $arguments, $values));
        exit();
    }
    //Delete
    else if ($type == 'delete') {
        //récupération des variables nécéssaire à la requête
        $id = $_REQUEST['id'];
        $tableName = $_REQUEST['tableName'];

        //appel de la fonction qui permet de supprimer un objet de la table
        echo json_encode($api->DeleteIntoDatabase($id, $tableName));
        exit();
    }
    //Delete
    else if ($type == 'delete_inter_table') {
        //récupération des variables nécéssaire à la requête
        $tableName = $_REQUEST['tableName'];
        $arguments = explode(",", $_REQUEST['arguments']);
        $values = explode(",", $_REQUEST['values']);

        //appel de la fonction qui permet de supprimer un objet de la table
        echo json_encode($api->DeleteInterTableIntoDatabase($tableName, $arguments, $values));
        exit();
    }
    //All Attribute
    else if ($type == 'all_attribute') {
        //récupération des variables nécéssaire à la requête
        $tableName = $_REQUEST['tableName'];
        $attribute = $_REQUEST['attribute'];

        //appel de la fonction qui permet de récupérer un attribut sur tout les objets de la table
        echo json_encode($api->GetAllAttributeFromDatabase($tableName, $attribute));
        exit();
    }
    //One Attribute
    else if ($type == 'select_attribute') {
        //récupération des variables nécéssaire à la requête
        $id = $_REQUEST['id'];
        $tableName = $_REQUEST['tableName'];
        $attribute = $_REQUEST['attribute'];

        //appel de la fonction qui permet de récupérer un attribut sur un objet de la table
        echo json_encode($api->GetAttributeFromDatabase($id, $tableName, $attribute));
        exit();
    }
    //Ajoute un fichier sur le serveur
    else if ($type == 'upload_file') {
        //récupération des variables nécéssaire à la requête
        if (isset($_FILES['new_file'])) {
            $new_file = $_FILES['new_file'];
            $tmp_name = $_FILES['new_file']['tmp_name'];
            $server_path = '../upload/' . $_FILES['new_file']['name'];

            // //appel de la fonction qui permet de récupérer un attribut sur un objet de la table
            if ($api->UploadFileIntoServer($tmp_name, $server_path)) {
            $server_path = './upload/' . $_FILES['new_file']['name'];
            echo json_encode($server_path);
                exit();
            } else {
                echo json_encode('Le fichier n\'a pas pu être chargé');
                exit();
            }
        } else {
            echo json_encode('erreur le fichier n\'existe pas');
            exit();
        }
    }
    //Modifie un fichier sur le serveur
    else if ($type == 'update_file') {
        // //récupération des variables nécéssaire à la requête
        // $id = $_REQUEST['id'];
        // $tableName = $_REQUEST['tableName'];
        // $attribute = $_REQUEST['attribute'];

        // //appel de la fonction qui permet de récupérer un attribut sur un objet de la table
        // echo json_encode($api->UpdateFileIntoDatabase($id, $tableName, $attribute));
        // exit();
    }
    //Supprimer un fichier sur le serveur
    else if ($type == 'delete_file') {
        // //récupération des variables nécéssaire à la requête
        // $id = $_REQUEST['id'];
        // $tableName = $_REQUEST['tableName'];
        // $attribute = $_REQUEST['attribute'];

        // //appel de la fonction qui permet de récupérer un attribut sur un objet de la table
        // echo json_encode($api->DeleteFileIntoDatabase($id, $tableName, $attribute));
        // exit();
    }
    //Supprimer un fichier sur le serveur
    else if ($type == 'cryptage') {
        echo (json_encode(hash('sha256', $_REQUEST['value'])));
        exit;
    }
    //Probleme il n'y a pas de requête de se type
    else {
        echo json_encode("FUNCTION NOT FOUND");
        exit();
    }
}
