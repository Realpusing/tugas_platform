function cetakPilihan() {
  var pilihan = document.getElementById("numChoices").value;
  var pilihan1 = "";
  for (var i = 0; i < pilihan; i++) {
    pilihan1 += "<p> Pilihan Hobi ke-" + (1+i) + "<input type='text'> </p>";
  }
  var pil = "<p> <button onclick='radio()'>OK</button> </p>";
  //memasukan data yang telah diisi pada pilihan1, sekaligus memunculkan button
  document.getElementById("cetak").innerHTML = pilihan1;
  document.getElementById("button").innerHTML = pil;
}

function radio() {
  
  var form = document.getElementById("cetak");
  var inputs = form.getElementsByTagName("input");
  var radio = "";
  // membuat radio button
  for (var i = 0; i < inputs.length; i++) {
    radio += "<input type='radio' name='option' value='" + inputs[i].value + "'>" + inputs[i].value + "<br>";
    
  }
  var submit = "<input type='submit' value='Submit' onclick='pilihan(event)'>";
  
  //menambahkan radio agar bisa dimunculkan didalam html
  document.getElementById("masukan").innerHTML = submit;
  document.getElementById("daftar").innerHTML = radio;
}

function pilihan(event) {
  event.preventDefault();
  var testName = document.getElementById("name");
  var testEmail= document.getElementById("exampleInputEmail1")
  var result = document.getElementById("result");
  var banyakPil = document.getElementById("numChoices").value;
  var form1 = document.getElementById("cetak");
  var inputs = form1.getElementsByTagName("input");
  var checkboxes = [];

      for (var i = 0; i < inputs.length; i++) {
        checkboxes.push(inputs[i].value);
        
      }
    
      var selectedOption = document.querySelector('input[name="option"]:checked');
    
      if (selectedOption) {
        result.textContent = "Halo, Nama Saya " + testName.value + " dengan email "+testEmail.value+", saya mempunyai sejumlah " + banyakPil + " pilihan hobi yaitu " + checkboxes.join(", ") + " dan saya menyukai " + selectedOption.value + ".";
      } else {
        result.textContent = "Halo, Nama Saya " + testName.value + " dengan email "+testEmail.value+", saya mempunyai sejumlah " + banyakPil + " pilihan hobi yaitu " + checkboxes.join(", ") + " dan saya tidak memilih apapun." ;
      }
    }
    
    var form = document.getElementById("form1");
    form.addEventListener("submit", pilihan);
    
    
    
    



