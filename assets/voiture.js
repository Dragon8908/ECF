let contextUl = document.querySelector('#product-grid');
let orderNameBtn = document.querySelector('#orderName');
let checkbox = document.querySelectorAll('input[type=checkbox]')
let inputPrice = document.querySelectorAll('#min_price, #max_price')
let inputKilometrages = document.querySelectorAll('#kilometrages-min, #kilometrages-max')
let inputReleaseYear = document.querySelectorAll('#releaseYear-min, #releaseYear-max')


checkbox.forEach((el) => {
    if (new URLSearchParams(window.location.search).getAll('type[]').includes(el.value.toString())) {
        el.checked = true
    }
})

checkbox.forEach((el) => {
    el.addEventListener('change', () => {
        ur = new URLSearchParams(window.location.search);

        const Form = new FormData(formCheckbox)

        ur.delete('type[]')

        Form.forEach((value, key) => {
            ur.append(key, value)
        })

        $.ajax({
            url : buyUrl + '?' + ur.toString(),
            dataType : 'html',
            type : "get",
            async: true,
            context : orderNameBtn,
            success : function(data) {
                window.history.pushState("", "", buyUrl + '?' + ur.toString() )

                contextUl.innerHTML = data
            }
        })
    })
})

formFilter = document.querySelector('#form-filter')
buyUrl = new URL((window.location.origin + window.location.pathname))

ur = new URLSearchParams(window.location.search);




inputKilometrages.forEach((item) => {

    if (ur.get(item.name)) {
        item.value = ur.get(item.name);
    }

    item.addEventListener('input', () => {

        const Form = new FormData(formFilter)

        Form.forEach((value, key) => {
            ur.set(key, value)
            if (value.length === 0 ) {
                ur.delete(key)
            }
        })

        setTimeout(() => {
            $.ajax({
                url : buyUrl + '?' + ur.toString(),
                dataType : 'html',
                type : "get",
                async: true,
                context : orderNameBtn,
                success : function(data) {
                    window.history.pushState("", "", buyUrl + '?' + ur.toString() )

                    contextUl.innerHTML = data
                }
            })
        }, 1000)
    })
})

inputReleaseYear.forEach((item) => {

    if (ur.get(item.name)) {
        item.value = ur.get(item.name);
    }

    item.addEventListener('input', () =>{
        const Form = new FormData(formFilter)

        Form.forEach((value, key) => {
            ur.set(key, value)
            if (value.length === 0 ) {
                ur.delete(key)
            }
        })

        setTimeout(() => {
            $.ajax({
                url : buyUrl + '?' + ur.toString(),
                dataType : 'html',
                type : "get",
                async: true,
                context : orderNameBtn,
                success : function(data) {
                    window.history.pushState("", "", buyUrl + '?' + ur.toString() )

                    contextUl.innerHTML = data
                }
            })
        }, 1000)
    })
})

inputPrice.forEach((item) => {

    if (ur.get(item.name)) {
        item.value = ur.get(item.name);
    }

    item.addEventListener('input', () => {

        const Form = new FormData(formFilter)

        Form.forEach((value, key) => {
            ur.set(key, value)
            if (value.length === 0 ) {
                ur.delete(key)
            }
        })

        setTimeout(() => {
            $.ajax({
                url : buyUrl + '?' + ur.toString(),
                dataType : 'html',
                type : "get",
                async: true,
                context : orderNameBtn,
                success : function(data) {
                    window.history.pushState("", "", buyUrl + '?' + ur.toString() )

                    contextUl.innerHTML = data
                }
            })
        }, 1000)
    })
})

formCheckbox = document.querySelector('#form-checkbox')


let nameOrder = 'name_DESC'

var paramss = nameOrder;

let url = new URL(window.location.href)
let params = new URLSearchParams(url.search)


params.set('order', paramss)
url.search = params.toString()
select = document.querySelector('#order-select');


select.addEventListener('change', event => {

    let url = new URL(window.location.href)
    let params = new URLSearchParams(url.search)

    ur.set('order', select.value)
    url.search = params.toString()

    event.preventDefault()

    $.ajax({
        url : buyUrl + '?' + ur.toString(),
        dataType : 'html',
        type : "get",
        async: true,
        success : function(data) {
            window.history.pushState("", "", buyUrl + '?' + ur.toString())

            contextUl.innerHTML = data
        }
    })

});


filterBtn = document.querySelector('#btn-filter')

filterBtn.addEventListener('click', (event) => {
    filterBtn.classList.toggle('active')
    $('div.filters').toggleClass('active')
})