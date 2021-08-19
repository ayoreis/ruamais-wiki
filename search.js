const search = document.querySelector('input.search')
const posts = document.querySelector('section.posts')

search.addEventListener('input', () => {

    // const request = new XMLHttpRequest()
    //
    // request.addEventListener('load', event => {
    //     if (event.target.status === 200) {
    //         posts.innerHTML = event.target.responseText
    //     }
    // })
    //
    // request.open('POST', './wp-admin/admin-ajax.php', true)
    //
    // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    //
    // request.send(`action=foo&valuesomething=hello`)
    // // &keyword=${search.value}

    const data = {
        action: 'data_fetch',
        keyword: "h"
    }

    const request = fetch('./wp-content/themes/theme/styles.css', {
        // headers: {
        //     'Content-Type': 'application/x-www-form-urlencoded'
        // },
        method: "GET",
        // body: JSON.stringify(data)
    })

    .then( r => {
        r.text()
    })

    .then( r => {
        console.log(r)
    })

    .catch(console.error)

    // './wp-admin/admin-ajax.php'

})

// const categoryButtons = document.querySelectorAll('li.category')
//
// categoryButtons.forEach( categoryButton => {
//     categoryButton.addEventListener('click', event => {
//         console.log(event.target.dataset.category);
//     })
// })
