/* ========================================================= */

CREATE TABLE IF NOT EXISTS lets_freerun;

USE lets_freerun;

/* ========================================================= */


/* Table spots*/
CREATE TABLE IF NOT EXISTS spots (
    uid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(500),
    tier INT,
    location VARCHAR(999),
    description VARCHAR(5000)
);

/* Table spot_requests */
CREATE TABLE IF NOT EXISTS request_spots ();

/* ========================================================= */