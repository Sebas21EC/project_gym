function calculateEndDate() {
    var startDate = new Date(document.getElementById('start_date').value);
    var selectedOption = document.getElementById('subscription_type_id').options[document.getElementById('subscription_type_id').selectedIndex];
    var nMonths = parseInt(selectedOption.getAttribute('data-n-months'));
    console.log(nMonths + ' months');

    if (!isNaN(startDate) && nMonths) {
        var endDate = new Date(startDate.getTime());
        endDate.setMonth(endDate.getMonth() + nMonths);
        document.getElementById('end_date').value = endDate.toISOString().slice(0, 10);
    }
}

document.getElementById('start_date').addEventListener('change', calculateEndDate);
document.getElementById('subscription_type_id').addEventListener('change', calculateEndDate);
