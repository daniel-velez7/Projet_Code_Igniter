<?php

class Competence {

    id;
    nom;

    constructor(nom) {
        this.nom = nom;
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

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.id = array['id'];
        this.nom = array['nom'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (nom) ';
    }

    GetValuesForInsert() {
        return " ('" + this.get_nom() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForSelectCondition() {
        return ['nom'];
    }

    GetValuesForSelectCondition() {
        return [this.get_nom()];
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['nom'];
    }

    GetValuesForUpdate() {
        return [this.get_nom()];
    }
}

?>