function returnToLastPage() {
    
    // Get the referrer page/file
    var referrerURL = new URL(document.referrer);
    var pathname = referrerURL.pathname;
    var fileName = pathname.substring(pathname.lastIndexOf('/') + 1);

    // Check if the user came from the domain or from the sing up or log in pages
    if (document.referrer.split('/')[2]!=location.hostname || fileName == 'signUp.php' || fileName == 'logIn.php ')
        location.href = 'index.php';
    else
        location = document.referrer;
}