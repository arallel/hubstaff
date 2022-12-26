/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

function newMailInvite() {
    const node = document.getElementById("mail-invite");
    const clone = node.cloneNode(true);
    document.getElementById('mail-container').appendChild(clone);
    
}
