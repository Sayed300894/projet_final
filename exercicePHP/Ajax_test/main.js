document.getElementById('my-button').addEventListener('click', function() {

    fetch('getArticles.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(articles) {
            const section = document.getElementById('response');
            for (article of articles) {
                section.innerHTML += `<article>
                    <h2>${article.title}</h2>
                </article>`;
            }
        });
});