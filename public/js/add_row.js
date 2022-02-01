function addRow() {
    //get the values of form elements 
    $day = $("select#day").val();

    $line_number = $("#table tr").length;

    $line_number = $line_number + 1;
    $("#table tr:last").after(
        "<tr class='row1 mt-5' id='row" + $line_number + "'>" +
        "<td><input type='text' readonly id='day' value='" + $day + "'></td>" +
        "<td><label for='material'>Materiale da conferire</label><input type='text' name='material[]'></td>" +
        "<td><label for='start_time'>Ora di inizio</label><input type='time' step='1' id='start_time' name='start_time[]'></td>" +
        "<td><label for='end_time'>Ora Fine</label><input type='time' step='1' id='end_time' name='end_time[]'></td>" +
        "<td><button type='button'name='delete' onclick=delete_row('row" + $line_number + "')>DELETE</button></td>" +
        "</tr>"
    );
};

function delete_row($line_number) {
    $('#' + $line_number).remove();
}