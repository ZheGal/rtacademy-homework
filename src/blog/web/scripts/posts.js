let postsNum = 4;
let postsCounter = 1;
let loader = document.createElement('div');
loader.classList.add('loader');

document.body.append(loader);

let posts = (async function() {
    let response = await fetch('/blog/posts.json');
    if (response.ok) {
        let jsonContents = await response.json();

        return Array.from(jsonContents);
    } else {
        console.error('Сталася помилка ' + response.status + ': ' + response.statusText);
    }
})();

posts.then(val => {
    let loadButton = document.getElementById('morePostsButton');
    let postsSum = val.length;

    loadButton.onclick = (e => {
        e.preventDefault();
        activateLoader();

        setTimeout(() => {
            for (let i = 0; i < postsNum; i++, postsCounter++) {
                printPost(val[postsCounter - 1]);

                if (postsCounter == postsSum) {
                    loader.classList.add('active');
                    loadButton.remove();
                }
            }
            deactivateLoader();
        }, 1000);
    });


})

async function printPost(item) {

    let parentBlock = document.getElementById('postsList');
    let postLi = document.createElement('li');

    let postA = document.createElement('a');
    postA.setAttribute('href', '/blog/single.php?title=' + item.alias);
    let postCoverIn = document.createElement('div');
    postCoverIn.classList.add('cover');
    let postCoverImage = document.createElement('img');
    postCoverImage.setAttribute('src', await fetch(item.cover.url).then((link) => { return link.url }));
    postCoverImage.setAttribute('alt', item.cover.alt);

    let postDataWrap = document.createElement('div');
    postDataWrap.classList.add('data');
    let postDataInfoWrap = document.createElement('div');
    postDataInfoWrap.classList.add('info');
    let postDataInfoAuthor = document.createElement('span');
    postDataInfoAuthor.classList.add('author');
    postDataInfoAuthor.innerText = item.author.first_name + ' ' + item.author.last_name;
    let postDataInfoDate = document.createElement('span');
    postDataInfoDate.classList.add('date');
    postDataInfoDate.innerText = item.publish_date;
    let postDataInfoTag = document.createElement('span');
    postDataInfoTag.classList.add('post-tag');
    postDataInfoTag.innerText = item.category.title;
    postDataInfoWrap.append(postDataInfoAuthor);
    postDataInfoWrap.append(postDataInfoDate);
    postDataInfoWrap.append(postDataInfoTag);

    let postDataTitle = document.createElement('h3');
    postDataTitle.classList.add('post-title');
    postDataTitle.innerText = item.title;
    let postDataDesc = document.createElement('p');
    postDataDesc.classList.add('desc');
    postDataDesc.innerText = item.start;
    postDataWrap.append(postDataInfoWrap);
    postDataWrap.append(postDataTitle);
    postDataWrap.append(postDataDesc);

    postCoverIn.append(postCoverImage);
    postA.append(postCoverIn);
    postA.append(postDataWrap);

    postLi.append(postA);

    parentBlock.append(postLi);
}

function activateLoader() {
    let loaderIn = document.createElement('div');
    loaderIn.classList.add('lds-roller');
    loaderIn.id = 'animateLoader';
    loaderIn.innerHTML = '<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>';

    loader.append(loaderIn);
    loader.classList.add('active');
}

function deactivateLoader() {
    loader.classList.remove('active');
    let loaderIn = document.getElementById('animateLoader');
    loaderIn.remove();
}