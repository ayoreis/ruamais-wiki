const search = document.querySelector('input.search')
const posts = document.querySelector('section.posts')

search.addEventListener('input', () => {

    fetch('./wp-admin/admin-ajax.php', {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: 'post',
        body: `action=my_search&keyword=${search.value}`
    })

    .then(response => response.text())
    .then(response => posts.innerHTML = response)
    .catch(console.error)
})


const categoryButtons = document.querySelectorAll('li.category')

categoryButtons.forEach( categoryButton => {
    categoryButton.addEventListener('click', event => {
        console.log(event.target.dataset.category);
    })
})
