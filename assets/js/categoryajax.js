document.addEventListener('DOMContentLoaded', function(){
    var input = document.getElementById('categoryinput');
    var button = document.getElementById('categoryinputbutton');
    button.addEventListener('click', function(){
        let value = input.value
        let data = new FormData()
        if(input.value){
            data.append('ajax', true)
            data.append('name', value)
            axios.post('http://sarlgermin/index.php?page=Categories/create', data).then(response=>{
                var select = document.getElementById('category');
                select.innerHTML+=`<option value="${response.data.id}" selected="true">${response.data.name}</option>`
            })
        }
        

    });




    var inputsecond = document.getElementById('undercategoryinput');
    var buttonsecond = document.getElementById('undercategoryinputbutton');
    buttonsecond.addEventListener('click', function(){
        let value = inputsecond.value
        let data = new FormData()
        let cat_id = document.getElementById('category').value
        if(inputsecond.value){
            data.append('ajaxCreateUnderCat', true)
            data.append('name', value)
            data.append('cat_id', cat_id)
            axios.post('http://sarlgermin/index.php?page=Categories/create', data).then(response=>{
                var select = document.getElementById('underCategory');
                select.innerHTML+=`<option  value="${response.data.id}" selected="true">${response.data.name}</option>`
            })
        }
    });




    var selectinput = document.getElementById('category')
    selectinput.addEventListener('change', function(){
        let data = new FormData()
        data.append('ajaxUnderCategory', true)
        data.append('cat_id', this.value)
        axios.post('http://sarlgermin/index.php?page=Categories/create', data).then(response=>{
            var select = document.getElementById('underCategory');
            select.innerHTML='<option value="none" selected="true" disabled="disabled" >Choissiez votre sous-categorie</option>'
            response.data.forEach(element => {
                select.innerHTML+=`<option value="${element.id}" >${element.name}</option>`
            });
        })
    })
} );