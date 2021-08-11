const button = document.querySelector('button')

button.addEventListener('click', () => {
    const request = new XMLHttpRequest()

    request.onload = () => {
        if (request.status === 200) {
            console.log(request.responseText)
        }
    }

    request.open('POST', './wp-admin/admin-ajax.php', true)

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

    request.send(`action=data_fetch&keyword=${document.querySelector('.search').value}`)
})

// ./wp-admin/admin-ajax.php
// ./wp-content/themes/theme/get.php
