async function Add_Formation() {
    var status = document.getElementById('status');
    var state = document.createElement('h5');

    var titre = document.getElementById('titre');
    var description = document.getElementById('description');
    var nb_heure = document.getElementById('nb_heure');
    var date_debut = document.getElementById('date_debut');
    var date_fin = document.getElementById('date_fin');

    var session_id = await api_session.OperationOnSession('select', 'id');
    var formation = new Formation(titre.value, description.value, nb_heure.value, date_debut.value, date_fin.value, session_id);

    if (await api.Insert('formation', formation)) {
        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'La formation à été ajouter avec succès';
        DisplayTab_Formation();
    } else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'Veuillez renseigner tout les champs';
    }

    status.innerHTML = '';
    status.appendChild(state);
}

async function Display_Formation() {
    var parent = document.getElementById('search_parent');
    parent.innerHTML = '';
    var formations = await api.Select(Formation, 'formation');

    if (formations.length != null) {
        formations.forEach(async function (formation) {
            Create_Display_Formation(formation, parent);
        })
    } else {
        Create_Display_Formation(formations, parent);
    }
}

async function Create_Display_Formation(formation, parent) {
    var type = await api_session.OperationOnSession('select', 'type');

    var card = document.createElement('div');
    card.className = 'card m-3 justify-content-center text-center';
    card.style.width = '25rem';

    var card_title = document.createElement('h3');
    card_title.className = 'card-title';
    card_title.innerHTML = formation.get_titre();

    var card_body = document.createElement('div');
    card_body.className = 'card-body justify-content-center text-center';

    var card_description = document.createElement('p');
    card_description.className = 'card-text';
    card_description.innerHTML = formation.get_description();

    var card_date = document.createElement('h5');
    card_date.className = 'card-title';
    card_date.innerHTML = "Date: " + formation.get_date_debut() + " - " + formation.get_date_fin();

    var card_button = document.createElement('a');

    var already_subscribe = await CheckAlreadySubscribe_Formation(formation.get_id());
    if (already_subscribe == true) {
        card_button.className = 'btn btn-color-red';
        card_button.addEventListener('click', async (event) => {
            await UnSubscribe_Formateur(event.target.id_formation);
            await Display_Formation();
        });
        card_button.id_formation = formation.get_id();
        card_button.innerHTML = 'Se désinscrire';
    } else {
        if (type == 'formateur') {
            card_button.className = 'btn btn-color-green';
            card_button.addEventListener('click', async (event) => {
                if (event.target.type_account == 'formateur') {
                    await Subscribe_Formateur(event.target.id_formation);
                    await Display_Formation();
                }
            });
            card_button.id_formation = formation.get_id();
            card_button.innerHTML = 'S\inscrire';
        } else if (type == 'stagiaire') {
            var id_session = await api_session.OperationOnSession('select', 'id');
            var validation_data = new Validation_Stagiaire_Formation(id_session, formation.get_id(), null);
            var already_validation = await api.Select_Condition(Validation_Stagiaire_Formation, 'validation_stagiaire_formation', validation_data);
            var accepted_data = new Participation_Formation(id_session, formation.get_id());
            var already_accepted = await api.Select_Condition(Participation_Formation, 'participation_formation', accepted_data);

            if (already_validation != null) {
                card_button.className = 'btn btn-color-yellow';
                card_button.innerHTML = 'Demande en cours';
            } else if (already_accepted != null) {
                card_button.className = 'btn btn-color-red';
                card_button.innerHTML = 'Se Désinscrire';
                card_button.addEventListener('click', async (event) => {
                    var participation_formation = new Participation_Formation(event.target.id_session, event.target.id_formation);

                    await api.DeleteInterTable('participation_formation', participation_formation);
                    await Display_Formation();
                });
                card_button.id_formation = formation.get_id();
                card_button.id_session = id_session;
            } else {
                card_button.className = 'btn btn-color-green';
                card_button.innerHTML = 'Inscription';
                card_button.href = 'inscription.php?subscribe=true&type=formation&id=' + formation.get_id();
            }
        }
    }

    card_body.appendChild(card_description);
    card_body.appendChild(card_date);
    card_body.appendChild(card_button);

    card.appendChild(card_title);
    card.appendChild(card_body);

    parent.appendChild(card);
    parent.style.height = 'auto';
}

