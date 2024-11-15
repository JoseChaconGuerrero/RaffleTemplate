const getNumber = document.querySelector(".get-number").innerHTML;
const selectedNumbers = document.getElementById("selectedNumbers");
const searchNumberInput = document.getElementById("inputSearchTicket");
const btnSearchTickets = document.getElementById("btnSearchTickets");
const resetSearchTicket = document.getElementById("resetSearchTicket");
const qtyNumber = document.getElementById("QtyNumber")
const btnMinus = document.getElementById("btnMinus");
const btnPlus = document.getElementById("btnPlus");
const ticketQty = document.getElementById("ticketQty");

let ticketsSelected = [];

fetch(`./acciones/getnumbers.php?number=${getNumber}`, {
  method: "GET",
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
})
  .then((response) => response.json())
  .then((data) => {
    const cuerpoTabla = document.querySelector("#cuerpo");
    const selectedKeysInput = document.getElementById("selectedKeys");
    let selectedKeys = [];

    let limite = 100;
    let paginaActiva = 1;
    let paginas = Math.ceil(data.length / limite);
    let maxPaginasVisibles = 10;

    const cargarProductos = (filteredData) => {
      cuerpoTabla.innerHTML = "";
      (filteredData || data).forEach((producto) => {
        const fila = document.createElement("div");
        fila.setAttribute("key", producto.number);
        fila.setAttribute("id", producto.number);
        fila.setAttribute("onclick", "selectnumber(this)");
        fila.classList.add("n", "fila");
        fila.innerHTML = `${producto.number}`;
        if (selectedKeys.includes(producto.number)) {
          fila.classList.add("activa");
        }
        if (producto.status == "deactivate") {
          fila.classList.add("hidden");
          fila.style.pointerEvents = "none";
        } else {
          fila.addEventListener("click", () =>
            seleccionarFila(fila, producto.number)
          );
        }
        cuerpoTabla.append(fila);
      });
    };

    const seleccionarFila = (fila, id) => {
      const index = selectedKeys.indexOf(id);
      if (index === -1) {
        selectedKeys.push(id);
        fila.classList.add("activa");
      } else {
        selectedKeys.splice(index, 1);
        fila.classList.remove("activa");

        deleteNumber(fila.innerHTML);
      }
      selectedKeysInput.value = selectedKeys.join(",");
    };

    window.pasarPagina = (pagina) => {
      paginaActiva = pagina + 1;
      cargarProductos();
    };

    window.nextPage = () => {
      if (paginaActiva < paginas) {
        paginaActiva++;
        cargarProductos();
      }
    };

    window.previusPage = () => {
      if (paginaActiva > 1) {
        paginaActiva--;
        cargarProductos();
      }
    };

    const btnRandomNumber = document
      .getElementById("btnRandomNumber")
      .addEventListener("click", randomNumber);

    function randomNumber() {
      document.body.classList.remove("loaded");

      const number = Math.random();
      ticketsSelected = [];
      selectedKeys = [];

      let i = 0;
      let array = [];
      data.forEach((one) => {
        i = i + 1;
        if (one.status == "activate") {
          item = document.getElementById(one.number);
          if (item) {
            item.classList.remove("activa");
            array.push(one.number);
          }
        }
      });

      setTimeout(function () {
        document.body.classList.add("loaded");

        for (let index = 0; index < qtyNumber.innerHTML; index++) {
          let indiceAleatorio1 = Math.floor(Math.random() * array.length);
          item = document.getElementById(array[indiceAleatorio1]);
          if (item) {
            ticketsSelected.push(item.innerHTML);
            item.classList.add("activa");
            selectnumber(item);
            seleccionarFila(item, item.innerHTML);
          }
        }
      }, 1000);
    }

    searchNumberInput.addEventListener("input", (e) => {
      const searchValue = e.target.value;
      const filteredData = data.filter((producto) =>
        producto.number.includes(searchValue)
      );
      cargarProductos(filteredData);
    });

    btnSearchTickets.addEventListener("click", () => {
      btnSearchTickets.style.display = "none";
      searchNumberInput.style.display = "block";
      resetSearchTicket.style.display = "block";
    });

    resetSearchTicket.addEventListener("click", () => {
      searchNumberInput.value = "";
      searchNumberInput.style.display = "none";
      resetSearchTicket.style.display = "none";
      btnSearchTickets.style.display = "block";
      cargarProductos();
    });

    cargarProductos();
  })
  .catch((error) => console.error("Error:", error));

