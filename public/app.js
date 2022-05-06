function deleteMessage(book, e) {
    const confirmMsg = confirm(`Do you really wish to delete the book ${book}?`)

    if (confirmMsg === false) e.preventDefault()
}