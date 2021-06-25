function InitAJAX() {
    var objxml;
    var IEtypes = ["Msxml2.XMLHTTP.6.0", "Msxml2.XMLHTTP.3.0", "Microsoft.XMLHTTP"];

    try
    {
        // Probeer het eerst op de "moderne" standaardmanier
        objxml = new XMLHttpRequest();
    }
    catch (e)
    {
        // De standaardmanier werkte niet, probeer oude IE manieren
        for (var i = 0; i < IEtypes.length; i++)
        {
            try
            {
                objxml = new ActiveXObject(IEtypes[i]);
            }
            catch (e)
            {
                continue;
            }
        }
    }

    // Lever het XHR object op
    return objxml;
}
window.onload=function(){
    PostsLoad();

}
function PostsLoad() {
    let xmlHttp = InitAJAX();

    // Wat moet er gebeuren bij statuswijzigingen?
    xmlHttp.onreadystatechange = function ()
    {
        // Is het request al helemaal klaar en OK?
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200)
        {
            // Plaats de tekst in de pagina
            document.getElementById("Posts").innerHTML = xmlHttp.responseText;
        }
    }
    // Verstuur het request
    xmlHttp.open("GET", "php/postUitlees.php", true);
    xmlHttp.send();

}
function liked(postID) {

    let xmlHttp = InitAJAX();

    // Wat moet er gebeuren bij statuswijzigingen?
    xmlHttp.onreadystatechange = function ()
    {
        // Is het request al helemaal klaar en OK?
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200)
        {
            // Plaats de tekst in de pagina
            // alert("Like gegeven");
        }
    }
    // Verstuur het request
    xmlHttp.open("GET", "php/likeVerwerk.php?postID="+postID+"", true);
    xmlHttp.send();

}