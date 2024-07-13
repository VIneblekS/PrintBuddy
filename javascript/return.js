function returnToLastPage() {
    var referrerURL = new URL(document.referrer);
    var pathname = referrerURL.pathname;
    var fileName = pathname.substring(pathname.lastIndexOf('/') + 1);

    if (document.referrer.split('/')[2]!=location.hostname || fileName == 'signUp.php' || fileName == 'logIn.php ')
        location.href = 'index.php';
    else
        location = document.referrer;
}