import {set_cookie, get_cookie, cookie_exist} from "./../../network/cookie-manager.js";

/**
 * @param uid
 */
function add_favorites(uid){
    var old = "";
    if (cookie_exist("spots")) old = get_cookie("spots") + ",";
    set_cookie("spots", old + uid);
}

/**
 * @param uid
 */
function delete_favorites(uid){
    var favorites = get_cookie("spots").split(",");
    var new_favorites = "";

    for (var i = 0; i <= favorites.length - 1; i++){
        if (favorites[i] != "" && uid != favorites[i]) new_favorites += favorites[i] + ",";
    }
    set_cookie("spots", new_favorites);
}

export { add_favorites, delete_favorites }