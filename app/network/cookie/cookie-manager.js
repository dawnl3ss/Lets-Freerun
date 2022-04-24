/**
 * @param name
 * @param value
 */
function set_cookie(name, value){
    document.cookie = name + "=" + (value || "") + "; path=/";
}

/**
 * @param name
 * @returns {string|null}
 */
function get_cookie(name){
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');

    for (var i = 0; i < ca.length; i++){
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

/**
 * @param name
 * @returns {boolean}
 */
function cookie_exist(name){
    return document.cookie.indexOf(name + "=") !== -1;
}

export { get_cookie, set_cookie, cookie_exist }
