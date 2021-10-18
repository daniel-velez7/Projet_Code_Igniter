class Specialisation {

    id;
    nom;
    id_competence;

    constructor(nom, id_competence) {
        this.nom = nom;
        this.id_competence = id_competence;
    }

    set_id(newid) {
        this.id = newid;
    }

    get_id() {
        return this.id;
    }

    set_nom(newNom) {
        this.nom = newNom;
    }

    get_nom() {
        return this.nom;
    }

    set_id_competence(newIdCompetence) {
        this.id_competence = newIdCompetence;
    }

    get_id_competence() {
        return this.id_competence;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.id = array['id'];
        this.nom = array['nom'];
        this.id_competence = array['ref_id_competence'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (nom, ref_id_competence) ';
    }

    GetValuesForInsert() {
        return " ('" + this.get_nom() +
            "', '" + this.get_id_competence()
            + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForSelectCondition() {
        return ['ref_id_competence'];
    }

    GetValuesForSelectCondition() {
        return [this.get_id_competence()];
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['nom', 'ref_id_competence'];
    }

    GetValuesForUpdate() {
        return [this.get_nom(), this.get_id_competence()];
    }

    //Pour Le Delete
    GetArgumentsForDelete() {
        return ['id', 'ref_id_competence'];
    }

    GetValuesForDelete() {
        return [this.get_ref_id_intervenant(), this.get_ref_id_competence()];
    }
}