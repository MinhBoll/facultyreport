function printReport(divId){
    var report = document.getElementById(divId).innerHTML;
    var mywindow = window.open('', 'Print', 'height=600, width=800');
    
    mywindow.document.write('<html>');
    mywindow.document.write('<head>');
    mywindow.document.write('<title>Official Report</title>');
    mywindow.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">');
    mywindow.document.write('</head>');
    mywindow.document.write('<body>');
    mywindow.document.write(report);
    mywindow.document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>');
    mywindow.document.write('<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>');
    mywindow.document.write('</body>');
    mywindow.document.write('</html>');
    mywindow.print();
}