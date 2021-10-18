class Specialisation_Intervenant {

    ref_id_intervenant;
    ref_id_specialisation;

    constructor(ref_id_intervenant, ref_id_specialisation) {
        this.ref_id_intervenant = ref_id_intervenant;
        this.ref_id_specialisation = ref_id_specialisation;
    }

    set_ref_id_intervenant(newRef_id_intervenant) {
        this.ref_id_intervenant = newRef_id_intervenant;
    }

    get_ref_id_intervenant() {
        return this.ref_id_intervenant;
    }

    set_ref_id_specialisation(newRef_id_specialisation) {
        this.ref_id_specialisation = newRef_id_specialisation;
    }

    get_ref_id_specialisation() {
        return this.ref_id_specialisation;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.ref_id_intervenant = array['ref_id_intervenant'];
        this.ref_id_specialisation = array['ref_id_specialisation'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (ref_id_intervenant, ref_id_specialisation) ';
    }

    GetValuesForInsert() {
        return " ('" + this.get_ref_id_intervenant() +
            "', '" + this.get_ref_id_specialisation() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['ref_id_intervenant', 'ref_id_specialisation'];
    }

    GetValuesForUpdate() {
        return [this.get_ref_id_intervenant(), this.get_ref_id_specialisation()];
    }

    //Pour Le DELETE
    GetArgumentsForSelectCondition() {
        return ['ref_id_intervenant'];
    }

    GetValuesForSelectCondition() {
        return [this.get_ref_id_intervenant()];
    }

    //Pour Le DELETE
    GetArgumentsForDelete() {
        return ['ref_id_intervenant', 'ref_id_specialisation'];
    }

    GetValuesForDelete() {
        return [this.get_ref_id_intervenant(), this.get_ref_id_specialisation()];
    }

}