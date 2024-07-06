function returnToLastPage() {
    if (document.referrer.split('/')[2]!=location.hostname)
        window.location.href = 'index.php';
    else
        window.location = document.referrer;
}