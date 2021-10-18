class Formateur {

    id;
    nom;
    prenom;
    cv;
    photo;
    email;
    mdp;

    constructor(nom, prenom, cv, photo, email, mdp) {
        this.nom = nom;
        this.prenom = prenom;
        this.cv = cv;
        this.photo = photo;
        this.email = email;
        this.mdp = mdp;
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

    set_prenom(newPrenom) {
        this.prenom = newPrenom;
    }

    get_prenom() {
        return this.prenom;
    }

    set_cv(newCV) {
        this.cv = newCV;
    }

    get_cv() {
        return this.cv;
    }

    set_photo(newPhoto) {
        this.photo = newPhoto;
    }

    get_photo() {
        return this.photo;
    }

    set_email(newid) {
        this.email = newEmail;
    }

    get_email() {
        return this.email;
    }

    set_mdp(newMdp) {
        this.mdp = newMdp;
    }

    get_mdp() {
        return this.mdp;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.id = array['id'];
        this.nom = array['nom'];
        this.prenom = array['prenom'];
        this.cv = array['cv'];
        this.photo = array['photo'];
        this.email = array['email'];
        this.mdp = array['mdp'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (nom, prenom, cv, photo, email, mdp) ';
    }

    GetValuesForInsert() {
        return  " ('" + this.get_nom() + 
                "', '" + this.get_prenom() + 
                "', '" + this.get_cv() + 
                "', '" + this.get_photo() + 
                "', '" + this.get_email() + 
                "', '" + this.get_mdp() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['nom', 'prenom', 'cv', 'photo', 'email', 'mdp'];
    }

    GetValuesForUpdate() {
        return [this.get_nom(), this.get_prenom(), this.get_cv(), this.get_photo(), this.get_email(), this.get_mdp()];
    }

    //Pour La  connection
    GetArgumentsForSelectCondition() {
        return ['email', 'mdp'];
    }

    GetValuesForSelectCondition() {
        return [this.get_email(), this.get_mdp()];
    }
}