import { set_cookie, get_cookie, cookie_exist } from "../../network/cookie/cookie-manager.js";

/**
 * @param uid
 */
function add_favorites(uid){
    var old = "";
    if (cookie_exist("favorites")) old = get_cookie("favorites");
    old === "" ? set_cookie("favorites", old + uid) : set_cookie("favorites", old + "," + uid)
}

/**
 * @param uid
 */
function delete_favorites(uid){
    var favorites = get_cookie("favorites").split(",");
    var new_favorites = "";

    for (var i = 0; i <= favorites.length - 1; i++){
        if (favorites[i] != "" && uid != favorites[i]){
            i === 0 ? new_favorites += favorites[i] + "," : new_favorites += "," + favorites[i];
        }
    }
    set_cookie("favorites", new_favorites);
}

export { add_favorites, delete_favorites }