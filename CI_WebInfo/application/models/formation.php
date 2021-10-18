<?php

class Formation {

    id;
    titre;
    description;
    nb_heure;
    date_debut;
    date_fin;
    ref_id_admin;

    constructor(titre, description, nb_heure, date_debut, date_fin, ref_id_admin) {
        this.titre = titre;
        this.description = description;
        this.nb_heure = nb_heure;
        this.date_debut = date_debut;
        this.date_fin = date_fin;
        this.ref_id_admin = ref_id_admin;
    }

    set_id(newid) {
        this.id = newid;
    }

    get_id() {
        return this.id;
    }

    set_titre(newTitre) {
        this.titre = newTitre;
    }

    get_titre() {
        return this.titre;
    }

    set_description(newDescription) {
        this.description = newDescription;
    }

    get_description() {
        return this.description;
    }

    set_nb_heure(newNb_heure) {
        this.nb_heure = newNb_heure;
    }

    get_nb_heure() {
        return this.nb_heure;
    }

    set_date_debut(newDate_debut) {
        this.date_debut = newDate_debut;
    }

    get_date_debut() {
        return this.date_debut;
    }

    set_date_fin(newDate_fin) {
        this.date_fin = newDate_fin;
    }

    get_date_fin() {
        return this.date_fin;
    }

    set_ref_id_admin(newRef_id_admin) {
        this.ref_id_admin = newRef_id_admin;
    }

    get_ref_id_admin() {
        return this.ref_id_admin;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.id = array['id'];
        this.titre = array['titre'];
        this.description = array['description'];
        this.nb_heure = array['nb_heure'];
        this.date_debut = array['date_debut'];
        this.date_fin = array['date_fin'];
        this.ref_id_admin = array['ref_id_admin'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (titre, description, nb_heure, date_debut, date_fin, ref_id_admin) ';
    }

    GetValuesForInsert() {
        return " ('" + this.get_titre() +
            "', '" + this.get_description() +
            "', '" + this.get_nb_heure() +
            "', '" + this.get_date_debut() +
            "', '" + this.get_date_fin() +
            "', '" + this.get_ref_id_admin() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForSelectCondition() {
        return ['id'];
    }

    GetValuesForSelectCondition() {
        return [this.get_id()];
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['titre', 'description', 'nb_heure', 'date_debut', 'date_fin', 'ref_id_admin'];
    }

    GetValuesForUpdate() {
        return [this.get_titre(), this.get_description(), this.get_nb_heure(), this.get_date_debut(), this.get_date_fin(), this.get_ref_id_admin()];
    }

}

?>