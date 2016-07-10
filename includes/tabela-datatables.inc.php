<table id="mainTable" class="display responsive datatable style1 dataTable dtr-inline" role="grid" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Occurrency Type</th>
        <th>Date</th>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
        <th>ID Point</th>
        <th>New Job</th>
    </tr>
    </thead>
</table>
<script>
    $('#mainTable').DataTable({
        "ajax": {
            "url": "ajax/data1.php",
            "data": ""
        },
        "ordering": true,
        "bProcessing":true,
        "bDeferRender": true,
        "oLanguage": {
            "sProcessing": "loadding data...",
            "sProcessing" : "<b>A processar...</b>",
            "sLengthMenu" : "_MENU_  Registos por página",
            "sZeroRecords" : "<b>Sem resultados</b>",
            "sEmptyTable" : "Não há informação disponível",
            "sInfo" : "A mostrar de _START_ até _END_ de _TOTAL_ registos",
            "sInfoEmpty" : "A mostrar 0 registos",
            "sInfoFiltered" : "(filtrado de _MAX_ registos no total)",
            "sInfoPostFix" : "",
            "sSearch" : "<b>Pesquisar</b>:",
            "oPaginate": {
                "sFirst" : "Primeiro",
                "sPrevious" : "Anterior",
                "sNext" : "Seguinte",
                "sLast" : "Último"
            }}
    });
</script>