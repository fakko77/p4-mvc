<?php

require_once 'models/article.php';
require_once 'models/comment.php';
require_once 'controllers/articles.php';
require_once 'controllers/comments.php';
require_once 'controllers/db.php';
require_once 'models/db.model.php';

//check url
$url = '';
$id = '';
$idcom = '';
if (isset($_GET['url'])) {
    $url = $_GET['url'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['idcom'])) {
    $idcom = $_GET['idcom'];
}

if ($url == '') {

    homeCRLT();
} elseif ($url == 'log.php') {

    logControllersCRLT();
} elseif ($url == 'admin-panel.php') {

    checkSessionCRLT();
    addArticleCRLT();

} elseif ($url == 'admin-edit.php') {

    checkSessionCRLT();

    tableAdmCRLT();

} elseif ($url == 'admin-com.php' and !empty($id)) {

    checkSessionCRLT();

    showsComAdmCRLT();

} elseif ($url == 'admin-com-signaler.php') {
    checkSessionCRLT();
    showsComSCRLT();

} elseif ($url == 'post.php' and !empty($id)) {

    UsersCreatComCRLT();
    showsPageCRLT();
} elseif ($url == 'deleteCom.php' and !empty($idcom) and !empty($id)) {

    admDeleteComCRLT();
} elseif ($url == 'signaler.php' and !empty($idcom) and !empty($id)) {
    userComSCRLT();

} elseif ($url == 'delete.php' and !empty($id)) {

    admDeleteArticleCRLT();

} elseif ($url == 'update.php') {
    checkSessionCRLT();
    admUpdateArticleCRLT();

} elseif ($url == 'logout.php') {

    logoutCRTL();
} else {
    require_once '404.php';
}
