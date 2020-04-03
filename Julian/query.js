function ready() {
    var query = new URL(window.location).searchParams.get('query')
    document.getElementById('query-input').value = query
    document.getElementById('query-ouput').innerText = query
}