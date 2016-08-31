$(document).ready(function() {
    $('#deletePrompt').on('show.bs.modal', function (event) {
      var $button = $(event.relatedTarget);
      var $modal = $(this);
      var $activeForm = $button.parent('form').clone();
      var $modalForm = $modal.find('.delete-form');

      $modalForm.attr('action', $activeForm.attr('action'));
      $modalForm.find('.revision-val').val($activeForm.find('.revision-val').val());
      $modalForm.find('.workflow-state-val').val($activeForm.find('.workflow-state-val').val());
    });

    $('.json-highlight').each(function(idx, el) {
        $(el).html(JSONHighlight($(el).text()));
    });
});

function JSONHighlight(json) {
    if (typeof json != 'string') {
         json = JSON.stringify(json, undefined, 2);
    }
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
};
