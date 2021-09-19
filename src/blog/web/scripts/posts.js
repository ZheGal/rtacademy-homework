let postsNum = 4;
let page = 1;
let pages = 1;
let loader = document.createElement('div');
loader.classList.add('loader');

document.body.append(loader);


let loadButton = document.getElementById('morePostsButton');
loadButton.onclick = (async e => {
    e.preventDefault();

    pages = Math.ceil((loadButton.dataset.total) / postsNum);
    page++;

    posts = await getPosts();

    for (let i = 0; i < posts.length; i++) {
        printPost(posts[i]);
    }

    if (page == pages) {
        loadButton.remove();
    }
});

async function getPosts() {
    activateLoader();
    let response = await fetch(`/blog/posts_ajax.php?page=${page}`);
    if (response.ok) {
        let jsonContents = await response.json();
        setTimeout(() => deactivateLoader(), 100);
        return Array.from(jsonContents);
    } else {
        setTimeout(() => deactivateLoader(), 100);
        console.error('Сталася помилка ' + response.status + ': ' + response.statusText);
    }
}

async function printPost(item) {

    let parentBlock = document.getElementById('postsList');
    let postLi = document.createElement('li');

    let postA = document.createElement('a');
    postA.setAttribute('href', '/blog/single.php?id=' + item.id);
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