function deleteMessage(book, e) {
    const confirmMsg = confirm(`Do you really wish to delete the book ${book}?`)

    if (confirmMsg === false) e.preventDefault()
}

// dynamic active class on menu
let navLinks = document.getElementsByClassName('nav-link')
let current = 0
for (var i = 0; i < navLinks.length; i++) {
    if (navLinks[i].href === document.URL) {
        current = i
    }
}

navLinks[current].className += ' active'