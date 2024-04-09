function showPassword() {
    var clave = document.getElementById("clave");
    var ojo = document.getElementById("ojo");
    var ojoabierto = document.getElementById("ojoabierto");
    if (clave.type === "password") {
      clave.type = "text";
      ojo.style.display = "none";
      ojoabierto.style.display = "inline-block";
    } else {
      clave.type = "password";
      ojo.style.display = "inline-block";
      ojoabierto.style.display = "none";
    }
  }