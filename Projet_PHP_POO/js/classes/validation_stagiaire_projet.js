class Validation_Stagiaire_Projet {

    ref_id_stagiaire;
    ref_id_projet;
    motivation;

    constructor(ref_id_stagiaire, ref_id_projet, motivation) {
        this.ref_id_stagiaire = ref_id_stagiaire;
        this.ref_id_projet = ref_id_projet;
        this.motivation = motivation;
    }

    set_ref_id_stagiaire(newRef_id_stagiaire) {
        this.ref_id_stagiaire = newRef_id_stagiaire;
    }

    get_ref_id_stagiaire() {
        return this.ref_id_stagiaire;
    }

    set_ref_id_projet(newRef_id_projet) {
        this.ref_id_projet = newRef_id_projet;
    }

    get_ref_id_projet() {
        return this.ref_id_projet;
    }

    set_motivation(newMotivation) {
        this.motivation = newMotivation;
    }

    get_motivation() {
        return this.motivation;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.ref_id_stagiaire = array['ref_id_stagiaire'];
        this.ref_id_projet = array['ref_id_projet'];
        this.motivation = array['motivation'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (ref_id_stagiaire, ref_id_projet, motivation) ';
    }

    GetValuesForInsert() {
        return " ('" + this.get_ref_id_stagiaire() +
              "', '" + this.get_ref_id_projet() + 
            "', '" + this.get_motivation() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['ref_id_stagiaire', 'ref_id_projet', 'motivation'];
    }

    GetValuesForUpdate() {
        return [this.get_ref_id_stagiaire(), this.get_ref_id_projet(), this.get_motivation()];
    }

    //Pour Le DELETE
    GetArgumentsForSelectCondition() {
        if (this.get_ref_id_projet() == null) {
            return ['ref_id_stagiaire'];
        } else {
            return ['ref_id_stagiaire', 'ref_id_projet'];
        }
    }

    GetValuesForSelectCondition() {
        if (this.get_ref_id_projet() == null) {
            return [this.get_ref_id_stagiaire()];
        } else {
            return [this.get_ref_id_stagiaire(), this.get_ref_id_projet()];
        }
    }

    //Pour Le DELETE
    GetArgumentsForDelete() {
        return ['ref_id_stagiaire', 'ref_id_projet'];
    }

    GetValuesForDelete() {
        return [this.get_ref_id_stagiaire(), this.get_ref_id_projet()];
    }

}