const buttons = document.querySelectorAll(".page-link");
buttons.forEach((element) => {
  element.addEventListener("click", (e) => {
    e.preventDefault();
  });
});

const button = document.querySelector(".button-submit");
const errorModal = document.getElementById("modalError");
const openDataModal = document.getElementById("openModalUseData");
const userDataModal = document.getElementById("modalUseData");
const errorMessage = document.getElementById("msjerror");
const modalClose = document.querySelectorAll(".modal-close");
modalClose.forEach((close) => {
  close.addEventListener("click", () => {
    errorModal.style.setProperty("display", "none");
    userDataModal.style.setProperty("display", "none");
  });
});

openDataModal.addEventListener("click", () => {
  userDataModal.style.setProperty("display", "flex");
});

button.addEventListener("click", (e) => {
  e.preventDefault();
  const input = document.getElementById("selectedKeys").value;
  const id = document.getElementById("id").value;
  const nombre = document.getElementById("nombre").value;
  const email = document.getElementById("email").value;
  const cedula = document.getElementById("identification").value;
  const code = document.getElementById("country_code").value;
  let celular = document.getElementById("celular").value;
  if (!celular) {
    errorMessage.innerHTML = "Escriba su numero.";
    errorModal.style.setProperty("display", "flex");
    return;
  }
  if (celular.startsWith("0")) {
    celular = celular.slice(1);
  }
  if (code == "+58" || code == "+57") {
    if (celular.length != 10) {
      errorMessage.innerHTML =
        "Si su número es 04149867839, por favor indíquelo de la siguiente manera: 4149867839.";
      errorModal.style.setProperty("display", "flex");
      return;
    }
  }
  let codigoArea = celular.slice(0, 3);
  let numeroPrincipal = celular.slice(3);
  let cadenaFormateada = `${codigoArea} ${numeroPrincipal}`;
  numero = code + " " + cadenaFormateada;

  const ubicacion = document.getElementById("location").value;
  const dataToSend = {
    selectedKeys: input,
    id: id,
    nombre: nombre,
    cedula: cedula,
    numero: numero,
    ubicacion: ubicacion,
    email: email,
  };
  const values = ticketsSelected.sort();
  if (!nombre || nombre.length < 6) {
    errorMessage.innerHTML = "Escriba su nombre correctamente.";
    errorModal.style.setProperty("display", "flex");
    return;
  }
  if (!nombre || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    errorMessage.innerHTML = "Escriba su email correctamente.";
    errorModal.style.setProperty("display", "flex");
    return;
  }
  if (!cedula || !/^\d{7,8}$/.test(cedula)) {
    errorMessage.innerHTML = "Escriba la cedula correctamente.";
    errorModal.style.setProperty("display", "flex");
    return;
  }

  if (values.length == qtyNumber.innerHTML) {
    fetch("./acciones/numbers.php", {
      method: "POST",
      body: JSON.stringify(dataToSend),
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        window.location = data;
      });
  } else {
    errorMessage.innerHTML = `Seleccione ${qtyNumber.innerHTML} numeros`;
    errorModal.style.setProperty("display", "flex");
  }
});

const box = document.querySelector(".box-select");

function selectnumber(number) {
  if (!number.classList.contains("activa")) {
    contenidoNumber = number.innerHTML;
    ticketsSelected.push(contenidoNumber);
  }
  printSelectedNumber();
}

function deleteNumber(number) {
  const index = ticketsSelected.indexOf(number);
  if (index !== -1) {
    ticketsSelected.splice(index, 1);
  }
  printSelectedNumber();
}

const pricePerNumber = document.getElementById("pricePerNumber").innerHTML;

