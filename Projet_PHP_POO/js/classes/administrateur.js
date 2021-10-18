class Administrateur {

    id;
    nom;
    prenom;
    telephone;
    email;
    mdp;
    adresse;

    constructor(nom, prenom, telephone, email, mdp, adresse) {
        this.nom = nom;
        this.prenom = prenom;
        this.telephone = telephone;
        this.email = email;
        this.mdp = mdp;
        this.adresse = adresse;
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

    set_telephone(newTelephone) {
        this.telephone = newTelephone;
    }

    get_telephone() {
        return this.telephone;
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

    set_adresse(newAdresse) {
        this.adresse = newAdresse;
    }

    get_adresse() {
        return this.adresse;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    Initialize(array) {
        this.id = array['id'];
        this.name = array['nom'];
        this.prenom = array['prenom'];
        this.telephone = array['telephone'];
        this.email = array['email'];
        this.mdp = array['mdp'];
        this.adresse = array['adresse'];
    }

    //Pour L'INSERT
    GetArgumentsForInsert() {
        return ' (nom, prenom, telephone, email, mdp, adresse) ';
    }

    GetValuesForInsert() {
        return  " ('" + this.get_nom() + 
                "', '" + this.get_prenom() + 
                "', '" + this.get_telephone() + 
                "', '" + this.get_email() + 
                "', '" + this.get_mdp() + 
                "', '" + this.get_adresse() + "')";
    }

    //Pour L'UPDATE
    GetArgumentsForUpdate() {
        return ['nom', 'prenom', 'telephone', 'email', 'mdp', 'adresse'];
    }

    GetValuesForUpdate() {
        return [this.get_nom(), this.get_prenom(), this.get_telephone(), this.get_email(), this.get_mdp(), this.get_adresse()];
    }

    //Pour La  connection
    GetArgumentsForSelectCondition() {
        return ['email', 'mdp'];
    }

    GetValuesForSelectCondition() {
        return [this.get_email(), this.get_mdp()];
    }
}