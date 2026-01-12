define([], function() {
    return {
        init: function(fieldId) {
            console.log('autosave_trigger init v2');
            /*
            setInterval(function() {
                console.log('autosave_trigger interval');
                M.mod_quiz.autosave.save_changes();
            }, 2000);
            */
            document.addEventListener('syntax-data-changed', function() {
                console.log('autosave_trigger for syntax-data-changed event');
                M.mod_quiz.autosave.save_changes();
            });
        }
    };
});