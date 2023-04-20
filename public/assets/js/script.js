(function(win, doc) {
    'use strict';

    // Deletar os dados
    function confirmDelete(e)
    {
        e.preventDefault();
        e.stopPropagation();

        let token = doc.getElementsByName('_token')[0].value;

        if(confirm('Deseja excluir os dados?')) {
            let lancamentoId = e.currentTarget.getAttribute('href').split('/')[2];

            let ajax = new XMLHttpRequest();
            ajax.open('DELETE', '/lancamentos/' + lancamentoId);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.setRequestHeader('X-HTTP-Method-Override', 'DELETE');
            ajax.onreadystatechange = function() {
                if(ajax.readyState === 4 && ajax.status === 200) {
                    console.log('Deu certo!');
                    win.location.href = '/';
                }
            };

            ajax.send();

        } else {
            return false;
        }
    }

    if(doc.querySelector('.js-delete')) {
        let btn = doc.querySelectorAll('.js-delete');

        for(let i=0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelete, false);
        }
    }

})(window, document);
