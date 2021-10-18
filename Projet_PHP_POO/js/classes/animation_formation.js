class Animation_Formation {

    ref_id_formateur;
    ref_id_formation;

    constructor(ref_id_formateur, ref_id_formation) {
        this.ref_id_formateur = ref_id_formateur;
        this.ref_id_formation = ref_id_formation;
    }

    set_ref_id_formateur(newRef_id_formation) {
        this.ref_id_formateur = newRef_id_formation;
    }

    get_ref_id_formateur() {
        return this.ref_id_formateur;
    }

    set_ref_id_formation(newRef_id_formation) {
        this.ref_id_formation = newRef_id_formation;
    }

    get_ref_id_formation() {
        return this.ref_id_formation;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.ref_id_formateur = array['ref_id_formateur'];
        this.ref_id_formation = array['ref_id_formation'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (ref_id_formateur, ref_id_formation) ';
    }

    GetValuesForInsert() {
        return " ('" + this.get_ref_id_formateur() +
            "', '" + this.get_ref_id_formation() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['ref_id_formateur', 'ref_id_formation'];
    }

    GetValuesForUpdate() {
        return [this.get_ref_id_formateur(), this.get_ref_id_formation()];
    }

    //Pour Le DELETE
    GetArgumentsForSelectCondition() {
        return ['ref_id_formateur'];
    }

    GetValuesForSelectCondition() {
        return [this.get_ref_id_formateur()];
    }

    //Pour Le DELETE
    GetArgumentsForDelete() {
        return ['ref_id_formateur', 'ref_id_formation'];
    }

    GetValuesForDelete() {
        return [this.get_ref_id_formateur(), this.get_ref_id_formation()];
    }

}