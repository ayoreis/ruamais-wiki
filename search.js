const search = document.querySelector('input.search')
const posts = document.querySelector('section.posts')

search.addEventListener('input', () => {

    const data = {
        action: 'data_fetch',
        keyword: `${search.value}`
    }

    const request = fetch('./wp-admin/admin-ajax.php', {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: 'POST',
        body: `action=data_fetch&keyword=${search.value}`
    })

    request.then(response => response.text())
    request.then(response => posts.innerHTML = response)
    request.catch(console.error)

})


// const categoryButtons = document.querySelectorAll('li.category')
//
// categoryButtons.forEach( categoryButton => {
//     categoryButton.addEventListener('click', event => {
//         console.log(event.target.dataset.category);
//     })
// })