function printSelectedNumber() {
  const values = ticketsSelected.sort();

  let contenido = "";
  for (let i = 0; i < values.length; i++) {
    contenido += `
      <div class="n-select">${values[i]}
        <i onclick="deleteNumber('${values[i]}')" class="fa fa-times close" aria-hidden="true"></i>
      </div>
    `;
  }
  if (ticketsSelected.length === 0) {
    contenido += `
      <div class="n-select">...
        
      </div>
    `;
  }
  box.innerHTML = contenido;

  if (values.length > ticketQty.value) {
    ticketQty.value = values.length
    qtyNumber.innerHTML = ticketQty.value
  }

  selectedNumbers.innerHTML = `${values.length} de ${qtyNumber.innerHTML}`;
  totalPrice(qtyNumber.innerHTML * pricePerNumber);
}

function totalPrice(number) {
  const totalDiv = document.getElementById("montoTotal");
  totalDiv.innerHTML = `Total: ${number} USD`;
}

const searchTicketButton = document.getElementById("searchTicket");
const widgetTicket = document.getElementById("widgetTicket");
const fecha = document.getElementById("fechaFormateada").innerHTML;
const hora = document.getElementById("horaFormateada").innerHTML;
const imagen = document.getElementById("imagenFormateada").getAttribute("src");
const nombreRifa = document.getElementById("raffleName").innerHTML;

searchTicketButton.addEventListener("click", () => {
  const findTicket = document.getElementById("findTicket").value;
  const id = document.getElementById("id").value;
  const getQtyNumbers = document.getElementById("getQtyNumbers").innerHTML;
  const length = getQtyNumbers.length;

  widgetTicket.innerHTML = "";

  let regex = new RegExp(`^.{${length},}$`);

  if (!regex.test(findTicket) || findTicket.length > length) {
    errorMessage.innerHTML = `Por favor escriba un ticket de ${length} dígitos`;
    errorModal.style.setProperty("display", "flex");
    return;
  }

  if (findTicket) {
    fetch(`./acciones/getticket.php?ticket=${findTicket}&id=${id}`, {
      method: "GET",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        const parteInicial = data.celular.slice(0, 7);
        const parteFinal = data.celular.slice(-1);
        const numero = `${parteInicial}......${parteFinal}`;
        let pagoStatus = "";
        let statusIcon = "";

        if (data.pago === "no") {
          pagoStatus =
            '<span class="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Sin Pago (se liberará pronto)</span>';
          statusIcon =
            '<div class="status" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Sin Pago"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>';
        } else {
          pagoStatus =
            '<span><i class="fa fa-check-circle" aria-hidden="true"></i> Pago Verificado</span>';
          statusIcon =
            '<div class="status" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Pago Verificado"><i class="fa fa-check-circle" aria-hidden="true"></i></div>';
        }

        contenido = `  
        <div class="top --flex-column container_banner">
            <div class="buy" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="BOLETO DIGITAL"><i class="fa fa-globe" aria-hidden="true"></i></div>
            ${statusIcon}
            <div class="bandname -bold"><img src="./assets/imgs/sahami.jpg" crossorigin="anonymous" alt="Logo" width="55" height="55"><br>
                Sahami Rifas<br>
            </div>
            <div class="tourname">${nombreRifa}</div>
            <div class="imagenfondo"><img src="${imagen}" crossorigin="anonymous" alt="Banner" width="280" height="330"></div>
            <div id="nombres" class="nombres">
                ${pagoStatus}
                <span><i class="fa fa-globe" aria-hidden="true"></i>${data.estado}</span>
                <span><i class="fa fa-user-circle" aria-hidden="true"></i> ${data.nombre}</span>
                <span><i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i>${numero}</span>
                <span></span>
            </div>
            <div class="deetz --flex-row-j!sb">
                <div class="ticket-date  event --flex-column">
                    <div class="date -bold">${fecha}</div>
                </div>
                <div class="ticket-date  --flex-column">
                    <div class="cost -bold">${hora}</div>
                </div>
            </div>
        </div>
        <div class="rip"></div>
        <div class="bottom --flex-row-j!sb">
            <strong style="font-size:22px"><b>${data.numero}</b></strong>
        </div>`;

        widgetTicket.innerHTML = contenido;
      })
      .catch((error) => {
        errorMessage.innerHTML = "No registrado en sistema";
        errorModal.style.setProperty("display", "flex");
        return;
      });
  }
});

