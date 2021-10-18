async function DisplayTab_Competence() {
    var parent = document.getElementById('edit_parent');
    parent.innerHTML = '';

    var competences = await api.Select(Competence, 'competence');

    var row = document.createElement('div');
    var nom_title = document.createElement('div');
    var button_title = document.createElement('div');

    row.className = 'row';
    nom_title.className = 'col border text-center';
    nom_title.innerHTML = 'Nom';
    button_title.className = 'col border text-center';
    button_title.innerHTML = 'Action';

    row.appendChild(nom_title);
    row.appendChild(button_title);
    parent.appendChild(row);

    competences.forEach(function (competence) {
        var new_Row = document.createElement('div');
        var new_nom_column = document.createElement('div');
        var new_nom = document.createElement('div');
        var new_button_column = document.createElement('div');
        var new_button = document.createElement('button');

        new_Row.className = 'row';

        new_nom_column.className = 'col w-100 border';
        new_nom.className = 'd-flex justify-content-center align-items-center h-100';
        new_nom.innerHTML = competence.get_nom();

        new_button_column.className = 'col w-100 border';
        new_button.className = 'd-flex justify-content-center align-items-center btn btn-danger h-100 w-100';
        new_button.innerHTML = 'Supprimer';
        new_button.my_id = competence.get_id();
        new_button.addEventListener('click', async (event) => {
            await Delete_Competence(event.target.my_id);
            await DisplayTab_Competence();
        });

        new_nom_column.appendChild(new_nom);
        new_button_column.appendChild(new_button);
        new_Row.appendChild(new_nom_column);
        new_Row.appendChild(new_button_column);
        parent.appendChild(new_Row);
        parent.style.height = 'auto';
    })
}

async function Add_Competence() {
    var nom = document.getElementById('nom');
    var status = document.getElementById('status');
    var state = document.createElement('h5');

    if (nom.value !== '') {
        var newCompetence = new Competence(nom.value);
        await api.Insert('competence', newCompetence);
        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'La competence à été ajouter avec succès';
        DisplayTab_Competence();
    } else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'Problème lors de l\'ajout';
    }
    status.innerHTML = '';
    status.appendChild(state);
}

async function Delete_Competence(id) {
    await api.Delete('competence', id);
}