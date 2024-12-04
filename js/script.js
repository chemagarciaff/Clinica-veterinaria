

let selectModifyCliente = document.getElementById("select-modify-cliente");
let selectModifyMascota = document.getElementById("select-modify-mascota");
let selectModifyVacuna = document.getElementById("select-modify-vacuna");

console.log(selectModifyCliente);
console.log(selectModifyMascota);
console.log(selectModifyVacuna);





const mostrarDatosCliente = (event) => {
    location.href = "./principalAdmin.php?modificarCliente=true&cliente=" + event.target.value;
}
const mostrarDatosMascota = (event) => {
    location.href = "./principalAdmin.php?modificarMascota=true&mascota=" + event.target.value;
    console.log(event.target);
}
const mostrarDatosVacuna = (event) => {
    location.href = "./principalAdmin.php?modificarVacuna=true&vacuna=" + event.target.value;
}

if(selectModifyCliente){
    selectModifyCliente.addEventListener("change", mostrarDatosCliente);
}
if(selectModifyMascota){
    selectModifyMascota.addEventListener("change", mostrarDatosMascota);
}
if(selectModifyVacuna){
    selectModifyVacuna.addEventListener("change", mostrarDatosVacuna);
}
