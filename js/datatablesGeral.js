var tableProdutos = $("#example1").DataTable({
  "responsive": true,
  "autoWidth": false,
  "bDestroy": true,
  "serverside": true,
  "ajax" : "./tabelas/tableProdutos.php",
});

var tableVendas = $("#example2").DataTable({
  "responsive": true,
  "autoWidth": false,
  "bDestroy": true,
  "serverside": true,
  "ajax" : "./tabelas/tableVendas.php",
});