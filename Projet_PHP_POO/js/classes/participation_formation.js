class Participation_Formation {

    ref_id_stagiaire;
    ref_id_formation;

    constructor(ref_id_stagiaire, ref_id_formation) {
        this.ref_id_stagiaire = ref_id_stagiaire;
        this.ref_id_formation = ref_id_formation;
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

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.ref_id_stagiaire = array['ref_id_stagiaire'];
        this.ref_id_formation = array['ref_id_formation'];
    }

    //Pour L'INSERT

    GetArgumentsForInsert() {
        return ' (ref_id_stagiaire, ref_id_formation) ';
    }
    GetValuesForInsert() {
        return " ('" + this.get_ref_id_stagiaire() +
            "', '" + this.get_ref_id_formation() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['ref_id_stagiaire', 'ref_id_formation'];
    }

    GetValuesForUpdate() {
        return [this.get_ref_id_stagiaire(), this.get_ref_id_formation()];
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