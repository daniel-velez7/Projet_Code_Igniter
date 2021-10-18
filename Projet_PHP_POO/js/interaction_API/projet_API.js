async function Add_Projet() {
    var status = document.getElementById('status');
    var state = document.createElement('h5');

    var nom = document.getElementById('titre');
    var date_debut = document.getElementById('date_debut');
    var date_fin = document.getElementById('date_fin');

    var session_id = await api_session.OperationOnSession('select', 'id');
    var projet = new Projet(nom.value, date_debut.value, date_fin.value, session_id);

    if (await api.Insert('projet', projet)) {
        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'La formation à été ajouter avec succès';
        DisplayTab_Projet();
    } else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'Veuillez renseigner tout les champs';
    }

    status.innerHTML = '';
    status.appendChild(state);
}

async function Display_Projet() {
    var parent = document.getElementById('search_parent');
    parent.innerHTML = '';
    var projets = await api.Select(Projet, 'projet');

    if (projets != null) {
        if (projets.length != null) {
            projets.forEach(async function (projet) {
                Create_Display_Project(projet, parent);
            })
        } else {
            Create_Display_Project(projets, parent);
        }
    }
}

async function Create_Display_Project(projet, parent) {
    var type = await api_session.OperationOnSession('select', 'type');

    var card = document.createElement('div');
    card.className = 'card m-3 justify-content-center text-center';
    card.style.width = '25rem';

    var card_title = document.createElement('h3');
    card_title.className = 'card-title';
    card_title.innerHTML = projet.get_nom();

    var card_body = document.createElement('div');
    card_body.className = 'card-body justify-content-center text-center';

    var card_date = document.createElement('h5');
    card_date.className = 'card-title';
    card_date.innerHTML = "Date: " + projet.get_date_debut() + " - " + projet.get_date_fin();

    var card_button = document.createElement('a');

    var already_subscribe = await CheckAlreadySubscribe_Projet(projet.get_id());
    if (already_subscribe == true) {
        card_button.className = 'btn btn-color-red';
        card_button.addEventListener('click', async (event) => {
            await UnSubscribe_Intervenant(event.target.id_projet);
            await Display_Projet();
        });
        card_button.id_projet = projet.get_id();
        card_button.innerHTML = 'Se désinscrire';
    } else {
        if (type == 'intervenant') {
            card_button.className = 'btn btn-color-green';
            card_button.addEventListener('click', async (event) => {
                if (event.target.type_account == 'intervenant') {
                    await Subscribe_Intervenant(event.target.id_projet);
                    await Display_Projet();
                }
            });
            card_button.id_projet = projet.get_id();
            card_button.type_account = type;
        } else if (type == 'stagiaire') {
            var id_session = await api_session.OperationOnSession('select', 'id');
            var validation_data = new Validation_Stagiaire_Projet(id_session, projet.get_id(), null);
            var already_validation = await api.Select_Condition(Validation_Stagiaire_Projet, 'validation_stagiaire_projet', validation_data);
            var accepted_data = new Participation_Projet(id_session, projet.get_id());
            var already_accepted = await api.Select_Condition(Participation_Projet, 'participation_projet', accepted_data);

            if (already_validation != null) {
                card_button.className = 'btn btn-color-yellow';
                card_button.innerHTML = 'Demande en cours';
            } else if (already_accepted != null) {
                card_button.className = 'btn btn-color-red';
                card_button.innerHTML = 'Se Désinscrire';
                card_button.addEventListener('click', async (event) => {
                    var participation_projet = new Participation_Projet(event.target.id_session, event.target.id_projet);

                    await api.DeleteInterTable('participation_projet', participation_projet);
                    await Display_Projet();
                });
                card_button.id_projet = projet.get_id();
                card_button.id_session = id_session;
            } else {
                card_button.className = 'btn btn-color-green';
                card_button.innerHTML = 'Inscription';
                card_button.href = 'inscription.php?subscribe=true&type=projet&id=' + projet.get_id();
            }
        }
    }

    card_body.appendChild(card_date);
    card_body.appendChild(card_button);

    card.appendChild(card_title);
    card.appendChild(card_body);

    parent.appendChild(card);
}

