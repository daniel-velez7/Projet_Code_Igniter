class API_SESSION {

    api_url;

    constructor(new_api_url) {
        this.api_url = new_api_url;
    }

    OperationOnSession(action, key, value = null) {

        //Création d'un objet URL pour la requête
        var url = new URL(this.api_url);
        //Création d'un objet qui contient tout nos parametre de requête
        var params = [['action', action], ['key', key], ['value', value]];
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
}

var api_session = new API_SESSION("http://localhost/Projet_PHP_POO/php/api_session.php");