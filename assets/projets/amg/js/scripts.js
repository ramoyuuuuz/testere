    // francisation du tableau
    $(document).ready(function() {
        $('#mercedes-table').DataTable({
            "lengthMenu": [25, 50, 100],
            "pagingType": "full_numbers",
            "searching": true,
            "ordering": true,
            "order": [[3, 'asc']],
            "columnDefs": [
                { "targets": [0, 1, 2, 3, 4], "orderable": true }
            ],
            "language": {
                "sProcessing":   "Traitement en cours...",
                "sLengthMenu":   "Afficher _MENU_ éléments",
                "sZeroRecords":  "Aucun résultat trouvé",
                "sInfo":         "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":    "Affichage de 0 à 0 sur 0 élément",
                "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                "sSearch":       "Rechercher :",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sPrevious": "Précédent",
                    "sNext":     "Suivant",
                    "sLast":     "Dernier"
                }
            },
        });
    

    });

