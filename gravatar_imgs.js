var gravatar_imgs = {
    insertrow: function(evt) {
        if (typeof(rcmail.env.gravatar_imgs[evt.uid]) !== "undefined") {
            $('td.subject', evt.row.obj).prepend(rcmail.env.gravatar_imgs[evt.uid]);
        }
    }
};

window.rcmail && rcmail.addEventListener('init', function(evt) {
    //if (rcmail.env.layout == 'widescreen') {
        if (rcmail.gui_objects.messagelist) {
            rcmail.addEventListener('insertrow', gravatar_imgs.insertrow);
        }
    //}
});