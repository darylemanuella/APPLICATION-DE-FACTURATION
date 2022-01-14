<SCRIPT language=javascript>
    function message($message) {
       alert($message);
   }
    function ConfirmMessage($message) {
       if (confirm($message)) { // Clic sur OK
           document.bgColor="silver";
       }
   }
   function myFunction() {
    var person = prompt("Please enter your name", "Harry Potter");
    
    if (person != null) {
        document.getElementById("demo").innerHTML =
        "Hello " + person + "! How are you today?";
    }
}
</SCRIPT>