function actionButtonAccounts(action_type, elemnt, text) {
  if (action_type === "copy") {
    elemnt.classList.add("copied");
    setTimeout(function () {
      elemnt.classList.remove("copied");
    }, 1200);

    var sampleTextarea = document.createElement("textarea");
    document.body.appendChild(sampleTextarea);
    sampleTextarea.value = text.replace(/ /g, "");
    sampleTextarea.select();
    document.execCommand("copy");
    document.body.removeChild(sampleTextarea);
  } else if (action_type === "link") {
    window.open(text, "_blank").focus();
  }
}

const payments = document.querySelectorAll(".option-payment");
payments.forEach((payment) => {
  payment.addEventListener("click", () => {
    payments.forEach((el) => el.classList.remove("selected"));
    payment.classList.add("selected");
    showPaymentDetails(payment.id);
  });
});

function showPaymentDetails(paymentId) {
  document
    .querySelectorAll(".payment-details")
    .forEach((detail) => (detail.style.display = "none"));
  const detailsDiv = document.getElementById("datosBanco");
  if (paymentId === "ZELLE") {
    detailsDiv.innerHTML = `
    <div id="datosBanco" class="text-center input-field col s12 m6">
      <div>
        <h6>
          <span data-toggle="tooltip" data-placement="bottom" title="Zelle Venezuela">ZELLE</span>
          <span data-toggle="tooltip" data-placement="bottom" title="Cuenta Personal"><i class="help-account fa fa-user" aria-hidden="true"></i></span>
        </h6>
      </div>
      <div>
        <span class="nameAccountNumber"><i class="fa fa-" aria-hidden="true"></i> Correo Electrónico </span>
        <h3>Paolaaguinaga.pa@gmail.com <button onclick="actionButtonAccounts('copy', this, 'Paolaaguinaga.pa@gmail.com')" class="magic_button" data-toggle="tooltip" data-placement="top" title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
      </div>
      <div class="titularBank"><span>TITULAR</span>Karla Aguinaga</div>
      <div class="payment-notes"><b></b></div>
    </div>
  `;
  } else if (paymentId === "ZINLI") {
    detailsDiv.innerHTML = `
    <div id="datosBanco" class="text-center input-field col s12 m6">
      <div>
        <h6>
          <span data-toggle="tooltip" data-placement="bottom" title="Zelle Venezuela">ZINLI</span>
          <span data-toggle="tooltip" data-placement="bottom" title="Cuenta Personal"><i class="help-account fa fa-user" aria-hidden="true"></i></span>
        </h6>
      </div>
      <div>
        <span class="nameAccountNumber"><i class="fa fa-" aria-hidden="true"></i> Correo Electrónico </span>
        <h3>keiderguerra90@gmail.com <button onclick="actionButtonAccounts('copy', this, 'keiderguerra90@gmail.com')" class="magic_button" data-toggle="tooltip" data-placement="top" title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
      </div>
  
    </div>
  `;
  } else if (paymentId === "MOVIL") {
    detailsDiv.innerHTML = `
    <div class="text-center input-field col s12 m6">
      <div>
        <h6>
          <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Pago Móvil">Pago Móvil</span>
          <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cuenta Personal"><i class="help-account fa fa-user" aria-hidden="true"></i></span>
        </h6>
      </div>
      <div>
        <span class="nameAccountNumber"><i class="fa fa-money" aria-hidden="true"></i> Banco de Venezuela</span>
        <h3 class="interbankNumber">04164708085 <button onclick="actionButtonAccounts('copy', this, '04164708085')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
      </div>
      <div>
        <span class="nameAccountNumber"><i class="fa fa-money" aria-hidden="true"></i> C.I</span>
        <h3>14626887<button onclick="actionButtonAccounts('copy', this, ' 14626887')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
      </div>
      <div class="payment-notes"><b>Tasa: Monitor</b></div>
    </div>
  `;
  } else if (paymentId === "BANCOLOMBIA_COLOMBIA") {
    detailsDiv.innerHTML = `
    <div class="text-center input-field col s12 m6">
      <div>
        <h6>
          <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bancolombia">BANCOLOMBIA - COLOMBIA</span>
          <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cuenta Personal"><i class="help-account fa fa-user" aria-hidden="true"></i></span>
        </h6>
      </div>
      <div>
        <span class="nameAccountNumber"><i class="fa fa-money" aria-hidden="true"></i> Cta Ahorro Bancolombia</span>
        <h3>86364652498 <button onclick="actionButtonAccounts('copy', this, '86364652498')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
      </div>
      <div>
        <h3 class="interbankNumber">4.000 pesos x DOLAR <button onclick="actionButtonAccounts('copy', this, '4.000 pesos x DOLAR')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
      </div>
      <div class="titularBank"><span>TITULAR</span>Jeane Rodriguez</div>
      <div class="payment-notes"><b>(NO RECIBE GIROS INTERNACIONALES)</b></div>
    </div>
  `;
  } else if (paymentId === "NEQUI_COLOMBIA") {
    detailsDiv.innerHTML = `
      <div class="text-center input-field col s12 m6">
        <div>
          <h6>
            <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nequi">NEQUI - COLOMBIA</span>
            <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cuenta Personal"><i class="help-account fa fa-user" aria-hidden="true"></i></span>
          </h6>
        </div>
        <div>
    
          <h3>3224144038<button onclick="actionButtonAccounts('copy', this, ' 3224144038')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
        </div>
        <div>
          <h3 class="interbankNumber">4.200 pesos x DÓLAR <button onclick="actionButtonAccounts('copy', this, '4.200 pesos x DÓLAR ')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
        </div>
       
      </div>
    `;
  } else if (paymentId === "BANCO_BCI_CHILE") {
    detailsDiv.innerHTML = `
      <div class="text-center input-field col s12 m6">
      <div>
        <h6>
          <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Banco de Crédito e Inversiones">Banco BCI - Chile</span>
          <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cuenta Personal"><i class="help-account fa fa-user" aria-hidden="true"></i></span>
        </h6>
      </div>
      <div>
        <span class="nameAccountNumber"><i class="fa fa-" aria-hidden="true"></i> CUENTA VISTA</span>
        <h3>111127231360 <button onclick="actionButtonAccounts('copy', this, '111127231360')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
        
        <span class="nameAccountNumber">RUT</span>
        <h3 class="interbankNumber">27.231.360-1<button onclick="actionButtonAccounts('copy', this, '27.231.360-1')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
        
        
          <span class="nameAccountNumber">CORREO ELECTRÓNICO</span>
          <h3 class="interbankNumber">guerreraortizwilbertalexis@gmail.com <button onclick="actionButtonAccounts('copy', this, 'guerreraortizwilbertalexis@gmail.com')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
          
      </div>
      <div class="titularBank"><span>TITULAR</span>WILBERT ALEXIS GUERRA ORTIZ</div>
      <div class="payment-notes"><b></b></div>
    </div>
    `;
  } else if (paymentId === "EFECTIVO") {
    detailsDiv.innerHTML = `
        <div class="text-center input-field col s12 m6">
          <div>
            <h6>
              <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Efectivo">EFECTIVO</span>
              <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Pago Directo"><i class="help-account fa fa-money" aria-hidden="true"></i></span>
            </h6>
          </div>
          <div>
            <span class="nameAccountNumber">FORMA DE ENTREGA</span>
            <h3>EFECTIVO <button onclick="actionButtonAccounts('copy', this, 'EFECTIVO')" class="magic_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copiar"><i class="fa fa-files-o" aria-hidden="true"></i></button></h3>
          </div>
          <div class="titularBank">San Juan de Colon y Cucuta</div>
          <div class="payment-notes"><b>Por favor coordinar con el encargado.</b></div>
        </div>
      `;
  }

  detailsDiv.style.display = "block";
}

btnMinus.addEventListener("click", ()=>{
  let currentQty = parseInt(ticketQty.value);
  if (currentQty > parseInt(ticketQty.min)) {
    ticketQty.value = currentQty - 1;
    qtyNumber.innerHTML = ticketQty.value
    printSelectedNumber()
  }
});

btnPlus.addEventListener("click", () => {
  let currentQty = parseInt(ticketQty.value);
  if (currentQty < parseInt(ticketQty.max)) {
    ticketQty.value = currentQty + 1;
    qtyNumber.innerHTML = ticketQty.value
    printSelectedNumber()
  }
});

