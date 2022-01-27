new Vue({
    el: '#app',
    data() {
        return {
            info: null,
            search: '',
            city: '',
            cp: '',
            isloading: false
        }
    },
    methods: {
        adressefunction(e) {
            //on prends les données correspondantes a l'adresse sur laquelle on clique 
            let adresse = event.target.textContent
            this.info = null
            this.isloading = false
            //je mets les données reccupérés dans un tableau
            let adresselist = adresse.split(' ')
            //on split les données recuperés dans des variables 
            let town = adresselist.pop()
            let pc = adresselist.pop()
            let street = adresselist.join(' ')
            //j'ecrase les données pour remplacer les bonnes données dans les zones de text
            this.search = street
            this.city = town
            this.cp = pc


        },
        getapi() {
            axios
                //ici on lie l'API 
                .get('https://api-adresse.data.gouv.fr/search/?q=' + this.search)
                .then(response => {
                    this.info = response.data
                    this.isloading = true
                })
        }
    }
})