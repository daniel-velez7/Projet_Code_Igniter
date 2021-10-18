<?php

class Animation_Projet {

    ref_id_intervenant;
    ref_id_projet;

    constructor(ref_id_intervenant, ref_id_projet) {
        this.ref_id_intervenant = ref_id_intervenant;
        this.ref_id_projet = ref_id_projet;
    }

    set_ref_id_intervenant(newRef_id_intervenant) {
        this.ref_id_intervenant = newRef_id_intervenant;
    }

    get_ref_id_intervenant() {
        return this.ref_id_intervenant;
    }

    set_ref_id_projet(newRef_id_projet) {
        this.ref_id_projet = newRef_id_projet;
    }

    get_ref_id_projet() {
        return this.ref_id_projet;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.ref_id_intervenant = array['ref_id_intervenant'];
        this.ref_id_projet = array['ref_id_projet'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (ref_id_intervenant, ref_id_projet) ';
    }

    GetValuesForInsert() {
        return " ('" + this.get_ref_id_intervenant() +
            "', '" + this.get_ref_id_projet() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['ref_id_intervenant', 'ref_id_projet'];
    }

    GetValuesForUpdate() {
        return [this.get_ref_id_intervenant(), this.get_ref_id_projet()];
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
        return ['ref_id_intervenant', 'ref_id_projet'];
    }

    GetValuesForDelete() {
        return [this.get_ref_id_intervenant(), this.get_ref_id_projet()];
    }

}

?>