async function Display_Projet_Condition() {
    var parent = document.getElementById('search_parent');
    parent.innerHTML = '';
    var id_session = await api_session.OperationOnSession('select', 'id');
    var type = await api_session.OperationOnSession('select', 'type');

    if (type == 'intervenant') {
        var animation_projet_actuel = new Animation_Projet(id_session, null);
        var animation_projets = await api.Select_Condition(Animation_Projet, 'animation_projet', animation_projet_actuel);

        if (animation_projets != null) {
            var projets = [];

            if (animation_projets.length != null) {
                for (var i = 0; i < animation_projets.length; i++) {
                    var animation_projet = animation_projets[i];
                    var projet = await api.Select(Projet, 'projet', animation_projet.get_ref_id_projet());
                    projets.push(projet);
                }
            } else {
                projets.push(await api.Select(Projet, 'projet', animation_projets.get_ref_id_projet()));
            }

            if (projets.length != null) {
                projets.forEach(async function (projet) {
                    Create_Display_Projet_Condition(projet, parent);
                })
            } else {
                Create_Display_Projet_Condition(projet, parent);
            }
        }
    } else if (type == 'stagiaire') {
        var participation_projet_actuel = new Participation_Projet(id_session, null);
        var validation_stagiaire_projet = new Validation_Stagiaire_Projet(id_session, null);
        var validation_projets = await api.Select_Condition(Validation_Stagiaire_Projet, 'validation_stagiaire_projet', validation_stagiaire_projet);
        var participation_projets = await api.Select_Condition(Participation_Projet, 'participation_projet', participation_projet_actuel);

        if (validation_projets != null) {
            var projets = [];

            if (validation_projets.length != null) {
                for (var i = 0; i < validation_projets.length; i++) {
                    var validation_projet = validation_projets[i];
                    var projet = await api.Select(Projet, 'projet', validation_projet.get_ref_id_projet());
                    projets.push(projet);
                }
            } else {
                projets.push(await api.Select(Projet, 'projet', validation_projets.get_ref_id_projet()));
            }

            if (projets.length != null) {
                projets.forEach(async function (projet) {
                    Create_Display_Projet_Condition('validation', projet, parent);
                })
            } else {
                Create_Display_Projet_Condition('validation', projet, parent);
            }
        }

        console.log(participation_projets);
        if (participation_projets != null) {
            var projets = [];

            if (participation_projets.length != null) {
                for (var i = 0; i < participation_projets.length; i++) {
                    var participation_projet = participation_projets[i];
                    var projet = await api.Select(Projet, 'projet', participation_projet.get_ref_id_projet());
                    projets.push(projet);
                }
            } else {
                projets.push(await api.Select(Projet, 'projet', participation_projets.get_ref_id_projet()));
            }

            if (projets.length != null) {
                projets.forEach(async function (projet) {
                    Create_Display_Projet_Condition('stagiaire', projet, parent);
                })
            } else {
                Create_Display_Projet_Condition('stagiaire', projet, parent);
            }
        }
    }
}

async function Create_Display_Projet_Condition(type, projet, parent) {

    var card = document.createElement('div');
    card.className = 'card m-3 justify-content-center text-center';
    card.style.width = '25rem';

    var card_title = document.createElement('h3');
    card_title.className = 'card-title';
    card_title.innerHTML = projet.get_nom();

    var card_body = document.createElement('div');
    card_body.className = 'card-body justify-content-center text-center';

    var card_date = document.createElement('h5');
    card_date.className = 'card-title';
    card_date.innerHTML = "Date: " + projet.get_date_debut() + " - " + projet.get_date_fin();

    var card_button = document.createElement('a');

    if (type == 'intervenant') {
        card_button.className = 'btn btn-color-red';
        card_button.addEventListener('click', async (event) => {
            await UnSubscribe_Intervenant(event.target.projet);
            await Display_Projet_Condition();
        })
        card_button.projet = projet.get_id();
        card_button.innerHTML = 'Se désinscrire';
    } else if (type == 'stagiaire') {
        card_button.className = 'btn btn-color-red';
        card_button.addEventListener('click', async (event) => {
            await UnSubscribe_Stagiaire_Projet(event.target.projet);
            await Display_Projet_Condition();
        })
        card_button.projet = projet.get_id();
        card_button.innerHTML = 'Se désinscrire';
    } else if (type == 'validation') {
        card_button.className = 'btn btn-color-yellow';
        card_button.innerHTML = 'Demande en cours';
    }

    card_body.appendChild(card_date);
    card_body.appendChild(card_button);

    card.appendChild(card_title);
    card.appendChild(card_body);

    parent.appendChild(card);
}

