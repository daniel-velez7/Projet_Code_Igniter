class Validation_Stagiaire_Formation {

    ref_id_stagiaire;
    ref_id_formation;
    motivation;

    constructor(ref_id_stagiaire, ref_id_formation, motivation) {
        this.ref_id_stagiaire = ref_id_stagiaire;
        this.ref_id_formation = ref_id_formation;
        this.motivation = motivation;
    }

    set_ref_id_stagiaire(newRef_id_stagiaire) {
        this.ref_id_stagiaire = newRef_id_stagiaire;
    }

    get_ref_id_stagiaire() {
        return this.ref_id_stagiaire;
    }

    set_ref_id_formation(newRef_id_formation) {
        this.ref_id_formation = newRef_id_formation;
    }

    get_ref_id_formation() {
        return this.ref_id_formation;
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
        this.ref_id_formation = array['ref_id_formation'];
        this.motivation = array['motivation'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (ref_id_stagiaire, ref_id_formation, motivation) ';
    }

    GetValuesForInsert() {
        return " ('" + this.get_ref_id_stagiaire() +
              "', '" + this.get_ref_id_formation() + 
            "', '" + this.get_motivation() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['ref_id_stagiaire', 'ref_id_formation', 'motivation'];
    }

    GetValuesForUpdate() {
        return [this.get_ref_id_stagiaire(), this.get_ref_id_formation(), this.get_motivation()];
    }

    //Pour Le DELETE
    GetArgumentsForSelectCondition() {
        if (this.get_ref_id_formation() == null) {
            return ['ref_id_stagiaire'];
        } else {
            return ['ref_id_stagiaire', 'ref_id_formation'];
        }
    }

    GetValuesForSelectCondition() {
        if (this.get_ref_id_formation() == null) {
            return [this.get_ref_id_stagiaire()];
        } else {
            return [this.get_ref_id_stagiaire(), this.get_ref_id_formation()];
        }
    }

    //Pour Le DELETE
    GetArgumentsForDelete() {
        return ['ref_id_stagiaire', 'ref_id_formation'];
    }

    GetValuesForDelete() {
        return [this.get_ref_id_stagiaire(), this.get_ref_id_formation()];
    }

}