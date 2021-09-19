<?php
use lib\models\PostsModel;

spl_autoload_register(function ($class) {
    $file = './' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});

$postId = ( isset($_GET['id']) ) ? intval($_GET['id']) : 0;

$postsModel = new PostsModel();

if (!empty($postId)) {
    $post = $postsModel->getSingle($postId);
} else {
    header("Location:/blog");
}

$websiteMenuModel  = new \lib\models\WebsiteMenuModel();
$websiteMenuItems  = $websiteMenuModel->getList();

require_once('./includes/header.php');
?>

<div class="post_page_inner">
    <div class="cover">
        <img src="/blog/web/images/post_02.jpg" alt="Ghost Publishing Options Techniques">
    </div>
    <div class="post_header">
        <h1 class="title">Ghost Publishing Options Techniques</h1>
        <div class="pre_text">
            <p>The Ghost editor has everything you need to fully optimise your content. This is where you can add tags and authors, feature a post, or turn a post into a page.</p>
        </div>
        <div class="author"></div>
    </div>
    <div class="post_content">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quaerat aspernatur deserunt qui praesentium quos non quae maxime debitis, rem amet beatae illo laborum nobis voluptatum porro est, perferendis error?</p>
        <p>Cum eligendi odit corporis incidunt dicta accusamus consectetur ullam nesciunt exercitationem iusto ex corrupti dolore cumque non cupiditate optio voluptate, amet deleniti repudiandae quos beatae illo error? Odio, vero nam.</p>
        <p>Repellendus voluptatum, labore vitae omnis, est voluptates, porro earum quis laboriosam veniam tenetur corporis magnam commodi in? Eligendi, consectetur necessitatibus, cum ea, laboriosam veritatis impedit laudantium expedita officiis aspernatur asperiores!</p>
        <p>Aperiam ipsam fugit, ad numquam similique necessitatibus voluptas consequuntur, animi atque consequatur, repellat deleniti. Voluptatibus officia expedita voluptatem vel nihil illo illum non culpa, optio tempora dolorem a fuga laboriosam.</p>
        <p>Perferendis corrupti velit blanditiis cum consectetur. Quibusdam quo suscipit sit ut accusamus, quidem quisquam asperiores repellendus, atque error animi enim laboriosam quae nulla eius! Ipsum molestiae doloribus fugiat qui dicta?</p>
        <p>Recusandae quibusdam fuga, eum eligendi aliquam facere nesciunt, velit porro vel excepturi, laudantium dolorem animi quas. Aspernatur magnam, soluta dicta officia provident corrupti voluptates, corporis itaque eos, eaque ea? Pariatur!</p>
        <p>Ipsa, assumenda omnis! Unde tempore repudiandae reiciendis, perspiciatis et, est consequatur rem illum, aliquam blanditiis labore molestiae quas hic impedit. Consectetur ullam neque aliquid obcaecati iusto? Optio officiis alias veritatis!</p>
        <p>Ex numquam, eum unde eveniet magni quod alias quasi doloribus eaque eius sint quis iusto asperiores sapiente sed tempore. Ea, ratione. Doloribus praesentium, reprehenderit odio voluptate voluptas non quam corrupti?
        <p>Amet impedit ipsum, quis similique eius nesciunt non culpa perferendis at nisi doloremque repellendus veritatis officia sed harum eligendi, explicabo, est consequuntur assumenda nobis voluptas! Accusantium facere autem temporibus laudantium?</p>
        <p>Necessitatibus accusantium quae labore enim quis, sapiente at dolores maxime et! Consequatur, doloremque. Facilis eligendi voluptatum molestias veritatis quas blanditiis, non eum nulla nisi? Fuga sunt aliquam asperiores sapiente cum?</p>
        <p>Dolore molestiae sit ipsa voluptas rem excepturi sint sunt, omnis molestias accusantium velit perspiciatis, facere, sed dicta? Aspernatur, dolorem, laboriosam non repellat temporibus ipsa, vitae deleniti minus qui dicta odit?</p>
        <p>Explicabo a quia laudantium, nam labore eum maxime incidunt minus odio magnam. Quaerat veniam inventore nisi eos, quo ipsum pariatur, voluptates eum odit quibusdam maiores deleniti qui nesciunt unde in!</p>
        <p>Dolorum modi sed architecto quo! Id, unde ratione. Labore illum ab, dolor a soluta iste quam quidem veniam sunt nostrum consectetur, culpa deserunt magni alias voluptatibus eum voluptates ad assumenda.</p>
        <p>Incidunt provident excepturi, dolorem eaque aspernatur velit eum, aliquam consequatur magnam consequuntur accusantium quaerat! Inventore deleniti, in hic aspernatur excepturi nesciunt. Mollitia, adipisci! Reiciendis quos dignissimos inventore distinctio in. Assumenda?</p>
        <p>Pariatur dolore rerum blanditiis accusantium reiciendis quod dolores, est tenetur voluptatibus mollitia officia in possimus adipisci debitis. Dignissimos eos illum exercitationem adipisci cupiditate! Libero, architecto tempore ea voluptate quaerat ab?</p>
        <p>Velit asperiores aliquam inventore ex voluptatibus doloremque cum assumenda deserunt hic eveniet reprehenderit voluptates consequatur, nobis saepe alias possimus suscipit maxime, perspiciatis corporis obcaecati sit mollitia quibusdam debitis. Dolores, vitae.</p>
        <p>Saepe, accusamus! Ex quis vitae laudantium perferendis ipsum sapiente aperiam quae veritatis, a natus eligendi similique pariatur. Iure officiis at porro, quaerat ipsum consectetur, necessitatibus perspiciatis cupiditate magni architecto suscipit!</p>
        <p>Magni vel sequi laudantium suscipit autem neque deserunt cupiditate facilis accusantium porro repudiandae nisi veniam quia optio nihil sed non quasi distinctio assumenda exercitationem expedita, aut placeat fuga! Expedita, asperiores?</p>
        <p>Aspernatur voluptatibus doloribus nihil dicta debitis perspiciatis, quasi numquam eaque libero a quod adipisci, dolores minus iusto, eligendi ea natus sint quidem quae et velit dolorem exercitationem earum delectus? Soluta?</p>
        <p>Iusto sapiente odio dolorum odit non, neque inventore, totam quibusdam omnis laudantium reprehenderit magnam nisi maiores! Quibusdam tempora voluptate, doloribus odio dignissimos veritatis, commodi laboriosam laborum, nisi debitis earum voluptatem!</p>
    </div>
</div>

<?php require_once('./includes/footer.php'); ?>