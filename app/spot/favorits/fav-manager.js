import {set_cookie, get_cookie, cookie_exist} from "./../../network/cookie-manager.js"

/**
 * @param uid
 */
function add_favorits(uid){
    var old = "";
    if (cookie_exist("spots")) old = get_cookie("spots") + ", ";
    set_cookie("spots", old + uid);
}

export { add_favorits }