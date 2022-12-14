<!DOCTYPE html>
<html>
<body>

<p>Click the button to make a BUTTON element with text.</p>
<input id ="hasil">
<button onclick="myFunction(6, 'ikan nila')">Try it</button>

<script>
    function add(){
        var hasil = 0;
         var a = 2;

         var x = document.getElementsByName("jumlah[]");
                var i;
                for (i = 0; i < x.length; i++) {
                   hasil += x[i].value;
                   document.getElementById("hasil").value = $hasil;
                }
  


    }
function myFunction(v, n) {

    var x = document.getElementsByName("total[]");
    var namaid = x.length + 1;

  var input = document.createElement("INPUT");
  input.setAttribute("name", "id_bibit_ikan[]");
  input.setAttribute("value", v);
  input.setAttribute("readonly", "");
  document.body.appendChild(input);

  var input2 = document.createElement("INPUT");
  input2.setAttribute("id", "jumlah"+namaid);
  input.setAttribute("name", "jumlah[]");
  input2.setAttribute("Onchange", "add()");
  document.body.appendChild(input2);

  var input3 = document.createElement("INPUT");
  input3.setAttribute("id", "total"+namaid);
  input.setAttribute("name", "total[]");
  document.body.appendChild(input3);
}
</script>

</body>
</html>