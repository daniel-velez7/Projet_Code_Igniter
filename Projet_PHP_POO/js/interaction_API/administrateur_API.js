async function Connection_Administrateur() {
    var email = document.getElementById('email');
    var mdp = document.getElementById('mdp');

    var status = document.getElementById('status');
    var state = document.createElement('h5');

    if (email.value !== '' && mdp.value !== '') {
        //Création du nouvel élément à ajouter dans la DB
        var administrateur_info = new Administrateur(null, null, null, email.value, await api.GetCryptedValue(mdp.value), null);
        var administrateur_connected = await api.Select_Condition(Administrateur, 'administrateur', administrateur_info);

        if (administrateur_connected) {
            status.className = 'btn btn-success mt-2';
            state.innerHTML = 'La connection à été un succès';

            api_session.OperationOnSession('insert', 'type', 'administrateur');
            api_session.OperationOnSession('insert', 'id', administrateur_connected.get_id());
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

async function Display_Profils_Administrateur() {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var actual_administrateur = await api.Select(Administrateur, 'administrateur', session_id);

    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var telephone = document.getElementById('telephone');
    var email = document.getElementById('email');
    var adresse = document.getElementById('adresse');

    nom.value = actual_administrateur.get_nom();
    prenom.value = actual_administrateur.get_prenom();
    telephone.value = actual_administrateur.get_telephone();
    email.value = actual_administrateur.get_email();
    adresse.value = actual_administrateur.get_adresse();
}

async function UpdateAccount_Administrateur() {
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
        var administrateur_update = new Administrateur(nom.value, prenom.value, telephone.value, email.value,  await api.GetCryptedValue(mdp.value), adresse.value);

        await api.Update('administrateur', session_id, administrateur_update);
        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'Le compte à bien été modifié';
    } else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'Veuillez renseigner tout les champs';
    }

    status.innerHTML = '';
    status.appendChild(state);
}

async function DeleteAccount_Administrateur() {
    var session_id = await api_session.OperationOnSession('select', 'id');

    await api.Delete('administrateur', session_id);
    window.location = 'deconnection.php';
}

function ChangePage(pagePath) {
    window.location = pagePath;
}

async function UploadFile(file) {
    if (file != null) {
        return await api.OperationOnFile('upload_file', file);
    }
}


// function pour afficher les demandes de formation ou projet des stagiaires
async function DisplayTab_DemandeProjets() {
    var parent = document.getElementById('edit_parent');
    parent.innerHTML = '';

    var validation_stagiaire_projets = await api.Select(Validation_Stagiaire_Projet, 'validation_stagiaire_projet');
    // comment cette lgine interagit avec la BD 
    //  on mets la classe dans le premier 
    if (validation_stagiaire_projets != null) {
        var row = document.createElement('div');
        var type_formation = document.createElement('div');
        var nom_nom = document.createElement('div');
        var nom_prenom = document.createElement('div');
        var nom_motivation = document.createElement('div');
        var button_accepter = document.createElement('div');
        var button_refuser = document.createElement('div');

        row.className = 'row';
        type_formation.className = 'col border text-center';
        type_formation.innerHTML = 'Formation';
        nom_nom.className = 'col border text-center';
        nom_nom.innerHTML = 'Nom';
        nom_prenom.className = 'col border text-center';
        nom_prenom.innerHTML = 'Prenom';
        nom_motivation.className = 'col border text-center';
        nom_motivation.innerHTML = 'Motivation';
        button_accepter.className = 'col border text-center';
        button_accepter.innerHTML = 'Action';
        button_refuser.className = 'col border text-center';
        button_refuser.innerHTML = 'Action';

        row.appendChild(type_formation);
        row.appendChild(nom_nom);
        row.appendChild(nom_prenom);
        row.appendChild(nom_motivation);
        row.appendChild(button_accepter);
        row.appendChild(button_refuser);
        parent.appendChild(row);
        parent.style.height = 'auto';

        if (validation_stagiaire_projets.length != null) {
            validation_stagiaire_projets.forEach(async function (validation_stagiaire_projet) {
                Create_DemandeProjet(parent, validation_stagiaire_projet);
            })
        } else {
            Create_DemandeProjet(parent, validation_stagiaire_projets);
        }
    }
}

async function Create_DemandeProjet(parent, validation_stagiaire_projet) {
    var stagiaire = await api.Select(Stagiaire, 'stagiaire', validation_stagiaire_projet.get_ref_id_stagiaire());
    var projet = await api.Select(Projet, 'projet', validation_stagiaire_projet.get_ref_id_projet());

    var new_Row = document.createElement('div');
    var new_type_formation_column = document.createElement('div');
    var new_type_formation = document.createElement('div');
    var new_nom_column = document.createElement('div');
    var new_nom = document.createElement('div');
    var new_prenom_column = document.createElement('div');
    var new_prenom = document.createElement('div');
    var new_motivation_column = document.createElement('div');
    var new_motivation = document.createElement('div');
    var new_button_accept_column = document.createElement('div');
    var new_button_accept = document.createElement('a');
    var new_button_refuse_column = document.createElement('div');
    var new_button_refuse = document.createElement('a');

    new_Row.className = 'row';

    new_type_formation_column.className = 'col w-100 border';
    new_type_formation.className = 'd-flex justify-content-center align-items-center h-100';
    new_type_formation.innerHTML = projet.get_nom();

    new_nom_column.className = 'col w-100 border';
    new_nom.className = 'd-flex justify-content-center align-items-center h-100';
    new_nom.innerHTML = stagiaire.get_nom();

    new_prenom_column.className = 'col w-100 border';
    new_prenom.className = 'd-flex justify-content-center align-items-center h-100';
    new_prenom.innerHTML = stagiaire.get_prenom();

    new_motivation_column.className = 'col w-100 border';
    new_motivation.className = 'd-flex justify-content-center align-items-center h-100';
    new_motivation.innerHTML = validation_stagiaire_projet.get_motivation();

    new_button_accept_column.className = 'col w-100 border';
    new_button_accept.className = 'd-flex justify-content-center align-items-center btn btn-success h-100 w-100';
    new_button_accept.innerHTML = 'Accepter';
    new_button_accept.addEventListener('click', async function (event) {
        Accept_Demand_Projet(event.target.valid_object);
    });
    new_button_accept.valid_object = validation_stagiaire_projet;

    new_button_refuse_column.className = 'col w-100 border';
    new_button_refuse.className = 'd-flex justify-content-center align-items-center btn btn-danger h-100 w-100';
    new_button_refuse.innerHTML = 'Refuser';
    new_button_refuse.addEventListener('click', async function (event) {
        Refuse_Demand_Projet(event.target.valid_object);
    });
    new_button_refuse.valid_object = validation_stagiaire_projet;

    new_type_formation_column.appendChild(new_type_formation);
    new_nom_column.appendChild(new_nom);
    new_prenom_column.appendChild(new_prenom);
    new_motivation_column.appendChild(new_motivation);
    new_button_accept_column.appendChild(new_button_accept);
    new_button_refuse_column.appendChild(new_button_refuse);

    new_Row.appendChild(new_type_formation_column);
    new_Row.appendChild(new_nom_column);
    new_Row.appendChild(new_prenom_column);
    new_Row.appendChild(new_motivation_column);
    new_Row.appendChild(new_button_accept_column);
    new_Row.appendChild(new_button_refuse_column);
    parent.appendChild(new_Row);
    parent.style.height = 'auto';
}

async function Accept_Demand_Projet(validation_stagiaire_projet) {

    await api.DeleteInterTable('validation_stagiaire_projet', validation_stagiaire_projet);

    var id_stagiaire = validation_stagiaire_projet.get_ref_id_stagiaire();
    var id_projet = validation_stagiaire_projet.get_ref_id_projet();
    var participation_projet = new Participation_Projet(id_stagiaire, id_projet);

    await api.Insert('participation_projet', participation_projet);
    DisplayTab_DemandeProjets();
}

async function Refuse_Demand_Projet(validation_stagiaire_projet) {
    await api.DeleteInterTable('validation_stagiaire_projet', validation_stagiaire_projet);
    DisplayTab_DemandeProjets();
}

async function DisplayTab_DemandeFormations() {
    var parent = document.getElementById('edit_parent2');
    parent.innerHTML = '';

    var validation_stagiaire_formations = await api.Select(Validation_Stagiaire_Formation, 'validation_stagiaire_formation');

    // comment cette lgine interagit avec la BD 
    //  on mets la classe dans le premier parametre
    if (validation_stagiaire_formations != null) {
    var row = document.createElement('div');
    var type_formation = document.createElement('div');
    var nom_nom = document.createElement('div');
    var nom_prenom = document.createElement('div');
    var nom_motivation = document.createElement('div');
    var button_accepter = document.createElement('div');
    var button_refuser = document.createElement('div');

    row.className = 'row';
    type_formation.className = 'col border text-center';
    type_formation.innerHTML = 'Formation';
    nom_nom.className = 'col border text-center';
    nom_nom.innerHTML = 'Nom';
    nom_prenom.className = 'col border text-center';
    nom_prenom.innerHTML = 'Prenom';
    nom_motivation.className = 'col border text-center';
    nom_motivation.innerHTML = 'Motivation';
    button_accepter.className = 'col border text-center';
    button_accepter.innerHTML = 'Action';
    button_refuser.className = 'col border text-center';
    button_refuser.innerHTML = 'Action';

    row.appendChild(type_formation);
    row.appendChild(nom_nom);
    row.appendChild(nom_prenom);
    row.appendChild(nom_motivation);
    row.appendChild(button_accepter);
    row.appendChild(button_refuser);
    parent.appendChild(row);
    parent.style.height = 'auto';

    if (validation_stagiaire_formations.length != null) {
        validation_stagiaire_formations.forEach(async function (validation_stagiaire_formation) {
            Create_DemandeFormation(parent, validation_stagiaire_formation);
        })
    } else {
        Create_DemandeFormation(parent, validation_stagiaire_formations);
    }
}
}

async function Create_DemandeFormation(parent, validation_stagiaire_formation) {

    var stagiaire = await api.Select(Stagiaire, 'stagiaire', validation_stagiaire_formation.get_ref_id_stagiaire());
    var formation = await api.Select(Formation, 'formation', validation_stagiaire_formation.get_ref_id_formation());

    var new_Row = document.createElement('div');
    var new_type_formation_column = document.createElement('div');
    var new_type_formation = document.createElement('div');
    var new_nom_column = document.createElement('div');
    var new_nom = document.createElement('div');
    var new_prenom_column = document.createElement('div');
    var new_prenom = document.createElement('div');
    var new_motivation_column = document.createElement('div');
    var new_motivation = document.createElement('div');
    var new_button_accept_column = document.createElement('div');
    var new_button_accept = document.createElement('a');
    var new_button_refuse_column = document.createElement('div');
    var new_button_refuse = document.createElement('a');

    new_Row.className = 'row';

    new_type_formation_column.className = 'col w-100 border';
    new_type_formation.className = 'd-flex justify-content-center align-items-center h-100';
    new_type_formation.innerHTML = formation.get_titre();

    new_nom_column.className = 'col w-100 border';
    new_nom.className = 'd-flex justify-content-center align-items-center h-100';
    new_nom.innerHTML = stagiaire.get_nom();

    new_prenom_column.className = 'col w-100 border';
    new_prenom.className = 'd-flex justify-content-center align-items-center h-100';
    new_prenom.innerHTML = stagiaire.get_prenom();

    new_motivation_column.className = 'col w-100 border';
    new_motivation.className = 'd-flex justify-content-center align-items-center h-100';
    new_motivation.innerHTML = validation_stagiaire_formation.get_motivation();

    new_button_accept_column.className = 'col w-100 border';
    new_button_accept.className = 'd-flex justify-content-center align-items-center btn btn-success h-100 w-100';
    new_button_accept.innerHTML = 'Accepter';
    new_button_accept.addEventListener('click', async function (event) {
        Accept_Demand_Formation(event.target.valid_object);
    });
    new_button_accept.valid_object = validation_stagiaire_formation;
   

    new_button_refuse_column.className = 'col w-100 border';
    new_button_refuse.className = 'd-flex justify-content-center align-items-center btn btn-danger h-100 w-100';
    new_button_refuse.innerHTML = 'Refuser';
    new_button_refuse.addEventListener('click', async function (event) {
        Refuse_Demand_Formation(event.target.valid_object);
    });
    new_button_refuse.valid_object = validation_stagiaire_formation;

  

    new_type_formation_column.appendChild(new_type_formation);
    new_nom_column.appendChild(new_nom);
    new_prenom_column.appendChild(new_prenom);
    new_motivation_column.appendChild(new_motivation);
    new_button_accept_column.appendChild(new_button_accept);
    new_button_refuse_column.appendChild(new_button_refuse);

    new_Row.appendChild(new_type_formation_column);
    new_Row.appendChild(new_nom_column);
    new_Row.appendChild(new_prenom_column);
    new_Row.appendChild(new_motivation_column);
    new_Row.appendChild(new_button_accept_column);
    new_Row.appendChild(new_button_refuse_column);
    parent.appendChild(new_Row);
    parent.style.height = 'auto';
}

async function Accept_Demand_Formation(validation_stagiaire_formation) {

    await api.DeleteInterTable('validation_stagiaire_formation', validation_stagiaire_formation);

    var id_stagiaire = validation_stagiaire_formation.get_ref_id_stagiaire();
    var id_formation = validation_stagiaire_formation.get_ref_id_formation();
    var participation_formation = new Participation_Formation(id_stagiaire, id_formation);

    await api.Insert('participation_formation', participation_formation);
    DisplayTab_DemandeFormations();
}

async function Refuse_Demand_Formation(validation_stagiaire_formation) {
    await api.DeleteInterTable('validation_stagiaire_formation', validation_stagiaire_formation);
    DisplayTab_DemandeFormations();
}