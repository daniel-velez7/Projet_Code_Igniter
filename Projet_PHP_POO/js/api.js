class API {

    api_url;

    constructor(new_api_url) {
        this.api_url = new_api_url;
    }

    async Select(class_type, table_name, id = -1) {

        if (id != -1) {
            //Récupération des éléments dans la DB
            var object = await this.OperationOnDB("one_select", table_name, id);
            return this.ConverteListIntoObjects(class_type, object);
        }
        else {
            //Récupération des éléments dans la DB
            var objects = await this.OperationOnDB("all_select", table_name);
            return this.ConverteListIntoObjects(class_type, objects);
        }
    }

    async Select_Condition(class_type, table_name, data) {
        var object = await this.OperationOnDB("condition_select", table_name, null, null, data);
        return this.ConverteListIntoObjects(class_type, object);
    }

    async Select_Last(class_type, table_name) {
        var object = await this.OperationOnDB("last_select", table_name);
        //Conversion de la list DB en Objet de Classe Glace
        return this.ConverteListIntoObjects(class_type, object);
    }

    async Select_Attribute(table_name, attribute_name, id = -1) {

        if (id != -1) {
            return await this.OperationOnDB("select_attribute", table_name, id, attribute_name, null);
        }
        else {
            return await this.OperationOnDB("all_attribute", table_name, null, attribute_name, null);
        }
    }

    //Fonction appeler pour initialisé les varibles utilisé dans la requête
    async Insert(table_name, data) {
        return await this.OperationOnDB("insert", table_name, null, null, data);
    }

    async Update(table_name, id, data) {
        return await this.OperationOnDB('update', table_name, id, null, data);
    }

    async Delete(table_name, id) {
        return await this.OperationOnDB('delete', table_name, id);
    }

    async DeleteInterTable(table_name, data) {
        return await this.OperationOnDB('delete_inter_table', table_name, null, null, data);
    }

    async GetCryptedValue(value) {
        return await this.EncryptOnDB(value);
    }

    EncryptOnDB(value) {
        //Création d'un objet URL pour la requête
        var url = new URL(this.api_url);
        var params = [['type', 'cryptage'], ['value', value]];

        url.search = new URLSearchParams(params).toString();
        //Requête Ajax
        return fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                return data;
            })
            .catch(function (error) {
                console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
            });
    }

    OperationOnFile(type, file) {
        //Création d'un objet URL pour la requête
        var url = new URL(this.api_url);
        const formData = new FormData();

        formData.append('new_file', file);
        formData.append('type', type);
        //Requête Ajax
        return fetch(url, {
            method: 'POST',
            body:   formData
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                return data;
            })
            .catch(function (error) {
                console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
            });
    }

    OperationOnDB(type, table_name = '', id = -1, attribute_name = null, data = null) {

        //Création d'un objet URL pour la requête
        var url = new URL(this.api_url);
        //Création d'un objet qui contient tout nos parametre de requête
        var params = this.GetParameters(type, table_name, id, attribute_name, data);

        //Ajoute les parametres à l'url
        url.search = new URLSearchParams(params).toString();

        //Requête Ajax
        return fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                return data;
            })
            .catch(function (error) {
                console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
            });
    }

    GetParameters(type, table_name, id = -1, attribute_name = null, data = null) {
        var params_arguments = null;
        var params_values = null;

        if (data != null) {
            if (type == 'insert') {
                params_arguments = data.GetArgumentsForInsert();
                params_values = data.GetValuesForInsert();
            }
            else if (type == 'condition_select') {
                params_arguments = data.GetArgumentsForSelectCondition();
                params_values = data.GetValuesForSelectCondition();
            }
            else if (type == 'delete_inter_table') {
                params_arguments = data.GetArgumentsForDelete();
                params_values = data.GetValuesForDelete();
            }
            else {
                params_arguments = data.GetArgumentsForUpdate();
                params_values = data.GetValuesForUpdate();
            }
        }

        if (type == 'insert') {
            return [['type', 'insert'], ['tableName', table_name], ['arguments', params_arguments], ['values', params_values]];
        }
        //Select All
        else if (type == 'all_select') {
            return [['type', 'all_select'], ['tableName', table_name]];
        }
        //Select one
        else if (type == 'one_select') {
            return [['type', 'one_select'], ['id', id], ['tableName', table_name]];
        }
        //Select one
        else if (type == 'condition_select') {
            return [['type', 'condition_select'], ['id', id], ['tableName', table_name], ['arguments', params_arguments], ['values', params_values]];
        }
        //Select Last
        else if (type == "last_select") {
            return [['type', 'last_select'], ['tableName', table_name]];
        }
        //Update
        else if (type == 'update') {
            return [['type', 'update'], ['id', id], ['tableName', table_name], ['arguments', params_arguments], ['values', params_values]];
        }
        //Delete
        else if (type == 'delete') {
            return [['type', 'delete'], ['id', id], ['tableName', table_name]];
        }
        //Delete
        else if (type == 'delete_inter_table') {
            return [['type', 'delete_inter_table'], ['tableName', table_name], ['arguments', params_arguments], ['values', params_values]];
        }
        //All Attribute
        else if (type == 'all_attribute') {
            return [['type', 'all_attribute'], ['tableName', table_name], ['attribute', attribute_name]];
        }
        //One Attribute
        else if (type == 'select_attribute') {
            return [['type', 'select_attribute'], ['id', id], ['tableName', table_name], ['attribute', attribute_name]];
        }
        //Get a value encrypted
        else if (type == 'encrypt_value') {
            return [['type', 'encrypt_value'], ['value', value]];
        }
        //Probleme il n'y a pas de requête de se type
        else {
            console.log('erreur, le type d\'opération n\'est pas reconnu');
            return null;
        }
    }

    ConverteListIntoObjects(class_type, listData) {
        if (listData != null)
        {
            if (listData.length > 1) {
                var list_class = [];
    
                for (var i = 0; i < listData.length; i++) {
                    var data = listData[i];
    
                    list_class[i] = new class_type();
                    list_class[i].Initialize(data);
                }
                return list_class;
            }
            else if (listData.length > 0) {
                return this.ConverteObject(class_type, listData);
            }
        }
        
        console.log("erreur la liste est vide");
        return null;
    }

    ConverteObject(class_type, data) {
        if (data != null) {
            var obj = new class_type();
            obj.Initialize(data[0]);
            return obj;
        }
        console.log("erreur l'objet n'existe pas");
        return null;
    }

}

var api = new API("http://localhost/Projet_PHP_POO/php/api.php");