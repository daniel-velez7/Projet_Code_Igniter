async function Inscription_Stagiaire(type = 'default') {
    //Récupération des données des inputs
    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var telephone = document.getElementById('telephone');
    var email = document.getElementById('email');
    var mdp = document.getElementById('mdp');
    var adresse = document.getElementById('adresse');

    var status = document.getElementById('status');
    var state = document.createElement('h5');

    if (nom.value !== '' && prenom.value !== '' && telephone.value !== '' &&
        email.value !== '' && mdp.value !== '' && adresse.value !== '') {
        //Création du nouvel élément à ajouter dans la DB
        var newStagiaire = new Stagiaire(nom.value, prenom.value, telephone.value, email.value, await api.GetCryptedValue(mdp.value), adresse.value);

        await api.Insert('stagiaire', newStagiaire);
        if (type != 'edit') {
            await setTimeout(function () { ChangePage("connection.php?type_account=stagiaire"); }, 3000);
        } else {
            DisplayTab_Stagiaire();
        }

        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'L\'inscription à été un succès';
    } else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'Il y a eu un problème lors de l\'inscription';
    }

    status.innerHTML = '';
    status.appendChild(state);
}

async function Connection_Stagiaire() {
    var email = document.getElementById('email');
    var mdp = document.getElementById('mdp');

    var status = document.getElementById('status');
    var state = document.createElement('h5');

    if (email.value !== '' && mdp.value !== '') {
        //Création du nouvel élément à ajouter dans la DB
        var stagiaire_info = new Stagiaire(null, null, null, email.value, await api.GetCryptedValue(mdp.value), null);
        var stagiaire_connected = await api.Select_Condition(Stagiaire, 'stagiaire', stagiaire_info);

        if (stagiaire_connected != null && stagiaire_connected != false) {
            status.className = 'btn btn-success mt-2';
            state.innerHTML = 'La connection à été un succès';

            api_session.OperationOnSession('insert', 'type', 'stagiaire');
            api_session.OperationOnSession('insert', 'id', stagiaire_connected.get_id());
            await setTimeout(function () { ChangePage("index.php"); }, 3000);
        }
        else {
            status.className = 'btn btn-danger mt-2';
            state.innerHTML = 'L\'email ou le mot de passe est incorrect';
        }
    }
    else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'L\'email ou le mot de passe est incorrect';
    }

    status.innerHTML = '';
    status.appendChild(state);
}

async function Subscribe_Stagiaire_Projet(projet_id) {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var participation_projet = new Participation_Projet(session_id, projet_id);

    await api.Insert('participation_projet', participation_projet);
}

async function UnSubscribe_Stagiaire_Projet(projet_id) {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var participation_projet = new Participation_Projet(session_id, projet_id);

    await api.DeleteInterTable('participation_projet', participation_projet);
}

async function Subscribe_Stagiaire_Formation(formation_id) {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var participation_formation = new Participation_Formation(session_id, formation_id);

    await api.Insert('participation_formation', participation_formation);
}

async function UnSubscribe_Stagiaire_Formation(formation_id) {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var participation_formation = new Participation_Formation(session_id, formation_id);

    await api.DeleteInterTable('participation_formation', participation_formation);
}

