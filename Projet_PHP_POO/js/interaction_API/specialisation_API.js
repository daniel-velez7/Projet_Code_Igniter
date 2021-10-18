async function DisplayTab_Specialisation() {
    var parent = document.getElementById('edit_parent');
    parent.innerHTML = '';

    var specialisations = await api.Select(Specialisation, 'specialisation');

    var row = document.createElement('div');
    var nom_title = document.createElement('div');
    var nom_competence = document.createElement('div');
    var button_title = document.createElement('div');

    row.className = 'row';
    nom_title.className = 'col border text-center';
    nom_title.innerHTML = 'Nom';
    nom_competence.className = 'col border text-center';
    nom_competence.innerHTML = 'Competence';
    button_title.className = 'col border text-center';
    button_title.innerHTML = 'Action';

    row.appendChild(nom_title);
    row.appendChild(nom_competence);
    row.appendChild(button_title);
    parent.appendChild(row);
    parent.style.height = 'auto';

    specialisations.forEach(async function (specialisation) {

        var competence = await api.Select(Competence, 'competence', specialisation.get_id_competence());

        var new_Row = document.createElement('div');
        var new_nom_column = document.createElement('div');
        var new_nom = document.createElement('div');
        var new_competence_column = document.createElement('div');
        var new_competence = document.createElement('div');
        var new_button_column = document.createElement('div');
        var new_button = document.createElement('button');

        new_Row.className = 'row';

        new_nom_column.className = 'col w-100 border';
        new_nom.className = 'd-flex justify-content-center align-items-center h-100';
        new_nom.innerHTML = specialisation.get_nom();

        new_competence_column.className = 'col w-100 border';
        new_competence.className = 'd-flex justify-content-center align-items-center h-100';
        new_competence.innerHTML = competence.get_nom();

        new_button_column.className = 'col w-100 border';
        new_button.className = 'd-flex justify-content-center align-items-center btn btn-danger h-100 w-100';
        new_button.innerHTML = 'Supprimer';
        new_button.my_id = specialisation.get_id();
        new_button.addEventListener('click', async (event) => {
            await Delete_Specialisation(event.target.my_id);
            await DisplayTab_Specialisation();
        });

        new_nom_column.appendChild(new_nom);
        new_competence_column.appendChild(new_competence);
        new_button_column.appendChild(new_button);
        new_Row.appendChild(new_nom_column);
        new_Row.appendChild(new_competence_column);
        new_Row.appendChild(new_button_column);
        parent.appendChild(new_Row);
        parent.style.height = 'auto';
    })
}

async function AddOptionCompetences()
{
    var competences = await api.Select(Competence, 'competence');
    var select_competence = document.getElementById('competence');

    competences.forEach(function (competence) {
        var new_option = document.createElement('option');
        
        new_option.innerHTML = competence.get_nom();
        new_option.value = competence.get_id();

        select_competence.appendChild(new_option);
    })
}

async function Add_Specialisation() {
    var nom = document.getElementById('nom');
    var status = document.getElementById('status');
    var state = document.createElement('h5');
    var select_competence = document.getElementById('competence');

    if (nom.value !== '') {
        var newSpecialisation = new Specialisation(nom.value, select_competence.value);
        await api.Insert('specialisation', newSpecialisation);
        status.className = 'btn btn-success mt-2';
        state.innerHTML = 'La specialisation à été ajouter avec succès';
        DisplayTab_Specialisation();
    } else {
        status.className = 'btn btn-danger mt-2';
        state.innerHTML = 'Problème lors de l\'ajout';
    }
    status.innerHTML = '';
    status.appendChild(state);
}

async function Delete_Specialisation(id) {
    await api.Delete('specialisation', id);
}

async function Delete_Specialisation_Formateur(data) {
    await api.DeleteInterTable('specialisation_formateur', data);
}

async function Delete_Specialisation_Intervenant(data) {
    await api.DeleteInterTable('specialisation_intervenant', data);
}