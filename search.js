const button = document.querySelector('button')
const place = document.querySelector('#datafetch')

button.addEventListener('click', () => {
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
