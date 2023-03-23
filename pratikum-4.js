function cetakPilihan() {
  var pilihan = document.getElementById("numChoices").value;
  var pilihan1 = "";
  for (var i = 1; i <= pilihan; i++) {
    pilihan1 += "<p> Pilihan " + i + "<input type='text' placeholder='Masukkan Pilihan'> </p>";
  }
  var pil = "<p> <button onclick='radio()'>OK</button> </p>";
  document.getElementById("cetak").innerHTML = pilihan1;
  document.getElementById("button").innerHTML = pil;
}

function radio() {
  var form = document.getElementById("cetak");
  var inputs = form.getElementsByTagName("input");
  var radio = "";
  for (var i = 0; i < inputs.length; i++) {
    radio += "<input type='radio' name='option' value='" + inputs[i].value + "'>" + inputs[i].value + "<br>";
  }
  var submit = "<input type='submit' value='Submit' onclick='pilihan(event)'>";
  document.getElementById("masukan").innerHTML = submit;
  document.getElementById("daftar").innerHTML = radio;
}

function pilihan(event) {
  event.preventDefault();
  var testName = document.getElementById("name");
  var result = document.getElementById("result");
  var banyakPil = document.getElementById("numChoices").value;
  var form1 = document.getElementById("cetak");
  var inputs = form1.getElementsByTagName("input");
  var checkboxes = [];

      for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type == "checkbox" && inputs[i].checked) {
          checkboxes.push(inputs[i].value);
        }
      }
    
      var selectedOption = document.querySelector('input[name="option"]:checked');
    
      if (selectedOption) {
        result.textContent = "Halo, Nama Saya " + testName.value + ", saya mempunyai sejumlah " + banyakPil + " pilihan yaitu " + checkboxes.join(", ") + " dan saya memilih " + selectedOption.value + ".";
      } else {
        result.textContent = "Please select an option.";
      }
    }
    
    var form = document.getElementById("form1");
    form.addEventListener("submit", pilihan);
    
    
    
    