async function DisplayTab_Stagiaire() {
    var parent = document.getElementById('edit_parent');
    parent.innerHTML = '';

    var stagiaires = await api.Select(Stagiaire, 'stagiaire');

    var row = document.createElement('div');
    var photo_title = document.createElement('div');
    var nom_title = document.createElement('div');
    var prenom_title = document.createElement('div');
    var button_title = document.createElement('div');

    row.className = 'row';
    nom_title.className = 'col border text-center';
    nom_title.innerHTML = 'Nom';
    prenom_title.className = 'col border text-center';
    prenom_title.innerHTML = 'Prenom';
    button_title.className = 'col border text-center';
    button_title.innerHTML = 'Action';

    row.appendChild(photo_title);
    row.appendChild(nom_title);
    row.appendChild(prenom_title);
    row.appendChild(button_title);
    parent.appendChild(row);

    stagiaires.forEach(function (stagiaire) {
        var new_Row = document.createElement('div');
        var new_nom_column = document.createElement('div');
        var new_prenom_column = document.createElement('div');
        var new_button_column = document.createElement('div');
        var new_nom = document.createElement('div');
        var new_prenom = document.createElement('div');
        var new_button = document.createElement('button');

        new_Row.className = 'row';

        new_nom_column.className = 'col w-100 border';
        new_nom.className = 'd-flex justify-content-center align-items-center h-100';
        new_nom.innerHTML = stagiaire.get_nom();

        new_prenom_column.className = 'col w-100 border';
        new_prenom.className = 'd-flex justify-content-center align-items-center h-100';
        new_prenom.innerHTML = stagiaire.get_prenom();

        new_button_column.className = 'col w-100 border';
        new_button.className = 'd-flex justify-content-center align-items-center btn btn-danger h-100 w-100';
        new_button.innerHTML = 'Supprimer';
        new_button.my_id = stagiaire.get_id();
        new_button.addEventListener('click', async (event) => {
            await Delete_Stagiaire(event.target.my_id);
            await DisplayTab_Stagiaire();
        });

        new_nom_column.appendChild(new_nom);
        new_prenom_column.appendChild(new_prenom);
        new_button_column.appendChild(new_button);
        new_Row.appendChild(new_nom_column);
        new_Row.appendChild(new_prenom_column);
        new_Row.appendChild(new_button_column);
        parent.appendChild(new_Row);
    })
}

async function Delete_Stagiaire(id) {
    await api.Delete('stagiaire', id);
}

async function Display_Profils_Stagiaire() {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var actual_stagiaire = await api.Select(Stagiaire, 'stagiaire', session_id);

    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var telephone = document.getElementById('telephone');
    var email = document.getElementById('email');
    var adresse = document.getElementById('adresse');

    nom.value = actual_stagiaire.get_nom();
    prenom.value = actual_stagiaire.get_prenom();
    telephone.value = actual_stagiaire.get_telephone();
    email.value = actual_stagiaire.get_email();
    adresse.value = actual_stagiaire.get_adresse();
}

async function UpdateAccount_Stagiaire() {
    var status = document.getElementById('status');
    var state = document.createElement('h5');

    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var telephone = document.getElementById('telephone');
    var email = document.getElementById('email');
    var mdp = document.getElementById('mdp');
    var adresse = document.getElementById('adresse');

    if (mdp.value !== '') {
        var session_id = await api_session.OperationOnSession('select', 'id');
        var stagiaire_update = new Stagiaire(nom.value, prenom.value, telephone.value, email.value,  await api.GetCryptedValue(mdp.value), adresse.value);
        
        await api.Update('stagiaire', session_id, stagiaire_update);
        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'Le compte à bien été modifié';
    } else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'Veuillez renseigner tout les champs';
    }

    status.innerHTML = '';
    status.appendChild(state);
}

async function DeleteAccount_Stagiaire() {
    var session_id = await api_session.OperationOnSession('select', 'id');

    await api.Delete('stagiaire', session_id);
    window.location = 'deconnection.php';
}

async function Display_Inscription_Stagiaire() {
    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var id_session = await api_session.OperationOnSession('select', 'id');
    var stagiaire = await api.Select(Stagiaire, 'stagiaire', id_session);

    nom.value = stagiaire.get_nom();
    prenom.value = stagiaire.get_prenom();
}

async function Validation_Motivation() {
    var id_session = await api_session.OperationOnSession('select', 'id');
    var id_validation = document.getElementById('id_validation').value;
    var type = document.getElementById('type_validation');
    var motivation = document.getElementById('motivation');

    var status = document.getElementById('status');
    var state = document.createElement('h5');

    if (type.value == 'projet') {
        var validation = new Validation_Stagiaire_Projet(id_session, id_validation, motivation.value);
        await api.Insert('validation_stagiaire_projet', validation);

        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'Votre demande à bien été prise en compte.';

        await setTimeout(function () { ChangePage("search.php?type=" + type.value); }, 3000);
    } else if (type.value == 'formation') {
        var validation = new Validation_Stagiaire_Formation(id_session, id_validation, motivation.value);
        await api.Insert('validation_stagiaire_formation', validation);

        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'Votre demande à bien été prise en compte.';

        await setTimeout(function () { ChangePage("search.php?type=" + type.value); }, 3000);
    } else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'Il y a eu un problème lors de la demande';
    }

    status.innerHTML = '';
    status.appendChild(state);
}