async function Display_Formation_Condition() {
    var parent = document.getElementById('search_parent');
    parent.innerHTML = '';
    var id_session = await api_session.OperationOnSession('select', 'id');
    var type = await api_session.OperationOnSession('select', 'type');

    if (type == 'formateur') {
        var animation_formation_actuel = new Animation_Formation(id_session, null);
        var animation_formations = await api.Select_Condition(Animation_Formation, 'animation_formation', animation_formation_actuel);

        if (animation_formations != null) {
            var formations = [];

            if (animation_formations.length != null) {
                for (var i = 0; i < animation_formations.length; i++) {
                    var animation_formation = animation_formations[i];
                    var formation = await api.Select(Formation, 'formation', animation_formation.get_ref_id_formation());
                    formations.push(formation);
                }
            } else {
                formations.push(await api.Select(Formation, 'formation', animation_formations.get_ref_id_formation()));
            }

            if (formations.length != null) {
                formations.forEach(async function (formation) {
                    Create_Display_Formation_Condition(formation, parent);
                })
            } else {
                Create_Display_Formation_Condition(formations, parent);
            }
        }
    } else if (type == 'stagiaire') {
        var participation_formation_actuel = new Participation_Formation(id_session, null);
        var validation_stagiaire_formation = new Validation_Stagiaire_Formation(id_session, null);
        var validation_formations = await api.Select_Condition(Validation_Stagiaire_Formation, 'validation_stagiaire_formation', validation_stagiaire_formation);
        var participation_formations = await api.Select_Condition(Participation_Formation, 'participation_formation', participation_formation_actuel);

        if (validation_formations != null) {
            var formations = [];

            if (validation_formations.length != null) {
                for (var i = 0; i < validation_formations.length; i++) {
                    var validation_formation = validation_formations[i];
                    var formation = await api.Select(Formation, 'formation', validation_formation.get_ref_id_formation());
                    formations.push(formation);
                }
            } else {
                formations.push(await api.Select(Formation, 'formation', validation_formations.get_ref_id_formation()));
            }

            if (formations.length != null) {
                formations.forEach(async function (formation) {
                    Create_Display_Formation_Condition('validation', formation, parent);
                })
            } else {
                Create_Display_Formation_Condition('validation', formations, parent);
            }
        }

        if (participation_formations != null) {
            var formations = [];

            if (participation_formations.length != null) {
                for (var i = 0; i < participation_formations.length; i++) {
                    var participation_formation = participation_formations[i];
                    var formation = await api.Select(Formation, 'formation', participation_formation.get_ref_id_formation());
                    formations.push(formation);
                }
            } else {
                formations.push(await api.Select(Formation, 'formation', participation_formations.get_ref_id_formation()));
            }

            if (formations.length != null) {
                formations.forEach(async function (formation) {
                    Create_Display_Formation_Condition('stagiaire', formation, parent);
                })
            } else {
                Create_Display_Formation_Condition('stagiaire', formation, parent);
            }
        }
    }
}

async function Create_Display_Formation_Condition(type, formation, parent) {

    var card = document.createElement('div');
    card.className = 'card m-3 justify-content-center text-center';
    card.style.width = '25rem';

    var card_title = document.createElement('h3');
    card_title.className = 'card-title';
    card_title.innerHTML = formation.get_titre();

    var card_body = document.createElement('div');
    card_body.className = 'card-body justify-content-center text-center';

    var card_description = document.createElement('p');
    card_description.className = 'card-text';
    card_description.innerHTML = formation.get_description();

    var card_date = document.createElement('h5');
    card_date.className = 'card-title';
    card_date.innerHTML = "Date: " + formation.get_date_debut() + " - " + formation.get_date_fin();

    var card_button = document.createElement('a');

    if (type == 'intervenant') {
        card_button.className = 'btn btn-color-red';
        card_button.addEventListener('click', async (event) => {
            await UnSubscribe_Formateur(event.target.id_formation);
            await Display_Formation_Condition();
        });
        card_button.id_formation = formation.get_id();
        card_button.innerHTML = 'Se désinscrire';
    } else if (type == 'stagiaire') {
        card_button.className = 'btn btn-color-red';
        card_button.addEventListener('click', async (event) => {
            await UnSubscribe_Stagiaire_Formation(event.target.id_formation);
            await Display_Formation_Condition();
        });
        card_button.id_formation = formation.get_id();
        card_button.innerHTML = 'Se désinscrire';
    } else if (type == 'validation') {
        card_button.className = 'btn btn-color-yellow';
        card_button.innerHTML = 'Demande en cours';
    }

    card_body.appendChild(card_description);
    card_body.appendChild(card_date);
    card_body.appendChild(card_button);

    card.appendChild(card_title);
    card.appendChild(card_body);

    parent.appendChild(card);
    parent.style.height = 'auto';
}

