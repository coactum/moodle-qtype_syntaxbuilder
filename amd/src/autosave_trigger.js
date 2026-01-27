define([], function() {
    var saving = false;

    return {
        init: function(fieldId) {
            console.log('autosave_trigger init v2');

            document.addEventListener('syntax-data-changed', function() {
                console.log('autosave_trigger for syntax-data-changed event');

                if (saving) {
                    console.log('autosave_trigger: already saving, skipping');
                    return;
                }
                
                saving = true;
                
                M.mod_quiz.autosave.save_changes();
                
                // nicht häufiger als jede Sekunde zwischen speichern
                setTimeout(function() {
                    saving = false;
                }, 1000);
            });
        }
    };
});