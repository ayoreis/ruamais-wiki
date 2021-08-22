const search = document.querySelector('input.search')
const posts = document.querySelector('section.posts')

search.addEventListener('input', () => {

    const data = {
        action: 'data_fetch',
        keyword: `${search.value}`
    }

    fetch('./wp-admin/admin-ajax.php', {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: 'POST',
        body: `action=data_fetch&keyword=${search.value}`
    })

    .then(response => response.text())
    .then(response => posts.innerHTML = response)
    .catch(console.error)

    // ask about old code: is it creating a new "thing" each time?
})


const categoryButtons = document.querySelectorAll('li.category')

categoryButtons.forEach( categoryButton => {
    categoryButton.addEventListener('click', event => {
        console.log(event.target.dataset.category);
    })
})
