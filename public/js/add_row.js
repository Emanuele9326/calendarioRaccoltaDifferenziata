function addRow() {
    //get the values of form elements 
    $day = $("select#day").val();

    $line_number = $("#table tr").length;

    $line_number = $line_number + 1;
    $("#table tr:last").after(
        "<tr class='row1 mt-5' id='row" + $line_number + "'>" +
        "<td><input type='text' readonly id='day' value='" + $day + "'></td>" +
        "<td>" +
        "<label for='withdraw'>Materiale da conferire</label><select id=withdraw name='withdraw[]'>" +
        "<option value=''></option>" +
        "<option value='Umido'>Umido</option>" +
        "<option value='Plastica'>Plastica</option>" +
        "<option value='Carta'>Carta</option>" +
        "<option value='Vetro'>Vetro</option>" +
        "<option value='Indiferenziato'>Indiferenziato</option>" +
        "</td>" +
        "<td><label for='start'>Ora di inizio</label><input type='time' step='1' id='start' name='start[]'></td>" +
        "<td><label for='end'>Ora Fine</label><input type='time' step='1' id='end' name='end[]'></td>" +
        "<td><button type='button'name='delete' onclick=delete_row('row" + $line_number + "')>DELETE</button></td>" +
        "</tr>"
    );
};

function delete_row($line_number) {
    $('#' + $line_number).remove();
}