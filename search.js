const search = document.querySelector('input.search')
const place = document.querySelector('#datafetch')

search.addEventListener('input', () => {
    const request = new XMLHttpRequest()

    request.addEventListener('load', event => {
        if (event.target.status === 200) {
            place.innerHTML = event.target.responseText
        }
    })

    request.open('POST', './wp-admin/admin-ajax.php', true)

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

    request.send(`action=data_fetch&keyword=${document.querySelector('.search').value}`)
})

// ./wp-admin/admin-ajax.php
// ./wp-content/themes/theme/get.php
