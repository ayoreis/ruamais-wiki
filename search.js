'use strict'

const debounce = (func, delay) => {

    let timeout

    return (...args) => {
        if (timeout) {
            clearTimeout(timeout)
        }

        timeout = setTimeout(() => {
            func(...args)
        }, delay)
    }
}

const throttle = (func, delay) => {

    let last = 0

    return (...args) => {
        const now = new Date().getTime()
        if (now - last < delay) {
            return
        }

        last = now

        return func(...args)
    }
}

const posts = [...document.querySelectorAll('.post')]
const search = document.querySelector('.search')
let searchResults, term, string

search.addEventListener('input', debounce((event) => {
    term = event.target.value.toLowerCase()

    searchResults = posts.filter((post) => {
        string = post.innerText.toLowerCase()

        if (term === "") {
            return
        } else {
            return !string.includes(term)
        }
    })

    posts.forEach( post => {
        post.classList.remove('search-hidden')
    })

    searchResults.forEach( searchResult => {
        searchResult.classList.add('search-hidden')
    })

    console.log(term);
}, 250))



// /* posts */
// const buttons = [...document.querySelectorAll('section.categories > ul > li')]
// let category, postCategories, filterdPosts
//
// buttons.forEach( button => {
//     button.addEventListener('click', debounce((event) => {
//
//
//         category = event.target.dataset.category
//         console.log(`Category: ${category}`);
//
//         posts.forEach( post => {
//
//             postCategories = post.dataset.category.split(" ")
//
//             console.log(`Post ${posts.indexOf(post)} category: ${postCategories}`)
//             console.log(`Resuls = ${}`);
//
//             console.log("END");
//         })
//
//
//
//     }, 250))
// })
