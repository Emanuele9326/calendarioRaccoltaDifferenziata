function addMore() {

    $day = $("select[name=giorno]").val();

    $rowno = $("#employee_table tr").length;

    $rowno = $rowno + 1;
    $("#employee_table tr:last").after("<tr class='row1' id='row" + $rowno + "'><td><input type='text' readonly name='giorno' value='" + $day + "'></td><td><input type='text' name='conferimento[]' placeholder='Es:Plastica'></td><td><label for='oraInizio'>ora Inizio</label><input type='time' step='1' id='ora-inizio'name='oraInizio[]'></td><td><label for='oraFine'>ora Fine</label><input type='time' step='1' id='ora-fine'name='oraFine[]'></td><td><input type='button' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");

};

function delete_row(rowno) {
    $('#' + rowno).remove();
}