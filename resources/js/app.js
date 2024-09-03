import './bootstrap';
import '~resources/scss/app.scss';
import boostrap from "bootstrap/dist/js/bootstrap.min.js";
import.meta.glob([
    '../img/**'
])


const input = document.getElementById("suite_address");
input.addEventListener("keyup" , autocomplete);
let risultati = document.getElementById("result");
let result_suggest =[];
function autocomplete(value) {
    // console.log(value.target.value)
    // // https://api.tomtom.com/search/2/search/123%20main%20st.json?key={Your_API_Key}

    const base_url = "https://api.tomtom.com/search/2/search/"



    let codifica = value.target.value
    let mid_url = codifica.replace(/ /g, '%20');
    const apiKey = ".json?key=jmRHcyl09MwwWAWkpuc1wvI3C3miUjkN&countrySet={ITA}"
    console.log(mid_url)
    delete axios.defaults.headers.common['X-Requested-With'];
    axios.get(base_url + mid_url + apiKey).then(response => {
        console.log(response.data.results)
        risultati.innerHTML = ' ';
        result_suggest = response.data.results
        console.log(result_suggest, 'array di rsiultati')
    })

        for (let index = 0; result_suggest.length - 1 < 5; index++) {
            let suggest = result_suggest[index].address;
            console.log(suggest, 'suggerimento')
            let address_suggest = document.createElement("li");
            address_suggest.classList.add("text-danger")
            address_suggest.innerHTML = `<span>${suggest}<span/>`
            address_suggest.addEventListener('click', function () {
                input.value = suggest
                address_suggest = '';
                risultati.innerhtml = '';
            })
            risultati.append(address_suggest)
        }
} 

// axios.get('https://api.tomtom.com/search/2/search/via%20giuseppe%20verdi%20milano.json?limit=6&countrySet=Italia&radius=5&view=Unified&relatedPois=off&key=jmRHcyl09MwwWAWkpuc1wvI3C3miUjkN').then(response => {
       
      
//  axios.get('https://api.tomtom.com/search/2/search/via%20giovanni%20verdi.json?limit=6&countrySet=Italia&radius=5&view=Unified&relatedPois=off&key=jmRHcyl09MwwWAWkpuc1wvI3C3miUjkN').then(response => {
       