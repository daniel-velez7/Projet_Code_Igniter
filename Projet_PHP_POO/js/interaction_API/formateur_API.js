async function Inscription_Formateur(type = 'default') {
    //Récupération des données des inputs
    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var cv = document.getElementById('cv');
    var photo = document.getElementById('photo');
    var email = document.getElementById('email');
    var mdp = document.getElementById('mdp');

    var status = document.getElementById('status');
    var state = document.createElement('h5');

    if (nom.value !== '' && prenom.value !== '' && cv.value !== '' &&
        photo.value !== '' && email.value !== '' && mdp.value !== '') {
        //Création du nouvel élément à ajouter dans la DB
        var newFormateur = new Formateur(nom.value, prenom.value, await UploadFile(cv.files[0]), await UploadFile(photo.files[0]), email.value, await api.GetCryptedValue(mdp.value));

        await api.Insert('formateur', newFormateur);
        if (type != 'edit') {
            await setTimeout(function () { ChangePage("connection.php?type_account=formateur"); }, 3000);
        } else {
            DisplayTab_Formateur();
        }

        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'L\'inscription à été un succès';
    } else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'Il y a eu un problème lors de l\'inscription';
    }

    status.appendChild(state);
}

async function Connection_Formateur() {
    var email = document.getElementById('email');
    var mdp = document.getElementById('mdp');

    var status = document.getElementById('status');
    var state = document.createElement('h5');

    if (email.value !== '' && mdp.value !== '') {
        //Création du nouvel élément à ajouter dans la DB
        var formateur_info = new Formateur(null, null, null, null, email.value, await api.GetCryptedValue(mdp.value));
        var formateur_connected = await api.Select_Condition(Formateur, 'formateur', formateur_info);

        if (formateur_connected) {
            status.className = 'btn btn-success mt-2';
            state.innerHTML = 'La connection à été un succès';

            api_session.OperationOnSession('insert', 'type', 'formateur');
            api_session.OperationOnSession('insert', 'id', formateur_connected.get_id());
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

async function Display_Formateur() {
    var parent = document.getElementById('search_parent');
    var formateurs = await api.Select(Formateur, 'formateur');

    formateurs.forEach(function (formateur) {

        var card = document.createElement('div');
        card.className = 'card m-3';
        card.style.width = '18rem';

        var photo_profils = document.createElement('img');
        photo_profils.className = 'card-img-top';
        photo_profils.src = formateur.get_photo();

        var card_body = document.createElement('div');
        card_body.className = 'card-body justify-content-center text-center';

        var card_title = document.createElement('h5');
        card_title.className = 'card-title';
        card_title.innerHTML = formateur.get_prenom() + ' ' + formateur.get_nom();

        var card_button = document.createElement('a');
        card_button.className = 'btn btn-primary';
        card_button.href = 'profils.php?type=formateur&id=' + formateur.get_id();
        card_button.innerHTML = 'Voir Profils';

        card_body.appendChild(card_title);
        card_body.appendChild(card_button);

        card.appendChild(photo_profils);
        card.appendChild(card_body);

        parent.appendChild(card);
        parent.style.height = 'auto';
    })
}

async function DisplayTab_Formateur() {
    var parent = document.getElementById('edit_parent');
    parent.innerHTML = '';

    var formateurs = await api.Select(Formateur, 'formateur');

    var row = document.createElement('div');
    var photo_title = document.createElement('div');
    var nom_title = document.createElement('div');
    var prenom_title = document.createElement('div');
    var button_title = document.createElement('div');

    row.className = 'row';
    photo_title.className = 'col border text-center';
    photo_title.innerHTML = 'Photo';
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

    formateurs.forEach(function (formateur) {
        var new_Row = document.createElement('div');
        var new_photo_column = document.createElement('div');
        var new_nom_column = document.createElement('div');
        var new_prenom_column = document.createElement('div');
        var new_button_column = document.createElement('div');
        var new_photo = document.createElement('img');
        var new_nom = document.createElement('div');
        var new_prenom = document.createElement('div');
        var new_button = document.createElement('button');

        new_Row.className = 'row';

        new_photo_column.className = 'col w-100 h-100 border text-center';
        new_photo.className = 'img_edit';
        new_photo.src = formateur.get_photo();

        new_nom_column.className = 'col w-100 border';
        new_nom.className = 'd-flex justify-content-center align-items-center h-100';
        new_nom.innerHTML = formateur.get_nom();

        new_prenom_column.className = 'col w-100 border';
        new_prenom.className = 'd-flex justify-content-center align-items-center h-100';
        new_prenom.innerHTML = formateur.get_prenom();

        new_button_column.className = 'col w-100 border';
        new_button.className = 'd-flex justify-content-center align-items-center btn btn-danger h-100 w-100';
        new_button.innerHTML = 'Supprimer';
        new_button.my_id = formateur.get_id();
        new_button.addEventListener('click', async (event) => {
            await Delete_Formateur(event.target.my_id);
            await DisplayTab_Formateur();
        });

        new_photo_column.appendChild(new_photo);
        new_nom_column.appendChild(new_nom);
        new_prenom_column.appendChild(new_prenom);
        new_button_column.appendChild(new_button);
        new_Row.appendChild(new_photo_column);
        new_Row.appendChild(new_nom_column);
        new_Row.appendChild(new_prenom_column);
        new_Row.appendChild(new_button_column);
        parent.appendChild(new_Row);
        parent.style.height = 'auto';
    })
}

async function Delete_Formateur(id) {
    await api.Delete('formateur', id);
}

async function Display_Information_Formateur() {
    var id_formateur = document.getElementById('id_formateur').value;
    var actual_formateur = await api.Select(Formateur, 'formateur', id_formateur);

    var photo = document.getElementById('photo');
    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var cv = document.getElementById('cv');
    var email = document.getElementById('email');

    photo.src = actual_formateur.get_photo();
    cv.href = actual_formateur.get_cv();
    cv.className = 'btn btn-color-green';
    cv.innerHTML = 'afficher le cv';
    nom.innerHTML = actual_formateur.get_nom();
    prenom.innerHTML = actual_formateur.get_prenom();
    email.innerHTML = actual_formateur.get_email();
}

async function Display_Profils_Formateur() {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var actual_formateur = await api.Select(Formateur, 'formateur', session_id);

    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var email = document.getElementById('email');

    nom.value = actual_formateur.get_nom();
    prenom.value = actual_formateur.get_prenom();
    email.value = actual_formateur.get_email();
}

async function UpdateAccount_Formateur() {
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
        var formateur_update = new Formateur(nom.value, prenom.value, telephone.value, email.value,  await api.GetCryptedValue(mdp.value), adresse.value);

        await api.Update('formateur', session_id, formateur_update);
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

    await api.Delete('formateur', session_id);
    window.location = 'deconnection.php';
}

async function Subscribe_Formateur(formation_id) {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var animation_formation = new Animation_Formation(session_id, formation_id);

    return await api.Insert('animation_formation', animation_formation);
}

async function UnSubscribe_Formateur(formation_id) {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var animation_formation = new Animation_Formation(session_id, formation_id);

    return await api.DeleteInterTable('animation_formation', animation_formation);
}

async function DisplayTab_Specialisation_Formateur() {
    var parent = document.getElementById('edit_parent');
    parent.innerHTML = '';

    var row = document.createElement('div');
    var nom_competence = document.createElement('div');
    var nom_specialisation = document.createElement('div');
    var button_title = document.createElement('div');

    row.className = 'row';
    nom_specialisation.className = 'col border text-center';
    nom_specialisation.innerHTML = 'Specialisation';
    nom_competence.className = 'col border text-center';
    nom_competence.innerHTML = 'Competence';
    button_title.className = 'col border text-center';
    button_title.innerHTML = 'Action';

    row.appendChild(nom_competence);
    row.appendChild(nom_specialisation);
    row.appendChild(button_title);
    parent.appendChild(row);


    var id_session = await api_session.OperationOnSession('select', 'id');
    var data = new Specialisation_Formateur(id_session, null);
    var specialisations = await api.Select_Condition(Specialisation_Formateur, 'specialisation_formateur', data);

    if (specialisations != null) {
        if (specialisations.length != null) {
            specialisations.forEach(async function (specialisation) {
                Create_Display_Formateur(specialisation, parent);
            });
        }
        else {
            Create_Display_Formateur(specialisations, parent);
        }
    }
}

async function Create_Display_Formateur(specialisation, parent) {
    var specialisation_actuel = await api.Select(Specialisation, 'specialisation', specialisation.get_ref_id_specialisation());
    var competence_actuel = await api.Select(Competence, 'competence', specialisation_actuel.get_id_competence());


    var new_Row = document.createElement('div');
    var new_competence_column = document.createElement('div');
    var new_competence = document.createElement('div');
    var new_specialisation_column = document.createElement('div');
    var new_specialisation = document.createElement('div');
    var new_button_column = document.createElement('div');
    var new_button = document.createElement('button');

    new_Row.className = 'row';

    new_competence_column.className = 'col w-100 border';
    new_competence.className = 'd-flex justify-content-center align-items-center h-100';
    new_competence.innerHTML = competence_actuel.get_nom();

    new_specialisation_column.className = 'col w-100 border';
    new_specialisation.className = 'd-flex justify-content-center align-items-center h-100';
    new_specialisation.innerHTML = specialisation_actuel.get_nom();

    new_button_column.className = 'col w-100 border';
    new_button.className = 'd-flex justify-content-center align-items-center btn btn-danger h-100 w-100';
    new_button.innerHTML = 'Supprimer';
    new_button.addEventListener('click', async (event) => {
        await Delete_Specialisation_Formateur(event.target.specialisation);
        await DisplayTab_Specialisation_Formateur();
    });
    new_button.specialisation = specialisation;

    new_competence_column.appendChild(new_competence);
    new_specialisation_column.appendChild(new_specialisation);
    new_button_column.appendChild(new_button);
    new_Row.appendChild(new_competence_column);
    new_Row.appendChild(new_specialisation_column);
    new_Row.appendChild(new_button_column);
    parent.appendChild(new_Row);
}

async function Add_Option_Competences_Formateur() {
    var competences = await api.Select(Competence, 'competence');
    var select_competence = document.getElementById('competence');

    competences.forEach(function (competence) {
        var new_option = document.createElement('option');

        new_option.innerHTML = competence.get_nom();
        new_option.value = competence.get_id();

        select_competence.appendChild(new_option);
    })
    Add_Option_Specialisation_Formateur();
}

async function Add_Option_Specialisation_Formateur() {
    var select_competence = document.getElementById('competence');
    select_competence.addEventListener('change', Add_Option_Specialisation_Formateur);


    var spec = new Specialisation(null, select_competence.value);

    var specialisations = await api.Select_Condition(Specialisation, 'specialisation', spec);
    var select_specialisation = document.getElementById('specialisation');
    select_specialisation.innerHTML = '';

    if (specialisations.length != null) {
        specialisations.forEach(function (specialisation) {
            var new_option = document.createElement('option');

            new_option.innerHTML = specialisation.get_nom();
            new_option.value = specialisation.get_id();

            select_specialisation.appendChild(new_option);
        })
    } else {
        var new_option = document.createElement('option');

        new_option.innerHTML = specialisations.get_nom();
        new_option.value = specialisations.get_id();

        select_specialisation.appendChild(new_option);
    }

}

async function Add_Specialisation_Formateur() {
    var specialisation = document.getElementById('specialisation');
    var id_session = await api_session.OperationOnSession('select', 'id');

    var specialisation_formateur = new Specialisation_Formateur(id_session, specialisation.value);

    await api.Insert('specialisation_formateur', specialisation_formateur);
    await DisplayTab_Specialisation_Formateur();
}

async function Delete_Specialisation(id) {
    await api.Delete('specialisation', id);
}