async function CheckAlreadySubscribe_Projet(id_projet) {
    var animation_projets = await api.Select(Animation_Projet, 'animation_projet');
    var id_session = await api_session.OperationOnSession('select', 'id');

    if (animation_projets != null) {
        if (animation_projets.length != null) {
            for (var i = 0; i < animation_projets.length; i++) {
                var id_intervenant_data = animation_projets[i].get_ref_id_intervenant();
                var id_projet_data = animation_projets[i].get_ref_id_projet();

                if (id_session == id_intervenant_data && id_projet == id_projet_data) {
                    return true;
                }
            }
        }
        else {
            var id_intervenant_data = animation_projets.get_ref_id_intervenant();
            var id_projet_data = animation_projets.get_ref_id_projet();

            if (id_session == id_intervenant_data && id_projet == id_projet_data) {
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

async function Subscribe_Projet(projet_id) {
    var session_id = await api_session.OperationOnSession('select', 'id');
    var animation_projet = new Animation_Projet(session_id, projet_id);

    await api.Insert('animation_projet', animation_projet);
}

async function DisplayTab_Projet() {
    var parent = document.getElementById('edit_parent');
    parent.innerHTML = '';

    var projets = await api.Select(Projet, 'projet');

    var row = document.createElement('div');
    var nom_title = document.createElement('div');
    var date_debut_title = document.createElement('div');
    var date_fin_title = document.createElement('div');
    var button_title = document.createElement('div');

    row.className = 'row';
    nom_title.className = 'col border text-center';
    nom_title.innerHTML = 'Nom';
    date_debut_title.className = 'col border text-center';
    date_debut_title.innerHTML = 'Date début';
    date_fin_title.className = 'col border text-center';
    date_fin_title.innerHTML = 'Date fin';
    button_title.className = 'col border text-center';
    button_title.innerHTML = 'Action';

    row.appendChild(nom_title);
    row.appendChild(date_debut_title);
    row.appendChild(date_fin_title);
    row.appendChild(button_title);
    parent.appendChild(row);

    projets.forEach(function (projet) {
        var new_Row = document.createElement('div');
        var new_nom_column = document.createElement('div');
        var new_date_debut_column = document.createElement('div');
        var new_date_fin_column = document.createElement('div');
        var new_button_column = document.createElement('div');
        var new_nom = document.createElement('div');
        var new_date_debut = document.createElement('div');
        var new_date_fin = document.createElement('div');
        var new_button = document.createElement('button');

        new_Row.className = 'row';

        new_nom_column.className = 'col w-100 border text-center';
        new_nom.className = 'd-flex justify-content-center align-items-center h-100';
        new_nom.innerHTML = projet.get_nom();

        new_date_debut_column.className = 'col w-100 border text-center';
        new_date_debut.className = 'd-flex justify-content-center align-items-center h-100';
        new_date_debut.innerHTML = projet.get_date_debut();

        new_date_fin_column.className = 'col w-100 border text-center';
        new_date_fin.className = 'd-flex justify-content-center align-items-center h-100';
        new_date_fin.innerHTML = projet.get_date_fin();

        new_button_column.className = 'col w-100 border text-center';
        new_button.className = 'd-flex justify-content-center align-items-center btn btn-danger h-100 w-100';
        new_button.innerHTML = 'Supprimer';
        new_button.my_id = projet.get_id();
        new_button.addEventListener('click', async (event) => {
            await Delete_Projet(event.target.my_id);
            await DisplayTab_Projet();
        });

        new_nom_column.appendChild(new_nom);
        new_date_debut_column.appendChild(new_date_debut);
        new_date_fin_column.appendChild(new_date_fin);
        new_button_column.appendChild(new_button);
        new_Row.appendChild(new_nom_column);
        new_Row.appendChild(new_date_debut_column);
        new_Row.appendChild(new_date_fin_column);
        new_Row.appendChild(new_button_column);
        parent.appendChild(new_Row);
    })
}

async function Delete_Projet(id) {
    await api.Delete('projet', id);
}