async function CheckAlreadySubscribe_Formation(id_formation) {
    var animation_formations = await api.Select(Animation_Formation, 'animation_formation');
    var id_session = await api_session.OperationOnSession('select', 'id');

    if (animation_formations != null) {
        if (animation_formations.length != null) {
            for (var i = 0; i < animation_formations.length; i++) {
                var id_formateur_data = animation_formations[i].get_ref_id_formateur();
                var id_formation_data = animation_formations[i].get_ref_id_formation();

                if (id_session == id_formateur_data && id_formation == id_formation_data) {
                    return true;
                }
            }
        }
        else {
            var id_formateur_data = animation_formations.get_ref_id_formateur();
            var id_formation_data = animation_formations.get_ref_id_formation();

            if (id_session == id_formateur_data && id_formation == id_formation_data) {
                return true;
            }
        }
    }
    else {
        console.log('La liste ne contient aucun objet');
        return false;
    }
    console.log('Aucun objet n\'a été trouvé');
    return false;
}

async function DisplayTab_Formation() {
    var parent = document.getElementById('edit_parent');
    parent.innerHTML = '';

    var formations = await api.Select(Formation, 'formation');

    var row = document.createElement('div');
    var titre_title = document.createElement('div');
    var description_title = document.createElement('div');
    var nb_heure_title = document.createElement('div');
    var date_debut_title = document.createElement('div');
    var date_fin_title = document.createElement('div');
    var button_title = document.createElement('div');

    row.className = 'row';
    titre_title.className = 'col border text-center';
    titre_title.innerHTML = 'Titre';
    description_title.className = 'col border text-center';
    description_title.innerHTML = 'Description';
    nb_heure_title.className = 'col border text-center';
    nb_heure_title.innerHTML = 'Nombre d\'heure';
    date_debut_title.className = 'col border text-center';
    date_debut_title.innerHTML = 'Date début';
    date_fin_title.className = 'col border text-center';
    date_fin_title.innerHTML = 'Date fin';
    button_title.className = 'col border text-center';
    button_title.innerHTML = 'Action';

    row.appendChild(titre_title);
    row.appendChild(description_title);
    row.appendChild(nb_heure_title);
    row.appendChild(date_debut_title);
    row.appendChild(date_fin_title);
    row.appendChild(button_title);
    parent.appendChild(row);

    formations.forEach(function (formation) {
        var new_Row = document.createElement('div');
        var new_titre_column = document.createElement('div');
        var new_description_column = document.createElement('div');
        var new_nb_heure_column = document.createElement('div');
        var new_date_debut_column = document.createElement('div');
        var new_date_fin_column = document.createElement('div');
        var new_button_column = document.createElement('div');
        var new_titre = document.createElement('div');
        var new_description = document.createElement('div');
        var new_nb_heure = document.createElement('div');
        var new_date_debut = document.createElement('div');
        var new_date_fin = document.createElement('div');
        var new_button = document.createElement('button');

        new_Row.className = 'row';

        new_titre_column.className = 'col w-100 border text-center';
        new_titre.className = 'd-flex justify-content-center align-items-center h-100';
        new_titre.innerHTML = formation.get_titre();

        new_description_column.className = 'col w-100 border text-center';
        new_description.className = 'd-flex justify-content-center align-items-center h-100';
        new_description.innerHTML = formation.get_description();

        new_nb_heure_column.className = 'col w-100 border text-center';
        new_nb_heure.className = 'd-flex justify-content-center align-items-center h-100';
        new_nb_heure.innerHTML = formation.get_nb_heure();

        new_date_debut_column.className = 'col w-100 border text-center';
        new_date_debut.className = 'd-flex justify-content-center align-items-center h-100';
        new_date_debut.innerHTML = formation.get_date_debut();

        new_date_fin_column.className = 'col w-100 border text-center';
        new_date_fin.className = 'd-flex justify-content-center align-items-center h-100';
        new_date_fin.innerHTML = formation.get_date_fin();

        new_button_column.className = 'col w-100 border text-center';
        new_button.className = 'd-flex justify-content-center align-items-center btn btn-danger h-100 w-100';
        new_button.innerHTML = 'Supprimer';
        new_button.my_id = formation.get_id();
        new_button.addEventListener('click', async (event) => {
            await Delete_Formation(event.target.my_id);
            await DisplayTab_Formation();
        });

        new_titre_column.appendChild(new_titre);
        new_description_column.appendChild(new_description);
        new_nb_heure_column.appendChild(new_nb_heure);
        new_date_debut_column.appendChild(new_date_debut);
        new_date_fin_column.appendChild(new_date_fin);
        new_button_column.appendChild(new_button);
        new_Row.appendChild(new_titre_column);
        new_Row.appendChild(new_description_column);
        new_Row.appendChild(new_nb_heure_column);
        new_Row.appendChild(new_date_debut_column);
        new_Row.appendChild(new_date_fin_column);
        new_Row.appendChild(new_button_column);
        parent.appendChild(new_Row);
    })
}

async function Delete_Formation(id) {
    await api.Delete('formation', id);
}

