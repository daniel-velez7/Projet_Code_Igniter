class Competence_formateur {

    ref_id_formateur;
    ref_id_competence;

    constructor(ref_id_formateur, ref_id_competence) {
        this.ref_id_formateur = ref_id_formateur;
        this.ref_id_competence = ref_id_competence;
    }

    set_ref_id_formateur(newRef_id_formateur) {
        this.ref_id_formateur = newRef_id_formateur;
    }

    get_ref_id_formateur() {
        return this.ref_id_formateur;
    }

    set_ref_id_competence(newRef_id_competence) {
        this.ref_id_competence = newRef_id_competence;
    }

    get_ref_id_competence() {
        return this.ref_id_competence;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.ref_id_formateur = array['ref_id_formateur'];
        this.ref_id_competence = array['ref_id_competence'];
    }

    //Pour L'INSERT

    GetArgumentsForInsert() {
        return ' (ref_id_formateur, ref_id_competence) ';
    }

    GetValuesForInsert() {
        return " ('" + this.get_ref_id_formateur() +
            "', '" + this.get_ref_id_competence() + "')";
    }


    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['ref_id_formateur', 'ref_id_competence'];
    }

    GetValuesForUpdate() {
        return [this.get_ref_id_formateur(), this.get_ref_id_competence()];
    }

    //Pour L'UPDATE
    GetArgumentsForSelectCondition() {
        return ['ref_id_formateur', 'ref_id_competence'];
    }

    GetValuesForSelectCondition() {
        return [this.get_ref_id_formateur(), this.get_ref_id_competence()];
    }

    //Pour L'UPDATE
    GetArgumentsForDelete() {
        return ['ref_id_formateur', 'ref_id_competence'];
    }

    GetValuesForDelete() {
        return [this.get_ref_id_formateur(), this.get_ref_id_competence()];
    }

}